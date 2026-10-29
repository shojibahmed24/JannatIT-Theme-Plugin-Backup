<?php
/**
 * Templates: RDPGround: Admin RDP, Private RDP, Linux VPS, cPanel Hosting,
 * Reseller Hosting and Dedicated Servers. The template slug picks the product.
 */

defined( 'ABSPATH' ) || exit;

$key   = rdpg_template()[2];
$c     = rdpg_home_content();
$copy  = rdpg_page_copy( $key );
$tab   = $c['pricing'][ $key ];
$label = $c['services'][ $key ][0];

// Feature the highlighted plan in the hero, or the first one.
$featured = $tab['plans'][0];
foreach ( $tab['plans'] as $plan ) {
	if ( ! empty( $plan['popular'] ) ) {
		$featured = $plan;
		break;
	}
}

rdpg_home_part( 'header' );
?>
<main id="main">
	<?php
	rdpg_home_part(
		'page-hero',
		array(
			'crumb' => $label,
			'title' => $copy['title'],
			'lead'  => $copy['lead'],
			'ticks' => $copy['ticks'],
			'ctas'  => array(
				array( '#plans', 'See plans', 'primary', 'arrow' ),
				array( 'https://t.me/' . $c['contact']['telegram'], 'Talk to us', 'ghost', 'telegram', true ),
							),
			'aside' => array(
				'feature-plan',
				array(
					'plan' => $featured,
					'note' => $tab['note'],
					'more' => '#plans',
				),
			),
			'facts' => $copy['facts'],
		)
	);
	?>

	<section class="section pricing" id="plans">
		<div class="container">
			<div class="section-head center">
				<span class="eyebrow">Plans</span>
				<h2><?php echo esc_html( $copy['plans_title'] ?? 'Choose your ' . $label . ' plan.' ); ?></h2>
				<p>Simple monthly pricing with no hidden fees.</p>
			</div>
			<?php
			rdpg_home_part( 'plans', array( 'key' => $key ) );
			rdpg_home_part( 'pricing-note' );
			?>
		</div>
	</section>

	<section class="section dark" id="features">
		<div class="container">
			<div class="section-head">
				<span class="eyebrow">What's included</span>
				<h2>Everything you need, on every plan.</h2>
			</div>
			<?php
			rdpg_home_part( 'features', array( 'items' => $copy['features'] ) );
			if ( ! empty( $copy['locations'] ) ) {
				rdpg_home_part(
					'locations',
					array(
						'codes' => $copy['locations'],
						'cta'   => array( '#plans', 'Compare plans' ),
					)
				);
			}
			?>
		</div>
	</section>

	<?php
	if ( ! empty( $copy['steps'] ) ) {
		rdpg_home_part( 'steps' );
	}
	rdpg_home_part( 'related', array( 'keys' => $copy['related'] ) );
	rdpg_home_part( 'faq', array( 'items' => $copy['faq'] ) );
	rdpg_home_part( 'cta' );
	?>
</main>
<?php
rdpg_home_part( 'footer' );

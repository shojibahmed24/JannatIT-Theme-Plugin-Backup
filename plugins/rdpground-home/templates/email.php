<?php
/**
 * Template: RDPGround: Business Email.
 */

defined( 'ABSPATH' ) || exit;

$c    = rdpg_home_content();
$copy = rdpg_page_copy( 'email' );

rdpg_home_part( 'header' );
?>
<main id="main">
	<?php
	rdpg_home_part(
		'page-hero',
		array(
			'crumb' => 'Business Email',
			'title' => $copy['title'],
			'lead'  => $copy['lead'],
			'ticks' => $copy['ticks'],
			'ctas'  => array(
				array( rdpg_order_url( $copy['plan']['order'] ), 'Get started', 'primary', 'arrow' ),
				array( 'https://t.me/' . $c['contact']['telegram'], 'Ask a question', 'ghost', 'telegram', true ),
							),
			'aside' => array(
				'feature-plan',
				array(
					'plan' => $copy['plan'],
					'note' => array( 'shield', 'Powered by Google Workspace' ),
				),
			),
		)
	);
	?>

	<section class="section dark" id="features">
		<div class="container">
			<div class="section-head">
				<span class="eyebrow">What's included</span>
				<h2>Everything your team needs to work together.</h2>
			</div>
			<?php rdpg_home_part( 'features', array( 'items' => $copy['features'] ) ); ?>
		</div>
	</section>

	<?php
	rdpg_home_part( 'related', array( 'keys' => $copy['related'] ) );
	rdpg_home_part( 'faq', array( 'items' => $copy['faq'] ) );
	rdpg_home_part( 'cta' );
	?>
</main>
<?php
rdpg_home_part( 'footer' );

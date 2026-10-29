<?php
/**
 * Dark hero for inner pages, with breadcrumb and an optional card on the right.
 *
 * @var array $args {
 *     @type string $crumb Breadcrumb label for this page.
 *     @type string $title Heading. May contain <em> for the accent colour.
 *     @type string $lead  Intro paragraph.
 *     @type array  $ticks Short check-marked points.
 *     @type array  $ctas  Buttons as [url, label, style ('primary'|'ghost'), icon, new tab].
 *     @type array  $below Part to render under the lead, as [name, args].
 *     @type array  $aside Part to render on the right, as [name, args].
 *     @type array  $facts Strip of [value, label] pairs under the hero.
 * }
 */

defined( 'ABSPATH' ) || exit;

$a = $args + array(
	'crumb' => '',
	'title' => '',
	'lead'  => '',
	'ticks' => array(),
	'ctas'  => array(),
	'below' => null,
	'aside' => null,
	'facts' => array(),
);
?>
<section class="hero page-hero<?php echo $a['aside'] ? '' : ' solo'; ?>">
	<div class="container hero-grid">
		<div>
			<nav class="crumbs" aria-label="Breadcrumb">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a><span aria-hidden="true">/</span><span aria-current="page"><?php echo esc_html( $a['crumb'] ); ?></span>
			</nav>
			<h1><?php echo wp_kses( $a['title'], array( 'em' => array() ) ); ?></h1>
			<?php if ( $a['lead'] ) : ?>
				<p class="hero-lead"><?php echo esc_html( $a['lead'] ); ?></p>
			<?php endif; ?>
			<?php
			if ( $a['below'] ) {
				rdpg_home_part( $a['below'][0], $a['below'][1] );
			}
			?>
			<?php if ( $a['ctas'] ) : ?>
				<div class="hero-ctas">
					<?php foreach ( $a['ctas'] as $cta ) : ?>
						<a class="btn btn-<?php echo esc_attr( $cta[2] ); ?>" href="<?php echo esc_url( $cta[0] ); ?>"<?php echo empty( $cta[4] ) ? '' : ' target="_blank" rel="noopener"'; ?>>
							<?php
							if ( 'arrow' === $cta[3] ) {
								echo esc_html( $cta[1] ) . rdpg_icon( 'arrow', 'i-arrow' );
							} else {
								echo ( $cta[3] ? rdpg_icon( $cta[3] ) : '' ) . esc_html( $cta[1] );
							}
							?>
						</a>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<?php if ( $a['ticks'] ) : ?>
				<ul class="ticks">
					<?php foreach ( $a['ticks'] as $tick ) : ?>
						<li><?php echo rdpg_icon( 'check' ) . esc_html( $tick ); ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
		</div>
		<?php
		if ( $a['aside'] ) {
			rdpg_home_part( $a['aside'][0], $a['aside'][1] );
		}
		?>
	</div>

	<?php if ( $a['facts'] ) : ?>
		<div class="facts">
			<div class="container">
				<dl>
					<?php foreach ( $a['facts'] as $fact ) : ?>
						<div><dt><?php echo esc_html( $fact[1] ); ?></dt><dd><?php echo esc_html( $fact[0] ); ?></dd></div>
					<?php endforeach; ?>
				</dl>
			</div>
		</div>
	<?php endif; ?>
</section>

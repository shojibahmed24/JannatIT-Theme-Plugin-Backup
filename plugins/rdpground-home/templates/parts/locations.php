<?php
/**
 * Data center locations (dark sections).
 *
 * @var array $args {
 *     @type string[] $codes Location codes to show; all when empty.
 *     @type array    $cta   Button as [url, label].
 * }
 */

defined( 'ABSPATH' ) || exit;

$locations = rdpg_home_content()['locations'];
if ( ! empty( $args['codes'] ) ) {
	$locations = array_filter(
		$locations,
		function ( $loc ) use ( $args ) {
			return in_array( $loc[0], $args['codes'], true );
		}
	);
}
?>
<div class="loc">
	<div class="section-head">
		<span class="eyebrow">Locations</span>
		<h2>Servers close to you and your customers.</h2>
		<p>Choose from data centers across the USA, Europe and Asia. Need a location that isn't listed? Just ask.</p>
		<?php if ( ! empty( $args['cta'] ) ) : ?>
			<a class="btn btn-ghost" href="<?php echo esc_url( $args['cta'][0] ); ?>"><?php echo esc_html( $args['cta'][1] ) . rdpg_icon( 'arrow', 'i-arrow' ); ?></a>
		<?php endif; ?>
	</div>
	<ul class="loc-grid">
		<?php foreach ( $locations as $loc ) : ?>
			<li class="loc-card"><span class="loc-code"><?php echo esc_html( $loc[0] ); ?></span><span><b><?php echo esc_html( $loc[1] ); ?></b><small><?php echo esc_html( $loc[2] ); ?></small></span><span class="pulse" aria-hidden="true"></span></li>
		<?php endforeach; ?>
		<li><a class="loc-card ask" href="#contact"><svg class="icon" style="margin:0" aria-hidden="true"><use href="#i-pin"/></svg><span><b>Somewhere else?</b><small>Ask about custom locations</small></span><?php echo rdpg_icon( 'arrow' ); ?></a></li>
	</ul>
</div>

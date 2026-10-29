<?php
/**
 * Feature grid (dark sections).
 *
 * @var array $args {
 *     @type array $items Rows of [icon, title, text].
 *     @type bool  $light For white sections.
 * }
 */

defined( 'ABSPATH' ) || exit;

$items   = $args['items'];
$classes = 'feat-grid';
if ( 0 === count( $items ) % 3 && 0 !== count( $items ) % 4 ) {
	$classes .= ' three';
}
if ( ! empty( $args['light'] ) ) {
	$classes .= ' light';
}
?>
<div class="<?php echo esc_attr( $classes ); ?>">
	<?php foreach ( $items as $feat ) : ?>
		<div class="feat"><?php echo rdpg_icon( $feat[0] ); ?><h3><?php echo esc_html( $feat[1] ); ?></h3><p><?php echo esc_html( $feat[2] ); ?></p></div>
	<?php endforeach; ?>
</div>

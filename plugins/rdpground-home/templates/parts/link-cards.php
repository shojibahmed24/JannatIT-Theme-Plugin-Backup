<?php
/**
 * Row of link cards (light backgrounds).
 *
 * @var array $args {
 *     @type array $items Rows of [url, icon, title, text].
 * }
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="link-cards">
	<?php foreach ( $args['items'] as $item ) : ?>
		<a class="link-card" href="<?php echo esc_url( $item[0] ); ?>">
			<span class="svc-ico"><?php echo rdpg_icon( $item[1] ); ?></span>
			<span><b><?php echo esc_html( $item[2] ); ?></b><small><?php echo esc_html( $item[3] ); ?></small></span>
			<?php echo rdpg_icon( 'arrow', 'go' ); ?>
		</a>
	<?php endforeach; ?>
</div>

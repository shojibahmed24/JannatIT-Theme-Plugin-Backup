<?php
/**
 * Highlighted plan card for the right side of a page hero.
 *
 * @var array $args {
 *     @type array  $plan Plan in the content.php format.
 *     @type array  $note [icon, text] shown under the button.
 *     @type string $more Optional link to the full plan list.
 * }
 */

defined( 'ABSPATH' ) || exit;

$plan = $args['plan'];
?>
<aside class="fplan" aria-label="<?php echo esc_attr( $plan['name'] ); ?>">
	<?php if ( ! empty( $plan['popular'] ) ) : ?>
		<span class="plan-badge"><?php echo esc_html( $plan['popular'] ); ?></span>
	<?php endif; ?>
	<h2><?php echo esc_html( $plan['name'] ); ?></h2>
	<p class="plan-sub"><?php echo esc_html( $plan['sub'] ); ?></p>
	<div class="price"><?php echo rdpg_price_html( $plan['price'] ); ?></div>
	<ul class="spec">
		<?php foreach ( array_slice( $plan['specs'], 0, 5, true ) as $label => $value ) : ?>
			<li><span><?php echo esc_html( $label ); ?></span><b><?php echo true === $value ? rdpg_icon( 'check' ) : esc_html( $value ); ?></b></li>
		<?php endforeach; ?>
	</ul>
	<a class="btn btn-primary btn-block" href="<?php echo esc_url( rdpg_order_url( $plan['order'] ) ); ?>">Order now</a>
	<p class="plan-foot"><?php echo rdpg_icon( $args['note'][0] ) . esc_html( $args['note'][1] ); ?></p>
	<?php if ( ! empty( $args['more'] ) ) : ?>
		<a class="fplan-more" href="<?php echo esc_url( $args['more'] ); ?>">Compare all plans<?php echo rdpg_icon( 'chev' ); ?></a>
	<?php endif; ?>
</aside>

<?php
/**
 * Plan cards for one pricing tab.
 *
 * @var array $args {
 *     @type string $key      Pricing key from content.php.
 *     @type bool   $tabpanel Render as a tab panel for the homepage tabs.
 *     @type bool   $hidden   Start hidden (tab panels other than the first).
 * }
 */

defined( 'ABSPATH' ) || exit;

$key      = $args['key'];
$tab      = rdpg_home_content()['pricing'][ $key ];
$tabpanel = ! empty( $args['tabpanel'] );
$classes  = 'plans' . ( count( $tab['plans'] ) <= 3 ? ' three' : '' );
?>
<div class="<?php echo esc_attr( $classes ); ?>"<?php if ( $tabpanel ) : ?> role="tabpanel" id="panel-<?php echo esc_attr( $key ); ?>" aria-labelledby="tab-<?php echo esc_attr( $key ); ?>"<?php endif; ?><?php echo empty( $args['hidden'] ) ? '' : ' hidden'; ?>>
	<?php foreach ( $tab['plans'] as $plan ) : ?>
		<article class="plan<?php echo empty( $plan['popular'] ) ? '' : ' pop'; ?>">
			<?php if ( ! empty( $plan['popular'] ) ) : ?>
				<span class="plan-badge"><?php echo esc_html( $plan['popular'] ); ?></span>
			<?php endif; ?>
			<h3><?php echo esc_html( $plan['name'] ); ?></h3><p class="plan-sub"><?php echo esc_html( $plan['sub'] ); ?></p>
			<div class="price"><?php echo rdpg_price_html( $plan['price'] ); ?></div>
			<a class="btn <?php echo empty( $plan['popular'] ) ? 'btn-line' : 'btn-primary'; ?> btn-block" href="<?php echo esc_url( rdpg_order_url( $plan['order'] ) ); ?>">Order now</a>
			<ul class="spec">
				<?php foreach ( $plan['specs'] as $label => $value ) : ?>
					<li><span><?php echo esc_html( $label ); ?></span><b><?php echo true === $value ? rdpg_icon( 'check' ) : esc_html( $value ); ?></b></li>
				<?php endforeach; ?>
			</ul>
			<p class="plan-foot"><?php echo rdpg_icon( $tab['note'][0] ); ?><?php echo esc_html( $tab['note'][1] ); ?></p>
		</article>
	<?php endforeach; ?>
</div>

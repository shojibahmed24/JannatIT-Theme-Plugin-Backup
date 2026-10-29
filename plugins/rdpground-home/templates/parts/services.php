<?php
/**
 * Service cards.
 *
 * @var array $args {
 *     @type string[] $keys     Service keys from content.php, in order.
 *     @type bool     $featured Show Admin RDP as the large featured card first.
 * }
 */

defined( 'ABSPATH' ) || exit;

$c = rdpg_home_content();
?>
<div class="svc-grid">
	<?php
	if ( ! empty( $args['featured'] ) ) :
		$admin = $c['services']['admin'];
		?>
		<a class="svc svc-feature" href="<?php echo esc_url( home_url( $admin[2] ) ); ?>">
			<div class="left">
				<span class="tag tag-hot">Best seller</span>
				<span class="svc-ico"><?php echo rdpg_icon( $admin[1] ); ?></span>
				<h3><?php echo esc_html( $admin[0] ); ?></h3>
				<p><?php echo esc_html( $admin[3] ); ?></p>
				<div class="chips">
					<span><?php echo rdpg_icon( 'check' ); ?>Full admin</span>
					<span><?php echo rdpg_icon( 'check' ); ?>Instant setup</span>
					<span><?php echo rdpg_icon( 'check' ); ?>Dedicated RAM</span>
					<span><?php echo rdpg_icon( 'check' ); ?>USA &amp; EU</span>
				</div>
				<div class="svc-foot"><span><?php echo wp_kses_post( rdpg_service_foot( 'admin' ) ); ?></span><span>See all plans<?php echo rdpg_icon( 'arrow' ); ?></span></div>
			</div>
			<ul class="mini-plans" aria-label="Admin RDP plans">
				<li class="mh" aria-hidden="true"><span>Plan</span><span>Price</span></li>
				<?php foreach ( $c['pricing']['admin']['plans'] as $plan ) : ?>
					<li<?php echo empty( $plan['popular'] ) ? '' : ' class="hl"'; ?>><span><?php echo esc_html( $plan['specs']['RAM'] ); ?> RAM</span><span><?php echo (int) $plan['specs']['vCPU']; ?> vCPU</span><b><?php echo esc_html( $c['currency'] . rdpg_money( $plan['price'] ) ); ?></b></li>
				<?php endforeach; ?>
			</ul>
		</a>
	<?php endif; ?>

	<?php
	foreach ( $args['keys'] as $key ) :
		$svc = $c['services'][ $key ];
		?>
		<a class="svc" href="<?php echo esc_url( home_url( $svc[2] ) ); ?>">
			<span class="svc-ico"><?php echo rdpg_icon( $svc[1] ); ?></span>
			<h3><?php echo esc_html( $svc[0] ); ?></h3>
			<p><?php echo esc_html( $svc[3] ); ?></p>
			<div class="svc-foot"><span><?php echo wp_kses_post( rdpg_service_foot( $key ) ); ?></span><?php echo rdpg_icon( 'arrow' ); ?></div>
		</a>
	<?php endforeach; ?>
</div>

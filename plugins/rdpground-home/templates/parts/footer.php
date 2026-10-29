<?php
/**
 * Site footer.
 */

defined( 'ABSPATH' ) || exit;

$c       = rdpg_home_content();
$contact = $c['contact'];

$columns = array(
	'Services' => array(
		array( home_url( '/admin-rdp/' ), 'Admin RDP' ),
		array( home_url( '/private-rdp/' ), 'Private RDP' ),
		array( home_url( '/vps-hosting/' ), 'Linux VPS' ),
		array( home_url( '/cpanel-hosting/' ), 'cPanel Hosting' ),
		array( home_url( '/reseller-hosting/' ), 'Reseller Hosting' ),
		array( home_url( '/dedicated-server/' ), 'Dedicated Servers' ),
		array( home_url( '/domain/' ), 'Domains' ),
		array( home_url( '/software/' ), 'Business Email' ),
	),
	'Support'  => array(
		array( rdpg_whmcs_url(), 'Client area' ),
		array( home_url( '/info/' ), 'Contact us' ),
		array( 'https://t.me/' . $contact['telegram'], 'Telegram', true ),
		array( 'mailto:' . $contact['email'], 'Email support' ),
		array( 'https://wa.me/' . $contact['whatsapp'], 'WhatsApp', true ),
				array( home_url( '/report-abuse/' ), 'Report abuse' ),
	),
	'Legal'    => array(
		array( home_url( '/terms-of-service/' ), 'Terms of Service' ),
		array( home_url( '/privacy-policy-3/' ), 'Privacy Policy' ),
		array( home_url( '/acceptable-use-policy/' ), 'Acceptable Use Policy' ),
		array( home_url( '/refund-policy/' ), 'Refund Policy' ),
		array( home_url( '/partners/' ), 'Partners' ),
	),
);

$social = array( 'telegram' => 'https://t.me/' . $contact['telegram'] ) + $c['social'];
?>
<footer class="site-footer">
	<div class="container">
		<div class="foot-grid">
			<div class="foot-brand">
				<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'JannatIT home', 'rdpground-home' ); ?>"><img src="https://jannatit.net/wp-content/uploads/2026/10/03-logo-horizontal-text-right-transparent.png" alt="JannatIT logo" style="max-height:40px;width:auto;"></a>
				<p>Low-cost, high-quality RDP, VPS and hosting with full admin access and friendly 24/7 support.</p>
				<div class="socials">
					<?php foreach ( $social as $network => $url ) : ?>
						<a href="<?php echo esc_url( $url ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( ucfirst( $network ) ); ?>"><?php echo rdpg_icon( $network ); ?></a>
					<?php endforeach; ?>
				</div>
			</div>
			<?php foreach ( $columns as $heading => $links ) : ?>
				<div>
					<h4><?php echo esc_html( $heading ); ?></h4>
					<ul>
						<?php foreach ( $links as $link ) : ?>
							<li><a href="<?php echo esc_url( $link[0] ); ?>"<?php echo empty( $link[2] ) ? '' : ' target="_blank" rel="noopener"'; ?>><?php echo esc_html( $link[1] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="foot-bottom">
			<span>© <?php echo esc_html( wp_date( 'Y' ) ); ?> Jannat IT. All rights reserved.</span>
			<span>Signal: <?php echo esc_html( $contact['signal'] ) ; ?></span>
					</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

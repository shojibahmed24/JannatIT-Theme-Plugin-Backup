<?php
/**
 * Document head, top bar and site header.
 */

defined( 'ABSPATH' ) || exit;

$c       = rdpg_home_content();
$contact = $c['contact'];

// Hosting submenu: [path, icon, label, description].
$hosting = array(
	array( '/cpanel-hosting/', 'panel', 'cPanel Hosting', 'SSD web hosting with free SSL' ),
	array( '/reseller-hosting/', 'users', 'Reseller Hosting', 'Sell cPanel accounts under your brand' ),
	array( '/dedicated-server/', 'server', 'Dedicated Servers', 'Bare-metal in the USA & India' ),
);
$primary = array(
	array( '/admin-rdp/', 'Admin RDP' ),
	array( '/private-rdp/', 'Private RDP' ),
	array( '/vps-hosting/', 'Linux VPS' ),
);
$after = array(
	array( '/domain/', 'Domains' ),
	array( '/software/', 'Business Email' ),
);

// "Get started" goes to the plans on this page, or the homepage pricing.
$template    = rdpg_template()[1] ?? '';
$get_started = array(
	'home'    => '#pricing',
	'product' => '#plans',
)[ $template ] ?? home_url( '/#pricing' );

/*
 * Print wp_head() without the theme's dynamic CSS (Hoskia's Redux options),
 * which is echoed directly and can't be dequeued.
 */
ob_start();
wp_head();
$head = ob_get_clean();
foreach ( apply_filters( 'rdpg_home_strip_style_ids', array( 'hoskia_opt-dynamic-css' ) ) as $style_id ) {
	$head = preg_replace( '#<style[^>]*\bid=(["\'])' . preg_quote( $style_id, '#' ) . '\1[^>]*>.*?</style>\s*#s', '', $head );
}
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="theme-color" content="#0A0D13">
<?php if ( ! current_theme_supports( 'title-tag' ) ) : ?>
<title><?php echo esc_html( wp_get_document_title() ); ?></title>
<?php endif; ?>
<?php echo $head; // phpcs:ignore WordPress.Security.EscapeOutput -- Core wp_head() output. ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<?php rdpg_home_part( 'sprite' ); ?>

<a class="skip" href="#main"><?php esc_html_e( 'Skip to content', 'rdpground-home' ); ?></a>

<div class="topbar">
	<div class="container">
		<p class="topbar-msg"><span class="pulse" aria-hidden="true"></span><b>Instant setup</b> — pay with PayPal, crypto or card and get your login by email.</p>
		<div class="topbar-links">
			<a href="<?php echo esc_url( 'https://t.me/' . $contact['telegram'] ); ?>" target="_blank" rel="noopener"><?php echo rdpg_icon( 'telegram' ); ?>@<?php echo esc_html( $contact['telegram'] ); ?></a>
			<a href="mailto:<?php echo esc_attr( $contact['email'] ); ?>"><?php echo rdpg_icon( 'mail' ); ?><?php echo esc_html( $contact['email'] ); ?></a>
			
			<a href="<?php echo esc_url( 'https://wa.me/' . $contact['whatsapp'] ); ?>" target="_blank" rel="noopener"><?php echo rdpg_icon( 'chat' ); ?><?php echo esc_html( $contact['whatsapp_display'] ); ?></a>
					</div>
	</div>
</div>

<header class="site-header" id="top">
	<div class="container">
		<nav class="nav" aria-label="<?php esc_attr_e( 'Main', 'rdpground-home' ); ?>">
			<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" aria-label="<?php esc_attr_e( 'JannatIT home', 'rdpground-home' ); ?>">
				<img src="https://jannatit.net/wp-content/uploads/2026/10/03-logo-horizontal-text-right-transparent.png" alt="JannatIT logo" style="max-height:52px;width:auto;">
			</a>
			<ul class="nav-links">
				<?php foreach ( $primary as $item ) : ?>
					<li><a href="<?php echo esc_url( home_url( $item[0] ) ); ?>"<?php echo rdpg_current_attr( $item[0] ); ?>><?php echo esc_html( $item[1] ); ?></a></li>
				<?php endforeach; ?>
				<li class="has-menu">
					<button type="button" aria-expanded="false" aria-controls="menu-hosting"<?php echo array_filter( array_column( $hosting, 0 ), 'rdpg_is_current' ) ? ' class="is-current"' : ''; ?>>Hosting<?php echo rdpg_icon( 'chev', 'i-chev' ); ?></button>
					<div class="menu" id="menu-hosting">
						<?php foreach ( $hosting as $item ) : ?>
							<a href="<?php echo esc_url( home_url( $item[0] ) ); ?>"<?php echo rdpg_current_attr( $item[0] ); ?>><?php echo rdpg_icon( $item[1] ); ?><span><b><?php echo esc_html( $item[2] ); ?></b><small><?php echo esc_html( $item[3] ); ?></small></span></a>
						<?php endforeach; ?>
					</div>
				</li>
				<?php foreach ( $after as $item ) : ?>
					<li><a href="<?php echo esc_url( home_url( $item[0] ) ); ?>"<?php echo rdpg_current_attr( $item[0] ); ?>><?php echo esc_html( $item[1] ); ?></a></li>
				<?php endforeach; ?>
			</ul>
			<div class="nav-actions">
				<a class="icon-btn" href="<?php echo esc_url( rdpg_whmcs_url( 'cart.php?a=view' ) ); ?>" aria-label="<?php esc_attr_e( 'Cart', 'rdpground-home' ); ?>"><?php echo rdpg_icon( 'cart' ); ?></a>
				<a class="signin" href="<?php echo esc_url( rdpg_whmcs_url() ); ?>"><?php esc_html_e( 'Client area', 'rdpground-home' ); ?></a>
				<a class="btn btn-primary btn-sm nav-cta" href="<?php echo esc_url( $get_started ); ?>"><?php esc_html_e( 'Get started', 'rdpground-home' ); ?></a>
				<button class="icon-btn nav-toggle" type="button" aria-expanded="false" aria-controls="mobile-nav" aria-label="<?php esc_attr_e( 'Open menu', 'rdpground-home' ); ?>">
					<?php echo rdpg_icon( 'menu', 'i-menu' ) . rdpg_icon( 'x', 'i-x' ); ?>
				</button>
			</div>
		</nav>
		<div class="mobile-nav" id="mobile-nav" hidden>
			<?php foreach ( $primary as $item ) : ?>
				<a href="<?php echo esc_url( home_url( $item[0] ) ); ?>"><?php echo esc_html( $item[1] ); ?></a>
			<?php endforeach; ?>
			<div class="sub">
				<?php foreach ( $hosting as $item ) : ?>
					<a href="<?php echo esc_url( home_url( $item[0] ) ); ?>"><?php echo esc_html( $item[2] ); ?></a>
				<?php endforeach; ?>
			</div>
			<?php foreach ( $after as $item ) : ?>
				<a href="<?php echo esc_url( home_url( $item[0] ) ); ?>"><?php echo esc_html( $item[1] ); ?></a>
			<?php endforeach; ?>
			<div class="btns">
				<a class="btn btn-ghost" href="<?php echo esc_url( rdpg_whmcs_url() ); ?>"><?php esc_html_e( 'Client area', 'rdpground-home' ); ?></a>
				<a class="btn btn-primary" href="<?php echo esc_url( $get_started ); ?>"><?php esc_html_e( 'Get started', 'rdpground-home' ); ?></a>
			</div>
		</div>
	</div>
</header>

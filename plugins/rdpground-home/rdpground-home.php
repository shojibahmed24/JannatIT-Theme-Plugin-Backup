<?php
/**
 * Plugin Name:       RDPGround Site
 * Description:       The redesigned RDPGround pages, available as "RDPGround: …" page templates. Pages without one of these templates, and the active theme, are left untouched.
 * Version:           1.1.0
 * Requires at least: 5.9
 * Requires PHP:      7.4
 * Author:            Jannat IT
 * License:           GPL-2.0-or-later
 * Text Domain:       rdpground-home
 */

defined( 'ABSPATH' ) || exit;

define( 'RDPG_HOME_VERSION', '1.1.0' );
define( 'RDPG_HOME_DIR', plugin_dir_path( __FILE__ ) );
define( 'RDPG_HOME_URL', plugin_dir_url( __FILE__ ) );

require RDPG_HOME_DIR . 'includes/helpers.php';

/**
 * Page templates this plugin provides: slug => label, template file and page key.
 *
 * @return array
 */
function rdpg_templates() {
	return array(
		'rdpground-home.php'              => array( 'RDPGround: Home', 'home', '' ),
		'rdpground-admin-rdp.php'         => array( 'RDPGround: Admin RDP', 'product', 'admin' ),
		'rdpground-private-rdp.php'       => array( 'RDPGround: Private RDP', 'product', 'private' ),
		'rdpground-linux-vps.php'         => array( 'RDPGround: Linux VPS', 'product', 'vps' ),
		'rdpground-cpanel-hosting.php'    => array( 'RDPGround: cPanel Hosting', 'product', 'cpanel' ),
		'rdpground-reseller-hosting.php'  => array( 'RDPGround: Reseller Hosting', 'product', 'reseller' ),
		'rdpground-dedicated-servers.php' => array( 'RDPGround: Dedicated Servers', 'product', 'dedicated' ),
		'rdpground-domains.php'           => array( 'RDPGround: Domains', 'domains', 'domains' ),
		'rdpground-business-email.php'    => array( 'RDPGround: Business Email', 'email', 'email' ),
		'rdpground-contact.php'           => array( 'RDPGround: Contact', 'contact', 'contact' ),
		'rdpground-page.php'              => array( 'RDPGround: Text page', 'page', '' ),
	);
}

/**
 * The plugin template used by the current page as [label, file, key], or null.
 *
 * @return array|null
 */
function rdpg_template() {
	if ( ! is_singular( 'page' ) ) {
		return null;
	}
	return rdpg_templates()[ get_page_template_slug( get_queried_object_id() ) ] ?? null;
}

/**
 * Whether the current page uses one of this plugin's templates.
 *
 * @return bool
 */
function rdpg_home_is_active() {
	return null !== rdpg_template();
}

// List the templates under Page Attributes → Template.
add_filter(
	'theme_page_templates',
	function ( $templates ) {
		foreach ( rdpg_templates() as $slug => $template ) {
			$templates[ $slug ] = $template[0];
		}
		return $templates;
	}
);

// Render our template instead of the theme's.
add_filter(
	'template_include',
	function ( $template ) {
		$ours = rdpg_template();
		return $ours ? RDPG_HOME_DIR . 'templates/' . $ours[1] . '.php' : $template;
	},
	99
);

add_filter(
	'body_class',
	function ( $classes ) {
		$ours = rdpg_template();
		if ( $ours ) {
			$classes[] = 'rdpg';
			$classes[] = 'rdpg-' . $ours[1];
		}
		return $classes;
	}
);

/**
 * Enqueue the homepage assets, and drop theme and page-builder assets that
 * would restyle it. Runs last so everything else is already queued.
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		if ( ! rdpg_home_is_active() ) {
			return;
		}

		$plugins = wp_make_link_relative( plugins_url() );
		$blocked = apply_filters(
			'rdpg_home_blocked_asset_paths',
			array(
				wp_make_link_relative( get_theme_root_uri() ) . '/',
				$plugins . '/hoskia-core/',
				$plugins . '/js_composer/',
				$plugins . '/megamenu/',
				$plugins . '/woocommerce/assets/css/',
			)
		);

		foreach ( array( wp_styles(), wp_scripts() ) as $deps ) {
			foreach ( $deps->queue as $handle ) {
				$src = isset( $deps->registered[ $handle ] ) ? (string) $deps->registered[ $handle ]->src : '';
				foreach ( $blocked as $path ) {
					if ( '' !== $src && false !== strpos( $src, $path ) ) {
						$deps->dequeue( $handle );
						break;
					}
				}
			}
		}

		wp_enqueue_style( 'rdpg-home-fonts', 'https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Geist+Mono:wght@400;500;600&display=swap', array(), null );
		wp_enqueue_style( 'rdpg-home', RDPG_HOME_URL . 'assets/css/home.css', array( 'rdpg-home-fonts' ), RDPG_HOME_VERSION );
		wp_enqueue_script( 'rdpg-home', RDPG_HOME_URL . 'assets/js/home.js', array(), RDPG_HOME_VERSION, true );
	},
	PHP_INT_MAX
);

add_filter(
	'wp_resource_hints',
	function ( $urls, $relation ) {
		if ( 'preconnect' === $relation && rdpg_home_is_active() ) {
			$urls[] = 'https://fonts.googleapis.com';
			$urls[] = array(
				'href'        => 'https://fonts.gstatic.com',
				'crossorigin' => 'anonymous',
			);
		}
		return $urls;
	},
	10,
	2
);

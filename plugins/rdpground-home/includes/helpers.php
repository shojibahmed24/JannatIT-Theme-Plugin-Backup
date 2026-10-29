<?php
/**
 * Template helpers.
 */

defined( 'ABSPATH' ) || exit;

/**
 * Shared content from includes/content.php, filterable via `rdpg_home_content`.
 *
 * @return array
 */
function rdpg_home_content() {
	static $content = null;
	if ( null === $content ) {
		$content = apply_filters( 'rdpg_home_content', require RDPG_HOME_DIR . 'includes/content.php' );
	}
	return $content;
}

/**
 * Copy for one page from includes/pages.php, filterable via `rdpg_home_pages`.
 *
 * @param string $key Page key, e.g. "admin" or "domains".
 * @return array
 */
function rdpg_page_copy( $key ) {
	static $pages = null;
	if ( null === $pages ) {
		$pages = apply_filters( 'rdpg_home_pages', require RDPG_HOME_DIR . 'includes/pages.php' );
	}
	return $pages[ $key ] ?? array();
}

/**
 * Load a template part from templates/parts/. The part can read `$args`.
 *
 * @param string $name Part name without extension.
 * @param array  $args Values for the part.
 */
function rdpg_home_part( $name, $args = array() ) {
	require RDPG_HOME_DIR . 'templates/parts/' . $name . '.php';
}

/**
 * Whether a site path such as "/admin-rdp/" is the page being viewed.
 *
 * @param string $path Path relative to the site root.
 * @return bool
 */
function rdpg_is_current( $path ) {
	return is_singular() && untrailingslashit( get_permalink() ) === untrailingslashit( home_url( $path ) );
}

/**
 * aria-current attribute for a nav link, or an empty string.
 *
 * @param string $path Path relative to the site root.
 * @return string
 */
function rdpg_current_attr( $path ) {
	return rdpg_is_current( $path ) ? ' aria-current="page"' : '';
}

/**
 * Footer text for a service card: its own 'foot', or "from $X/mo" from its pricing tab.
 *
 * @param string $key Service key from content 'services'.
 * @return string HTML.
 */
function rdpg_service_foot( $key ) {
	$content = rdpg_home_content();
	$service = $content['services'][ $key ];
	if ( isset( $service[4] ) ) {
		return $service[4];
	}
	return isset( $content['pricing'][ $key ] ) ? 'from <b>' . esc_html( rdpg_from_price( $key ) ) . '</b>/mo' : '';
}

/**
 * Inline SVG icon from the sprite in templates/parts/sprite.php.
 *
 * @param string $name  Icon id without the "i-" prefix.
 * @param string $class Extra classes.
 * @return string
 */
function rdpg_icon( $name, $class = '' ) {
	return sprintf(
		'<svg class="icon%s" aria-hidden="true"><use href="#i-%s"/></svg>',
		$class ? ' ' . esc_attr( $class ) : '',
		esc_attr( $name )
	);
}

/**
 * URL inside the WHMCS client area, e.g. rdpg_whmcs_url( 'cart.php?a=view' ).
 *
 * @param string $path Path relative to the WHMCS root.
 * @return string
 */
function rdpg_whmcs_url( $path = '' ) {
	return trailingslashit( rdpg_home_content()['whmcs_url'] ) . ltrim( $path, '/' );
}

/**
 * WHMCS order link for a store path such as "admin-rd/4-gb-rdp".
 *
 * @param string $store_path Product path from the WHMCS store URL.
 * @return string
 */
function rdpg_order_url( $store_path ) {
	return rdpg_whmcs_url( 'index.php?rp=/store/' . ltrim( $store_path, '/' ) );
}

/**
 * Format a price without trailing ".00": 30 → "30", 39.95 → "39.95".
 *
 * @param string|float $price Price.
 * @return string
 */
function rdpg_money( $price ) {
	$formatted = number_format( (float) $price, 2, '.', '' );
	return '.00' === substr( $formatted, -3 ) ? substr( $formatted, 0, -3 ) : $formatted;
}

/**
 * Price markup for a plan card: currency, whole amount, cents and period.
 *
 * @param string|float $price Price.
 * @return string
 */
function rdpg_price_html( $price ) {
	$parts = explode( '.', rdpg_money( $price ) );
	return sprintf(
		'<span class="cur">%s</span><span class="amt">%s</span>%s<span class="per">/mo</span>',
		esc_html( rdpg_home_content()['currency'] ),
		esc_html( $parts[0] ),
		isset( $parts[1] ) ? '<span class="dec">.' . esc_html( $parts[1] ) . '</span>' : ''
	);
}

/**
 * Lowest monthly price in a pricing tab, formatted with the currency symbol.
 *
 * @param string $tab Key in the content 'pricing' array.
 * @return string
 */
function rdpg_from_price( $tab ) {
	$content = rdpg_home_content();
	$prices  = array_map( 'floatval', wp_list_pluck( $content['pricing'][ $tab ]['plans'], 'price' ) );
	return $content['currency'] . rdpg_money( min( $prices ) );
}

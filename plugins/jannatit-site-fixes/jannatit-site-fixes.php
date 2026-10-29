<?php
/**
 * Plugin Name:       JannatIT Site Fixes
 * Description:       Two small, reversible fixes: (1) the home page browser tab title no longer starts with the literal page title "home" — it shows the approved home SEO title instead; (2) the footer Privacy Policy link points to the live /privacy-policy/ page instead of the 404 /privacy-policy-3/ page. No theme or RDPGround template file is edited. Deactivating restores both originals.
 * Version:           1.0.1
 * Author:            JannatIT
 * Text Domain:       jannatit-site-fixes
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'JSF_HOME_TITLE', 'JannatIT – Fast Windows RDP & VPS Hosting from $8/mo' );

/**
 * Home title fix: the home page is a static WordPress page literally
 * titled "home", and SiteSEO's title template (post title + site title)
 * renders that as "home - JannatIT …" in the browser tab. Overriding
 * the document title for the front page only removes "home" without
 * renaming the page (renaming alone would duplicate the site suffix
 * through the same template). Other pages are untouched.
 * pre_get_document_title short-circuits wp_get_document_title(), so
 * this wins over the template for the front page; document_title_parts
 * is also filtered as a fallback for themes/plugins that build the
 * title from its parts. Priority 999 is deliberate: SiteSEO hooks
 * pre_get_document_title at priority 15 and would otherwise overwrite
 * a default-priority (10) override — that is why v1.0.0 did not change
 * the live home title.
 */
add_filter( 'pre_get_document_title', 'jsf_home_document_title', 999 );
function jsf_home_document_title( $title ) {
    if ( is_front_page() && ! is_admin() ) {
        return JSF_HOME_TITLE;
    }
    return $title;
}

add_filter( 'document_title_parts', 'jsf_home_document_title_parts', 999 );
function jsf_home_document_title_parts( $parts ) {
    if ( is_front_page() && ! is_admin() ) {
        return array( 'title' => JSF_HOME_TITLE );
    }
    return $parts;
}

add_filter( 'wp_title', 'jsf_home_wp_title', 999, 2 );
function jsf_home_wp_title( $title, $sep ) {
    if ( is_front_page() && ! is_admin() ) {
        return JSF_HOME_TITLE;
    }
    return $title;
}

/**
 * Footer Privacy Policy link fix: the footer links to
 * /privacy-policy-3/, which returns the WordPress 404 page, while the
 * live page is /privacy-policy/. Only that exact href is replaced,
 * on the front end only, so no other footer link changes.
 */
function jsf_privacy_replacements() {
    return array(
        'href="https://jannatit.net/privacy-policy-3/"' => 'href="https://jannatit.net/privacy-policy/"',
        'href="/privacy-policy-3/"' => 'href="/privacy-policy/"',
    );
}

function jsf_buffer_callback( $buffer ) {
    return str_replace(
        array_keys( jsf_privacy_replacements() ),
        array_values( jsf_privacy_replacements() ),
        $buffer
    );
}

add_action( 'template_redirect', 'jsf_maybe_start_buffer' );
function jsf_maybe_start_buffer() {
    if ( is_admin() || wp_doing_ajax() || is_feed() ) {
        return;
    }
    ob_start( 'jsf_buffer_callback' );
}

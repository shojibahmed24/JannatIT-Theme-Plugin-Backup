<?php
/**
 * Plugin Name:       JannatIT Order Links
 * Description:       Change every RDPGround "Order now" button link, the Client area link and the Cart link from the WordPress admin, without editing the active theme or the RDPGround Site plugin. Leave a field empty and the original link keeps working.
 * Version:           1.0.0
 * Author:            JannatIT
 * Text Domain:       jannatit-order-links
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'JOL_OPTION', 'jannatit_order_links' );
define( 'JOL_VERSION', '1.0.0' );

/**
 * All plans that currently have an order link, grouped as they appear
 * on the site. The key is the original WHMCS store path used by
 * RDPGround Site. This list is only used to build the admin table
 * and to map a custom full URL back to its original button.
 */
function jol_default_plans() {
    return array(
        'Admin RDP' => array(
            array( 'name' => '2 GB RDP',  'order' => 'admin-rd/2-gb-rdp' ),
            array( 'name' => '4 GB RDP',  'order' => 'admin-rd/4-gb-rdp' ),
            array( 'name' => '6 GB RDP',  'order' => 'admin-rd/6-gb-rdp' ),
            array( 'name' => '8 GB RDP',  'order' => 'admin-rd/8-gb-rdp' ),
            array( 'name' => '16 GB RDP', 'order' => 'admin-rd/16-gb-rdp' ),
        ),
        'Private RDP' => array(
            array( 'name' => 'Private RDP 8',  'order' => 'admin-rd/private-rdp-8' ),
            array( 'name' => 'Private RDP 12', 'order' => 'admin-rd/private-rdp-12' ),
            array( 'name' => 'Private RDP 16', 'order' => 'admin-rd/private-rdp-16' ),
            array( 'name' => 'Private RDP 24', 'order' => 'admin-rd/private-rdp-24' ),
        ),
        'Linux VPS' => array(
            array( 'name' => 'Linux VPS 1 GB', 'order' => 'vps-hosting/linux-vps-1-gb' ),
            array( 'name' => 'Linux VPS 2 GB', 'order' => 'vps-hosting/linux-vps-2-gb' ),
            array( 'name' => 'Linux VPS 4 GB', 'order' => 'vps-hosting/linux-vps-4-gb' ),
            array( 'name' => 'Linux VPS 8 GB', 'order' => 'vps-hosting/linux-vps-8-gb' ),
        ),
        'cPanel Hosting' => array(
            array( 'name' => 'Personal',   'order' => 'cpane/personal' ),
            array( 'name' => 'Small Team', 'order' => 'cpane/small-team' ),
            array( 'name' => 'Company',    'order' => 'cpane/company' ),
            array( 'name' => 'Big Shot',   'order' => 'cpane/big-shot' ),
        ),
        'Reseller Hosting' => array(
            array( 'name' => 'Start',   'order' => 'reseller-hosting/start' ),
            array( 'name' => 'Medium',  'order' => 'reseller-hosting/medium' ),
            array( 'name' => 'Hoster',  'order' => 'reseller-hosting/hoster' ),
            array( 'name' => 'Company', 'order' => 'reseller-hosting/company-1' ),
        ),
        'Dedicated Servers' => array(
            array( 'name' => 'USA 2xL5420',       'order' => 'dedicated-server/usa-2xl5420' ),
            array( 'name' => 'USA 2xL5630',       'order' => 'dedicated-server/usa-2xl5630' ),
            array( 'name' => 'India E3-1230 v6',   'order' => 'dedicated-server/indian-e3-1230-v6' ),
        ),
        'Business Email' => array(
            array( 'name' => 'Business Starter (Google Workspace)', 'order' => 'g-suite/g-suite-business-starter' ),
        ),
    );
}

function jol_get_options() {
    $defaults = array(
        'base_url'        => '',
        'client_area_url' => '',
        'cart_url'        => '',
        'links'           => array(),
    );
    $saved = get_option( JOL_OPTION, array() );
    if ( ! is_array( $saved ) ) {
        return $defaults;
    }
    $options = array_merge( $defaults, $saved );
    if ( ! is_array( $options['links'] ) ) {
        $options['links'] = array();
    }
    return $options;
}

function jol_is_full_url( $value ) {
    return (bool) preg_match( '#^https?://#i', trim( (string) $value ) );
}

function jol_normalize_store_path( $value ) {
    $value = trim( (string) $value );
    // If someone pastes a WHMCS URL fragment, keep only the store path.
    $marker = 'index.php?rp=/store/';
    $pos = strpos( $value, $marker );
    if ( false !== $pos ) {
        $value = substr( $value, $pos + strlen( $marker ) );
    }
    return trim( $value, '/' );
}

function jol_effective_base( $options ) {
    if ( ! empty( $options['base_url'] ) ) {
        return trailingslashit( $options['base_url'] );
    }
    return trailingslashit( home_url( '/clientarea/' ) );
}

function jol_current_live_link( $order, $options ) {
    $custom = isset( $options['links'][ $order ] ) ? $options['links'][ $order ] : '';
    $base = jol_effective_base( $options );
    if ( '' !== $custom && jol_is_full_url( $custom ) ) {
        return $custom;
    }
    if ( '' !== $custom ) {
        return $base . 'index.php?rp=/store/' . jol_normalize_store_path( $custom );
    }
    return $base . 'index.php?rp=/store/' . $order;
}

function jol_sanitize_options( $input ) {
    $output = array(
        'base_url'        => '',
        'client_area_url' => '',
        'cart_url'        => '',
        'links'           => array(),
    );
    if ( ! is_array( $input ) ) {
        return $output;
    }
    if ( ! empty( $input['base_url'] ) ) {
        $output['base_url'] = esc_url_raw( trim( $input['base_url'] ) );
    }
    if ( ! empty( $input['client_area_url'] ) ) {
        $output['client_area_url'] = esc_url_raw( trim( $input['client_area_url'] ) );
    }
    if ( ! empty( $input['cart_url'] ) ) {
        $output['cart_url'] = esc_url_raw( trim( $input['cart_url'] ) );
    }
    if ( isset( $input['links'] ) && is_array( $input['links'] ) ) {
        foreach ( $input['links'] as $order => $custom ) {
            $custom = trim( (string) $custom );
            if ( '' === $custom ) {
                continue;
            }
            $order = sanitize_text_field( $order );
            if ( jol_is_full_url( $custom ) ) {
                $output['links'][ $order ] = esc_url_raw( $custom );
            } else {
                $output['links'][ $order ] = jol_normalize_store_path( $custom );
            }
        }
    }
    return $output;
}

add_action( 'admin_init', 'jol_register_settings' );
function jol_register_settings() {
    register_setting(
        'jannatit_order_links_group',
        JOL_OPTION,
        array( 'sanitize_callback' => 'jol_sanitize_options' )
    );
}

add_action( 'admin_menu', 'jol_admin_menu' );
function jol_admin_menu() {
    add_menu_page(
        'Order Links',
        'Order Links',
        'manage_options',
        'jannatit-order-links',
        'jol_admin_page',
        'dashicons-admin-links',
        80
    );
}

function jol_admin_page() {
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( esc_html__( 'You do not have permission to access this page.', 'jannatit-order-links' ) );
    }
    $options = jol_get_options();
    $groups = jol_default_plans();
    ?>
    <div class="wrap">
        <h1>Order Links</h1>
        <p>এখান থেকে প্রতিটা Order now বাটনের লিংক বদলানো যাবে — থিম বা RDPGround প্লাগইনের ফাইলে হাত দিতে হবে না। কোনো ঘর খালি রাখলে সেই বাটনের আগের লিংকই চলবে।</p>
        <p><strong>লিংক লেখার নিয়ম:</strong> পুরো লিংক হলে <code>https://</code> দিয়ে শুরু করবেন (যেমন WhatsApp, Telegram বা অন্য চেকআউট লিংক)। WHMCS-এর ভেতরের প্ল্যান হলে শুধু store path লিখবেন, যেমন <code>admin-rd/2-gb-rdp</code>।</p>
        <form method="post" action="options.php">
            <?php settings_fields( 'jannatit_order_links_group' ); ?>
            <h2>Global links</h2>
            <table class="form-table">
                <tr>
                    <th scope="row"><label for="jol-base-url">WHMCS / Client area base</label></th>
                    <td>
                        <input type="url" id="jol-base-url" name="<?php echo esc_attr( JOL_OPTION ); ?>[base_url]" value="<?php echo esc_attr( $options['base_url'] ); ?>" class="regular-text" placeholder="https://jannatit.net/clientarea/">
                        <p class="description">খালি রাখলে আগের base চলবে: <?php echo esc_html( home_url( '/clientarea/' ) ); ?>। এটা বদলালে Order now, Client area, Cart আর Domain ফর্ম — সবগুলোর base একসাথে বদলে যাবে।</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="jol-client-area-url">Client area link (আলাদা)</label></th>
                    <td>
                        <input type="url" id="jol-client-area-url" name="<?php echo esc_attr( JOL_OPTION ); ?>[client_area_url]" value="<?php echo esc_attr( $options['client_area_url'] ); ?>" class="regular-text" placeholder="খালি = base URL">
                        <p class="description">শুধু Header/Footer-এর Client area বাটনটা অন্য কোথাও পাঠাতে চাইলে এখানে পুরো লিংক দিন। খালি রাখলে base URL-ই ব্যবহার হবে।</p>
                    </td>
                </tr>
                <tr>
                    <th scope="row"><label for="jol-cart-url">Cart link (আলাদা)</label></th>
                    <td>
                        <input type="url" id="jol-cart-url" name="<?php echo esc_attr( JOL_OPTION ); ?>[cart_url]" value="<?php echo esc_attr( $options['cart_url'] ); ?>" class="regular-text" placeholder="খালি = base URL + cart.php?a=view">
                        <p class="description">শুধু Cart আইকনটা অন্য কোথাও পাঠাতে চাইলে এখানে পুরো লিংক দিন।</p>
                    </td>
                </tr>
            </table>
            <?php foreach ( $groups as $group_label => $plans ) : ?>
                <h2><?php echo esc_html( $group_label ); ?></h2>
                <table class="widefat striped">
                    <thead>
                        <tr>
                            <th>Plan</th>
                            <th>Current order path</th>
                            <th>Live link now</th>
                            <th>Custom link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ( $plans as $plan ) : ?>
                            <?php $custom = isset( $options['links'][ $plan['order'] ] ) ? $options['links'][ $plan['order'] ] : ''; ?>
                            <tr>
                                <td><?php echo esc_html( $plan['name'] ); ?></td>
                                <td><code><?php echo esc_html( $plan['order'] ); ?></code></td>
                                <td style="word-break: break-all; max-width: 320px;"><?php echo esc_html( jol_current_live_link( $plan['order'], $options ) ); ?></td>
                                <td>
                                    <input type="text" name="<?php echo esc_attr( JOL_OPTION ); ?>[links][<?php echo esc_attr( $plan['order'] ); ?>]" value="<?php echo esc_attr( $custom ); ?>" class="regular-text" style="width: 100%;" placeholder="খালি = আগের লিংক">
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endforeach; ?>
            <?php submit_button( 'Save Links' ); ?>
        </form>
        <p><strong>Save করার পর:</strong> ক্যাশ প্লাগইন (যেমন SpeedyCache) থাকলে একবার ক্যাশ পরিষ্কার করবেন, না হলে পুরনো লিংক কিছুক্ষণ দেখাতে পারে। এই প্লাগইন বন্ধ করলে সব বাটন আবার আগের লিংকে ফিরে যাবে — কোনো ফাইল বদলানো হয় না বলে কিছু হারাবে না।</p>
    </div>
    <?php
}

/**
 * Clean override path: RDPGround builds its content array through the
 * rdpg_home_content filter before caching it, so a WHMCS base change
 * or a WHMCS store-path change can be applied here without touching
 * RDPGround files. Full external URLs are NOT handled here — see the
 * output buffer below, because RDPGround always prefixes a store path
 * with the WHMCS base.
 */
add_filter( 'rdpg_home_content', 'jol_filter_home_content' );
function jol_filter_home_content( $content ) {
    if ( ! is_array( $content ) ) {
        return $content;
    }
    $options = jol_get_options();
    if ( ! empty( $options['base_url'] ) && isset( $content['whmcs_url'] ) ) {
        $content['whmcs_url'] = $options['base_url'];
    }
    if ( isset( $content['pricing'] ) && is_array( $content['pricing'] ) ) {
        foreach ( $content['pricing'] as $tab_key => $tab ) {
            if ( ! isset( $tab['plans'] ) || ! is_array( $tab['plans'] ) ) {
                continue;
            }
            foreach ( $tab['plans'] as $index => $plan ) {
                if ( ! isset( $plan['order'] ) ) {
                    continue;
                }
                $custom = isset( $options['links'][ $plan['order'] ] ) ? $options['links'][ $plan['order'] ] : '';
                if ( '' !== $custom && ! jol_is_full_url( $custom ) ) {
                    $content['pricing'][ $tab_key ]['plans'][ $index ]['order'] = jol_normalize_store_path( $custom );
                }
            }
        }
    }
    return $content;
}

// Business Email plan lives in the pages copy, not in pricing.
add_filter( 'rdpg_home_pages', 'jol_filter_home_pages' );
function jol_filter_home_pages( $pages ) {
    if ( ! is_array( $pages ) ) {
        return $pages;
    }
    if ( isset( $pages['email']['plan']['order'] ) ) {
        $options = jol_get_options();
        $order = $pages['email']['plan']['order'];
        $custom = isset( $options['links'][ $order ] ) ? $options['links'][ $order ] : '';
        if ( '' !== $custom && ! jol_is_full_url( $custom ) ) {
            $pages['email']['plan']['order'] = jol_normalize_store_path( $custom );
        }
    }
    return $pages;
}

/**
 * Full-URL override path: when a plan link is a complete external URL,
 * the button HTML already rendered by RDPGround is rewritten to that
 * URL. Only exact href matches are replaced, longest first, so an
 * order URL is never half-replaced by the Client area base.
 */
function jol_get_href_replacements( $options ) {
    $replacements = array();
    $base = jol_effective_base( $options );
    foreach ( jol_default_plans() as $plans ) {
        foreach ( $plans as $plan ) {
            $custom = isset( $options['links'][ $plan['order'] ] ) ? $options['links'][ $plan['order'] ] : '';
            if ( '' !== $custom && jol_is_full_url( $custom ) ) {
                $old = $base . 'index.php?rp=/store/' . $plan['order'];
                $replacements[ 'href="' . $old . '"' ] = 'href="' . esc_url( $custom ) . '"';
            }
        }
    }
    if ( ! empty( $options['client_area_url'] ) ) {
        $replacements[ 'href="' . trailingslashit( $base ) . '"' ] = 'href="' . esc_url( $options['client_area_url'] ) . '"';
    }
    if ( ! empty( $options['cart_url'] ) ) {
        $old_cart = $base . 'cart.php?a=view';
        $replacements[ 'href="' . $old_cart . '"' ] = 'href="' . esc_url( $options['cart_url'] ) . '"';
    }
    return $replacements;
}

function jol_buffer_callback( $buffer ) {
    $replacements = jol_get_href_replacements( jol_get_options() );
    if ( empty( $replacements ) ) {
        return $buffer;
    }
    uksort( $replacements, function ( $a, $b ) {
        return strlen( $b ) - strlen( $a );
    } );
    return str_replace( array_keys( $replacements ), array_values( $replacements ), $buffer );
}

add_action( 'template_redirect', 'jol_maybe_start_buffer' );
function jol_maybe_start_buffer() {
    if ( is_admin() || wp_doing_ajax() || is_feed() ) {
        return;
    }
    if ( empty( jol_get_href_replacements( jol_get_options() ) ) ) {
        return;
    }
    ob_start( 'jol_buffer_callback' );
}

<?php
/**
 * Plugin Name:       JannatIT Contact Links
 * Description:       Change every contact link on the site — Telegram, email, Facebook, LinkedIn, Instagram, Signal, WhatsApp and Teams — from the WordPress admin, without editing theme or RDPGround template files. Leave a field empty and the original link keeps working.
 * Version:           1.0.0
 * Author:            JannatIT
 * Text Domain:       jannatit-contact-links
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'JCL_OPTION', 'jannatit_contact_links' );
define( 'JCL_VERSION', '1.0.0' );

/**
 * Fields shown in admin. `key` is the option key, `label` the admin label,
 * `old` the value currently rendered on the site (verified 2026-10-29).
 * Empty admin value = keep `old`.
 */
function jcl_fields() {
    return array(
        'telegram'  => array( 'label' => 'Telegram username', 'old' => 'rdpground', 'hint' => 'শুধু ইউজারনেম দিন, যেমন jannatit — @ ছাড়া, অথবা পুরো https://t.me/... লিংক।' ),
        'email'     => array( 'label' => 'Email address', 'old' => 'support@rdpground.net', 'hint' => 'যেমন support@jannatit.net।' ),
        'signal'    => array( 'label' => 'Signal username', 'old' => 'rdpground.07', 'hint' => 'Signal-এ দেখানো ইউজারনেম।' ),
        'whatsapp'  => array( 'label' => 'WhatsApp number (digits only)', 'old' => '13073637311', 'hint' => 'শুধু সংখ্যা, যেমন 13073637311। + বা স্পেস দেবেন না।' ),
        'facebook'  => array( 'label' => 'Facebook URL', 'old' => 'https://www.facebook.com/rdpground07', 'hint' => 'পুরো লিংক, https:// দিয়ে।' ),
        'instagram' => array( 'label' => 'Instagram URL', 'old' => 'https://www.instagram.com/noderemote/', 'hint' => 'পুরো লিংক, https:// দিয়ে।' ),
        'linkedin'  => array( 'label' => 'LinkedIn URL', 'old' => 'https://www.linkedin.com/in/rdpground', 'hint' => 'পুরো লিংক, https:// দিয়ে।' ),
        'teams'     => array( 'label' => 'Microsoft Teams link', 'old' => '', 'hint' => 'Teams-এর লিংক থাকলে পুরো লিংক দিন। টেমপ্লেটে Teams-এর আলাদা URL না থাকলে এই ঘরটির প্রভাব নাও পড়তে পারে — ইনস্টলের পর যাচাই করে জানানো হবে।' ),
    );
}

function jcl_get_options() {
    $defaults = array();
    foreach ( jcl_fields() as $key => $field ) {
        $defaults[ $key ] = '';
    }
    $saved = get_option( JCL_OPTION, array() );
    if ( ! is_array( $saved ) ) {
        return $defaults;
    }
    return array_merge( $defaults, $saved );
}

function jcl_telegram_url( $value ) {
    $value = trim( (string) $value );
    if ( '' === $value ) {
        return '';
    }
    if ( preg_match( '#^https?://#i', $value ) ) {
        return $value;
    }
    return 'https://t.me/' . ltrim( $value, '@' );
}

function jcl_telegram_handle( $value ) {
    $value = trim( (string) $value );
    $value = preg_replace( '#^https?://t\.me/#i', '', $value );
    return ltrim( $value, '@' );
}

function jcl_sanitize_options( $input ) {
    $output = array();
    foreach ( jcl_fields() as $key => $field ) {
        $output[ $key ] = '';
    }
    if ( ! is_array( $input ) ) {
        return $output;
    }
    foreach ( jcl_fields() as $key => $field ) {
        if ( empty( $input[ $key ] ) ) {
            continue;
        }
        $value = trim( (string) $input[ $key ] );
        if ( 'email' === $key ) {
            $output[ $key ] = sanitize_email( $value );
        } elseif ( 'whatsapp' === $key ) {
            $output[ $key ] = preg_replace( '/[^0-9]/', '', $value );
        } elseif ( in_array( $key, array( 'facebook', 'instagram', 'linkedin', 'teams' ), true ) ) {
            $output[ $key ] = esc_url_raw( $value );
        } else {
            $output[ $key ] = sanitize_text_field( $value );
        }
    }
    return $output;
}

add_action( 'admin_init', 'jcl_register_settings' );
function jcl_register_settings() {
    register_setting( 'jannatit_contact_links_group', JCL_OPTION, array( 'sanitize_callback' => 'jcl_sanitize_options' ) );
}

add_action( 'admin_menu', 'jcl_admin_menu' );
function jcl_admin_menu() {
    add_menu_page( 'Contact Links', 'Contact Links', 'manage_options', 'jannatit-contact-links', 'jcl_admin_page', 'dashicons-admin-users', 81 );
}

function jcl_admin_page() {
    if ( ! current_user_can( 'manage_options' ) ) {
        wp_die( esc_html__( 'You do not have permission to access this page.', 'jannatit-contact-links' ) );
    }
    $options = jcl_get_options();
    $fields = jcl_fields();
    ?>
    <div class="wrap">
        <h1>Contact Links</h1>
        <p>এখান থেকে সাইটের সব কন্ট্যাক্ট লিংক বদলানো যাবে — থিম বা RDPGround টেমপ্লেটের ফাইলে হাত দিতে হবে না। কোনো ঘর খালি রাখলে সেই লিংক আগের মতোই চলবে।</p>
        <form method="post" action="options.php">
            <?php settings_fields( 'jannatit_contact_links_group' ); ?>
            <table class="form-table">
                <?php foreach ( $fields as $key => $field ) : ?>
                    <tr>
                        <th scope="row"><label for="jcl-<?php echo esc_attr( $key ); ?>"><?php echo esc_html( $field['label'] ); ?></label></th>
                        <td>
                            <input type="text" id="jcl-<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( JCL_OPTION ); ?>[<?php echo esc_attr( $key ); ?>]" value="<?php echo esc_attr( $options[ $key ] ); ?>" class="regular-text" placeholder="<?php echo esc_attr( $field['old'] ); ?>">
                            <p class="description"><?php echo esc_html( $field['hint'] ); ?><?php if ( '' !== $field['old'] ) : ?> বর্তমানে দেখাচ্ছে: <code><?php echo esc_html( $field['old'] ); ?></code><?php endif; ?></p>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php submit_button( 'Save Contact Links' ); ?>
        </form>
        <p><strong>Save করার পর:</strong> ক্যাশ প্লাগইন (যেমন SpeedyCache) থাকলে একবার ক্যাশ পরিষ্কার করবেন, না হলে পুরনো লিংক কিছুক্ষণ দেখাতে পারে। এই প্লাগইন বন্ধ করলে সব কন্ট্যাক্ট লিংক আবার আগের লিংকে ফিরে যাবে — কোনো ফাইল বদলানো হয় না বলে কিছু হারাবে না।</p>
    </div>
    <?php
}

/**
 * Central override: RDPGround reads its contact/social values through
 * rdpg_home_content() from includes/content.php, so overriding those
 * values here covers templates that read $contact / $c['social'].
 * Templates that hardcode a link are covered by the output buffer below.
 */
add_filter( 'rdpg_home_content', 'jcl_filter_home_content' );
function jcl_filter_home_content( $content ) {
    if ( ! is_array( $content ) ) {
        return $content;
    }
    $options = jcl_get_options();
    if ( isset( $content['contact'] ) && is_array( $content['contact'] ) ) {
        foreach ( array( 'telegram', 'email', 'signal', 'whatsapp' ) as $key ) {
            if ( '' !== $options[ $key ] ) {
                $content['contact'][ $key ] = $options[ $key ];
            }
        }
    }
    if ( isset( $content['social'] ) && is_array( $content['social'] ) ) {
        foreach ( array( 'facebook', 'instagram', 'linkedin' ) as $key ) {
            if ( '' !== $options[ $key ] ) {
                $content['social'][ $key ] = $options[ $key ];
            }
        }
    }
    return $content;
}

/**
 * Output-buffer override for hardcoded template links/text. Only exact
 * old values are replaced, longest first, on the front end only.
 */
function jcl_get_replacements( $options ) {
    $replacements = array();
    if ( '' !== $options['telegram'] ) {
        $handle = jcl_telegram_handle( $options['telegram'] );
        $url = jcl_telegram_url( $options['telegram'] );
        $replacements['https://t.me/rdpground'] = $url;
        $replacements['@rdpground'] = '@' . $handle;
    }
    if ( '' !== $options['email'] ) {
        $replacements['mailto:support@rdpground.net'] = 'mailto:' . $options['email'];
        $replacements['support@rdpground.net'] = $options['email'];
    }
    if ( '' !== $options['signal'] ) {
        $replacements['rdpground.07'] = $options['signal'];
    }
    if ( '' !== $options['facebook'] ) {
        $replacements['https://www.facebook.com/rdpground07'] = $options['facebook'];
    }
    if ( '' !== $options['instagram'] ) {
        $replacements['https://www.instagram.com/noderemote/'] = $options['instagram'];
        $replacements['https://www.instagram.com/noderemote'] = rtrim( $options['instagram'], '/' );
    }
    if ( '' !== $options['linkedin'] ) {
        $replacements['https://www.linkedin.com/in/rdpground'] = $options['linkedin'];
    }
    if ( '' !== $options['whatsapp'] ) {
        $replacements['13073637311'] = $options['whatsapp'];
    }
    return $replacements;
}

function jcl_buffer_callback( $buffer ) {
    $replacements = jcl_get_replacements( jcl_get_options() );
    if ( empty( $replacements ) ) {
        return $buffer;
    }
    uksort( $replacements, function ( $a, $b ) {
        return strlen( $b ) - strlen( $a );
    } );
    return str_replace( array_keys( $replacements ), array_values( $replacements ), $buffer );
}

add_action( 'template_redirect', 'jcl_maybe_start_buffer' );
function jcl_maybe_start_buffer() {
    if ( is_admin() || wp_doing_ajax() || is_feed() ) {
        return;
    }
    if ( empty( jcl_get_replacements( jcl_get_options() ) ) ) {
        return;
    }
    ob_start( 'jcl_buffer_callback' );
}

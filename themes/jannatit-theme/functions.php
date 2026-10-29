<?php
/**
 * Jannatit theme functions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function jannatit_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
	add_theme_support( 'custom-logo' );

	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'jannatit' ),
		'footer'  => __( 'Footer Menu', 'jannatit' ),
	) );
}
add_action( 'after_setup_theme', 'jannatit_setup' );

function jannatit_scripts() {
	wp_enqueue_style( 'jannatit-style', get_stylesheet_uri(), array(), '1.0' );

	wp_enqueue_style(
		'jannatit-fonts',
		'https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700;800&family=Inter:wght@400;500;600&display=swap',
		array(),
		null
	);

	if ( is_front_page() ) {
		wp_enqueue_script( 'jannatit-front', get_template_directory_uri() . '/assets/front.js', array(), '1.0', true );
	}
}
add_action( 'wp_enqueue_scripts', 'jannatit_scripts' );

function jannatit_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Footer Column', 'jannatit' ),
		'id'            => 'footer-1',
		'description'   => __( 'Replaces the "Resources" column in the footer if widgets are added here.', 'jannatit' ),
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'jannatit_widgets_init' );

/**
 * Fallback menu output if no menu has been assigned yet in
 * Appearance > Menus, so the theme still looks right on first activation.
 */
function jannatit_fallback_menu() {
	echo '<ul class="nav-links">';
	echo '<li><a href="' . esc_url( home_url( '/#plans' ) ) . '">' . esc_html__( 'Windows RDP', 'jannatit' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/#vps' ) ) . '">' . esc_html__( 'VPS Hosting', 'jannatit' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/#regions' ) ) . '">' . esc_html__( 'Locations', 'jannatit' ) . '</a></li>';
	echo '<li><a href="' . esc_url( home_url( '/#faq' ) ) . '">' . esc_html__( 'FAQ', 'jannatit' ) . '</a></li>';
	echo '</ul>';
}

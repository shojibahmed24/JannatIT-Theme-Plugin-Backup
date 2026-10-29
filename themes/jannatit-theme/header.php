<?php
/**
 * Header template
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="promo">🔥 <?php esc_html_e( 'Limited-time offer —', 'jannatit' ); ?> <b><?php esc_html_e( 'save up to 55% on annual VPS plans', 'jannatit' ); ?></b></div>

<header class="site-header">
  <div class="nav">
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo">
      <span class="flame-icon">🔥</span><?php bloginfo( 'name' ); ?>
    </a>

    <?php
    if ( has_nav_menu( 'primary' ) ) {
    	wp_nav_menu( array(
    		'theme_location' => 'primary',
    		'container'      => false,
    		'menu_class'     => 'nav-links',
    		'depth'          => 1,
    	) );
    } else {
    	jannatit_fallback_menu();
    }
    ?>

    <div class="nav-cta">
      <a href="<?php echo esc_url( wp_login_url() ); ?>" class="btn btn-ghost"><?php esc_html_e( 'Client Login', 'jannatit' ); ?></a>
      <a href="<?php echo esc_url( home_url( '/#plans' ) ); ?>" class="btn btn-flame"><?php esc_html_e( 'Order Now', 'jannatit' ); ?></a>
    </div>
  </div>
</header>

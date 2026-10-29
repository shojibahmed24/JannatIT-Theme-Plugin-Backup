<?php
if (!defined('ABSPATH')) exit;
function jannatit_setup(){
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('custom-logo', array('height'=>80,'width'=>260,'flex-height'=>true,'flex-width'=>true));
  add_theme_support('html5', array('search-form','comment-form','comment-list','gallery','caption','style','script'));
  register_nav_menus(array('primary'=>'Primary Menu','footer'=>'Footer Menu'));
}
add_action('after_setup_theme','jannatit_setup');
function jannatit_assets(){
  wp_enqueue_style('jannatit-style', get_stylesheet_uri(), array(), '1.0.0');
  wp_enqueue_script('jannatit-js', get_template_directory_uri().'/assets/js/theme.js', array(), '1.0.0', true);
}
add_action('wp_enqueue_scripts','jannatit_assets');
function jannatit_widgets(){
  register_sidebar(array('name'=>'Footer 1','id'=>'footer-1','before_widget'=>'<div>','after_widget'=>'</div>','before_title'=>'<h4>','after_title'=>'</h4>'));
}
add_action('widgets_init','jannatit_widgets');
function jannatit_fallback_menu(){
  echo '<nav class="menu"><a href="'.esc_url(home_url('/#services')).'">Services</a><a href="'.esc_url(home_url('/#vps')).'">VPS</a><a href="'.esc_url(home_url('/#features')).'">Features</a><a href="'.esc_url(home_url('/#contact')).'">Contact</a><a class="btn btn-primary" href="'.esc_url(home_url('/#vps')).'">Get Started</a></nav>';
}

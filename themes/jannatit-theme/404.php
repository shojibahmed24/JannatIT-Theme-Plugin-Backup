<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>
<main class="site-main">
  <div class="wrap" style="text-align:center;padding:80px 0;">
    <h1 class="entry-title"><?php esc_html_e( 'Page not found', 'jannatit' ); ?></h1>
    <p><?php esc_html_e( "The page you're looking for doesn't exist or has moved.", 'jannatit' ); ?></p>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-dark"><?php esc_html_e( 'Back to homepage', 'jannatit' ); ?></a>
  </div>
</main>
<?php
get_footer();

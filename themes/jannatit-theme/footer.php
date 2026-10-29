<?php
/**
 * Footer template
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="ctaband">
  <div class="wrap">
    <h2><?php echo esc_html( sprintf( __( 'Ready to get started with %s?', 'jannatit' ), get_bloginfo( 'name' ) ) ); ?></h2>
    <a href="<?php echo esc_url( home_url( '/#plans' ) ); ?>" class="btn btn-flame"><?php esc_html_e( 'Create Account', 'jannatit' ); ?></a>
  </div>
</div>

<footer class="site-footer">
  <div class="wrap foot-grid">
    <div>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="logo" style="margin-bottom:14px;">
        <span class="flame-icon">🔥</span><?php bloginfo( 'name' ); ?>
      </a>
      <p style="color:var(--text-soft);font-size:13.5px;max-width:32ch;">
        <?php bloginfo( 'description' ); ?>
      </p>
    </div>

    <div>
      <h5><?php esc_html_e( 'Products', 'jannatit' ); ?></h5>
      <ul>
        <li><a href="<?php echo esc_url( home_url( '/#plans' ) ); ?>"><?php esc_html_e( 'Windows RDP', 'jannatit' ); ?></a></li>
        <li><a href="<?php echo esc_url( home_url( '/#vps' ) ); ?>"><?php esc_html_e( 'Linux VPS', 'jannatit' ); ?></a></li>
        <li><a href="#"><?php esc_html_e( 'Business Email', 'jannatit' ); ?></a></li>
        <li><a href="#"><?php esc_html_e( 'Web Design', 'jannatit' ); ?></a></li>
      </ul>
    </div>

    <?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
      <div><?php dynamic_sidebar( 'footer-1' ); ?></div>
    <?php else : ?>
      <div>
        <h5><?php esc_html_e( 'Resources', 'jannatit' ); ?></h5>
        <ul>
          <li><a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><?php esc_html_e( 'Blog', 'jannatit' ); ?></a></li>
          <li><a href="#"><?php esc_html_e( 'Knowledge Base', 'jannatit' ); ?></a></li>
          <li><a href="#"><?php esc_html_e( 'Submit a Ticket', 'jannatit' ); ?></a></li>
          <li><a href="#"><?php esc_html_e( 'Affiliates', 'jannatit' ); ?></a></li>
        </ul>
      </div>
    <?php endif; ?>

    <div>
      <h5><?php esc_html_e( 'Support', 'jannatit' ); ?></h5>
      <ul>
        <li><a href="<?php echo esc_url( home_url( '/#faq' ) ); ?>"><?php esc_html_e( 'FAQ', 'jannatit' ); ?></a></li>
        <li><a href="#"><?php esc_html_e( 'Contact Us', 'jannatit' ); ?></a></li>
        <li><a href="#"><?php esc_html_e( 'Report Abuse', 'jannatit' ); ?></a></li>
        <li><a href="#"><?php esc_html_e( 'Status Page', 'jannatit' ); ?></a></li>
      </ul>
    </div>
  </div>

  <div class="wrap foot-bottom">
    <span>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All rights reserved.', 'jannatit' ); ?></span>
    <?php
    if ( has_nav_menu( 'footer' ) ) {
    	wp_nav_menu( array(
    		'theme_location' => 'footer',
    		'container'      => false,
    		'menu_class'     => 'foot-legal',
    		'depth'          => 1,
    	) );
    } else {
    	echo '<span>' . esc_html__( 'Privacy Policy · Terms of Service', 'jannatit' ) . '</span>';
    }
    ?>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>

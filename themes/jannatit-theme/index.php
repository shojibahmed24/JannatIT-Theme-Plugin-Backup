<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>
<main class="site-main">
  <div class="wrap">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <article <?php post_class(); ?>>
          <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
          <div class="entry-meta"><?php echo esc_html( get_the_date() ); ?></div>
          <div class="entry-content"><?php the_excerpt(); ?></div>
        </article>
      <?php endwhile; ?>

      <div class="pagination">
        <div><?php next_posts_link( __( '&larr; Older', 'jannatit' ) ); ?></div>
        <div><?php previous_posts_link( __( 'Newer &rarr;', 'jannatit' ) ); ?></div>
      </div>
    <?php else : ?>
      <p><?php esc_html_e( 'Nothing found.', 'jannatit' ); ?></p>
    <?php endif; ?>
  </div>
</main>
<?php
get_footer();

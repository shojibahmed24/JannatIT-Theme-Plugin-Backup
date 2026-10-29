<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>
<main class="site-main">
  <div class="wrap">
    <?php while ( have_posts() ) : the_post(); ?>
      <article <?php post_class(); ?>>
        <h1 class="entry-title"><?php the_title(); ?></h1>
        <div class="entry-meta"><?php echo esc_html( get_the_date() ); ?> &middot; <?php the_author(); ?></div>
        <div class="entry-content"><?php the_content(); ?></div>
      </article>

      <?php if ( comments_open() || get_comments_number() ) : ?>
        <?php comments_template(); ?>
      <?php endif; ?>
    <?php endwhile; ?>
  </div>
</main>
<?php
get_footer();

<?php
/**
 * Template Name: JannatIT Builder Page
 * Template Post Type: page
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<main id="primary" class="site-content">
	<?php
	while ( have_posts() ) :
		the_post();

		the_content();

	endwhile;
	?>
</main>

<?php
get_footer();
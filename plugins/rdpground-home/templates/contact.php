<?php
/**
 * Template: RDPGround: Contact. Any page content shows under the help links.
 */

defined( 'ABSPATH' ) || exit;

$copy = rdpg_page_copy( 'contact' );

$links = array(
	array( rdpg_whmcs_url( 'submitticket.php' ), 'ticket', 'Open a support ticket', 'Existing customers can get help with a service from the client area.' ),
	array( home_url( '/report-abuse/' ), 'alert', 'Report abuse', 'Tell us about a server that breaks the law or our policies.' ),
	array( home_url( '/terms-of-service/' ), 'file', 'Policies', 'Read our terms, privacy, acceptable use and refund policies.' ),
);

rdpg_home_part( 'header' );
?>
<main id="main">
	<?php
	rdpg_home_part(
		'page-hero',
		array(
			'crumb' => get_the_title(),
			'title' => $copy['title'],
			'lead'  => $copy['lead'],
			'aside' => array( 'contact-cards', array( 'all' => true ) ),
		)
	);
	?>

	<section class="section">
		<div class="container">
			<?php rdpg_home_part( 'link-cards', array( 'items' => $links ) ); ?>

			<?php
			while ( have_posts() ) :
				the_post();
				if ( '' !== trim( get_the_content() ) ) :
					?>
					<div class="prose contact-content">
						<?php the_content(); ?>
					</div>
					<?php
				endif;
			endwhile;
			?>
		</div>
	</section>
</main>
<?php
rdpg_home_part( 'footer' );

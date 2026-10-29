<?php
/**
 * Template: RDPGround: Text page. For policies and other text-only pages:
 * shows the page content with a side menu of company and legal pages.
 */

defined( 'ABSPATH' ) || exit;

$side = array(
	array( '/info/', 'Contact us' ),
	array( '/terms-of-service/', 'Terms of Service' ),
	array( '/privacy-policy-3/', 'Privacy Policy' ),
	array( '/acceptable-use-policy/', 'Acceptable Use Policy' ),
	array( '/refund-policy/', 'Refund Policy' ),
	array( '/report-abuse/', 'Report abuse' ),
	array( '/partners/', 'Partners' ),
);
$contact = rdpg_home_content()['contact'];

rdpg_home_part( 'header' );

while ( have_posts() ) :
	the_post();
	?>
	<main id="main">
		<?php
		rdpg_home_part(
			'page-hero',
			array(
				'crumb' => get_the_title(),
				'title' => get_the_title(),
				'lead'  => sprintf( 'Last updated %s', get_the_modified_date() ),
			)
		);
		?>

		<section class="section">
			<div class="container page-body">
				<article class="prose">
					<?php the_content(); ?>
				</article>
				<aside class="side-nav" aria-label="Company and legal">
					<h2>Company &amp; legal</h2>
					<ul>
						<?php foreach ( $side as $item ) : ?>
							<li><a href="<?php echo esc_url( home_url( $item[0] ) ); ?>"<?php echo rdpg_current_attr( $item[0] ); ?>><?php echo esc_html( $item[1] ); ?></a></li>
						<?php endforeach; ?>
					</ul>
					<div class="help-box">
						<b>Questions?</b>
						<a href="mailto:<?php echo esc_attr( $contact['email'] ); ?>"><?php echo esc_html( $contact['email'] ); ?></a>a>
						<p>Our team is online 24/7.</p>
											</div>
				</aside>
			</div>
		</section>
	</main>
	<?php
endwhile;

rdpg_home_part( 'footer' );

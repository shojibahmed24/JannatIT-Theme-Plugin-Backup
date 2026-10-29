<?php
/**
 * Template: RDPGround: Domains.
 */

defined( 'ABSPATH' ) || exit;

$copy = rdpg_page_copy( 'domains' );

$links = array(
	array( rdpg_whmcs_url( 'cart.php?a=add&domain=transfer' ), 'swap', 'Transfer a domain', 'Move a domain you own elsewhere. Have your EPP code ready.' ),
	array( rdpg_whmcs_url( 'clientarea.php?action=domains' ), 'globe', 'Manage your domains', 'Update DNS, contacts and renewals in the client area.' ),
	array( home_url( '/software/' ), 'mail', 'Add business email', 'Get addresses like you@yourcompany.com with Google Workspace.' ),
);

rdpg_home_part( 'header' );
?>
<main id="main">
	<?php
	rdpg_home_part(
		'page-hero',
		array(
			'crumb' => 'Domains',
			'title' => $copy['title'],
			'lead'  => $copy['lead'],
			'below' => array( 'domain-search', array() ),
			'aside' => array( 'domain-mock', array() ),
		)
	);
	?>

	<section class="section" id="features">
		<div class="container">
			<div class="section-head">
				<span class="eyebrow">Included</span>
				<h2>Everything you need to manage your domains.</h2>
			</div>
			<?php
			rdpg_home_part(
				'features',
				array(
					'items' => $copy['features'],
					'light' => true,
				)
			);
			rdpg_home_part( 'link-cards', array( 'items' => $links ) );
			?>
		</div>
	</section>

	<?php
	rdpg_home_part( 'related', array( 'keys' => $copy['related'] ) );
	rdpg_home_part( 'faq', array( 'items' => $copy['faq'] ) );
	rdpg_home_part( 'cta' );
	?>
</main>
<?php
rdpg_home_part( 'footer' );

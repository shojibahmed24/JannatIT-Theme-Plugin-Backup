<?php
/**
 * Domain search form, submitted to the WHMCS domain checker (dark backgrounds).
 */

defined( 'ABSPATH' ) || exit;
?>
<form class="domain-form" action="<?php echo esc_url( rdpg_whmcs_url( 'cart.php' ) ); ?>" method="get" role="search">
	<input type="hidden" name="a" value="add">
	<input type="hidden" name="domain" value="register">
	<label class="sr-only" for="domain-q">Domain name</label>
	<div class="search">
		<?php echo rdpg_icon( 'search' ); ?>
		<input id="domain-q" name="query" type="text" placeholder="yourbusiness.com" autocomplete="off" spellcheck="false">
		<button class="btn btn-primary" type="submit">Search</button>
	</div>
	<div class="tlds" aria-label="Popular extensions">
		<?php foreach ( array( '.com', '.net', '.org', '.live', '.tv', '.io' ) as $tld ) : ?>
			<button type="button"><?php echo esc_html( $tld ); ?></button>
		<?php endforeach; ?>
	</div>
</form>

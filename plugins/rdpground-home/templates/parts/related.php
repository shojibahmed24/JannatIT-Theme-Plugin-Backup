<?php
/**
 * "More from RDPGround" service cards.
 *
 * @var array $args {
 *     @type string[] $keys Service keys from content.php.
 * }
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="section services related">
	<div class="container">
		<div class="section-head">
			<span class="eyebrow">More from JannatIT</span>
			<h2>You might also need.</h2>
		</div>
		<?php rdpg_home_part( 'services', array( 'keys' => $args['keys'] ) ); ?>
	</div>
</section>

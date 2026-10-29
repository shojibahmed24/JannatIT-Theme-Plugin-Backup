<?php
/**
 * Illustrative domain search results for the Domains hero.
 */

defined( 'ABSPATH' ) || exit;

// [extension, available].
$results = array( array( '.com', true ), array( '.net', true ), array( '.io', true ), array( '.org', false ) );
?>
<div class="dmock" aria-hidden="true">
	<div class="dmock-bar"><?php echo rdpg_icon( 'search' ); ?>yourbrand</div>
	<ul>
		<?php foreach ( $results as $result ) : ?>
			<li<?php echo $result[1] ? '' : ' class="taken"'; ?>>
				<b>yourbrand<span><?php echo esc_html( $result[0] ); ?></span></b>
				<?php if ( $result[1] ) : ?>
					<span class="ok"><?php echo rdpg_icon( 'check' ); ?>Available</span><span class="add">Add</span>
				<?php else : ?>
					<span class="no">Taken</span>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
	</ul>
</div>

<?php
/**
 * Contact channel cards (dark backgrounds).
 *
 * @var array $args {
 *     @type bool $all Also show Signal and a client-area ticket card.
 * }
 */

defined( 'ABSPATH' ) || exit;

$contact = rdpg_home_content()['contact'];

// [url, icon, title, detail, opens in new tab].
$cards = array(
		array( 'https://wa.me/' . $contact['whatsapp'], 'chat', 'WhatsApp', $contact['whatsapp_display'], true ),
	array( 'https://t.me/' . $contact['telegram'], 'telegram', 'Telegram', '@' . $contact['telegram'], true ),
	array( 'mailto:' . $contact['email'], 'mail', 'Email', $contact['email'], false ),
		array( $contact['teams'], 'video', 'Microsoft Teams', 'Join our chat', true ),
);
if ( ! empty( $args['all'] ) ) {
	$cards[] = array( '', 'chat', 'Signal', $contact['signal'], false );
		$cards[] = array( rdpg_whmcs_url( 'submitticket.php' ), 'ticket', 'Support ticket', 'Open one in the client area', false );
}
?>
<div class="contacts">
	<?php foreach ( $cards as $card ) : ?>
		<?php if ( $card[0] ) : ?>
			<a class="contact" href="<?php echo esc_url( $card[0] ); ?>"<?php echo $card[4] ? ' target="_blank" rel="noopener"' : ''; ?>>
		<?php else : ?>
			<div class="contact">
		<?php endif; ?>
			<span class="ci"><?php echo rdpg_icon( $card[1] ); ?></span><span><b><?php echo esc_html( $card[2] ); ?></b><small><?php echo esc_html( $card[3] ); ?></small></span>
		<?php echo $card[0] ? '</a>' : '</div>'; ?>
	<?php endforeach; ?>
</div>

<?php
/**
 * FAQ section.
 *
 * @var array $args {
 *     @type array  $items Rows of ['q' => question, 'a' => answer HTML].
 *     @type string $class Extra class on the section.
 * }
 */

defined( 'ABSPATH' ) || exit;

$telegram_url = 'https://t.me/' . rdpg_home_content()['contact']['telegram'];
?>
<section class="section faq<?php echo empty( $args['class'] ) ? '' : ' ' . esc_attr( $args['class'] ); ?>" id="faq">
	<div class="container faq-grid">
		<div class="section-head">
			<span class="eyebrow">FAQ</span>
			<h2>Questions, answered.</h2>
			<p>Can't find what you're looking for? Our team is online 24/7.</p>
			<a class="btn btn-ghost" href="<?php echo esc_url( $telegram_url ) ; ?>" target="_blank" rel="noopener">Ask on Telegram<?php echo rdpg_icon( 'telegram' ) ; ?></a>
					</div>
		<div class="faq-list">
			<?php foreach ( $args['items'] as $i => $item ) : ?>
				<details<?php echo 0 === $i ? ' open' : ''; ?>>
					<summary><?php echo esc_html( $item['q'] ); ?><?php echo rdpg_icon( 'plus' ); ?></summary>
					<p><?php echo wp_kses_post( $item['a'] ); ?></p>
				</details>
			<?php endforeach; ?>
		</div>
	</div>
</section>

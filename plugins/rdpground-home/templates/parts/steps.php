<?php
/**
 * "From checkout to desktop in three steps" (RDP pages).
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="section" id="how">
	<div class="container">
		<div class="section-head center">
			<span class="eyebrow">How it works</span>
			<h2>From checkout to desktop in three steps.</h2>
		</div>
		<ol class="steps-grid">
			<li class="step">
				<div class="step-vis" aria-hidden="true">
					<div class="mock">
						<div class="mock-l">Memory</div>
						<div class="seg"><span>2 GB</span><span class="on">4 GB</span><span>8 GB</span><span>16 GB</span></div>
						<div class="mock-l">Location</div>
						<div class="sel"><span><span class="pulse"></span>Atlanta, US</span><?php echo rdpg_icon( 'chev' ); ?></div>
					</div>
				</div>
				<div class="step-body"><span class="step-n">01</span><h3>Choose your plan</h3><p>Pick the RAM, location and Windows version you need. Want something custom? Just ask.</p></div>
			</li>
			<li class="step">
				<div class="step-vis" aria-hidden="true">
					<div class="mock">
						<div class="radio on"><i></i>PayPal</div>
						<div class="radio"><i></i>Crypto<small>BTC · USDT</small></div>
						<div class="radio"><i></i>Debit / credit card</div>
					</div>
				</div>
				<div class="step-body"><span class="step-n">02</span><h3>Pay your way</h3><p>PayPal, crypto, debit or credit card, Payoneer or Perfect Money.</p></div>
			</li>
			<li class="step">
				<div class="step-vis" aria-hidden="true">
					<div class="mock">
						<div class="dlg-t"><?php echo rdpg_icon( 'monitor' ); ?>Remote Desktop Connection</div>
						<div class="field"><span>Computer</span><b>203.0.113.24</b></div>
						<div class="field"><span>User name</span><b>Administrator</b></div>
						<div class="dlg-btn"><span>Connect</span></div>
					</div>
				</div>
				<div class="step-body"><span class="step-n">03</span><h3>Connect &amp; go</h3><p>Your login arrives by email instantly. Open Remote Desktop, connect, and you're in.</p></div>
			</li>
		</ol>
	</div>
</section>

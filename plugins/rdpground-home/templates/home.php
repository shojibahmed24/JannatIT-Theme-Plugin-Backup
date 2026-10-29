<?php
/**
 * Template: RDPGround: Home.
 */

defined( 'ABSPATH' ) || exit;

$c            = rdpg_home_content();
$telegram_url = 'https://t.me/' . $c['contact']['telegram'];

$features = array(
	array( 'key', 'Full administrator access', 'Install anything, change anything. Your RDP works just like your own PC.' ),
	array( 'ram', 'Dedicated RAM', 'Memory is reserved for your server, so performance stays consistent.' ),
	array( 'monitor', 'Your choice of Windows', "Windows Server 2012 through 2025, ready to use the moment it's delivered." ),
	array( 'disk', 'RAID 10 SSD storage', 'Every node runs mirrored SSD/NVMe for fast disks and safer data.' ),
	array( 'shield', 'DDoS & firewall protection', 'Servers are protected by firewalls, DDoS mitigation and malware scanning.' ),
	array( 'zap', 'Instant delivery', 'Your login details are emailed automatically as soon as payment clears.' ),
	array( 'lock', 'Privacy first', 'We never access your server unless you ask us to.' ),
	array( 'headset', 'Real 24/7 support', 'Reach a human on Telegram, WhatsApp, Teams, live chat or email.' ),
);

rdpg_home_part( 'header' );
?>
<main id="main">

	<!-- Hero -->
	<section class="hero">
		<div class="container hero-grid">
			<div>
				<span class="pill"><span class="pulse" aria-hidden="true"></span>Instant setup<span class="sep" aria-hidden="true"></span>Windows Server 2012 – 2025</span>
				<h1>Full‑admin RDP servers, <em>ready in minutes.</em></h1>
				<p class="hero-lead">Windows RDP and Linux VPS with dedicated RAM and fast SSD storage, in the USA and Europe. Pay with PayPal, crypto or card, and your login lands in your inbox right away.</p>
				<div class="hero-ctas">
					<a class="btn btn-primary" href="#pricing">View RDP plans<?php echo rdpg_icon( 'arrow', 'i-arrow' ); ?></a>
					<a class="btn btn-ghost" href="<?php echo esc_url( $telegram_url ) ; ?>" target="_blank" rel="noopener">Chat on Telegram<?php echo rdpg_icon( 'telegram' ) ; ?></a>
									</div>
				<ul class="ticks">
					<li><?php echo rdpg_icon( 'check' ); ?>99.99% uptime guarantee</li>
					<li><?php echo rdpg_icon( 'check' ); ?>DDoS protected</li>
					<li><?php echo rdpg_icon( 'check' ); ?>24/7 human support</li>
				</ul>
			</div>

			<div class="rdp" role="img" aria-label="Example of a connected JannatIT server">
				<div class="rdp-window" aria-hidden="true">
					<div class="rdp-bar">
						<span class="t"><?php echo rdpg_icon( 'monitor' ); ?>203.0.113.24 — Remote Desktop Connection</span>
						<span class="win-ctrls">
							<span><svg viewBox="0 0 12 12"><path d="M1 6h10"/></svg></span>
							<span><svg viewBox="0 0 12 12"><rect x="1.5" y="1.5" width="9" height="9"/></svg></span>
							<span><svg viewBox="0 0 12 12"><path d="M1.5 1.5l9 9M10.5 1.5l-9 9"/></svg></span>
						</span>
					</div>
					<div class="rdp-body">
						<div class="host">
							<div class="host-id">
								<span class="host-badge"><?php echo rdpg_icon( 'server' ); ?></span>
								<span><b>rdp-atl-04</b><small>Windows Server 2025 · Administrator</small></span>
							</div>
							<span class="status"><span class="pulse"></span>Connected</span>
						</div>
						<div class="metrics">
							<div class="metric">
								<div class="metric-h"><span>CPU · 4 vCORES</span><span>LIVE</span></div>
								<div class="metric-v"><span id="cpu-val">18</span><small>%</small></div>
								<svg class="spark" viewBox="0 0 240 46" preserveAspectRatio="none">
									<defs><linearGradient id="spark-g" x1="0" y1="0" x2="0" y2="1"><stop offset="0" stop-color="#FF4D6D" stop-opacity=".35"/><stop offset="1" stop-color="#FF4D6D" stop-opacity="0"/></linearGradient></defs>
									<path id="spark-area" fill="url(#spark-g)" d=""/>
									<path id="spark-line" fill="none" stroke="#FF4D6D" stroke-width="1.8" stroke-linejoin="round" vector-effect="non-scaling-stroke" d=""/>
								</svg>
							</div>
							<div class="metric">
								<div class="metric-h"><span>RESOURCES</span><span>DEDICATED</span></div>
								<div class="res">
									<div class="res-h"><span>Memory</span><b><span id="ram-val">1.6</span> / 4 GB</b></div>
									<div class="bar"><i id="ram-bar" style="width:40%"></i></div>
								</div>
								<div class="res">
									<div class="res-h"><span>SSD</span><b>23 / 100 GB</b></div>
									<div class="bar"><i style="width:23%"></i></div>
								</div>
							</div>
						</div>
						<dl class="details">
							<div><dt>Location</dt><dd>Atlanta, US</dd></div>
							<div><dt>Public IPv4</dt><dd>203.0.113.24</dd></div>
							<div><dt>Bandwidth</dt><dd>2 TB / month</dd></div>
							<div><dt>DDoS protection</dt><dd><span class="pulse"></span>Active</dd></div>
						</dl>
					</div>
				</div>
				<div class="float float-1" aria-hidden="true">
					<span class="ico"><?php echo rdpg_icon( 'check' ); ?></span>
					<span><b>Server deployed</b><small>Login details sent to your inbox</small></span>
				</div>
			</div>
		</div>

		<div class="paystrip">
			<div class="container">
				<p>Pay your way</p>
				<ul>
					<li><?php echo rdpg_icon( 'wallet' ); ?>PayPal</li>
					<li><?php echo rdpg_icon( 'btc' ); ?>Bitcoin &amp; crypto</li>
					<li><?php echo rdpg_icon( 'card' ); ?>Visa / Mastercard</li>
					<li><?php echo rdpg_icon( 'wallet' ); ?>Payoneer</li>
					<li><?php echo rdpg_icon( 'coins' ); ?>Perfect Money</li>
				</ul>
			</div>
		</div>
	</section>

	<!-- Services -->
	<section class="section services" id="services">
		<div class="container">
			<div class="section-head">
				<span class="eyebrow">Services</span>
				<h2>Everything you need to get online — from one provider.</h2>
				<p>Remote desktops, VPS, web hosting, domains and email. One account, one invoice, one support team.</p>
			</div>
			<?php
			rdpg_home_part(
				'services',
				array(
					'featured' => true,
					'keys'     => array_values( array_diff( array_keys( $c['services'] ), array( 'admin' ) ) ),
				)
			);
			?>
		</div>
	</section>

	<!-- Pricing -->
	<section class="section pricing" id="pricing">
		<div class="container">
			<div class="section-head center">
				<span class="eyebrow">Pricing</span>
				<h2>Simple monthly pricing. No hidden fees.</h2>
				<p>Pay only for what you use. Upgrade RAM or CPU any time.</p>
			</div>

			<div class="tabs" role="tablist" aria-label="Plan type">
				<?php
				$first = true;
				foreach ( $c['pricing'] as $key => $tab ) :
					?>
					<button class="tab" role="tab" id="tab-<?php echo esc_attr( $key ); ?>" aria-controls="panel-<?php echo esc_attr( $key ); ?>" aria-selected="<?php echo $first ? 'true' : 'false'; ?>"<?php echo $first ? '' : ' tabindex="-1"'; ?>><?php echo rdpg_icon( $tab['icon'] ) . esc_html( $tab['label'] ); ?></button>
					<?php
					$first = false;
				endforeach;
				?>
			</div>

			<?php
			$first = true;
			foreach ( array_keys( $c['pricing'] ) as $key ) {
				rdpg_home_part(
					'plans',
					array(
						'key'      => $key,
						'tabpanel' => true,
						'hidden'   => ! $first,
					)
				);
				$first = false;
			}
			?>

			<?php rdpg_home_part( 'pricing-note' ); ?>
		</div>
	</section>

	<!-- Why us -->
	<section class="section dark" id="why">
		<div class="container">
			<div class="section-head">
				<span class="eyebrow">Why JannatIT</span>
				<h2>Full control. Serious performance.</h2>
				<p>Every plan comes with the access, resources and protection you'd expect from a much bigger provider, at reseller-friendly prices.</p>
			</div>

			<?php rdpg_home_part( 'features', array( 'items' => $features ) ); ?>
			<?php rdpg_home_part( 'locations', array( 'cta' => array( '#pricing', 'Compare plans' ) ) ); ?>

			<div class="stats">
				<?php foreach ( $c['stats'] as $stat ) : ?>
					<div class="stat">
						<?php if ( $stat[2] ) : ?>
							<b data-count="<?php echo esc_attr( (int) $stat[0] ); ?>"><?php echo esc_html( number_format_i18n( (int) $stat[0] ) ); ?></b>
						<?php else : ?>
							<b><?php echo esc_html( $stat[0] ); ?></b>
						<?php endif; ?>
						<span><?php echo esc_html( $stat[1] ); ?></span>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>

	<?php rdpg_home_part( 'steps' ); ?>

	<!-- Domain search (WHMCS domain checker) -->
	<section class="domain" id="domain">
		<div class="container">
			<div class="domain-card">
				<div>
					<span class="eyebrow">Domains</span>
					<h2>Find the perfect name for your project.</h2>
					<p>Register .com, .net, .org and more, with DNS management included.</p>
				</div>
				<?php rdpg_home_part( 'domain-search' ); ?>
			</div>
		</div>
	</section>

	<?php
	rdpg_home_part(
		'faq',
		array(
			'items' => $c['faq'],
			'class' => 'flush',
		)
	);
	rdpg_home_part( 'cta' );
	?>
</main>
<?php
rdpg_home_part( 'footer' );

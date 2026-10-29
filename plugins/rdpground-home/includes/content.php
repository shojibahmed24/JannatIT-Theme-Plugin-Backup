<?php
/**
 * Homepage content. Edit plans, prices, FAQ and contact details here.
 *
 * Plans
 * - 'price' is the monthly price, without the currency symbol.
 * - 'order' is the WHMCS store path from the product's order link:
 *   https://rdpground.net/clientarea/index.php?rp=/store/<order>
 * - 'popular' highlights the plan and sets its badge text.
 * - 'specs' rows show in order. Use true to show a check mark.
 * The "from $X" prices on the service cards are worked out from these plans.
 */

defined( 'ABSPATH' ) || exit;

$win_all  = '2012 – 2025';
$rdp_note = 'Instant setup · 99.99% uptime';
$web_note = 'Instant setup · 99.9% uptime';

return array(
	'whmcs_url' => home_url( '/clientarea/' ),
	'currency'  => '$',

	'contact'   => array(
		'telegram'         => 'rdpground',
		'whatsapp'         => '13073637311',
		'whatsapp_display' => '+1 307 363 7311',
		'email'            => 'support@rdpground.net',
		'teams'            => 'https://teams.live.com/l/invite/FEAcIhUlI1s_9VTUwg?v=g1',
		'signal'           => 'rdpground.07',
	),

	'social'    => array(
		'facebook'  => 'https://www.facebook.com/rdpground07',
		'instagram' => 'https://www.instagram.com/noderemote/',
		'linkedin'  => 'https://www.linkedin.com/in/rdpground',
	),

	/*
	 * Service cards on the homepage and in "related services". Keys that match
	 * a 'pricing' tab show its lowest price; others can set their own 'foot'.
	 */
	'services'  => array(
		'admin'     => array( 'Admin RDP', 'monitor', '/admin-rdp/', 'Windows Server with full administrator rights, dedicated RAM and SSD storage. Run any software, just like your own PC.' ),
		'private'   => array( 'Private RDP', 'phone', '/private-rdp/', 'High-memory Windows machines in Miami with up to 24 GB RAM. Built for BlueStacks and heavy apps.' ),
		'vps'       => array( 'Linux VPS', 'terminal', '/vps-hosting/', 'KVM VPS with full root access and your choice of Linux distribution.' ),
		'cpanel'    => array( 'cPanel Hosting', 'panel', '/cpanel-hosting/', 'Fast SSD web hosting with cPanel, a free SSL certificate and free site migration.' ),
		'reseller'  => array( 'Reseller Hosting', 'users', '/reseller-hosting/', 'Sell up to 15 cPanel accounts under your own brand, with unlimited domains.' ),
		'dedicated' => array( 'Dedicated Servers', 'server', '/dedicated-server/', 'Bare-metal servers in the USA and India with up to 48 GB ECC RAM and 30 TB bandwidth.' ),
		'domains'   => array( 'Domains', 'globe', '/domain/', 'Register .com, .net, .org, .live and more, with DNS management included.', 'Search domains' ),
		'email'     => array( 'Business Email', 'mail', '/software/', 'Professional Google Workspace email at your own domain, with Gmail, Drive and Meet.', 'from <b>$7.25</b>/mo' ),
	),

	'pricing'   => array(
		'admin'     => array(
			'label' => 'Admin RDP',
			'icon'  => 'monitor',
			'note'  => array( 'zap', $rdp_note ),
			'plans' => array(
				array(
					'name'  => '2 GB RDP',
					'sub'   => 'Windows Server',
					'price' => '21',
					'order' => 'admin-rd/2-gb-rdp',
					'specs' => array( 'RAM' => '2 GB', 'SSD' => '50 GB', 'vCPU' => '2 cores', 'Bandwidth' => '1 TB', 'Dedicated IP' => '1', 'Windows' => $win_all ),
				),
				array(
					'name'    => '4 GB RDP',
					'sub'     => 'Windows Server',
					'price'   => '30',
					'order'   => 'admin-rd/4-gb-rdp',
					'popular' => 'Most popular',
					'specs'   => array( 'RAM' => '4 GB', 'SSD' => '100 GB', 'vCPU' => '4 cores', 'Bandwidth' => '2 TB', 'Dedicated IP' => '1', 'Windows' => $win_all ),
				),
				array(
					'name'  => '6 GB RDP',
					'sub'   => 'Windows Server',
					'price' => '35',
					'order' => 'admin-rd/6-gb-rdp',
					'specs' => array( 'RAM' => '6 GB', 'SSD' => '100 GB', 'vCPU' => '5 cores', 'Bandwidth' => '3 TB', 'Dedicated IP' => '1', 'Windows' => $win_all ),
				),
				array(
					'name'  => '8 GB RDP',
					'sub'   => 'Windows Server',
					'price' => '39.95',
					'order' => 'admin-rd/8-gb-rdp',
					'specs' => array( 'RAM' => '8 GB', 'SSD' => '200 GB', 'vCPU' => '6 cores', 'Bandwidth' => '5 TB', 'Dedicated IP' => '1', 'Windows' => '2012 R2' ),
				),
				array(
					'name'  => '16 GB RDP',
					'sub'   => 'Windows Server',
					'price' => '80',
					'order' => 'admin-rd/16-gb-rdp',
					'specs' => array( 'RAM' => '16 GB', 'SSD' => '400 GB', 'vCPU' => '8 cores', 'Bandwidth' => '5 TB', 'Dedicated IP' => '1', 'Windows' => '2012 R2' ),
				),
			),
		),

		'private'   => array(
			'label' => 'Private RDP',
			'icon'  => 'phone',
			'note'  => array( 'zap', $rdp_note ),
			'plans' => array(
				array(
					'name'  => 'Private RDP 8',
					'sub'   => 'Miami, FL',
					'price' => '30',
					'order' => 'admin-rd/private-rdp-8',
					'specs' => array( 'RAM' => '8 GB', 'SSD' => '40 GB', 'vCPU' => '4 cores', 'Bandwidth' => '2 TB', 'Windows' => $win_all, 'BlueStacks' => true ),
				),
				array(
					'name'    => 'Private RDP 12',
					'sub'     => 'Miami, FL',
					'price'   => '55',
					'order'   => 'admin-rd/private-rdp-12',
					'popular' => 'Most popular',
					'specs'   => array( 'RAM' => '12 GB', 'SSD' => '60 GB', 'vCPU' => '6 cores', 'Bandwidth' => '3 TB', 'Windows' => '2012 R2 – 2022', 'BlueStacks' => true ),
				),
				array(
					'name'  => 'Private RDP 16',
					'sub'   => 'Miami, FL',
					'price' => '65',
					'order' => 'admin-rd/private-rdp-16',
					'specs' => array( 'RAM' => '16 GB', 'SSD' => '80 GB', 'vCPU' => '8 cores', 'Bandwidth' => '4 TB', 'Windows' => $win_all, 'BlueStacks' => true ),
				),
				array(
					'name'  => 'Private RDP 24',
					'sub'   => 'Miami, FL',
					'price' => '90',
					'order' => 'admin-rd/private-rdp-24',
					'specs' => array( 'RAM' => '24 GB', 'SSD' => '100 GB', 'vCPU' => '8 cores', 'Bandwidth' => '5 TB', 'Windows' => $win_all, 'BlueStacks' => true ),
				),
			),
		),

		'vps'       => array(
			'label' => 'Linux VPS',
			'icon'  => 'terminal',
			'note'  => array( 'zap', $rdp_note ),
			'plans' => array(
				array(
					'name'  => 'Linux VPS 1 GB',
					'sub'   => 'KVM · Root access',
					'price' => '10.99',
					'order' => 'vps-hosting/linux-vps-1-gb',
					'specs' => array( 'RAM' => '1 GB', 'SSD' => '25 GB', 'vCPU' => '1 core', 'Bandwidth' => '1 TB', 'Dedicated IP' => '1', 'OS' => 'Multiple' ),
				),
				array(
					'name'    => 'Linux VPS 2 GB',
					'sub'     => 'KVM · Root access',
					'price'   => '17.99',
					'order'   => 'vps-hosting/linux-vps-2-gb',
					'popular' => 'Most popular',
					'specs'   => array( 'RAM' => '2 GB', 'SSD' => '50 GB', 'vCPU' => '2 cores', 'Bandwidth' => '1 TB', 'Dedicated IP' => '1', 'OS' => 'Multiple' ),
				),
				array(
					'name'  => 'Linux VPS 4 GB',
					'sub'   => 'KVM · Root access',
					'price' => '28.99',
					'order' => 'vps-hosting/linux-vps-4-gb',
					'specs' => array( 'RAM' => '4 GB', 'SSD' => '100 GB', 'vCPU' => '4 cores', 'Bandwidth' => '2 TB', 'Dedicated IP' => '1', 'OS' => 'Multiple' ),
				),
				array(
					'name'  => 'Linux VPS 8 GB',
					'sub'   => 'KVM · Root access',
					'price' => '40.95',
					'order' => 'vps-hosting/linux-vps-8-gb',
					'specs' => array( 'RAM' => '8 GB', 'SSD' => '200 GB', 'vCPU' => '6 cores', 'Bandwidth' => '4 TB', 'Dedicated IP' => '1', 'OS' => 'Multiple' ),
				),
			),
		),

		'cpanel'    => array(
			'label' => 'cPanel Hosting',
			'icon'  => 'panel',
			'note'  => array( 'zap', $web_note ),
			'plans' => array(
				array(
					'name'  => 'Personal',
					'sub'   => 'Shared hosting',
					'price' => '8',
					'order' => 'cpane/personal',
					'specs' => array( 'SSD storage' => '30 GB', 'Bandwidth' => '500 GB', 'Control panel' => 'cPanel', 'SSL certificate' => 'Free', 'Site migration' => 'Free' ),
				),
				array(
					'name'    => 'Small Team',
					'sub'     => 'Shared hosting',
					'price'   => '11.95',
					'order'   => 'cpane/small-team',
					'popular' => 'Most popular',
					'specs'   => array( 'SSD storage' => '60 GB', 'Bandwidth' => '1 TB', 'Control panel' => 'cPanel', 'SSL certificate' => 'Free', 'Site migration' => 'Free' ),
				),
				array(
					'name'  => 'Company',
					'sub'   => 'Shared hosting',
					'price' => '15.95',
					'order' => 'cpane/company',
					'specs' => array( 'SSD storage' => '120 GB', 'Bandwidth' => '1 TB', 'Control panel' => 'cPanel', 'SSL certificate' => 'Free', 'Site migration' => 'Free' ),
				),
				array(
					'name'  => 'Big Shot',
					'sub'   => 'Shared hosting',
					'price' => '22.95',
					'order' => 'cpane/big-shot',
					'specs' => array( 'SSD storage' => '150 GB', 'Bandwidth' => '1.5 TB', 'Control panel' => 'cPanel', 'SSL certificate' => 'Free', 'Site migration' => 'Free' ),
				),
			),
		),

		'reseller'  => array(
			'label' => 'Reseller',
			'icon'  => 'users',
			'note'  => array( 'zap', $web_note ),
			'plans' => array(
				array(
					'name'  => 'Start',
					'sub'   => 'cPanel reseller',
					'price' => '10',
					'order' => 'reseller-hosting/start',
					'specs' => array( 'cPanel accounts' => '5', 'SSD storage' => '20 GB', 'Data transfer' => '200 GB', 'Domains' => 'Unlimited', 'Network port' => '1 Gbps' ),
				),
				array(
					'name'    => 'Medium',
					'sub'     => 'cPanel reseller',
					'price'   => '15',
					'order'   => 'reseller-hosting/medium',
					'popular' => 'Most popular',
					'specs'   => array( 'cPanel accounts' => '10', 'SSD storage' => '40 GB', 'Data transfer' => '400 GB', 'Domains' => 'Unlimited', 'Network port' => '1 Gbps' ),
				),
				array(
					'name'  => 'Hoster',
					'sub'   => 'cPanel reseller',
					'price' => '20',
					'order' => 'reseller-hosting/hoster',
					'specs' => array( 'cPanel accounts' => '15', 'SSD storage' => '60 GB', 'Data transfer' => '600 GB', 'Domains' => 'Unlimited', 'Network port' => '1 Gbps' ),
				),
				array(
					'name'  => 'Company',
					'sub'   => 'cPanel reseller',
					'price' => '25',
					'order' => 'reseller-hosting/company-1',
					'specs' => array( 'cPanel accounts' => '15', 'SSD storage' => '80 GB', 'Data transfer' => '600 GB', 'Domains' => 'Unlimited', 'Network port' => '1 Gbps' ),
				),
			),
		),

		'dedicated' => array(
			'label' => 'Dedicated',
			'icon'  => 'server',
			'note'  => array( 'check', 'Free installation · Self-managed' ),
			'plans' => array(
				array(
					'name'  => 'USA 2×L5420',
					'sub'   => 'United States',
					'price' => '125',
					'order' => 'dedicated-server/usa-2xl5420',
					'specs' => array( 'CPU' => '2× Xeon L5420 · 8c', 'RAM' => '16 GB ECC', 'Storage' => '2× 1 TB SATA', 'Bandwidth' => '10 TB', 'Port' => '1 Gbps' ),
				),
				array(
					'name'    => 'USA 2×L5630',
					'sub'     => 'United States',
					'price'   => '150',
					'order'   => 'dedicated-server/usa-2xl5630',
					'popular' => 'Best value',
					'specs'   => array( 'CPU' => '2× Xeon L5630 · 16t', 'RAM' => '48 GB DDR3 ECC', 'Storage' => '1 TB SATA + 256 GB SSD', 'Bandwidth' => '30 TB', 'Port' => '1 Gbps' ),
				),
				array(
					'name'  => 'India E3-1230 v6',
					'sub'   => 'India',
					'price' => '180',
					'order' => 'dedicated-server/indian-e3-1230-v6',
					'specs' => array( 'CPU' => 'Xeon E3-1230 v6 · 8t', 'RAM' => '16 GB DDR4', 'Storage' => '256 GB SSD', 'Bandwidth' => '1.5 TB', 'Port' => '100 Mbps' ),
				),
			),
		),
	),

	'locations' => array(
		array( 'US-CA', 'Los Angeles', 'United States' ),
		array( 'US-TX', 'Texas', 'United States' ),
		array( 'US-GA', 'Atlanta', 'United States' ),
		array( 'US-FL', 'Miami', 'United States' ),
		array( 'DE', 'Germany', 'Europe' ),
		array( 'NL', 'Netherlands', 'Europe' ),
		array( 'IN', 'India', 'Asia' ),
	),

	// Numbers count up on scroll; 'count' => false shows the value as is.
	'stats'     => array(
		array( '99.99%', 'Uptime guarantee', false ),
		array( '4185', 'Projects delivered', true ),
		array( '3245', 'Domains registered', true ),
		array( '850', 'Dedicated servers', true ),
	),

	// Answers may contain links (<a href="…">).
	'faq'       => array(
		array(
			'q' => "What's the difference between Admin RDP and Private RDP?",
			'a' => 'Both give you full administrator access to Windows Server. Admin RDP plans are available in several US and European locations. Private RDP plans are larger, Miami-based machines with more memory, and they support Android emulators like BlueStacks.',
		),
		array(
			'q' => 'How quickly will I get my server?',
			'a' => 'Most plans are set up instantly. Your RDP or SSH login details are emailed to you automatically right after payment.',
		),
		array(
			'q' => 'Which payment methods do you accept?',
			'a' => 'PayPal, all major cryptocurrencies, debit and credit cards, Payoneer and Perfect Money.',
		),
		array(
			'q' => 'Can I upgrade my plan later?',
			'a' => "Yes. RAM and CPU upgrades can be applied to your existing server. Contact support and we'll take care of it.",
		),
		array(
			'q' => 'Which operating systems are available?',
			'a' => 'RDP plans run Windows Server 2012 through 2025 (some larger plans use 2012 R2). Linux VPS plans support multiple distributions, including Ubuntu.',
		),
		array(
			'q' => 'Do you offer refunds?',
			'a' => 'Please see our <a href="' . esc_url( home_url( '/refund-policy/' ) ) . '">Refund Policy</a> for full details on eligibility.',
		),
	),
);

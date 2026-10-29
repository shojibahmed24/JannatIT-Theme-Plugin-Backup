<?php
/**
 * Copy for the product, Domains, Business Email and Contact pages.
 *
 * Product pages take their plans from 'pricing' in content.php. Keys here match
 * those pricing keys. 'related' lists the service cards shown near the bottom
 * (keys from 'services' in content.php).
 */

defined( 'ABSPATH' ) || exit;

$aup_link    = '<a href="' . esc_url( home_url( '/acceptable-use-policy/' ) ) . '">Acceptable Use Policy</a>';
$refund_link = '<a href="' . esc_url( home_url( '/refund-policy/' ) ) . '">Refund Policy</a>';

$faq_upgrade = array(
	'q' => 'Can I upgrade later?',
	'a' => "Yes. RAM and CPU upgrades can be applied to your existing server. Contact support and we'll take care of it.",
);
$faq_refund  = array(
	'q' => 'What if it isn\'t right for me?',
	'a' => "See our {$refund_link} for money-back terms.",
);
$faq_rdp_connect = array(
	'q' => 'How do I connect?',
	'a' => 'On Windows, open Remote Desktop Connection. On Mac, iPhone, iPad or Android, use the Windows App (formerly Microsoft Remote Desktop). Your server\'s IP address, username and password are in your welcome email.',
);

return array(

	'admin'     => array(
		'title'     => 'Windows RDP with <em>full administrator rights.</em>',
		'lead'      => 'Your own Windows Server with dedicated RAM, SSD storage and full admin access. Choose from six locations in the USA and Europe, and get your login by email the moment you pay.',
		'ticks'     => array( 'Windows Server 2012 – 2025', 'Instant setup', '99.99% uptime guarantee' ),
		'facts'     => array(
			array( '6', 'Locations in the USA & EU' ),
			array( '2–16 GB', 'Dedicated RAM' ),
			array( 'Up to 400 GB', 'SSD storage' ),
			array( '99.99%', 'Uptime guarantee' ),
		),
		'features'  => array(
			array( 'key', 'Full administrator access', 'Install and configure the software you need. Your RDP works just like your own PC.' ),
			array( 'ram', 'Dedicated RAM', 'Memory is reserved for your server, so performance stays consistent.' ),
			array( 'disk', 'RAID 10 SSD storage', 'Every node runs mirrored SSD storage for fast disks and safer data.' ),
			array( 'shield', 'DDoS & firewall protection', 'Servers are protected by firewalls, DDoS mitigation and malware scanning.' ),
			array( 'zap', 'Instant delivery', 'Your login details are emailed automatically as soon as payment clears.' ),
			array( 'sliders', 'Upgrade any time', 'Add RAM or CPU to your existing server whenever you need more power.' ),
			array( 'lock', 'Privacy first', 'We never access your server unless you ask us to.' ),
			array( 'headset', 'Real 24/7 support', 'Reach a human on Telegram, WhatsApp, Teams, live chat or email.' ),
		),
		'locations' => array( 'US-CA', 'US-TX', 'US-GA', 'US-FL', 'DE', 'NL' ),
		'steps'     => true,
		'faq'       => array(
			array(
				'q' => 'Can I install my own software?',
				'a' => "Yes. You get the Administrator account, so you can install and configure anything allowed under our {$aup_link}.",
			),
			array(
				'q' => 'Which Windows versions can I choose?',
				'a' => 'The 2 GB, 4 GB and 6 GB plans offer Windows Server 2012 through 2025. The 8 GB and 16 GB plans run Windows Server 2012 R2.',
			),
			array(
				'q' => 'Which locations are available?',
				'a' => 'Los Angeles, Texas, Atlanta and Miami in the USA, and Germany and the Netherlands in Europe.',
			),
			$faq_rdp_connect,
			$faq_upgrade,
			$faq_refund,
		),
		'related'   => array( 'private', 'vps', 'dedicated' ),
	),

	'private'   => array(
		'title'    => 'High-memory Windows servers <em>for heavy apps.</em>',
		'lead'     => 'Private RDP gives you 8 to 24 GB of RAM, up to 8 vCPU cores and full administrator access on Windows Server, hosted in Miami. Run Android emulators like BlueStacks and other demanding software.',
		'ticks'    => array( 'Up to 24 GB RAM', 'BlueStacks ready', 'Miami, Florida' ),
		'facts'    => array(
			array( '8–24 GB', 'RAM' ),
			array( 'Up to 8', 'vCPU cores' ),
			array( 'Miami', 'Florida, USA' ),
			array( '99.99%', 'Uptime guarantee' ),
		),
		'features' => array(
			array( 'phone', 'Android emulator support', 'Every plan supports BlueStacks and other Android emulators.' ),
			array( 'ram', 'Plenty of memory', 'From 8 GB up to 24 GB of RAM for memory-hungry software.' ),
			array( 'key', 'Full administrator access', 'Install and configure the software you need, just like your own PC.' ),
			array( 'shield', 'DDoS & firewall protection', 'Servers are protected by firewalls, DDoS mitigation and malware scanning.' ),
		),
		'steps'    => true,
		'faq'      => array(
			array(
				'q' => 'How is Private RDP different from Admin RDP?',
				'a' => 'Private RDP plans have much more memory (8–24 GB) and are hosted in Miami, so they suit Android emulators and other memory-hungry software. Admin RDP plans start smaller and are available in more locations.',
			),
			array(
				'q' => 'Can I run BlueStacks?',
				'a' => 'Yes. Every Private RDP plan supports BlueStacks.',
			),
			array(
				'q' => 'Which Windows versions are available?',
				'a' => 'Windows Server 2012 through 2025. The Private RDP 12 plan offers Windows Server 2012 R2 through 2022.',
			),
			$faq_rdp_connect,
			$faq_upgrade,
		),
		'related'  => array( 'admin', 'vps', 'dedicated' ),
	),

	'vps'       => array(
		'title'    => 'Linux VPS with <em>full root access.</em>',
		'lead'     => 'KVM virtual servers with dedicated RAM, SSD storage and root SSH access. Pick your Linux distribution and start building in minutes.',
		'ticks'    => array( 'KVM virtualization', 'Root SSH access', 'Dedicated IPv4' ),
		'facts'    => array(
			array( '1–8 GB', 'Dedicated RAM' ),
			array( 'Up to 200 GB', 'SSD storage' ),
			array( 'Up to 4 TB', 'Bandwidth' ),
			array( '99.99%', 'Uptime guarantee' ),
		),
		'features' => array(
			array( 'terminal', 'Full root access', 'Connect over SSH as root and configure your server exactly how you want.' ),
			array( 'layers', 'KVM virtualization', 'Each VPS runs its own kernel with dedicated RAM, fully isolated from others.' ),
			array( 'package', 'Your choice of Linux', 'Ubuntu and other popular distributions are available.' ),
			array( 'network', 'Dedicated IPv4', 'Every plan includes its own dedicated IPv4 address.' ),
		),
		'faq'      => array(
			array(
				'q' => 'Which Linux distributions can I use?',
				'a' => 'Ubuntu and other popular distributions. Ask us if you need something specific.',
			),
			array(
				'q' => 'How do I connect?',
				'a' => 'Connect over SSH with the IP address and root password from your welcome email, for example: <code>ssh root@your-server-ip</code>.',
			),
			array(
				'q' => 'Do I get a dedicated IP address?',
				'a' => 'Yes. Every Linux VPS plan includes one dedicated IPv4 address.',
			),
			$faq_upgrade,
			$faq_refund,
		),
		'related'  => array( 'admin', 'dedicated', 'cpanel' ),
	),

	'cpanel'    => array(
		'title'    => 'Fast, simple web hosting <em>with cPanel.</em>',
		'lead'     => 'SSD web hosting with the cPanel control panel, a free SSL certificate and free site migration. Everything you need to launch a website, blog or online store.',
		'ticks'    => array( 'Free SSL certificate', 'Free site migration', '450+ one-click apps' ),
		'facts'    => array(
			array( '30–150 GB', 'SSD storage' ),
			array( 'Free', 'SSL certificate' ),
			array( '450+', 'One-click apps' ),
			array( '99.9%', 'Uptime guarantee' ),
		),
		'features' => array(
			array( 'panel', 'cPanel control panel', 'Manage files, databases, domains and email from one familiar dashboard.' ),
			array( 'lock', 'Free SSL certificate', 'Keep your site secure and show the padlock in every browser.' ),
			array( 'swap', 'Free site migration', 'Moving from another host? Migration is free on every plan.' ),
			array( 'package', '450+ one-click apps', 'Install WordPress and hundreds of other apps in a couple of clicks.' ),
		),
		'faq'      => array(
			array(
				'q' => 'Can you move my existing website?',
				'a' => 'Yes. Site migration is free on every cPanel plan. Contact support to get started.',
			),
			array(
				'q' => 'Is SSL included?',
				'a' => 'Yes. Every plan includes a free SSL certificate.',
			),
			array(
				'q' => 'Which plan is right for me?',
				'a' => 'Personal suits a single website. Small Team and Company add storage and bandwidth for busier sites, and Big Shot is for large or high-traffic sites.',
			),
			$faq_refund,
		),
		'related'  => array( 'reseller', 'domains', 'email' ),
	),

	'reseller'  => array(
		'title'    => 'Start your own <em>hosting business.</em>',
		'lead'     => 'Sell cPanel hosting under your own brand. Create accounts for your customers, host unlimited domains, and leave the servers to us.',
		'ticks'    => array( 'Up to 15 cPanel accounts', 'Unlimited domains', '1 Gbps network' ),
		'facts'    => array(
			array( '5–15', 'cPanel accounts' ),
			array( 'Unlimited', 'Domains' ),
			array( '1 Gbps', 'Network port' ),
			array( '99.9%', 'Uptime guarantee' ),
		),
		'features' => array(
			array( 'tag', 'Your brand', 'Sell hosting under your own name and set your own prices.' ),
			array( 'panel', 'cPanel for every customer', 'Each account you create comes with its own cPanel control panel.' ),
			array( 'globe', 'Unlimited domains', 'Host as many domains as your customers need.' ),
			array( 'disk', 'Fast SSD servers', 'Your customers\' sites run on SSD storage with a 1 Gbps network port.' ),
		),
		'faq'      => array(
			array(
				'q' => 'What is reseller hosting?',
				'a' => 'Reseller hosting lets you create and sell cPanel hosting accounts to your own customers. We run the servers; you look after your customers and keep the profit.',
			),
			array(
				'q' => 'Do my customers get cPanel?',
				'a' => 'Yes. Every account you create comes with its own cPanel control panel.',
			),
			array(
				'q' => 'Can I move to a bigger plan as I grow?',
				'a' => 'Yes. Contact support to move to a larger plan.',
			),
			$faq_refund,
		),
		'related'  => array( 'cpanel', 'domains', 'dedicated' ),
	),

	'dedicated' => array(
		'title'       => 'Bare-metal servers, <em>all to yourself.</em>',
		'plans_title' => 'Choose your dedicated server.',
		'lead'     => 'Dedicated Intel Xeon servers in the USA and India, with up to 48 GB of ECC RAM and 30 TB of bandwidth. No neighbours and no shared resources.',
		'ticks'    => array( 'Free installation', 'Choice of operating system', 'USA & India' ),
		'facts'    => array(
			array( 'Up to 48 GB', 'ECC RAM' ),
			array( 'Up to 30 TB', 'Bandwidth' ),
			array( 'USA & India', 'Locations' ),
			array( '99.9%', 'Uptime guarantee' ),
		),
		'features' => array(
			array( 'server', 'The whole server is yours', 'Every CPU core, gigabyte of RAM and disk is reserved for you alone.' ),
			array( 'cpu', 'Intel Xeon processors', 'Dual-socket Xeon in the USA, or a Xeon E3 with DDR4 RAM in India.' ),
			array( 'package', 'Choice of operating system', 'Pick your OS when you order. Installation is free.' ),
			array( 'headset', '24/7 support', 'Our team is available around the clock if you need a hand.' ),
		),
		'faq'      => array(
			array(
				'q' => 'Are dedicated servers managed?',
				'a' => 'They\'re self-managed: you have full control over the operating system and software. Our support team is available 24/7 if you need help.',
			),
			array(
				'q' => 'Which operating systems can I install?',
				'a' => 'Choose your operating system when you order. Installation is free.',
			),
			array(
				'q' => 'Where are the servers?',
				'a' => 'The L5420 and L5630 servers are in the USA, and the E3-1230 v6 server is in India.',
			),
			$faq_refund,
		),
		'related'  => array( 'admin', 'vps', 'reseller' ),
	),

	'domains'   => array(
		'title'    => 'Find the perfect domain <em>for your project.</em>',
		'lead'     => 'Search for your name, register it in minutes and manage DNS from your client area.',
		'features' => array(
			array( 'network', 'DNS management', 'Point your domain at any server and manage records from your client area.' ),
			array( 'lock', 'Domain locking', 'Lock your domain to protect it from unauthorized transfers.' ),
			array( 'user', 'WHOIS management', 'Keep your domain\'s contact details up to date in one place.' ),
			array( 'swap', 'Easy transfers', 'Bring domains you own elsewhere and manage everything together.' ),
			array( 'tag', 'IPS tag release', 'Moving a .uk domain? We can release the IPS tag for you.' ),
			array( 'headset', '24/7 support', 'Questions about your domain? Our team is available around the clock.' ),
		),
		'faq'      => array(
			array(
				'q' => 'How much does a domain cost?',
				'a' => 'Registration, renewal and transfer prices for every extension are shown when you search.',
			),
			array(
				'q' => 'Can I transfer a domain I already own?',
				'a' => 'Yes. Start a transfer from the client area. You\'ll need the authorization (EPP) code from your current registrar.',
			),
			array(
				'q' => 'Can I use my domain with a server from another provider?',
				'a' => 'Yes. With DNS management you can point your domain anywhere.',
			),
		),
		'related'  => array( 'cpanel', 'email', 'reseller' ),
	),

	'email'     => array(
		'title'    => 'Professional email <em>at your own domain.</em>',
		'lead'     => 'Google Workspace Business Starter gives your team custom email addresses like you@yourcompany.com, plus Gmail, Drive, Docs and Meet.',
		'ticks'    => array( 'Custom email address', '30 GB cloud storage', 'Docs, Sheets & Meet' ),
		'plan'     => array(
			'name'    => 'Business Starter',
			'sub'     => 'Google Workspace',
			'price'   => '7.25',
			'order'   => 'g-suite/g-suite-business-starter',
			'popular' => 'Google Workspace',
			'specs'   => array(
				'Email'         => '@yourcompany',
				'Cloud storage' => '30 GB',
				'Video calls'   => 'Google Meet',
				'Apps'          => 'Docs · Sheets · Slides',
				'Uptime'        => '99.9%',
			),
		),
		'features' => array(
			array( 'inbox', 'Email @yourcompany', 'Create addresses like joe@yourcompany.com for everyone on your team.' ),
			array( 'cloud', '30 GB cloud storage', 'Store and share files securely in Google Drive.' ),
			array( 'file', 'Docs, Sheets & Slides', 'Work on documents together in real time, from any device.' ),
			array( 'video', 'Google Meet & Chat', 'Video calls and team messaging, built in.' ),
			array( 'shield', 'Security & admin controls', 'Spam protection, device management and admin tools to keep data safe.' ),
			array( 'zap', '99.9% uptime', 'Runs on Google\'s reliable infrastructure.' ),
		),
		'faq'      => array(
			array(
				'q' => 'Do I need my own domain?',
				'a' => 'Yes. Use a domain you already own, or <a href="' . esc_url( home_url( '/domain/' ) ) . '">register a new one</a> with us.',
			),
			array(
				'q' => 'Can you help me set it up?',
				'a' => 'Yes. Our support team is available 24/7 to help you connect your domain and get started.',
			),
		),
		'related'  => array( 'domains', 'cpanel', 'reseller' ),
	),

	'contact'   => array(
		'title' => 'Talk to a real person, <em>24/7.</em>',
		'lead'  => 'Questions before you buy, help with your server or a custom configuration: reach us on whichever channel suits you.',
	),
);

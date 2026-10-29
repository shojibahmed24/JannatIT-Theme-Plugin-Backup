<?php
/**
 * Front page template — jannatit.net fire/flame landing page.
 *
 * All copy, prices, plan specs, regions and FAQ text below are
 * placeholders. Edit the PHP arrays directly to change plans/regions;
 * edit the surrounding markup/text to change everything else.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

<section class="hero">
  <div class="wrap">
    <div class="badge-row">
      <span class="badge">⭐ <b>4.8/5</b> <?php esc_html_e( 'on HostAdvice', 'jannatit' ); ?></span>
      <span class="badge">⭐ <b>3.8/5</b> <?php esc_html_e( 'on Trustpilot', 'jannatit' ); ?></span>
      <span class="badge">🛡️ <b><?php esc_html_e( '7-day', 'jannatit' ); ?></b> <?php esc_html_e( 'money-back guarantee', 'jannatit' ); ?></span>
    </div>
    <h1><?php esc_html_e( 'Fast Windows RDP & VPS', 'jannatit' ); ?><br><span class="accent"><?php esc_html_e( 'from $6.99/month', 'jannatit' ); ?></span></h1>
    <p class="lede"><?php echo esc_html( sprintf( __( '%s delivers high-performance Windows RDP, Linux VPS, and business email hosting from 16 data centers worldwide — with full admin access and 24/7 support.', 'jannatit' ), get_bloginfo( 'name' ) ) ); ?></p>
    <div class="hero-actions">
      <a href="#plans" class="btn btn-flame"><?php esc_html_e( 'See Plans & Pricing', 'jannatit' ); ?></a>
      <a href="#" class="btn btn-ghost"><?php esc_html_e( 'Chat With Sales', 'jannatit' ); ?></a>
    </div>
    <div class="hero-foot">✔ <?php esc_html_e( 'No setup fee', 'jannatit' ); ?> &nbsp; ✔ <b>99.9%</b> <?php esc_html_e( 'uptime SLA', 'jannatit' ); ?> &nbsp; ✔ <?php esc_html_e( 'Instant provisioning', 'jannatit' ); ?></div>
  </div>
</section>

<div class="trust">
  <div class="wrap">
    <span class="trust-item"><span class="stars">★★★★★</span> <b>4.8</b> HostAdvice</span>
    <span class="trust-item"><span class="stars">★★★★★</span> <b>3.8</b> Trustpilot</span>
    <span class="trust-item"><span class="stars">★★★★★</span> <b>5.0</b> ScamAdviser</span>
    <span class="trust-item"><b>12,000+</b> <?php esc_html_e( 'customers served', 'jannatit' ); ?></span>
  </div>
</div>

<section id="plans">
  <div class="wrap">
    <div class="head-row">
      <p class="eyebrow"><?php esc_html_e( 'Windows RDP', 'jannatit' ); ?></p>
      <h2><?php esc_html_e( 'Admin Access, Powerful Windows RDP', 'jannatit' ); ?></h2>
      <p><?php esc_html_e( 'Full administrator access, licensed Windows Server, and dedicated resources on every plan.', 'jannatit' ); ?></p>
    </div>
    <div class="tabs">
      <span class="tab active"><?php esc_html_e( 'Monthly', 'jannatit' ); ?></span>
      <span class="tab"><?php esc_html_e( 'Annually — save 40%', 'jannatit' ); ?></span>
    </div>

    <?php
    $rdp_plans = array(
    	array( 'name' => '4GB RDP',    'tag' => __( 'Best value for light workloads', 'jannatit' ),        'old' => '14.99', 'price' => '6.99',  'save' => '53', 'popular' => false,
    		'specs' => array( '4GB DDR4 RAM', '2 CPU vCore', '50GB SSD', 'Full Admin Access', '2TB bandwidth' ) ),
    	array( 'name' => '8GB RDP',    'tag' => __( 'High-speed computing for demanding tasks', 'jannatit' ), 'old' => '29.99', 'price' => '13.99', 'save' => '53', 'popular' => true,
    		'specs' => array( '8GB DDR4 RAM', '4 CPU vCore', '100GB SSD', 'Full Admin Access', '5TB bandwidth' ) ),
    	array( 'name' => '16GB RDP',   'tag' => __( 'Ultimate power for heavy workloads', 'jannatit' ),      'old' => '54.99', 'price' => '26.99', 'save' => '51', 'popular' => false,
    		'specs' => array( '16GB DDR4 RAM', '6 CPU vCore', '150GB SSD', 'Full Admin Access', '7.5TB bandwidth' ) ),
    	array( 'name' => '10Gbps RDP', 'tag' => __( 'Lightning-fast port speed', 'jannatit' ),               'old' => '32.99', 'price' => '16.20', 'save' => '51', 'popular' => false,
    		'specs' => array( '4GB DDR4 RAM', '2 CPU vCore', '50GB SSD', '10Gbps Network', '2TB bandwidth' ) ),
    );
    ?>
    <div class="plan-grid">
      <?php foreach ( $rdp_plans as $p ) : ?>
        <div class="plan<?php echo $p['popular'] ? ' popular' : ''; ?>">
          <?php if ( $p['popular'] ) : ?><span class="ribbon"><?php esc_html_e( 'MOST POPULAR', 'jannatit' ); ?></span><?php endif; ?>
          <h3><?php echo esc_html( $p['name'] ); ?></h3>
          <div class="tag"><?php echo esc_html( $p['tag'] ); ?></div>
          <div class="old-price">$<?php echo esc_html( $p['old'] ); ?></div>
          <div class="price">$<?php echo esc_html( $p['price'] ); ?><small>/<?php esc_html_e( 'mo', 'jannatit' ); ?></small></div>
          <span class="save"><?php echo esc_html( sprintf( __( 'SAVE %s%%', 'jannatit' ), $p['save'] ) ); ?></span>
          <ul>
            <?php foreach ( $p['specs'] as $spec ) : ?><li><?php echo esc_html( $spec ); ?></li><?php endforeach; ?>
          </ul>
          <a href="#" class="btn <?php echo $p['popular'] ? 'btn-flame' : 'btn-dark'; ?> btn-block"><?php esc_html_e( 'Order Now', 'jannatit' ); ?></a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section-alt" id="vps">
  <div class="wrap">
    <div class="head-row">
      <p class="eyebrow"><?php esc_html_e( 'Linux VPS', 'jannatit' ); ?></p>
      <h2><?php esc_html_e( 'Reliable VPS Hosting, Diverse OS Support', 'jannatit' ); ?></h2>
      <p><?php esc_html_e( 'Full root SSH access, AMD Ryzen or Intel Xeon processors, and a full WHM control panel.', 'jannatit' ); ?></p>
    </div>

    <?php
    $vps_plans = array(
    	array( 'name' => '2GB VPS',       'tag' => __( 'Entry-level Linux hosting', 'jannatit' ),  'old' => '15.95', 'price' => '6.73',  'save' => '55', 'popular' => false,
    		'specs' => array( '2GB RAM', '1 CPU vCore', '35GB SSD', 'Full Root Access' ) ),
    	array( 'name' => '8GB VPS',       'tag' => __( 'For growing businesses', 'jannatit' ),      'old' => '44.99', 'price' => '17.99', 'save' => '55', 'popular' => true,
    		'specs' => array( '8GB RAM', '4 CPU vCore', '100GB SSD', 'Full Root Access' ) ),
    	array( 'name' => '16GB VPS',      'tag' => __( 'For advanced application hosting', 'jannatit' ), 'old' => '92.99', 'price' => '35.99', 'save' => '55', 'popular' => false,
    		'specs' => array( '16GB RAM', '6 CPU vCore', '150GB SSD', 'Full Root Access' ) ),
    	array( 'name' => 'CyberPanel VPS', 'tag' => __( 'LiteSpeed-optimized for websites', 'jannatit' ), 'old' => '34.95', 'price' => '8.95', 'save' => '74', 'popular' => false,
    		'specs' => array( '4GB RAM', '2 CPU vCore', 'CyberPanel + LiteSpeed', 'Free Website Transfer' ) ),
    );
    ?>
    <div class="plan-grid">
      <?php foreach ( $vps_plans as $p ) : ?>
        <div class="plan<?php echo $p['popular'] ? ' popular' : ''; ?>">
          <?php if ( $p['popular'] ) : ?><span class="ribbon"><?php esc_html_e( 'MOST POPULAR', 'jannatit' ); ?></span><?php endif; ?>
          <h3><?php echo esc_html( $p['name'] ); ?></h3>
          <div class="tag"><?php echo esc_html( $p['tag'] ); ?></div>
          <div class="old-price">$<?php echo esc_html( $p['old'] ); ?></div>
          <div class="price">$<?php echo esc_html( $p['price'] ); ?><small>/<?php esc_html_e( 'mo', 'jannatit' ); ?></small></div>
          <span class="save"><?php echo esc_html( sprintf( __( 'SAVE %s%%', 'jannatit' ), $p['save'] ) ); ?></span>
          <ul>
            <?php foreach ( $p['specs'] as $spec ) : ?><li><?php echo esc_html( $spec ); ?></li><?php endforeach; ?>
          </ul>
          <a href="#" class="btn <?php echo $p['popular'] ? 'btn-flame' : 'btn-dark'; ?> btn-block"><?php esc_html_e( 'Order Now', 'jannatit' ); ?></a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section id="regions">
  <div class="wrap">
    <div class="head-row">
      <p class="eyebrow"><?php esc_html_e( 'Global Network', 'jannatit' ); ?></p>
      <h2><?php esc_html_e( 'Data Centers in 16 Locations', 'jannatit' ); ?></h2>
      <p><?php esc_html_e( 'Pick the region closest to your users for the lowest latency.', 'jannatit' ); ?></p>
    </div>

    <?php
    $countries = array(
    	'🇺🇸' => 'USA', '🇨🇦' => 'Canada', '🇩🇪' => 'Germany', '🇬🇧' => 'UK', '🇸🇬' => 'Singapore',
    	'🇦🇺' => 'Australia', '🇫🇷' => 'France', '🇵🇱' => 'Poland', '🇳🇱' => 'Netherlands', '🇯🇵' => 'Japan',
    );
    ?>
    <div class="flags">
      <?php foreach ( $countries as $flag => $name ) : ?>
        <div class="flag-card"><span class="em"><?php echo esc_html( $flag ); ?></span><?php echo esc_html( $name ); ?><span class="ms">●</span></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section-alt">
  <div class="wrap">
    <div class="head-row">
      <p class="eyebrow"><?php echo esc_html( sprintf( __( 'Why %s', 'jannatit' ), get_bloginfo( 'name' ) ) ); ?></p>
      <h2><?php esc_html_e( "Why We're the Best Choice for Your Hosting Needs", 'jannatit' ); ?></h2>
    </div>
    <div class="feat-grid">
      <div class="feat">
        <div class="ic">⚡</div>
        <h4><?php esc_html_e( 'Optimized for Best Performance', 'jannatit' ); ?></h4>
        <p><?php esc_html_e( 'Fine-tuned processors ensure unmatched performance and fast load times, even during peak usage.', 'jannatit' ); ?></p>
      </div>
      <div class="feat">
        <div class="ic">🛡️</div>
        <h4><?php esc_html_e( 'Designed for Stability', 'jannatit' ); ?></h4>
        <p><?php esc_html_e( 'Premium hardware and licensed OS guarantee 99.9% uptime, even under heavy workloads.', 'jannatit' ); ?></p>
      </div>
      <div class="feat">
        <div class="ic">💬</div>
        <h4><?php esc_html_e( '24/7 Live Expert Support', 'jannatit' ); ?></h4>
        <p><?php esc_html_e( 'Real engineers, not scripts — get help with any technical challenge, any time of day.', 'jannatit' ); ?></p>
      </div>
    </div>
  </div>
</section>

<section>
  <div class="wrap">
    <div class="head-row">
      <p class="eyebrow"><?php esc_html_e( 'Customer Reviews', 'jannatit' ); ?></p>
      <h2><?php esc_html_e( 'Hear From Our Global Clients', 'jannatit' ); ?></h2>
    </div>

    <?php
    $reviews = array(
    	array( 'text' => __( 'Excellent service and support! The migration was smooth and the team was professional throughout.', 'jannatit' ), 'who' => 'Michael R. — New Zealand' ),
    	array( 'text' => __( 'No service interruption since I signed up. Reliable, fast, and the support tickets get answered quickly.', 'jannatit' ), 'who' => 'Kim T. — U.A.E.' ),
    	array( 'text' => __( "Best value I've found for Windows RDP. Setup took minutes and pricing is transparent, no surprises.", 'jannatit' ), 'who' => 'Peter J. — Canada' ),
    );
    ?>
    <div class="test-grid">
      <?php foreach ( $reviews as $r ) : ?>
        <div class="test">
          <span class="stars">★★★★★</span>
          <p>&ldquo;<?php echo esc_html( $r['text'] ); ?>&rdquo;</p>
          <div class="who"><?php echo esc_html( $r['who'] ); ?></div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section-alt" id="faq">
  <div class="wrap">
    <div class="head-row">
      <p class="eyebrow"><?php esc_html_e( 'FAQ', 'jannatit' ); ?></p>
      <h2><?php esc_html_e( 'Frequently Asked Questions', 'jannatit' ); ?></h2>
    </div>

    <?php
    $faqs = array(
    	array( 'q' => __( 'Is your VPS/RDP hosting managed or unmanaged?', 'jannatit' ), 'a' => __( "All plans are unmanaged by default. Managed add-ons are available if you'd like us to handle patching and monitoring.", 'jannatit' ) ),
    	array( 'q' => __( 'Can I upgrade my plan later?', 'jannatit' ), 'a' => __( 'Yes — upgrades apply instantly with a short reboot, and billing is prorated to the day.', 'jannatit' ) ),
    	array( 'q' => __( 'Do you offer a money-back guarantee?', 'jannatit' ), 'a' => __( 'Yes, every plan includes a 7-day money-back guarantee, no questions asked.', 'jannatit' ) ),
    	array( 'q' => __( 'Can I join the affiliate program?', 'jannatit' ), 'a' => __( 'Yes — earn a 20% recurring commission on every sale through your referral link.', 'jannatit' ) ),
    );
    ?>
    <?php foreach ( $faqs as $i => $faq ) : ?>
      <div class="faq-item<?php echo 0 === $i ? ' open' : ''; ?>">
        <button class="faq-q"><?php echo esc_html( $faq['q'] ); ?><span class="ind">+</span></button>
        <div class="faq-a"<?php echo 0 === $i ? ' style="max-height:100px;"' : ''; ?>>
          <p><?php echo esc_html( $faq['a'] ); ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>

<?php
get_footer();

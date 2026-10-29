Jannatit WordPress Theme (Fire/Flame edition)
==============================================

INSTALL
1. In WordPress: Appearance > Themes > Add New > Upload Theme.
2. Upload jannatit-theme.zip, then click Activate.

WHAT'S INCLUDED
- style.css        Theme stylesheet + required theme header (dark bg, flame-orange accent)
- functions.php    Enqueues styles/fonts/JS, registers nav menus + a footer widget area
- header.php       Promo bar + sticky nav header
- footer.php       CTA band + 4-column footer
- front-page.php   The full landing page: hero, trust badges, Windows RDP plan cards,
                    Linux VPS plan cards, flag-based data center list, "Why us" grid,
                    review cards, FAQ accordion
- index.php        Fallback blog listing
- single.php       Single blog post
- page.php         Static page
- archive.php      Category/tag/date archives
- 404.php          Not found page
- assets/front.js  FAQ accordion + pricing period tab toggle

BEFORE YOU LAUNCH
- All plan names, specs, prices, and "SAVE %" numbers live in the $rdp_plans and
  $vps_plans arrays near the top of the two plan sections in front-page.php —
  edit those arrays to change your real pricing.
- The country list under "Data Centers" is the $countries array in front-page.php —
  add/remove flag-emoji + name pairs to match your actual regions.
- FAQ questions/answers are the $faqs array in front-page.php.
- "Order Now" and "Create Account" buttons link to "#" — point them at your real
  cart/checkout or WHMCS URLs.
- The review score badges (HostAdvice, Trustpilot, ScamAdviser) and the customer
  quotes are placeholders — replace with your own real ratings and testimonials
  before publishing; don't leave placeholder review scores live on a real site.
- Fonts (Manrope, Inter) load from Google Fonts by default — self-host them if you
  don't want that dependency.
- No screenshot.png is included; add a 1200x900 PNG named screenshot.png in the
  theme root for a thumbnail in Appearance > Themes.

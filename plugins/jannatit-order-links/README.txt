=== JannatIT Order Links ===
Contributors: JannatIT
Tags: order links, WHMCS, RDPGround
Requires at least: 6.4
Tested up to: 7.1
Stable tag: 1.0.0
License: GPLv2 or later

Change every RDPGround "Order now" button link, the Client area link and the Cart link from the WordPress admin, without editing the active theme or the RDPGround Site plugin.

== Description ==

RDPGround Site builds its pricing buttons from code, not from page editor blocks, so WordPress has no built-in field to change a button link. This companion plugin adds one:

* Dashboard > Order Links — one admin page, all plans in groups.
* Per plan: paste a full URL (https://...) for an external destination, or a WHMCS store path (for example admin-rd/2-gb-rdp) for a WHMCS destination.
* Global WHMCS / Client area base, plus separate Client area and Cart overrides.
* Leave any field empty and that button keeps its original link.
* Deactivating the plugin restores all original links, because no theme or RDPGround file is changed. Settings are kept, so reactivating restores your links.

How it works, in short: WHMCS base and store-path changes go through RDPGround's own content filter. Full external URLs are applied by replacing the exact rendered button href on the front end. No file is edited.

After saving, clear your cache plugin (for example SpeedyCache) once, so visitors see the new links immediately.

== Installation ==

1. Upload the jannatit-order-links folder to /wp-content/plugins/ (or install the zip from Plugins > Add New > Upload Plugin).
2. Activate "JannatIT Order Links".
3. Go to Dashboard > Order Links, set the links, and save.
4. Do NOT publish or activate this on the live site until the site owner has reviewed it.

== Frequently Asked Questions ==

= Will this change my theme? =
No. It does not touch the active theme, and it does not edit RDPGround Site files.

= What happens if I deactivate it? =
All buttons return to their original links immediately. Your saved links stay in the database and return if you reactivate.

= Can a button go to WhatsApp or Telegram? =
Yes. Paste the full https:// link for that plan. That is the full-URL mode.

== Changelog ==

= 1.0.0 =
* First version: admin Order Links page, global base, Client area and Cart overrides, per-plan full-URL and store-path modes, original-link fallback.

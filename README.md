# JannatIT Theme + Plugin Backup

Backup of the live site https://jannatit.net, taken 2026-10-29 from a
Backuply backup (wp_jannatit.net_2026-10-29_10-54-21.tar.gz, 70.57 MB,
9,942 files). Only the theme and plugin code below was pushed here —
the database dump, uploads/media, wp-config and all other site files
were deliberately NOT pushed to this public repository.

## What is in this repo

- `themes/jannatit-wordpress-theme-2/` — the ACTIVE theme at backup time:
  "Jannat IT" version 1.0.0. This is the theme to restore.
- `themes/jannatit-theme/` — the other theme folder present on the site
  at backup time ("Jannatit", NOT the active theme). Included for
  completeness only; do not activate it unless you mean to switch themes.
- `plugins/rdpground-home/` — RDPGround Site 1.1.0. CRITICAL: the live
  sales pages, header, footer, plans, contact cards and FAQ are custom
  PHP templates from this plugin, not from the theme. This copy includes
  the 2026-10-29 edits: JannatIT logo in the header (52px) and footer
  (40px), the front-end rebrand (no visible RDPGround branding), and the
  restored contact entries (Telegram, email, Signal, socials, hero and
  FAQ buttons).
- `plugins/jannatit-order-links/` — JannatIT Order Links 1.0.0, the
  companion plugin that makes every "Order now" button link changeable
  from WordPress admin. Live setting at backup time: only the global
  WHMCS base set to https://rdpground.net/clientarea/
- `plugins/jannatit-contact-links/` — JannatIT Contact Links 1.0.0, the
  companion plugin that makes Telegram, email, Signal, WhatsApp,
  Facebook, Instagram, LinkedIn and Teams links changeable from
  WordPress admin. Live setting at backup time: all fields empty, so
  the restored original links are shown.
- `plugins-required.txt` — the full list of plugins that must be
  installed for the theme to work, with versions and notes.

## How to restore

1. Upload each folder to the matching place on the new WordPress site:
   themes go to `wp-content/themes/`, plugins go to
   `wp-content/plugins/`.
2. Activate the "Jannat IT" theme (folder `jannatit-wordpress-theme-2`)
   and activate the plugins above, plus the other plugins listed in
   `plugins-required.txt`.
3. Clear the cache (SpeedyCache on the live site) after restoring.
4. If a future RDPGround Site plugin update overwrites
   `plugins/rdpground-home/templates/`, restore those template files
   from this repo before re-applying the update — the header logo,
   rebrand and contact-restore edits live in those files.

## What this backup does NOT contain

- No database, no user accounts, no passwords, no orders and no media
  uploads. A theme/plugin restore alone does not restore site content;
  use a full Backuply backup for that.
- Order now / Client area links intentionally go to the rdpground.net
  WHMCS portal (decision 2026-10-28: keep RDPGround WHMCS for now).

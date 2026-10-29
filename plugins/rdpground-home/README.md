# RDPGround Site

The redesigned RDPGround pages as WordPress page templates. It runs alongside the existing Hoskia theme: only pages set to one of these templates change, and every other page stays as it is.

## Install

1. In WordPress, go to **Plugins → Add New → Upload Plugin**, upload `rdpground-home.zip`, then click **Activate**. If an older version is installed, WordPress offers to replace it.
2. Edit each page below and set **Page Attributes → Template** to the matching template. The page's existing content is ignored by every template except Contact and Text page, so it stays safe in case you switch back.

| Page | URL | Template |
| --- | --- | --- |
| Home | `/` | RDPGround: Home |
| Admin RDP | `/admin-rdp/` | RDPGround: Admin RDP |
| Private RDP | `/private-rdp/` | RDPGround: Private RDP |
| KVM VPS | `/vps-hosting/` | RDPGround: Linux VPS |
| cPanel Hosting | `/cpanel-hosting/` | RDPGround: cPanel Hosting |
| Reseller Hosting | `/reseller-hosting/` | RDPGround: Reseller Hosting |
| Dedicated Server | `/dedicated-server/` | RDPGround: Dedicated Servers |
| Domain | `/domain/` | RDPGround: Domains |
| Mail Sender | `/software/` | RDPGround: Business Email |
| Info (Contact Us) | `/info/` | RDPGround: Contact |
| Terms, Privacy, Acceptable Use, Refund, Report Abuse, Partners | | RDPGround: Text page |

3. For the homepage: create a new page with the **RDPGround: Home** template, preview it, then set it under **Settings → Reading → Homepage**.

To roll back a page, set its template back to the theme's default.

## Editing content

- `includes/content.php`: plans, prices, WHMCS order links, service cards, locations, stats, homepage FAQ and contact details. Each plan's `order` value is the WHMCS store path from its order link (`/clientarea/index.php?rp=/store/<order>`). The "from $X" prices are worked out from the plans automatically.
- `includes/pages.php`: headlines, intro text, key facts, features, FAQ and related services for the product, Domains, Business Email and Contact pages.
- Contact and Text pages: the page content is edited in WordPress as usual.
- `templates/`: homepage headlines and section text. Header and footer links are in `templates/parts/`.

## How it works with the theme

On pages using these templates, the plugin removes the theme's stylesheets and scripts, Hoskia's dynamic option CSS, and the WPBakery, Mega Menu and WooCommerce styles, so they can't restyle the design. Everything that hooks into `wp_head` and `wp_footer` still loads, including SEO tags, the Tawk.to chat, the cookie notice and the admin bar.

Filters:

- `rdpg_home_blocked_asset_paths`: URL path fragments of styles and scripts to remove.
- `rdpg_home_strip_style_ids`: IDs of inline `<style>` blocks to strip from the head.
- `rdpg_home_content` and `rdpg_home_pages`: change content from `includes/content.php` or `includes/pages.php` in code.

=== FlashProof Sales Popup for Woo ===
Contributors: michaelnnahdev
Donate link: https://portfolio.michaelnnah.com/
Tags: sales-popup, sales-notification, social-proof, recent-sales, ecommerce
Requires at least: 6.0
Tested up to: 7.1
Requires PHP: 7.4
Requires Plugins: woocommerce
Stable tag: 1.2.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Zero-dependency, high-performance live sales notification popup system for Woo stores.

== Description ==

Boost store trust and conversions with clean, non-intrusive recent order notifications. Designed specifically for stores requiring ultra-fast execution, zero external JavaScript libraries, and total layout customization.

= Key Features =

* **Native Woo Integration**: Automatically queries recent orders using standard WooCommerce CRUD APIs.
* **Custom Screen Placement**: Select between Bottom-Left and Bottom-Right display positions.
* **Smart Mobile Clearance**: Configure dedicated viewport offsets to clear sticky checkout bars, cart drawers, and floating chat buttons.
* **Aesthetic Customization**: Direct HEX color inputs, verified badge tints, and typography font inheritance.
* **Performance Optimized**: Sub-3KB pure Vanilla JavaScript frontend engine with native transient caching to eliminate unnecessary database queries.

== Installation ==

= From the WordPress Dashboard =
1. Navigate to **Plugins** > **Add New**.
2. Search for `FlashProof Sales Popup for Woo` or upload the plugin zip file.
3. Click **Install Now**, then **Activate**.
4. Go to **WooCommerce** > **Social Proof** to configure display timing, colors, and layout offsets.

= Manual FTP / SFTP Installation =
1. Upload the unzipped `flashproof-sales-popup-for-woo` directory to your `/wp-content/plugins/` directory.
2. Activate the plugin via the **Plugins** screen in your WordPress dashboard.
3. Access configuration settings under **WooCommerce** > **Social Proof**.

== Frequently Asked Questions ==

= Does this plugin track or expose personal customer data? =
The plugin queries completed WooCommerce store orders and displays only the customer's first name alongside their general location (city and country, e.g., "Sarah from Toronto"). Sensitive personal identifiers—including full surnames, telephone numbers, billing addresses, street addresses, and payment details—are never accessed, queried, or exposed.

= Will this slow down my store database? =
No. Recent order queries are cached in memory using WordPress native transients (default 5 minutes), ensuring incoming visitor traffic never triggers redundant database overhead.

= Can I use this without jQuery? =
Yes. The entire frontend engine is written in pure vanilla JavaScript and requires no external JavaScript libraries or runtime frameworks.

== External services ==

This plugin optionally connects to an external service on michaelnnah.com to handle user opt-in updates and newsletter subscriptions from the admin settings page.

* Service: FlashProof Developer Updates & Newsletter API
* Provider: Michael Nnah (https://portfolio.michaelnnah.com/)
* Purpose: Transmits an administrator email address solely when the store administrator explicitly submits the optional email opt-in form on the plugin settings screen.
* Data Sent: Administrator name and email address. No store customer data, order details, or sensitive metadata is ever transmitted.
* Terms of Service: https://portfolio.michaelnnah.com/
* Privacy Policy: https://portfolio.michaelnnah.com/

== Screenshots ==

1. Frontend social proof notification banner floating cleanly above mobile navigation.
2. Position and layout controls inside the WooCommerce settings dashboard.
3. Visual styling and color customizer controls.

== Changelog ==

= 1.2.0 =
* Renamed plugin to FlashProof Sales Popup for Woo for distinctiveness and trademark compliance.
* Added desktop placement options (Bottom-Left / Bottom-Right).
* Added independent bottom-offset controls for desktop and mobile devices.
* Added mobile display scaling parameter (60% to 110%).
* Added direct HEX color code input and synchronized color pickers.
* Improved transient cache invalidation routines.
* Added "Requires Plugins: woocommerce" dependency header.

= 1.0.0 =
* Initial public release.

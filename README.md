# FlashProof Sales Popup for Woo ⚡

[![WordPress Plugin Directory](https://img.shields.io/badge/WordPress.org-Plugin-blue.svg)](https://wordpress.org/plugins/flashproof-sales-popup-for-woo/)
[![License: GPL v2](https://img.shields.io/badge/License-GPL%20v2-green.svg)](https://www.gnu.org/licenses/gpl-2.0.html)
[![PHP Version](https://img.shields.io/badge/PHP-7.4%2B-blueviolet.svg)](https://www.php.net/)
[![Requires Plugins](https://img.shields.io/badge/Requires%20Plugins-WooCommerce-96588a.svg)](https://woocommerce.com/)

A lightweight, zero-dependency sales notification popup system for WooCommerce stores. FlashProof displays verified, recent order notifications with accurate relative timestamps while using transient memory caching to eliminate unnecessary database strain.

## Key Features

- **Built-in Admin Dashboard:** Fully configurable via **WooCommerce > Social Proof** with HEX inputs, synchronized color pickers, and live timing adjustments.
- **Desktop & Mobile Clearance Offsets:** Independent viewport offsets ensure the popup floats cleanly above sticky mobile checkout bars, cart drawers, and floating chat icons.
- **Placement Flexibility:** Toggle between Bottom-Left and Bottom-Right display positions.
- **UTC Timezone Synchronization:** Matches WooCommerce order creation timestamps directly against UTC `time()` to eliminate skewed or negative "minutes ago" calculations across any server timezone.
- **Low Database Overhead:** Employs a customizable WordPress transient cache (`wclsp_social_proof_cache`) so incoming storefront visitors never trigger repetitive SQL queries.
- **Pure Vanilla JS Engine:** Sub-3KB client script footprint with zero dependencies on jQuery or external tracking servers.
- **Data Privacy by Design:** Only queries and displays buyer first names and general locations (city/country). Full surnames, street addresses, billing specifics, and payment details are never retrieved or exposed.
- **Security Hardened:** AJAX endpoints are nonce-verified, admin script data is injected via `wp_add_inline_script()` with `wp_json_encode()`, and all outputs are escaped with strict context wrappers.

## Repository Structure

```text
flashproof-sales-popup-for-woo/
├── assets/
│   ├── css/
│   │   └── social-proof.css
│   └── js/
│       └── social-proof.js
├── includes/
│   ├── class-social-proof-admin.php
│   └── class-social-proof-ajax.php
├── templates/
│   └── popup-markup.php
├── .gitignore
├── LICENSE
├── README.md
├── readme.txt
└── woocommerce-lightweight-social-proof.php

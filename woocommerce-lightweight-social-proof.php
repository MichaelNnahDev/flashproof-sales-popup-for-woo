<?php
/**
 * Plugin Name:       FlashProof Sales Popup for Woo
 * Plugin URI:        https://wclsp.michaelnnah.com/
 * Description:       Zero-dependency, high-performance live sales notification popup system for Woo stores.
 * Version:           1.2.0
 * Requires at least: 6.0
 * Requires PHP:      7.4
 * Requires Plugins:  woocommerce
 * Author:            Michael Nnah
 * Author URI:        https://portfolio.michaelnnah.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       flashproof-sales-popup-for-woo
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'WCLSP_VERSION', '1.2.0' );
define( 'WCLSP_PATH', plugin_dir_path( __FILE__ ) );
define( 'WCLSP_URL', plugin_dir_url( __FILE__ ) );

// 1. Load classes
require_once WCLSP_PATH . 'includes/class-social-proof-ajax.php';
require_once WCLSP_PATH . 'includes/class-social-proof-admin.php';

// 2. Initialize AJAX Handler
if ( class_exists( 'WCLSP_Social_Proof_Ajax' ) ) {
    WCLSP_Social_Proof_Ajax::init();
}

// 3. Initialize Admin settings
if ( is_admin() && class_exists( 'WCLSP_Social_Proof_Admin' ) ) {
    WCLSP_Social_Proof_Admin::init();
}

// 4. WooCommerce compatibility check
add_action( 'admin_notices', 'wclsp_check_woocommerce_dependency' );

function wclsp_check_woocommerce_dependency() {
    if ( ! class_exists( 'WooCommerce' ) && current_user_can( 'activate_plugins' ) ) {
        ?>
        <div class="notice notice-error is-dismissible">
            <p><strong>FlashProof Sales Popup for Woo</strong> requires <strong>WooCommerce</strong> to be installed and active.</p>
        </div>
        <?php
    }
}

// 5. Enqueue frontend scripts & styles
add_action( 'wp_enqueue_scripts', 'wclsp_enqueue_frontend_assets' );

function wclsp_enqueue_frontend_assets() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        return;
    }

    $options = get_option( 'wclsp_settings', array() );

    // Skip loading assets if popup is explicitly disabled
    if ( isset( $options['enable_popup'] ) && ! $options['enable_popup'] ) {
        return;
    }

    wp_enqueue_style(
        'wclsp-frontend-css',
        WCLSP_URL . 'assets/css/social-proof.css',
        array(),
        WCLSP_VERSION
    );

    wp_enqueue_script(
        'wclsp-frontend-js',
        WCLSP_URL . 'assets/js/social-proof.js',
        array(),
        WCLSP_VERSION,
        true
    );

    // Map configuration values (seconds converted to milliseconds for JS)
    $initial_delay    = ( isset( $options['initial_delay'] ) && is_numeric( $options['initial_delay'] ) ) ? (int) $options['initial_delay'] * 1000 : 6000;
    $display_duration = ( isset( $options['display_duration'] ) && is_numeric( $options['display_duration'] ) ) ? (int) $options['display_duration'] * 1000 : 6000;
    $min_interval     = ( isset( $options['min_interval'] ) && is_numeric( $options['min_interval'] ) ) ? (int) $options['min_interval'] * 1000 : 15000;
    $max_interval     = ( isset( $options['max_interval'] ) && is_numeric( $options['max_interval'] ) ) ? (int) $options['max_interval'] * 1000 : 30000;

    wp_localize_script(
        'wclsp-frontend-js',
        'wclspData',
        array(
            'ajaxUrl'         => admin_url( 'admin-ajax.php' ),
            'nonce'           => wp_create_nonce( 'wclsp_sales_nonce' ),
            'initialDelay'    => $initial_delay,
            'displayDuration' => $display_duration,
            'minInterval'     => $min_interval,
            'maxInterval'     => $max_interval,
        )
    );
}

// 6. Inject popup markup container into footer
add_action( 'wp_footer', 'wclsp_render_popup_markup' );

function wclsp_render_popup_markup() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        return;
    }

    $options = get_option( 'wclsp_settings', array() );
    if ( isset( $options['enable_popup'] ) && ! $options['enable_popup'] ) {
        return;
    }

    $template = WCLSP_PATH . 'templates/popup-markup.php';
    if ( file_exists( $template ) ) {
        include $template;
    }
}

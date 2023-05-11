<?php

/**
 * Plugin Name: WooCommerce All Products For Subscriptions Extension
 * Plugin URI: https://github.com/anasuddinpk/woocommerce-all-products-for-subscriptions-extension
 * Description: Made for customizing the WooCommerce Subscription's extension: WooCommerce All Products for Subscriptions.
 * Version: 1.0.0.1
 * Author: Anas Uddin
 * Author URI: https://www.linkedin.com/in/anasuddinpk/
 * Text Domain: woocommerce-all-products-for-subscriptions-extension
 *
 * @package woocommerce-all-products-for-subscriptions-extension
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'WCAPFSE_PLUGIN_DIR' ) ) {
	define( 'WCAPFSE_PLUGIN_DIR', __DIR__ );
}

if ( ! defined( 'WCAPFSE_PLUGIN_DIR_URL' ) ) {
	define( 'WCAPFSE_PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
}

if ( ! defined( 'WCAPFSE_ABSPATH' ) ) {
	define( 'WCAPFSE_ABSPATH', dirname( __FILE__ ) );
}

require_once WCAPFSE_ABSPATH . '/includes/class-wcapfse-loader.php';
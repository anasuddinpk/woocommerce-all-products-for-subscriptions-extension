<?php
/**
 * Plugin's Main Loader.
 *
 * @package woocommerce-all-products-for-subscriptions-extension
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WCAPFSE_Loader' ) ) {
	/**
	 * Class WCAPFSE_Loader.
	 */
	class WCAPFSE_Loader {


		/**
		 *  Constructor.
		 */
		public function __construct() {
            $this->includes();
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripting_files' ) );
		}

		/**
		 * Includes files depend on platform.
		 */
		public function includes() {
            include 'class-wcapse-subscription-eligibility.php';
		}

		/**
		 * Enqueuing the jQuery file.
		 */
		public function enqueue_scripting_files() {
			// Enqueuing Starter Liquid Totalizer's jQuery.
			wp_enqueue_script( 'wcapse-script', plugin_dir_url( __DIR__ ) . 'assets/js/wcapse-script.js', array( 'jquery' ), wp_rand() );
		}
	}

	new WCAPFSE_Loader();
}



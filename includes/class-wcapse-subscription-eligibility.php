<?php
/**
 * Subscription Eligibility Check.
 *
 * @package woocommerce-all-products-for-subscriptions-extension
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WCAPFSE_Subscription_Eligibility' ) ) {
	/**
	 * Class WCAPFSE_Subscription_Eligibility.
	 */
	class WCAPFSE_Subscription_Eligibility {

		/**
		 *  Constructor.
		 */
		public function __construct() {
            add_filter( 'woocommerce_variation_is_subscription', array($this, 'make_variation_subscription_eligible'), 10, 2 );
		}

		/**
		 * Subscription Eligibility Checking.
         * 
         * @param Array $eligible
         * @param String $variation
         * @return Array $eligible
		 */
		public function make_variation_subscription_eligible( $eligible, $variation ) {
            $parent_id = $variation->get_parent_id();
            $variation_id = $variation->get_id();
        
            // Set the variation ID that should be subscription eligible
            $subscription_variation_id = "123";
        
            if ( $variation_id !== $subscription_variation_id && $parent_id ) {
                $product = wc_get_product( $parent_id );
                $variations = $product->get_available_variations();
                $matching_variation = null;
        
                foreach ( $variations as $available_variation ) {
                    if ( $available_variation['variation_id'] == $subscription_variation_id ) {
                        $matching_variation = $available_variation;
                        break;
                    }
                }
        
                if ( $matching_variation ) {
                    // Get attributes of the matching subscription variation
                    $subscription_attributes = $matching_variation['attributes'];
        
                    // Check if variation attributes match the subscription variation
                    $variation_attributes = $variation->get_variation_attributes();
                    $match = true;
                    foreach ( $subscription_attributes as $attribute_name => $attribute_value ) {
                        if ( ! isset( $variation_attributes[ $attribute_name ] ) || $variation_attributes[ $attribute_name ] != $attribute_value ) {
                            $match = false;
                            break;
                        }
                    }
        
                    // Make the variation not subscription eligible if it does not match the subscription variation
                    if ( ! $match ) {
                        $eligible = false;
                    }
                }
            }
        
            return $eligible;
        }
	}

	new WCAPFSE_Subscription_Eligibility();
}
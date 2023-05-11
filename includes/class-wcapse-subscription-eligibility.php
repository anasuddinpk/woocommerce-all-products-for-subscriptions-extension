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
            //add_filter( 'woocommerce_variation_is_subscription', array($this, 'make_variation_subscription_eligible'), 10, 2 );
            add_action( 'wp_footer', array($this, 'cart_update_qty_script')); 
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


        public function cart_update_qty_script() { 
            if (is_page( 236 )){
            ?> 
            <script>

                jQuery(window).on('load', function () {
                    jQuery(".cart_item").each(function () {
                        let pname = jQuery(this).find('.product-title').text();
                        if (pname === "HYDR8ION Electrocaps - 90ct Bottle Subscription Always 20% Off") {
                            jQuery(this).find('.wcsatt-options input[value=1_month]').attr('checked', 'checked').trigger('change');
                            timeout = setTimeout(function () {
                                jQuery('.fusion-update-cart').trigger('click');
                            }, 10);

                        }
                    });
                });

                jQuery('input[name="cart[d081f471eab6ebf39af7b786b9dd71fe][convert_to_sub]"][value="0"]').parent().parent().remove();
                //jQuery('input[name="cart[d081f471eab6ebf39af7b786b9dd71fe][convert_to_sub]"][value="1_month"]').prop("checked", true);

                jQuery('input[name="cart[41150296cd621a7bcefb547ca09151a8][convert_to_sub]"][value="0"]').parent().parent().css('padding-left', '17px');
                jQuery('input[name="cart[41150296cd621a7bcefb547ca09151a8][convert_to_sub]"][value="1_month"]').parent().parent().remove();
                jQuery('input[name="cart[41150296cd621a7bcefb547ca09151a8][convert_to_sub]"][value="3_month"]').parent().parent().remove();
                jQuery('input[name="cart[41150296cd621a7bcefb547ca09151a8][convert_to_sub]"][value="0"]').prop("checked", true);
                jQuery('input[name="cart[41150296cd621a7bcefb547ca09151a8][convert_to_sub]"][value="0"]').hide();

                jQuery('input[name="cart[c9e3e0934f14ac0223a5cfd18cd20d19][convert_to_sub]"][value="0"]').parent().parent().css('padding-left', '17px');
                jQuery('input[name="cart[c9e3e0934f14ac0223a5cfd18cd20d19][convert_to_sub]"][value="1_month"]').parent().parent().remove();
                jQuery('input[name="cart[c9e3e0934f14ac0223a5cfd18cd20d19][convert_to_sub]"][value="3_month"]').parent().parent().remove();
                jQuery('input[name="cart[c9e3e0934f14ac0223a5cfd18cd20d19][convert_to_sub]"][value="0"]').prop("checked", true);
                jQuery('input[name="cart[c9e3e0934f14ac0223a5cfd18cd20d19][convert_to_sub]"][value="0"]').hide();

                jQuery('input[name="cart[91695e946cfba1896f8837f46fceab15][convert_to_sub]"][value="0"]').parent().parent().css('padding-left', '17px');
                jQuery('input[name="cart[91695e946cfba1896f8837f46fceab15][convert_to_sub]"][value="1_month"]').parent().parent().remove();
                jQuery('input[name="cart[91695e946cfba1896f8837f46fceab15][convert_to_sub]"][value="3_month"]').parent().parent().remove();
                jQuery('input[name="cart[91695e946cfba1896f8837f46fceab15][convert_to_sub]"][value="0"]').prop("checked", true);
                jQuery('input[name="cart[91695e946cfba1896f8837f46fceab15][convert_to_sub]"][value="0"]').hide();

                jQuery('input[name="cart[6bc67681b42b5b53b1ef02a64f23ee8e][convert_to_sub]"][value="0"]').parent().parent().css('padding-left', '17px');
                jQuery('input[name="cart[6bc67681b42b5b53b1ef02a64f23ee8e][convert_to_sub]"][value="1_month"]').parent().parent().remove();
                jQuery('input[name="cart[6bc67681b42b5b53b1ef02a64f23ee8e][convert_to_sub]"][value="3_month"]').parent().parent().remove();
                jQuery('input[name="cart[6bc67681b42b5b53b1ef02a64f23ee8e][convert_to_sub]"][value="0"]').prop("checked", true);

                jQuery('input[name="cart[6bc67681b42b5b53b1ef02a64f23ee8e][convert_to_sub]"][value="0"]').hide();

            </script>
            <?php 
            }
        }

	}

	new WCAPFSE_Subscription_Eligibility();
}
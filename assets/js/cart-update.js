/**
 * Script for WooCommerce All Products For Subscriptions Extension.
 *
 * @package woocommerce-all-products-for-subscriptions-extension
 */

jQuery(document).ready(
    function ($) {

        console.log("before running cart js..")

        // Get the cart item key and quantity
        var cart_item_key = $(this).attr('data-cart_item_key');

        // Trigger AJAX call to update cart
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'my_update_cart',
                cart_item_key: cart_item_key
            },
            success: function (response) {
                // Update cart totals and messages
                $('.cart-subtotal').html(response.data.subtotal);
                $('.cart-total').html(response.data.cart_total);
                $('.cart-count').html(response.data.cart_count);
            },
            error: function (error) {
                console.log(error);
            }
        });

        console.log("before running cart js..")

    }
);
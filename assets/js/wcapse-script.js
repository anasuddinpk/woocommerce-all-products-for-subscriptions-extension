/**
 * Script for WooCommerce All Products For Subscriptions Extension.
 *
 * @package woocommerce-all-products-for-subscriptions-extension
 */

jQuery(document).ready(
    function ($) {

        //On Cart Page
        $('input[name="cart[d081f471eab6ebf39af7b786b9dd71fe][convert_to_sub]"][value="0"]').parent().parent().remove();
        $('input[name="cart[d081f471eab6ebf39af7b786b9dd71fe][convert_to_sub]"][value="1_month"]').prop("checked", true);

        $('input[name="cart[41150296cd621a7bcefb547ca09151a8][convert_to_sub]"][value="0"]').parent().parent().css('padding-left', '17px');
        $('input[name="cart[41150296cd621a7bcefb547ca09151a8][convert_to_sub]"][value="1_month"]').parent().parent().remove();
        $('input[name="cart[41150296cd621a7bcefb547ca09151a8][convert_to_sub]"][value="3_month"]').parent().parent().remove();
        $('input[name="cart[41150296cd621a7bcefb547ca09151a8][convert_to_sub]"][value="0"]').prop("checked", true);
        $('input[name="cart[41150296cd621a7bcefb547ca09151a8][convert_to_sub]"][value="0"]').hide();

        $('input[name="cart[c9e3e0934f14ac0223a5cfd18cd20d19][convert_to_sub]"][value="0"]').parent().parent().css('padding-left', '17px');
        $('input[name="cart[c9e3e0934f14ac0223a5cfd18cd20d19][convert_to_sub]"][value="1_month"]').parent().parent().remove();
        $('input[name="cart[c9e3e0934f14ac0223a5cfd18cd20d19][convert_to_sub]"][value="3_month"]').parent().parent().remove();
        $('input[name="cart[c9e3e0934f14ac0223a5cfd18cd20d19][convert_to_sub]"][value="0"]').prop("checked", true);
        $('input[name="cart[c9e3e0934f14ac0223a5cfd18cd20d19][convert_to_sub]"][value="0"]').hide();

        $('input[name="cart[91695e946cfba1896f8837f46fceab15][convert_to_sub]"][value="0"]').parent().parent().css('padding-left', '17px');
        $('input[name="cart[91695e946cfba1896f8837f46fceab15][convert_to_sub]"][value="1_month"]').parent().parent().remove();
        $('input[name="cart[91695e946cfba1896f8837f46fceab15][convert_to_sub]"][value="3_month"]').parent().parent().remove();
        $('input[name="cart[91695e946cfba1896f8837f46fceab15][convert_to_sub]"][value="0"]').prop("checked", true);
        $('input[name="cart[91695e946cfba1896f8837f46fceab15][convert_to_sub]"][value="0"]').hide();

        //On Shop Page
        $('.woovr-variation').click(function () {
            $.fn.getSelectedRadio(this);
        });

        $('.woovr-variation-selector input[type="radio"]').click(function () {
            $.fn.getSelectedRadio(this);
        });

        $.fn.getSelectedRadio = function (value) {
            var parentDataId = $(value).closest('.woovr-variation').data('id');

            if (parentDataId == 1083) {
                $('div.single_variation_wrap button[type="submit"]').text("Subscribe");
            }
            else {
                $('div.single_variation_wrap button[type="submit"]').text("Add to cart");
            }
        }

        console.log("WooCommerce All Products For Subscriptions Extension running..")

        jQuery(document).on('updated_cart_totals', function () {
            $('input[name="cart[d081f471eab6ebf39af7b786b9dd71fe][convert_to_sub]"][value="0"]').parent().parent().remove();
            $('input[name="cart[d081f471eab6ebf39af7b786b9dd71fe][convert_to_sub]"][value="1_month"]').prop("checked", true);

            $('input[name="cart[41150296cd621a7bcefb547ca09151a8][convert_to_sub]"][value="0"]').parent().parent().css('padding-left', '17px');
            $('input[name="cart[41150296cd621a7bcefb547ca09151a8][convert_to_sub]"][value="1_month"]').parent().parent().remove();
            $('input[name="cart[41150296cd621a7bcefb547ca09151a8][convert_to_sub]"][value="3_month"]').parent().parent().remove();
            $('input[name="cart[41150296cd621a7bcefb547ca09151a8][convert_to_sub]"][value="0"]').prop("checked", true);
            $('input[name="cart[41150296cd621a7bcefb547ca09151a8][convert_to_sub]"][value="0"]').hide();

            $('input[name="cart[c9e3e0934f14ac0223a5cfd18cd20d19][convert_to_sub]"][value="0"]').parent().parent().css('padding-left', '17px');
            $('input[name="cart[c9e3e0934f14ac0223a5cfd18cd20d19][convert_to_sub]"][value="1_month"]').parent().parent().remove();
            $('input[name="cart[c9e3e0934f14ac0223a5cfd18cd20d19][convert_to_sub]"][value="3_month"]').parent().parent().remove();
            $('input[name="cart[c9e3e0934f14ac0223a5cfd18cd20d19][convert_to_sub]"][value="0"]').prop("checked", true);
            $('input[name="cart[c9e3e0934f14ac0223a5cfd18cd20d19][convert_to_sub]"][value="0"]').hide();

            $('input[name="cart[91695e946cfba1896f8837f46fceab15][convert_to_sub]"][value="0"]').parent().parent().css('padding-left', '17px');
            $('input[name="cart[91695e946cfba1896f8837f46fceab15][convert_to_sub]"][value="1_month"]').parent().parent().remove();
            $('input[name="cart[91695e946cfba1896f8837f46fceab15][convert_to_sub]"][value="3_month"]').parent().parent().remove();
            $('input[name="cart[91695e946cfba1896f8837f46fceab15][convert_to_sub]"][value="0"]').prop("checked", true);
            $('input[name="cart[91695e946cfba1896f8837f46fceab15][convert_to_sub]"][value="0"]').hide();
        });

    }
);


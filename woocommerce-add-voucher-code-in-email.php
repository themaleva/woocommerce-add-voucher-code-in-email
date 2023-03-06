<?php
/**
 * Plugin Name: WooCommerce Add Voucher Code in Email
 * Description: Inserts the used voucher code into WooCommerce emails.
 * Version: 1.0
 * Author: Mark Smith
 * Author URI: https://themaleva.co.uk
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Insert the used voucher code into WooCommerce emails
function insert_used_voucher_code_in_emails( $order, $sent_to_admin, $plain_text, $email ) {
    // Get the applied coupon codes for the order
    $applied_coupons = $order->get_used_coupons();

    // Check if there are applied coupon codes
    if ( ! empty( $applied_coupons ) ) {
        // Get the first applied coupon code
        $used_coupon_code = reset( $applied_coupons );

        // Display the used coupon code in the email
        echo '<p><strong>Used Voucher Code:</strong> ' . $used_coupon_code . '</p>';
    }
}
add_action( 'woocommerce_email_after_order_table', 'insert_used_voucher_code_in_emails', 10, 4 );

<?php
/**
 * Plugin Name: WooCommerce Justifi Payment Gateway
 * Plugin URI: https://your-plugin-website.com/
 * Description: Adds Justifi as a payment gateway for WooCommerce.
 * Author: Your Name
 * Author URI: https://your-website.com/
 * Version: 1.0.0
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Add the Justifi payment gateway class to WooCommerce
add_filter('woocommerce_payment_gateways', 'add_justifi_gateway');
function add_justifi_gateway($gateways)
{
    $gateways[] = 'WC_Justifi_Gateway';
    return $gateways;
}

// Initialize the Justifi gateway class
add_action('plugins_loaded', 'init_justifi_gateway');
function init_justifi_gateway()
{
    class WC_Justifi_Gateway extends WC_Payment_Gateway
    {
        // Gateway constructor
        public function __construct()
        {
            $this->id = 'justifi';
            $this->icon = ''; // URL of the payment gateway icon
            $this->has_fields = false; // Set to true if you need custom fields on the checkout page
            $this->method_title = 'Justifi';
            $this->method_description = 'Pay with Justifi.';
            $this->supports = array(
                'products',
            );

            // Load the settings
            $this->init_form_fields();
            $this->init_settings();

            // Define the settings
            $this->title = $this->get_option('title');
            $this->description = $this->get_option('description');

            // Actions
            add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));
        }

        // Initialize the settings fields
        public function init_form_fields()
        {
            $this->form_fields = array(
                'enabled' => array(
                    'title' => 'Enable/Disable',
                    'label' => 'Enable Justifi',
                    'type' => 'checkbox',
                    'default' => 'no',
                ),
                'title' => array(
                    'title' => 'Title',
                    'type' => 'text',
                    'description' => 'This controls the title which the user sees during checkout.',
                    'default' => 'Justifi',
                    'desc_tip' => true,
                ),
                'description' => array(
                    'title' => 'Description',
                    'type' => 'textarea',
                    'description' => 'This controls the description which the user sees during checkout.',
                    'default' => 'Pay with Justifi.',
                ),
            );
        }

        // Process the payment
        public function process_payment($order_id)
        {
            global $woocommerce;

            // Get the order object
            $order = wc_get_order($order_id);

            // Mark the order as on-hold or pending
            $order->update_status('on-hold', __('Awaiting payment via Justifi.', 'woocommerce'));

            // Reduce stock levels
            $order->reduce_order_stock();

            // Remove cart
            $woocommerce->cart->empty_cart();

            // Redirect to the thank-you page
            return array(
                'result' => 'success',
                'redirect' => $this->get_return_url($order),
            );
        }
    }
}

<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://gabykaram.com/
 * @since             1.0.0
 * @package           Stripe_Simple_Pay_Different_Email_Per_Product
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Pay Emails per product
 * Plugin URI:        https://wpshortcuts.studio/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Gaby Karam
 * Author URI:        https://gabykaram.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       simple-pay-emails-per-product
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'STRIPE_SIMPLE_PAY_DIFFERENT_EMAIL_PER_PRODUCT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-simple-pay-emails-per-product-activator.php
 */
function activate_stripe_simple_pay_different_email_per_product() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/Stripe_Simple_Pay_Different_Email_Per_Product_Activator.php';
	Stripe_Simple_Pay_Different_Email_Per_Product_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-simple-pay-emails-per-product-deactivator.php
 */
function deactivate_stripe_simple_pay_different_email_per_product() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/Stripe_Simple_Pay_Different_Email_Per_Product_Deactivator.php';
	Stripe_Simple_Pay_Different_Email_Per_Product_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_stripe_simple_pay_different_email_per_product' );
register_deactivation_hook( __FILE__, 'deactivate_stripe_simple_pay_different_email_per_product' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/Stripe_Simple_Pay_Different_Email_Per_Product.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_stripe_simple_pay_different_email_per_product() {

	$plugin = new Stripe_Simple_Pay_Different_Email_Per_Product();
	$plugin->run();

}
run_stripe_simple_pay_different_email_per_product();

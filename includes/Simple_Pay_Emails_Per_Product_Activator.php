<?php
	
	/**
	 * Fired during plugin activation
	 *
	 * @link       https://gabykaram.com/
	 * @since      1.0.0
	 *
	 * @package    Simple_Pay_Emails_Per_Product
	 * @subpackage Simple_Pay_Emails_Per_Product/includes
	 */
	
	/**
	 * Fired during plugin activation.
	 *
	 * This class defines all code necessary to run during the plugin's activation.
	 *
	 * @since      1.0.0
	 * @package    Simple_Pay_Emails_Per_Product
	 * @subpackage Simple_Pay_Emails_Per_Product/includes
	 * @author     Gaby Karam <gaby@wpshortcuts.studio>
	 */
	class Simple_Pay_Emails_Per_Product_Activator {
		
		/**
		 * Short Description. (use period)
		 *
		 * Long Description.
		 *
		 * @since    1.0.0
		 */
		public static function activate() {
			if (
			( ! is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) && ! is_plugin_active( 'advanced-custom-fields/acf.php' ) ) ) {
				// Stop activation redirect and show error
				wp_die( 'Sorry, but this plugin requires the Advanced custom field to be available and active. <br><a href="' . admin_url( 'plugins.php' ) . '">&laquo; Return to Plugins</a>' );
			}
		}
		
	}

<?php
	
	/**
	 * The admin-specific functionality of the plugin.
	 *
	 * @link       https://gabykaram.com/
	 * @since      1.0.0
	 *
	 * @package    Stripe_Simple_Pay_Different_Email_Per_Product
	 * @subpackage Stripe_Simple_Pay_Different_Email_Per_Product/admin
	 */
	
	/**
	 * The admin-specific functionality of the plugin.
	 *
	 * Defines the plugin name, version, and two examples hooks for how to
	 * enqueue the admin-specific stylesheet and JavaScript.
	 *
	 * @package    Stripe_Simple_Pay_Different_Email_Per_Product
	 * @subpackage Stripe_Simple_Pay_Different_Email_Per_Product/admin
	 * @author     Gaby Karam <gaby@wpshortcuts.studio>
	 */
	class Stripe_Simple_Pay_Different_Email_Per_Product_Admin {
		
		/**
		 * The ID of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string $plugin_name The ID of this plugin.
		 */
		private $plugin_name;
		
		/**
		 * The version of this plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 * @var      string $version The current version of this plugin.
		 */
		private $version;
		
		/**
		 * Initialize the class and set its properties.
		 *
		 * @param string $plugin_name The name of this plugin.
		 * @param string $version The version of this plugin.
		 *
		 * @since    1.0.0
		 */
		public function __construct( $plugin_name, $version ) {
			
			$this->plugin_name = $plugin_name;
			$this->version     = $version;
			
			require_once plugin_dir_path( __DIR__ ) . 'admin/acf/products.php';
			
		}
		
		/**
		 * Register the stylesheets for the admin area.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_styles() {
			
			/**
			 * This function is provided for demonstration purposes only.
			 *
			 * An instance of this class should be passed to the run() function
			 * defined in Stripe_Simple_Pay_Different_Email_Per_Product_Loader as all of the hooks are defined
			 * in that particular class.
			 *
			 * The Stripe_Simple_Pay_Different_Email_Per_Product_Loader will then create the relationship
			 * between the defined hooks and the functions defined in this
			 * class.
			 */
			
			wp_enqueue_style( $this->plugin_name,
				plugin_dir_url( __FILE__ ) . 'css/simple-pay-emails-per-product-admin.css', array(), $this->version,
				'all' );
			
		}
		
		/**
		 * Register the JavaScript for the admin area.
		 *
		 * @since    1.0.0
		 */
		public function enqueue_scripts() {
			
			/**
			 * This function is provided for demonstration purposes only.
			 *
			 * An instance of this class should be passed to the run() function
			 * defined in Stripe_Simple_Pay_Different_Email_Per_Product_Loader as all of the hooks are defined
			 * in that particular class.
			 *
			 * The Stripe_Simple_Pay_Different_Email_Per_Product_Loader will then create the relationship
			 * between the defined hooks and the functions defined in this
			 * class.
			 */
			
			wp_enqueue_script( $this->plugin_name,
				plugin_dir_url( __FILE__ ) . 'js/simple-pay-emails-per-product-admin.js', array( 'jquery' ),
				$this->version, false );
			
		}
		
		public function stripe_send_email( $content, $attributes ) {
			$product_id     = $attributes['form']->id;
			$customer_email = accessProtected( $attributes['customer'], '_originalValues' )['email'];
			$email_content  = get_field( 'email_content', $product_id );
			$email_subject  = get_field( 'email_subject', $product_id );
			
			wp_mail( $customer_email, $email_subject, $email_content, '', [] );
		}
	}

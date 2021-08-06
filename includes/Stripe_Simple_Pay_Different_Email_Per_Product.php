<?php
	
	/**
	 * The file that defines the core plugin class
	 *
	 * A class definition that includes attributes and functions used across the admin area.
	 *
	 * @link       https://gabykaram.com/
	 * @since      1.0.0
	 *
	 * @package    Stripe_Simple_Pay_Different_Email_Per_Product
	 * @subpackage Stripe_Simple_Pay_Different_Email_Per_Product/includes
	 */
	
	/**
	 * The core plugin class.
	 *
	 * This is used to define internationalization and admin-specific hooks.
	 *
	 * Also maintains the unique identifier of this plugin as well as the current
	 * version of the plugin.
	 *
	 * @since      1.0.0
	 * @package    Stripe_Simple_Pay_Different_Email_Per_Product
	 * @subpackage Stripe_Simple_Pay_Different_Email_Per_Product/includes
	 * @author     Gaby Karam <gaby@wpshortcuts.studio>
	 */
	class Stripe_Simple_Pay_Different_Email_Per_Product {
		
		/**
		 * The loader that's responsible for maintaining and registering all hooks that power
		 * the plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      Stripe_Simple_Pay_Different_Email_Per_Product_Loader $loader Maintains and registers all hooks for the plugin.
		 */
		protected $loader;
		
		/**
		 * The unique identifier of this plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      string $plugin_name The string used to uniquely identify this plugin.
		 */
		protected $plugin_name;
		
		/**
		 * The current version of the plugin.
		 *
		 * @since    1.0.0
		 * @access   protected
		 * @var      string $version The current version of the plugin.
		 */
		protected $version;
		
		/**
		 * Define the core functionality of the plugin.
		 *
		 * Set the plugin name and the plugin version that can be used throughout the plugin.
		 * Load the dependencies, define the locale, and set the hooks for the admin area of the site.
		 *
		 * @since    1.0.0
		 */
		public function __construct() {
			if ( defined( 'STRIPE_SIMPLE_PAY_DIFFERENT_EMAIL_PER_PRODUCT_VERSION' ) ) {
				$this->version = STRIPE_SIMPLE_PAY_DIFFERENT_EMAIL_PER_PRODUCT_VERSION;
			} else {
				$this->version = '1.0.0';
			}
			$this->plugin_name = 'simple-pay-emails-per-product';
			
			$this->load_dependencies();
			$this->set_locale();
			$this->define_admin_hooks();
			
		}
		
		/**
		 * Load the required dependencies for this plugin.
		 *
		 * Include the following files that make up the plugin:
		 *
		 * - Stripe_Simple_Pay_Different_Email_Per_Product_Loader. Orchestrates the hooks of the plugin.
		 * - Stripe_Simple_Pay_Different_Email_Per_Product_i18n. Defines internationalization functionality.
		 * - Stripe_Simple_Pay_Different_Email_Per_Product_Admin. Defines all hooks for the admin area.
		 *
		 * Create an instance of the loader which will be used to register the hooks
		 * with WordPress.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function load_dependencies() {
			
			/**
			 * The helpers functions for associated with this plugin.
			 */
			require_once plugin_dir_path( __DIR__ ) . 'includes/helpers.php';
			
			/**
			 * The class responsible for orchestrating the actions and filters of the
			 * core plugin.
			 */
			require_once plugin_dir_path( __DIR__ ) . 'includes/Stripe_Simple_Pay_Different_Email_Per_Product_Loader.php';
			
			/**
			 * The class responsible for defining internationalization functionality
			 * of the plugin.
			 */
			require_once plugin_dir_path( __DIR__ ) . 'includes/Stripe_Simple_Pay_Different_Email_Per_Product_i18n.php';
			
			/**
			 * The class responsible for defining all actions that occur in the admin area.
			 */
			require_once plugin_dir_path( __DIR__ ) . 'admin/Stripe_Simple_Pay_Different_Email_Per_Product_Admin.php';
			
			$this->loader = new Stripe_Simple_Pay_Different_Email_Per_Product_Loader();
			
		}
		
		/**
		 * Define the locale for this plugin for internationalization.
		 *
		 * Uses the Stripe_Simple_Pay_Different_Email_Per_Product_i18n class in order to set the domain and to register the hook
		 * with WordPress.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function set_locale() {
			
			$plugin_i18n = new Stripe_Simple_Pay_Different_Email_Per_Product_i18n();
			
			$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );
			
		}
		
		/**
		 * Register all of the hooks related to the admin area functionality
		 * of the plugin.
		 *
		 * @since    1.0.0
		 * @access   private
		 */
		private function define_admin_hooks() {
			
			$plugin_admin = new Stripe_Simple_Pay_Different_Email_Per_Product_Admin( $this->get_plugin_name(), $this->get_version() );
			
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_styles' );
			$this->loader->add_action( 'admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts' );
			$this->loader->add_filter( 'simpay_before_payment_details', $plugin_admin, 'stripe_send_email', 10, 2 );
			
		}
		
		/**
		 * Run the loader to execute all of the hooks with WordPress.
		 *
		 * @since    1.0.0
		 */
		public function run() {
			$this->loader->run();
		}
		
		/**
		 * The name of the plugin used to uniquely identify it within the context of
		 * WordPress and to define internationalization functionality.
		 *
		 * @return    string    The name of the plugin.
		 * @since     1.0.0
		 */
		public function get_plugin_name() {
			return $this->plugin_name;
		}
		
		/**
		 * The reference to the class that orchestrates the hooks with the plugin.
		 *
		 * @return    Stripe_Simple_Pay_Different_Email_Per_Product_Loader    Orchestrates the hooks of the plugin.
		 * @since     1.0.0
		 */
		public function get_loader() {
			return $this->loader;
		}
		
		/**
		 * Retrieve the version number of the plugin.
		 *
		 * @return    string    The version number of the plugin.
		 * @since     1.0.0
		 */
		public function get_version() {
			return $this->version;
		}
		
	}

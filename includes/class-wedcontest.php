<?php
/**
 * WedContest setup
 *
 * @author   Giorgiosaud
 * @package  WedContest
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main WedContest Class.
 *
 * @class WedContest
 * @version	3.2.0
 */
final class WedContest
{
	/**
	 * WedContest version.
	 *
	 * @var string
	 */
	public $version = '2.0';

	/**
	 * The single instance of the class.
	 *
	 * @var WooCommerce
	 * @since 2.1
	 */
	protected static $_instance = null;

	/**
	 * Main WedContest Instance.
	 *
	 * Ensures only one instance of WedContest is loaded or can be loaded.
	 *
	 * @since 2.1
	 * @static
	 * @see wedcontest()
	 * @return WedContest - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	/**
	 * Cloning is forbidden.
	 *
	 * @since 2.1
	 */
	public function __clone() {
		wc_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'woocommerce' ), '2.1' );
	}

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 2.1
	 */
	public function __wakeup() {
		wc_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'woocommerce' ), '2.1' );
	}

	/**
	 * Auto-load in-accessible properties on demand.
	 *
	 * @param mixed $key Key name.
	 * @return mixed
	 */
	public function __get( $key ) {
		if ( in_array( $key, array( 'payment_gateways', 'shipping', 'mailer', 'checkout' ), true ) ) {
			return $this->$key();
		}
	}

	function __construct()
	{
		$this->define_constants();
		$this->includes();
		$this->init_hooks();
		do_action( 'woocommerce_loaded' );
	}

	/**
	 * Define WedContest Constants.
	 */
	private function define_constants() {
		$upload_dir = wp_upload_dir( null, false );

		$this->define( 'WEDCONTEST_ABSPATH', dirname( WEDCONTEST_PLUGIN_FILE ) . '/' );
		$this->define( 'WEDCONTEST_PLUGIN_BASENAME', plugin_basename( WEDCONTEST_PLUGIN_FILE ) );
		$this->define( 'WEDCONTEST_VERSION', $this->version );
		$this->define( 'WEDCONTEST_VERSION', $this->version );
		$this->define( 'WEDCONTEST_DELIMITER', '|' );
		$this->define( 'WEDCONTEST_LOG_DIR', $upload_dir['basedir'] . '/wc-logs/' );
		$this->define( 'WEDCONTEST_SESSION_CACHE_GROUP', 'wedcontest_session_id' );
		$this->define( 'WEDCONTEST_TEMPLATE_DEBUG_MODE', false );
	}
	/**
	 * Include required core files used in admin and on the frontend.
	 */
	public function includes() {
		/**
		 * Class autoloader.
		 */
		include_once( WEDCONTEST_ABSPATH . 'includes/class-wedcontest-autoloader.php' );

		/**
		 * Interfaces.
		 */
		// include_once( WC_ABSPATH . 'includes/interfaces/class-wc-abstract-order-data-store-interface.php' );
		// include_once( WC_ABSPATH . 'includes/interfaces/class-wc-coupon-data-store-interface.php' );
		// include_once( WC_ABSPATH . 'includes/interfaces/class-wc-customer-data-store-interface.php' );
		// include_once( WC_ABSPATH . 'includes/interfaces/class-wc-customer-download-data-store-interface.php' );
		// include_once( WC_ABSPATH . 'includes/interfaces/class-wc-object-data-store-interface.php' );
		// include_once( WC_ABSPATH . 'includes/interfaces/class-wc-order-data-store-interface.php' );
		// include_once( WC_ABSPATH . 'includes/interfaces/class-wc-order-item-data-store-interface.php' );
		// include_once( WC_ABSPATH . 'includes/interfaces/class-wc-order-item-product-data-store-interface.php' );
		// include_once( WC_ABSPATH . 'includes/interfaces/class-wc-order-item-type-data-store-interface.php' );
		// include_once( WC_ABSPATH . 'includes/interfaces/class-wc-order-refund-data-store-interface.php' );
		// include_once( WC_ABSPATH . 'includes/interfaces/class-wc-payment-token-data-store-interface.php' );
		// include_once( WC_ABSPATH . 'includes/interfaces/class-wc-product-data-store-interface.php' );
		// include_once( WC_ABSPATH . 'includes/interfaces/class-wc-product-variable-data-store-interface.php' );
		// include_once( WC_ABSPATH . 'includes/interfaces/class-wc-shipping-zone-data-store-interface.php' );
		// include_once( WC_ABSPATH . 'includes/interfaces/class-wc-logger-interface.php' );
		// include_once( WC_ABSPATH . 'includes/interfaces/class-wc-log-handler-interface.php' );

		/**
		 * Abstract classes.
		 */
		// include_once( WC_ABSPATH . 'includes/abstracts/abstract-wc-data.php' ); // WC_Data for CRUD.
		// include_once( WC_ABSPATH . 'includes/abstracts/abstract-wc-object-query.php' ); // WC_Object_Query for CRUD.
		// include_once( WC_ABSPATH . 'includes/abstracts/abstract-wc-payment-token.php' ); // Payment Tokens.
		// include_once( WC_ABSPATH . 'includes/abstracts/abstract-wc-product.php' ); // Products.
		// include_once( WC_ABSPATH . 'includes/abstracts/abstract-wc-order.php' ); // Orders.
		// include_once( WC_ABSPATH . 'includes/abstracts/abstract-wc-settings-api.php' ); // Settings API (for gateways, shipping, and integrations).
		// include_once( WC_ABSPATH . 'includes/abstracts/abstract-wc-shipping-method.php' ); // A Shipping method.
		// include_once( WC_ABSPATH . 'includes/abstracts/abstract-wc-payment-gateway.php' ); // A Payment gateway.
		// include_once( WC_ABSPATH . 'includes/abstracts/abstract-wc-integration.php' ); // An integration with a service.
		// include_once( WC_ABSPATH . 'includes/abstracts/abstract-wc-log-handler.php' );
		// include_once( WC_ABSPATH . 'includes/abstracts/abstract-wc-deprecated-hooks.php' );
		// include_once( WC_ABSPATH . 'includes/abstracts/abstract-wc-session.php' );

		/**
		 * Core classes.
		 */
		include_once( WEDCONTEST_ABSPATH . 'includes/wedcontest-core-functions.php' );
		// include_once( WC_ABSPATH . 'includes/class-wc-datetime.php' );
		// include_once( WC_ABSPATH . 'includes/class-wc-post-types.php' ); // Registers post types.
		include_once( WEDCONTEST_ABSPATH . 'includes/class-wedcontest-install.php' );
		include_once( WEDCONTEST_ABSPATH . 'includes/class-wedcontest-options.php' );
		include_once( WEDCONTEST_ABSPATH . 'includes/class-wedcontest-authentication-process.php' );
		// include_once( WC_ABSPATH . 'includes/class-wc-geolocation.php' );
		// include_once( WC_ABSPATH . 'includes/class-wc-download-handler.php' );
		// include_once( WC_ABSPATH . 'includes/class-wc-comments.php' );
		// include_once( WC_ABSPATH . 'includes/class-wc-post-data.php' );
		// include_once( WC_ABSPATH . 'includes/class-wc-ajax.php' );
		// include_once( WC_ABSPATH . 'includes/class-wc-emails.php' );
		// include_once( WC_ABSPATH . 'includes/class-wc-data-exception.php' );
		// include_once( WC_ABSPATH . 'includes/class-wc-query.php' );
		// include_once( WC_ABSPATH . 'includes/class-wc-meta-data.php' ); // Meta data internal object
		// include_once( WC_ABSPATH . 'includes/class-wc-order-factory.php' ); // Order factory.
		// include_once( WC_ABSPATH . 'includes/class-wc-order-query.php' ); // Order query.
		// include_once( WC_ABSPATH . 'includes/class-wc-product-factory.php' ); // Product factory.
		// include_once( WC_ABSPATH . 'includes/class-wc-product-query.php' ); // Product query
		// include_once( WC_ABSPATH . 'includes/class-wc-payment-tokens.php' ); // Payment tokens controller.
		// include_once( WC_ABSPATH . 'includes/class-wc-shipping-zone.php' );
		// include_once( WC_ABSPATH . 'includes/gateways/class-wc-payment-gateway-cc.php' ); // CC Payment Gateway.
		// include_once( WC_ABSPATH . 'includes/gateways/class-wc-payment-gateway-echeck.php' ); // eCheck Payment Gateway.
		// include_once( WC_ABSPATH . 'includes/class-wc-countries.php' ); // Defines countries and states.
		// include_once( WC_ABSPATH . 'includes/class-wc-integrations.php' ); // Loads integrations.
		// include_once( WC_ABSPATH . 'includes/class-wc-cache-helper.php' ); // Cache Helper.
		// include_once( WC_ABSPATH . 'includes/class-wc-https.php' ); // https Helper.
		// include_once( WC_ABSPATH . 'includes/class-wc-deprecated-action-hooks.php' );
		// include_once( WC_ABSPATH . 'includes/class-wc-deprecated-filter-hooks.php' );
		// include_once( WC_ABSPATH . 'includes/class-wc-background-emailer.php' );
		// include_once( WC_ABSPATH . 'includes/class-wc-discounts.php' );
		// include_once( WC_ABSPATH . 'includes/class-wc-cart-totals.php' );

		// /**
		//  * Data stores - used to store and retrieve CRUD object data from the database.
		//  */
		// include_once( WC_ABSPATH . 'includes/class-wc-data-store.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/class-wc-data-store-wp.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/class-wc-coupon-data-store-cpt.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/class-wc-product-data-store-cpt.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/class-wc-product-grouped-data-store-cpt.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/class-wc-product-variable-data-store-cpt.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/class-wc-product-variation-data-store-cpt.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/abstract-wc-order-item-type-data-store.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/class-wc-order-item-data-store.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/class-wc-order-item-coupon-data-store.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/class-wc-order-item-fee-data-store.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/class-wc-order-item-product-store.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/class-wc-order-item-shipping-data-store.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/class-wc-order-item-tax-data-store.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/class-wc-payment-token-data-store.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/class-wc-customer-data-store.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/class-wc-customer-data-store-session.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/class-wc-customer-download-data-store.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/class-wc-shipping-zone-data-store.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/abstract-wc-order-data-store-cpt.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/class-wc-order-data-store-cpt.php' );
		// include_once( WC_ABSPATH . 'includes/data-stores/class-wc-order-refund-data-store-cpt.php' );

		// /**
		//  * REST API.
		//  */
		// include_once( WC_ABSPATH . 'includes/class-wc-legacy-api.php' );
		// include_once( WC_ABSPATH . 'includes/class-wc-api.php' ); // API Class.
		// include_once( WC_ABSPATH . 'includes/class-wc-auth.php' ); // Auth Class.
		// include_once( WC_ABSPATH . 'includes/class-wc-register-wp-admin-settings.php' );

		// if ( defined( 'WP_CLI' ) && WP_CLI ) {
		// 	include_once( WC_ABSPATH . 'includes/class-wc-cli.php' );
		// }

		// if ( $this->is_request( 'admin' ) ) {
		// 	include_once( WC_ABSPATH . 'includes/admin/class-wc-admin.php' );
		// }

		// if ( $this->is_request( 'frontend' ) ) {
		// 	$this->frontend_includes();
		// }

		// if ( $this->is_request( 'frontend' ) || $this->is_request( 'cron' ) ) {
		// 	include_once( WC_ABSPATH . 'includes/class-wc-session-handler.php' );
		// }

		// if ( $this->is_request( 'cron' ) && 'yes' === get_option( 'woocommerce_allow_tracking', 'no' ) ) {
		// 	include_once( WC_ABSPATH . 'includes/class-wc-tracker.php' );
		// }

		// $this->query = new WC_Query();
		// $this->api   = new WC_API();
	}
	private function init_hooks() {
		register_activation_hook( WEDCONTEST_PLUGIN_FILE, array( 'WC_Install', 'install' ) );
		register_shutdown_function( array( $this, 'log_errors' ) );
		add_action( 'after_setup_theme', array( $this, 'setup_environment' ) );
		// add_action( 'after_setup_theme', array( $this, 'include_template_functions' ), 11 );
		// add_action( 'init', array( $this, 'init' ), 0 );
		add_action( 'init', array( 'WedContest_Shortcodes', 'init' ) );
		// add_action( 'init', array( 'WC_Emails', 'init_transactional_emails' ) );
		// add_action( 'init', array( $this, 'wpdb_table_fix' ), 0 );
		// add_action( 'switch_blog', array( $this, 'wpdb_table_fix' ), 0 );
	}
	public function setup_environment() {
		/* @deprecated 2.2 Use WC()->template_path() instead. */
		// $this->define( 'WEDCONTEST_TEMPLATE_PATH', $this->template_path() );

		$this->add_thumbnail_support();
		$this->add_image_sizes();
	}
	/**
	 * Ensure post thumbnail support is turned on.
	 */
	private function add_thumbnail_support() {
		if ( ! current_theme_supports( 'post-thumbnails' ) ) {
			add_theme_support( 'post-thumbnails' );
		}
		// add_post_type_support( 'product', 'thumbnail' );
	}
	/**
	 * Add WC Image sizes to WP.
	 *
	 * @since 2.3
	 */
	private function add_image_sizes() {
		// $shop_thumbnail = wc_get_image_size( 'shop_thumbnail' );
		// $shop_catalog	= wc_get_image_size( 'shop_catalog' );
		// $shop_single	= wc_get_image_size( 'shop_single' );

		// add_image_size( 'shop_thumbnail', $shop_thumbnail['width'], $shop_thumbnail['height'], $shop_thumbnail['crop'] );
		// add_image_size( 'shop_catalog', $shop_catalog['width'], $shop_catalog['height'], $shop_catalog['crop'] );
		// add_image_size( 'shop_single', $shop_single['width'], $shop_single['height'], $shop_single['crop'] );
	}
	// /**
	//  * Get the template path.
	//  *
	//  * @return string
	//  */
	// public function template_path() {
	// 	return apply_filters( 'wedcontest_template_path', 'wedcontest/' );
	// }
	/**
	 * Ensures fatal errors are logged so they can be picked up in the status report.
	 *
	 * @since 3.2.0
	 */
	public function log_errors() {
		$error = error_get_last();
		if ( E_ERROR === $error['type'] ) {
			$logger = wc_get_logger();
			$logger->critical(
				$error['message'] . PHP_EOL,
				array(
					'source' => 'fatal-errors',
				)
			);
		}
	}
	/**
	 * Define constant if not already set.
	 *
	 * @param string      $name  Constant name.
	 * @param string|bool $value Constant value.
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}
}
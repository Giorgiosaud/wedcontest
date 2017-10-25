<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WooCommerce Autoloader.
 *
 * @class 		WedContest_Autoloader
 * @version		2.3.0
 * @package		WooCommerce/Classes
 * @category	Class
 * @author 		WooThemes
 */
class WedContest_Autoloader {

	/**
	 * Path to the includes directory.
	 *
	 * @var string
	 */
	private $include_path = '';

	/**
	 * The Constructor.
	 */
	public function __construct() {
		if ( function_exists( "__autoload" ) ) {
			spl_autoload_register( "__autoload" );
		}

		spl_autoload_register( array( $this, 'autoload' ) );

		$this->include_path = untrailingslashit( plugin_dir_path( WEDCONTEST_PLUGIN_FILE ) ) . '/includes/';
	}

	/**
	 * Take a class name and turn it into a file name.
	 *
	 * @param  string $class
	 * @return string
	 */
	private function get_file_name_from_class( $class ) {
		return 'class-' . str_replace( '_', '-', $class ) . '.php';
	}

	/**
	 * Include a class file.
	 *
	 * @param  string $path
	 * @return bool successful or not
	 */
	private function load_file( $path ) {
		if ( $path && is_readable( $path ) ) {
			include_once( $path );
			return true;
		}
		return false;
	}

	/**
	 * Auto-load WC classes on demand to reduce memory consumption.
	 *
	 * @param string $class
	 */
	public function autoload( $class ) {
		$class = strtolower( $class );

		if ( 0 !== strpos( $class, 'wedcontest_' ) ) {
			return;
		}

		$file  = $this->get_file_name_from_class( $class );
		$path  = ''; 
		if ( 0 === strpos( $class, 'wedcontest_shortcode_' ) ) {
			$path = $this->include_path . 'shortcodes/';
		} elseif ( 0 === strpos( $class, 'wedcontest_meta_box' ) ) {
			$path = $this->include_path . 'admin/meta-boxes/';
		} elseif ( 0 === strpos( $class, 'wedcontest_admin' ) ) {
			$path = $this->include_path . 'admin/';
		} elseif ( 0 === strpos( $class, 'wedcontest_log_handler_' ) ) {
			$path = $this->include_path . 'log-handlers/';
		}elseif ( 0 === strpos( $class, 'wedcontest_options' ) ) {
			$path = $this->include_path . 'log-handlers/';
		}

		if ( empty( $path ) || ! $this->load_file( $path . $file ) ) {
			$this->load_file( $this->include_path . $file );
		}
	}
}

new WedContest_Autoloader();

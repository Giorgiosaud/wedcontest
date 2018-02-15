<?php


/**
 * Plugin Name:     Wedcontest
 * Plugin URI:      https://wedcontest.diproinduca.com
 * Description:     Plugin especcialy developed for diproinduca World enviroment day contest
 * Author:          Giorgiosaud
 * Author URI:      https://zonapro.us
 * Text Domain:     wedcontest
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Wedcontest
 */



if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define WC_PLUGIN_FILE.
if ( ! defined( 'WEDCONTEST_PLUGIN_FILE' ) ) {
	define( 'WEDCONTEST_PLUGIN_FILE', __FILE__ );
}
if ( ! defined( 'WEDCONTEST_PLUGIN_URL' ) ) {
	define( 'WEDCONTEST_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
}
include "vendor/autoload.php";

// Include the main Wedcontest class.
// if ( ! class_exists( 'WedContest' ) ) {
	// include_once dirname( __FILE__ ) . '/includes/class-wedcontest.php';
// }

/**
 * Main instance of WedContest.
 *
 * Returns the main instance of WC to prevent the need to use globals.
 *
 * @since  2.1
 * @return Wedcontest|\Zonapro\WedContest\WedContest
 */
function wedcontest() {
	return \Zonapro\WedContest\Initialize::instance();
}
// add_action('wp_ajax_no_priv_register_representant','register_new_representant');
// Global for backwards compatibility.
$GLOBALS['wedcontest'] = wedcontest();


<?php
/**
 * Plugin Name:     Wedcontest
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
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
// Include the main Wedcontest class.
if ( ! class_exists( 'WedContest' ) ) {
	include_once dirname( __FILE__ ) . '/includes/class-wedcontest.php';
}

/**
 * Main instance of WedContest.
 *
 * Returns the main instance of WC to prevent the need to use globals.
 *
 * @since  2.1
 * @return Wedcontest
 */
function wedcontest() {
	return WedContest::instance();
}

// Global for backwards compatibility.
$GLOBALS['wedcontest'] = wedcontest();


<?php
/**
 * WooCommerce Core Functions
 *
 * General core functions available on both the front-end and admin.
 *
 * @author 		WooThemes
 * @category 	Core
 * @package 	WooCommerce/Functions
 * @version     2.1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Define a constant if it is not already defined.
 *
 * @since 3.0.0
 * @param string $name  Constant name.
 * @param string $value Value.
 */
function wedcontest_maybe_define_constant( $name, $value ) {
	if ( ! defined( $name ) ) {
		define( $name, $value );
	}
}
/**
 * Variable Die and Dump
 *
 * @since 3.0.0
 * @param string $var  Var name.
 */
function dd($var){
	return die(var_dump($var));
}
/**
 * Get other templates
 *
 * @access public
 * @param string $template_name
 * @param array $args (default: array())
 * @param string $template_path (default: '')
 * @param string $default_path (default: '')
 */
function wed_get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
	if ( ! empty( $args ) && is_array( $args ) ) {
		extract( $args );
	}

	$located = wedcontest_locate_template( $template_name, $template_path, $default_path );

	if ( ! file_exists( $located ) ) {
		wedcontest_doing_it_wrong( __FUNCTION__, sprintf( __( '%s does not exist.', 'wedcontest' ), '<code>' . $located . '</code>' ), '2.1' );
		return;
	}

	// Allow 3rd party plugin filter template file from their plugin.
	$located = apply_filters( 'wed_get_template', $located, $template_name, $args, $template_path, $default_path );

	do_action( 'wedcontest_before_template_part', $template_name, $template_path, $located, $args );

	include( $located );

	do_action( 'wedcontest_after_template_part', $template_name, $template_path, $located, $args );
}
/**
 * Locate a template and return the path for inclusion.
 *
 * This is the load order:
 *
 *		yourtheme		/	$template_path	/	$template_name
 *		yourtheme		/	$template_name
 *		$default_path	/	$template_name
 *
 * @access public
 * @param string $template_name
 * @param string $template_path (default: '')
 * @param string $default_path (default: '')
 * @return string
 */
function wed_locate_template( $template_name, $template_path = '', $default_path = '' ) {
	if ( ! $template_path ) {
		$template_path = wedcontest()->template_path();
	}

	if ( ! $default_path ) {
		$default_path = wedcontest()->plugin_path() . '/templates/';
	}

	// Look within passed path within the theme - this is priority.
	$template = locate_template(
		array(
			trailingslashit( $template_path ) . $template_name,
			$template_name,
		)
	);

	// Get default template/
	if ( ! $template || WEDCONTEST_TEMPLATE_DEBUG_MODE ) {
		$template = $default_path . $template_name;
	}

	// Return what we found.
	return apply_filters( 'wedcontest_locate_template', $template, $template_name, $template_path );
}
/**
 * Wrapper for wc_doing_it_wrong.
 *
 * @since  3.0.0
 * @param  string $function
 * @param  string $version
 * @param  string $replacement
 */
function wedcontest_doing_it_wrong( $function, $message, $version ) {
	$message .= ' Backtrace: ' . wp_debug_backtrace_summary();

	if ( is_ajax() ) {
		do_action( 'doing_it_wrong_run', $function, $message, $version );
		error_log( "{$function} was called incorrectly. {$message}. This message was added in version {$version}." );
	} else {
		_doing_it_wrong( $function, $message, $version );
	}
}

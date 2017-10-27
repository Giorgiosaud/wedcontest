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

	$located = wc_locate_template( $template_name, $template_path, $default_path );

	if ( ! file_exists( $located ) ) {
		wc_doing_it_wrong( __FUNCTION__, sprintf( __( '%s does not exist.', 'wedcontest' ), '<code>' . $located . '</code>' ), '2.1' );
		return;
	}

	// Allow 3rd party plugin filter template file from their plugin.
	$located = apply_filters( 'wed_get_template', $located, $template_name, $args, $template_path, $default_path );

	do_action( 'wedcontest_before_template_part', $template_name, $template_path, $located, $args );

	include( $located );

	do_action( 'wedcontest_after_template_part', $template_name, $template_path, $located, $args );
}

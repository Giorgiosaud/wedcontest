<?php
/**
 * Shortcodes
 *
 * @author   Automattic
 * @category Class
 * @package  WedContest/Shortcodes/
 * @version  3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WedContest Shortcodes class.
 */
class WedContest_Shortcode_Register_Representant{
	/**
	 * Attributes.
	 *
	 * @since 3.2.0
	 * @var   array
	 */
	protected $attributes = array();

	/**
	 * Initialize shortcode.
	 *
	 * @since 3.2.0
	 * @param array  $attributes Shortcode attributes.
	 */
	public function __construct( $attributes = array() ) {
		$this->attributes = $this->parse_attributes( $attributes );
	}
	
	/**
	 * Get shortcode content.
	 *
	 * @since  3.2.0
	 * @return string
	 */
	public function get_content(){
		$classes                     = 'register_representant';
		ob_start();?>
		<h4>Registering Representant</h4>
		<form class="w-form-h" autocomplete="off" action="https://wedcontest.zonapro.net/wp-login.php" method="post">
			<div class="w-form-row for_name required">
				<div class="w-form-row-label">
					<label for="us_form_1_log"></label>
				</div>
				<div class="w-form-row-field">
					<input type="text" aria-label="name" name="name" id="us_form_1_name" value="" placeholder="Name *" data-required="true" aria-required="true">
					<span class="w-form-row-field-bar"></span>
				</div>
				<div class="w-form-row-state"></div>
			</div>
			<div class="w-form-row for_log required">
				<div class="w-form-row-label">
					<label for="us_form_1_log"></label>
				</div>
				<div class="w-form-row-field">
					<input type="text" aria-label="name" name="last_name" id="us_form_1_last_name" value="" placeholder="Last Name *" data-required="true" aria-required="true">
					<span class="w-form-row-field-bar"></span>
				</div>
				<div class="w-form-row-state"></div>
			</div>
			<div class="w-form-row for_log required">
				<div class="w-form-row-label">
					<label for="us_form_1_log"></label>
				</div>
				<div class="w-form-row-field">
					<input type="email" aria-label="name" name="email" id="us_form_1_last_name" value="" placeholder="Last Name *" data-required="true" aria-required="true">
					<span class="w-form-row-field-bar"></span>
				</div>
				<div class="w-form-row-state"></div>
			</div>
			<div class="w-form-row for_pwd required">
				<div class="w-form-row-label">
					<label for="us_form_1_pwd"></label>
				</div>
				<div class="w-form-row-field">
					<input type="password" aria-label="pwd" name="password" id="us_form_1_pwd" value="" placeholder="Password *" data-required="true" aria-required="true">
					<span class="w-form-row-field-bar"></span>
				</div>
				<div class="w-form-row-state"></div>
			</div>
			<div class="w-form-row for_pwd required confirmation">
				<div class="w-form-row-label">
					<label for="us_form_1_pwd"></label>
				</div>
				<div class="w-form-row-field">
					<input type="password" name="password_confirmation" id="us_form_1_pwd" value="" placeholder="Password Confirmation" data-required="true" aria-required="true">
					<span class="w-form-row-field-bar"></span>
				</div>
				<div class="w-form-row-state"></div>
			</div>
			<div class="w-form-row for_submit">
				<div class="w-form-row-field">
					<button class="w-btn style_raised color_primary" type="submit" aria-label="Log In"><span class="g-preloader type_1"></span><span class="w-btn-label">Log In</span><span class="ripple-container"></span></button>
				</div>
			</div>
			<div class="w-form-message"></div>
			<label for="rememberme"><input id="rememberme" type="checkbox" value="forever" name="rememberme"><span>Remember Me</span></label>	</form>
			<?php
			return '<div class="' .  $classes . '">' . ob_get_clean() . '</div>';
		}
	/**
	 * Parse attributes.
	 *
	 * @since  3.2.0
	 * @param  array $attributes Shortcode attributes.
	 * @return array
	 */
	protected function parse_attributes( $attributes ) {
		// $attributes = $this->parse_legacy_attributes( $attributes );

		// return shortcode_atts( array(
		// 	'limit'          => '-1',      // Results limit.
		// 	'columns'        => '4',       // Number of columns.
		// 	'orderby'        => 'title',   // menu_order, title, date, rand, price, popularity, rating, or id.
		// 	'order'          => 'ASC',     // ASC or DESC.
		// 	'ids'            => '',        // Comma separated IDs.
		// 	'skus'           => '',        // Comma separated SKUs.
		// 	'category'       => '',        // Comma separated category slugs.
		// 	'cat_operator'   => 'IN',      // Operator to compare categories. Possible values are 'IN', 'NOT IN', 'AND'.
		// 	'attribute'      => '',        // Single attribute slug.
		// 	'terms'          => '',        // Comma separated term slugs.
		// 	'terms_operator' => 'IN',      // Operator to compare terms. Possible values are 'IN', 'NOT IN', 'AND'.
		// 	'visibility'     => 'visible', // Possible values are 'visible', 'catalog', 'search', 'hidden'.
		// 	'class'          => '',        // HTML class.
		// ), $attributes, $this->type );
	}
	/**
	 * Parse legacy attributes.
	 *
	 * @since  3.2.0
	 * @param  array $attributes Attributes.
	 * @return array
	 */
	protected function parse_legacy_attributes( $attributes ) {
		// $mapping = array(
		// 	'per_page' => 'limit',
		// 	'operator' => 'cat_operator',
		// 	'filter'   => 'terms',
		// );

		// foreach ( $mapping as $old => $new ) {
		// 	if ( isset( $attributes[ $old ] ) ) {
		// 		$attributes[ $new ] = $attributes[ $old ];
		// 		unset( $attributes[ $old ] );
		// 	}
		// }

		return $attributes;
	}
}
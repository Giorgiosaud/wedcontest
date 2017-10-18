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
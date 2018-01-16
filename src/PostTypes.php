<?php 
namespace Zonapro\WedContest;
class PostTypes {
	

	public static function create(){

		// if ( ! is_blog_installed() || (post_type_exists( 'participant' )&&post_type_exists( 'artwork' ) )) {
		// 	return;
		// }

		// do_action( 'wedcontest_register_post_type' );
		self::registerParticipants();
		self::registerArtworks();
		// do_action( 'wedcontest_after_register_post_type' );
	}
	
	private static function registerParticipants(){
		$labels = array(
			'name'                  => _x( 'Participants', 'Post Type General Name', 'wedcontest' ),
			'singular_name'         => _x( 'Participant', 'Post Type Singular Name', 'wedcontest' ),
			'menu_name'             => __( 'Participants', 'wedcontest' ),
			'name_admin_bar'        => __( 'Participants', 'wedcontest' ),
			'archives'              => __( 'Participant', 'wedcontest' ),
			'attributes'            => __( 'Participant', 'wedcontest' ),
			'parent_item_colon'     => __( '', 'wedcontest' ),
			'all_items'             => __( 'All Participants', 'wedcontest' ),
			'add_new_item'          => __( 'Add New Participant', 'wedcontest' ),
			'add_new'               => __( 'Add New Participant', 'wedcontest' ),
			'new_item'              => __( 'New Participant', 'wedcontest' ),
			'edit_item'             => __( 'Edit Participant', 'wedcontest' ),
			'update_item'           => __( 'Update Participant', 'wedcontest' ),
			'view_item'             => __( 'View Participant', 'wedcontest' ),
			'view_items'            => __( 'View Participant', 'wedcontest' ),
			'search_items'          => __( 'Search Participant', 'wedcontest' ),
			'not_found'             => __( 'Participant Not found', 'wedcontest' ),
			'not_found_in_trash'    => __( 'Participant Not found in Trash', 'wedcontest' ),
			'featured_image'        => __( 'Participant Featured Image', 'wedcontest' ),
			'set_featured_image'    => __( 'Set Participant featured image', 'wedcontest' ),
			'remove_featured_image' => __( 'Remove Participant featured image', 'wedcontest' ),
			'use_featured_image'    => __( 'Use as featured image', 'wedcontest' ),
			'insert_into_item'      => __( 'Insert into Participant', 'wedcontest' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Participant', 'wedcontest' ),
			'items_list'            => __( 'Items list', 'wedcontest' ),
			'items_list_navigation' => __( 'Items list navigation', 'wedcontest' ),
			'filter_items_list'     => __( 'Filter items list', 'wedcontest' ),
		);
		$capabilities = array(
			'edit_post'             => 'edit_participant',
			'read_post'             => 'read_participant',
			'delete_post'           => 'delete_participant',
			'edit_posts'            => 'edit_participants',
			'edit_others_posts'     => 'edit_others_participants',
			'publish_posts'         => 'publish_participant',
			'read_private_posts'    => 'read_private_participants',
		);
		$args = array(
			'label'                 => __( 'Participant', 'wedcontest' ),
			'description'           => __( 'his is where you can add new participants to your System', 'wedcontest' ),
			'labels'                => $labels,
			'supports'              => array( 'editor', 'author', ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 25,
			'menu_icon'             => 'dashicons-groups',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capabilities'          => $capabilities,
			'show_in_rest'          => true,
		);
		register_post_type( 'participant', $args );
	}
	public static function registerArtworks() {

		$labels = array(
			'name'                  => _x( 'Artworks', 'Post Type General Name', 'wedcontest' ),
			'singular_name'         => _x( 'Artwork', 'Post Type Singular Name', 'wedcontest' ),
			'menu_name'             => __( 'Artworks', 'wedcontest' ),
			'name_admin_bar'        => __( 'Artworks', 'wedcontest' ),
			'archives'              => __( 'Artwork', 'wedcontest' ),
			'attributes'            => __( 'Artwork', 'wedcontest' ),
			'parent_item_colon'     => __( '', 'wedcontest' ),
			'all_items'             => __( 'All Artworks', 'wedcontest' ),
			'add_new_item'          => __( 'Add New Artwork', 'wedcontest' ),
			'add_new'               => __( 'Add New Artwork', 'wedcontest' ),
			'new_item'              => __( 'New Artwork', 'wedcontest' ),
			'edit_item'             => __( 'Edit Artwork', 'wedcontest' ),
			'update_item'           => __( 'Update Artwork', 'wedcontest' ),
			'view_item'             => __( 'View Artwork', 'wedcontest' ),
			'view_items'            => __( 'View Artwork', 'wedcontest' ),
			'search_items'          => __( 'Search Artwork', 'wedcontest' ),
			'not_found'             => __( 'Artwork Not found', 'wedcontest' ),
			'not_found_in_trash'    => __( 'Artwork Not found in Trash', 'wedcontest' ),
			'featured_image'        => __( 'Artwork Featured Image', 'wedcontest' ),
			'set_featured_image'    => __( 'Set Artwork featured image', 'wedcontest' ),
			'remove_featured_image' => __( 'Remove Artwork featured image', 'wedcontest' ),
			'use_featured_image'    => __( 'Use as featured image', 'wedcontest' ),
			'insert_into_item'      => __( 'Insert into Artwork', 'wedcontest' ),
			'uploaded_to_this_item' => __( 'Uploaded to this Artwork', 'wedcontest' ),
			'items_list'            => __( 'Items list', 'wedcontest' ),
			'items_list_navigation' => __( 'Items list navigation', 'wedcontest' ),
			'filter_items_list'     => __( 'Filter items list', 'wedcontest' ),
		);
		$capabilities = array(
			'edit_post'             => 'edit_artwork',
			'read_post'             => 'read_artwork',
			'delete_post'           => 'delete_artwork',
			'edit_posts'            => 'edit_artworks',
			'edit_others_posts'     => 'edit_others_artworks',
			'publish_posts'         => 'publish_artwork',
			'read_private_posts'    => 'read_private_artwork',
		);
		$args = array(
			'label'                 => __( 'Artwork', 'wedcontest' ),
			'description'           => __( 'his is where you can add artworks to contest', 'wedcontest' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 25,
			'menu_icon'             => 'dashicons-groups',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,		
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'capabilities'          => $capabilities,
			'show_in_rest'          => true,
		);
		register_post_type( 'artwork', $args );
		
	}
	/**
	 * Register core taxonomies.
	 */
	public static function register_taxonomies() {

		if ( ! is_blog_installed() ) {
			return;
		}

		if ( taxonomy_exists( 'year_participated' ) ) {
			return;
		}
		return;

		do_action( 'wedcontest_register_taxonomy' );

		// $permalinks = wc_get_permalink_structure();

		register_taxonomy( 'product_type',
			apply_filters( 'woocommerce_taxonomy_objects_product_type', array( 'product' ) ),
			apply_filters( 'woocommerce_taxonomy_args_product_type', array(
				'hierarchical'      => false,
				'show_ui'           => false,
				'show_in_nav_menus' => false,
				'query_var'         => is_admin(),
				'rewrite'           => false,
				'public'            => false,
			) )
		);

		register_taxonomy( 'product_visibility',
			apply_filters( 'woocommerce_taxonomy_objects_product_visibility', array( 'product', 'product_variation' ) ),
			apply_filters( 'woocommerce_taxonomy_args_product_visibility', array(
				'hierarchical'      => false,
				'show_ui'           => false,
				'show_in_nav_menus' => false,
				'query_var'         => is_admin(),
				'rewrite'           => false,
				'public'            => false,
			) )
		);

		register_taxonomy( 'product_cat',
			apply_filters( 'woocommerce_taxonomy_objects_product_cat', array( 'product' ) ),
			apply_filters( 'woocommerce_taxonomy_args_product_cat', array(
				'hierarchical'          => true,
				'update_count_callback' => '_wc_term_recount',
				'label'                 => __( 'Categories', 'woocommerce' ),
				'labels' => array(
					'name'              => __( 'Product categories', 'woocommerce' ),
					'singular_name'     => __( 'Category', 'woocommerce' ),
					'menu_name'         => _x( 'Categories', 'Admin menu name', 'woocommerce' ),
					'search_items'      => __( 'Search categories', 'woocommerce' ),
					'all_items'         => __( 'All categories', 'woocommerce' ),
					'parent_item'       => __( 'Parent category', 'woocommerce' ),
					'parent_item_colon' => __( 'Parent category:', 'woocommerce' ),
					'edit_item'         => __( 'Edit category', 'woocommerce' ),
					'update_item'       => __( 'Update category', 'woocommerce' ),
					'add_new_item'      => __( 'Add new category', 'woocommerce' ),
					'new_item_name'     => __( 'New category name', 'woocommerce' ),
					'not_found'         => __( 'No categories found', 'woocommerce' ),
				),
				'show_ui'               => true,
				'query_var'             => true,
				'capabilities'          => array(
					'manage_terms' => 'manage_product_terms',
					'edit_terms'   => 'edit_product_terms',
					'delete_terms' => 'delete_product_terms',
					'assign_terms' => 'assign_product_terms',
				),
				'rewrite'          => array(
					'slug'         => $permalinks['category_rewrite_slug'],
					'with_front'   => false,
					'hierarchical' => true,
				),
			) )
		);

		register_taxonomy( 'product_tag',
			apply_filters( 'woocommerce_taxonomy_objects_product_tag', array( 'product' ) ),
			apply_filters( 'woocommerce_taxonomy_args_product_tag', array(
				'hierarchical'          => false,
				'update_count_callback' => '_wc_term_recount',
				'label'                 => __( 'Product tags', 'woocommerce' ),
				'labels'                => array(
					'name'                       => __( 'Product tags', 'woocommerce' ),
					'singular_name'              => __( 'Tag', 'woocommerce' ),
					'menu_name'                  => _x( 'Tags', 'Admin menu name', 'woocommerce' ),
					'search_items'               => __( 'Search tags', 'woocommerce' ),
					'all_items'                  => __( 'All tags', 'woocommerce' ),
					'edit_item'                  => __( 'Edit tag', 'woocommerce' ),
					'update_item'                => __( 'Update tag', 'woocommerce' ),
					'add_new_item'               => __( 'Add new tag', 'woocommerce' ),
					'new_item_name'              => __( 'New tag name', 'woocommerce' ),
					'popular_items'              => __( 'Popular tags', 'woocommerce' ),
					'separate_items_with_commas' => __( 'Separate tags with commas', 'woocommerce' ),
					'add_or_remove_items'        => __( 'Add or remove tags', 'woocommerce' ),
					'choose_from_most_used'      => __( 'Choose from the most used tags', 'woocommerce' ),
					'not_found'                  => __( 'No tags found', 'woocommerce' ),
				),
				'show_ui'               => true,
				'query_var'             => true,
				'capabilities'          => array(
					'manage_terms' => 'manage_product_terms',
					'edit_terms'   => 'edit_product_terms',
					'delete_terms' => 'delete_product_terms',
					'assign_terms' => 'assign_product_terms',
				),
				'rewrite'               => array(
					'slug'       => $permalinks['tag_rewrite_slug'],
					'with_front' => false,
				),
			) )
		);

		register_taxonomy( 'product_shipping_class',
			apply_filters( 'woocommerce_taxonomy_objects_product_shipping_class', array( 'product', 'product_variation' ) ),
			apply_filters( 'woocommerce_taxonomy_args_product_shipping_class', array(
				'hierarchical'          => false,
				'update_count_callback' => '_update_post_term_count',
				'label'                 => __( 'Shipping classes', 'woocommerce' ),
				'labels' => array(
					'name'              => __( 'Product shipping classes', 'woocommerce' ),
					'singular_name'     => __( 'Shipping class', 'woocommerce' ),
					'menu_name'         => _x( 'Shipping classes', 'Admin menu name', 'woocommerce' ),
					'search_items'      => __( 'Search shipping classes', 'woocommerce' ),
					'all_items'         => __( 'All shipping classes', 'woocommerce' ),
					'parent_item'       => __( 'Parent shipping class', 'woocommerce' ),
					'parent_item_colon' => __( 'Parent shipping class:', 'woocommerce' ),
					'edit_item'         => __( 'Edit shipping class', 'woocommerce' ),
					'update_item'       => __( 'Update shipping class', 'woocommerce' ),
					'add_new_item'      => __( 'Add new shipping class', 'woocommerce' ),
					'new_item_name'     => __( 'New shipping class Name', 'woocommerce' ),
				),
				'show_ui'               => false,
				'show_in_quick_edit'    => false,
				'show_in_nav_menus'     => false,
				'query_var'             => is_admin(),
				'capabilities'          => array(
					'manage_terms' => 'manage_product_terms',
					'edit_terms'   => 'edit_product_terms',
					'delete_terms' => 'delete_product_terms',
					'assign_terms' => 'assign_product_terms',
				),
				'rewrite'               => false,
			) )
		);

		global $wc_product_attributes;

		$wc_product_attributes = array();

		if ( $attribute_taxonomies = wc_get_attribute_taxonomies() ) {
			foreach ( $attribute_taxonomies as $tax ) {
				if ( $name = wc_attribute_taxonomy_name( $tax->attribute_name ) ) {
					$tax->attribute_public          = absint( isset( $tax->attribute_public ) ? $tax->attribute_public : 1 );
					$label                          = ! empty( $tax->attribute_label ) ? $tax->attribute_label : $tax->attribute_name;
					$wc_product_attributes[ $name ] = $tax;
					$taxonomy_data                  = array(
						'hierarchical'          => false,
						'update_count_callback' => '_update_post_term_count',
						'labels'                => array(
							'name'              => sprintf( _x( 'Product %s', 'Product Attribute', 'woocommerce' ), $label ),
							'singular_name'     => $label,
							'search_items'      => sprintf( __( 'Search %s', 'woocommerce' ), $label ),
							'all_items'         => sprintf( __( 'All %s', 'woocommerce' ), $label ),
							'parent_item'       => sprintf( __( 'Parent %s', 'woocommerce' ), $label ),
							'parent_item_colon' => sprintf( __( 'Parent %s:', 'woocommerce' ), $label ),
							'edit_item'         => sprintf( __( 'Edit %s', 'woocommerce' ), $label ),
							'update_item'       => sprintf( __( 'Update %s', 'woocommerce' ), $label ),
							'add_new_item'      => sprintf( __( 'Add new %s', 'woocommerce' ), $label ),
							'new_item_name'     => sprintf( __( 'New %s', 'woocommerce' ), $label ),
							'not_found'         => sprintf( __( 'No &quot;%s&quot; found', 'woocommerce' ), $label ),
						),
						'show_ui'            => true,
						'show_in_quick_edit' => false,
						'show_in_menu'       => false,
						'meta_box_cb'        => false,
						'query_var'          => 1 === $tax->attribute_public,
						'rewrite'            => false,
						'sort'               => false,
						'public'             => 1 === $tax->attribute_public,
						'show_in_nav_menus'  => 1 === $tax->attribute_public && apply_filters( 'woocommerce_attribute_show_in_nav_menus', false, $name ),
						'capabilities'       => array(
							'manage_terms' => 'manage_product_terms',
							'edit_terms'   => 'edit_product_terms',
							'delete_terms' => 'delete_product_terms',
							'assign_terms' => 'assign_product_terms',
						),
					);

					if ( 1 === $tax->attribute_public && sanitize_title( $tax->attribute_name ) ) {
						$taxonomy_data['rewrite'] = array(
							'slug'         => trailingslashit( $permalinks['attribute_rewrite_slug'] ) . sanitize_title( $tax->attribute_name ),
							'with_front'   => false,
							'hierarchical' => true,
						);
					}

					register_taxonomy( $name, apply_filters( "woocommerce_taxonomy_objects_{$name}", array( 'product' ) ), apply_filters( "woocommerce_taxonomy_args_{$name}", $taxonomy_data ) );
				}
			}
		}

		do_action( 'woocommerce_after_register_taxonomy' );
	}

	/**
	 * Register core post types.
	 */
	

	/**
	 * Register our custom post statuses, used for order status.
	 */
	public static function register_post_status() {

		$order_statuses = apply_filters( 'wedcontest_register_artwork_order_post_statuses',
			array(
				'wedcontest-pending'    => array(
					'label'                     => _x( 'Pending revision','Artwork Status', 'wedcontest' ),
					'public'                    => false,
					'exclude_from_search'       => false,
					'show_in_admin_all_list'    => true,
					'show_in_admin_status_list' => true,
					'label_count'               => _n_noop( 'Pending revision <span class="count">(%s)</span>', 'Pending revision <span class="count">(%s)</span>', 'wedcontest' ),
				),
				'wedcontest-judging' => array(
					'label'                     => _x( 'Judging', 'Artwork Status', 'wedcontest' ),
					'public'                    => false,
					'exclude_from_search'       => false,
					'show_in_admin_all_list'    => true,
					'show_in_admin_status_list' => true,
					'label_count'               => _n_noop( 'Judging <span class="count">(%s)</span>', 'Judging <span class="count">(%s)</span>', 'wedcontest' ),
				),
				'wedcontest-judged'    => array(
					'label'                     => _x( 'Judged', 'Artwork Status', 'wedcontest' ),
					'public'                    => false,
					'exclude_from_search'       => false,
					'show_in_admin_all_list'    => true,
					'show_in_admin_status_list' => true,
					'label_count'               => _n_noop( 'Judged <span class="count">(%s)</span>', 'Judged <span class="count">(%s)</span>', 'wedcontest' ),
				),
				'wedcontest-cancelled'  => array(
					'label'                     => _x( 'Cancelled', 'Artwork Status', 'wedcontest' ),
					'public'                    => false,
					'exclude_from_search'       => false,
					'show_in_admin_all_list'    => true,
					'show_in_admin_status_list' => true,
					'label_count'               => _n_noop( 'Cancelled <span class="count">(%s)</span>', 'Cancelled <span class="count">(%s)</span>', 'wedcontest' ),
				),
			)
		);

		foreach ( $order_statuses as $order_status => $values ) {
			register_post_status( $order_status, $values );
		}
	}
	public static function append_post_status_list(){
		global $post;
		$complete=$label='';
		if($post->post_type == 'artwork'){
			$complete='';
			$complete1='';
			$complete2='';
			$complete3='';
			$label = '<span id="post-status-display">'._e('Pending','wedcontest').'</span>';
			$label1 = '<span id="post-status-display">'._e('Judging','wedcontest').'</span>';
			$label2 = '<span id="post-status-display">'._e('Judging','wedcontest').'</span>';
			$label3 = '<span id="post-status-display">'._e('Cancelled','wedcontest').'</span>';

			if($post->post_status == 'wedcontest-pending'){
				$complete = ' selected="selected"';
			}
			if($post->post_status == 'wedcontest-judging'){
				$complete1 = ' selected="selected"';
			}
			if($post->post_status == 'wedcontest-judged'){
				$complete2 = ' selected="selected"';
			}
			if($post->post_status == 'wedcontest-cancelled'){
				$complete3 = ' selected="selected"';
			}
			echo '
			<script>
			jQuery(document).ready(function($){
				$("select#post_status").append("<option value="wedcontest-pending" '.$complete.'>Pendiente Revision</option>");
				$(".misc-pub-section label").append("'.$label.'");
				$("select#post_status").append("<option value="wedcontest-judging" '.$complete1.'>Judging</option>");
				$(".misc-pub-section label").append("'.$label1.'");
				$("select#post_status").append("<option value="wedcontest-judged" '.$complete2.'>Judged</option>");
				$(".misc-pub-section label").append("'.$label2.'");
				$("select#post_status").append("<option value="wedcontest-cancelled" '.$complete3.'>Cancelled</option>");
				$(".misc-pub-section label").append("'.$label3.'");
			});
			</script>
			';
		}
	}
	/**
	 * Flush rewrite rules.
	 */
	public static function flush_rewrite_rules() {
		flush_rewrite_rules();
	}

	/**
	 * Add Product Support to Jetpack Omnisearch.
	 */
	public static function support_jetpack_omnisearch() {
		if ( class_exists( 'Jetpack_Omnisearch_Posts' ) ) {
			new Jetpack_Omnisearch_Posts( 'product' );
		}
	}

	/**
	 * Added product for Jetpack related posts.
	 *
	 * @param  array $post_types
	 * @return array
	 */
	public static function rest_api_allowed_post_types( $post_types ) {
		$post_types[] = 'product';

		return $post_types;
	}
}
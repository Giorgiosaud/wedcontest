<?php 
namespace Zonapro\WedContest\CustomPosts;
class Participant{
	function __construct()	{
		add_action('init',array($this,'register'));
		add_action( 'cmb2_admin_init', array($this,'zonapro_wedcontest_register_participants_data_metabox') );
		add_filter( 'enter_title_here', array($this,'title'));
	}
	public function title($title){
		$screen = get_current_screen();
		
		if  ( 'participant' == $screen->post_type ) {
			$title = __('Enter Participant name and Lastname');
		}
		
		return $title;
	}
	public function zonapro_wedcontest_register_participants_data_metabox(){
		$prefix = 'zonapro_wedcontest_participants_data_';
		$cmb_participants_data = new_cmb2_box( array(
			'id'            => $prefix . 'metabox',
			'title'         => esc_html__( 'Test Metabox', 'cmb2' ),
			'object_types'  => array( 'participants' ), // Post type
			// 'show_on_cb' => 'zonapro_wedcontest_show_if_front_page', // function should return a bool value
			// 'context'    => 'normal',
			// 'priority'   => 'high',
			// 'show_names' => true, // Show field names on the left
			// 'cmb_styles' => false, // false to disable the CMB stylesheet
			// 'closed'     => true, // true to keep the metabox closed by default
			// 'classes'    => 'extra-class', // Extra cmb2-wrap classes
			// 'classes_cb' => 'zonapro_wedcontest_add_some_classes', // Add classes through a callback.
		) );


	}
	public function register(){

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
			'supports'              => array( 'title', 'author' ),
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
}

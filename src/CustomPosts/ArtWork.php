<?php 
namespace Zonapro\WedContest\CustomPosts;
class ArtWork{
	function __construct()	{
		add_action('init',array($this,'register'));
		// add_action( 'cmb2_admin_init', array($this,'zonapro_wedcontest_register_participants_data_metabox') );
		add_filter( 'enter_title_here', array($this,'title'));
	}
	public function title($title){
		$screen = get_current_screen();
		
		if  ( 'participant' == $screen->post_type ) {
			$title = __('Enter Contest Title Here');
		}
		
		return $title;
	}
	public function register(){
		
	}
}

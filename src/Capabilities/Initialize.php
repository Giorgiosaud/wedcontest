<?php 
namespace Zonapro\WedContest\Capabilities;
class Initialize{
	function __construct(){
		add_action( 'admin_init', array($this,'add_theme_caps'));
	}
	public function add_theme_caps(){
		$mainRoles=array('administrator','editor');
		$secondaryRoles=array('author','contributor','subscriber');
		foreach ($mainRoles as $role) {
			$rolex = get_role($role);
			$rolex->add_cap('edit_participant', true);
			$rolex->add_cap('read_participant', true);
			$rolex->add_cap('delete_participant', true);
			$rolex->add_cap('edit_participants', true);
			$rolex->add_cap('edit_others_participants', true);
			$rolex->add_cap('publish_participant', true);
			$rolex->add_cap('read_private_participants', true);
		}
		foreach ($secondaryRoles as $role) {
			$rolex = get_role($role);
			$rolex->add_cap('read_participant', true);
		}
	}
}

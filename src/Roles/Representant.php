<?php 
namespace Zonapro\WedContest\Roles;

class Representant{
	public function __construct(){
		add_action('init', array($this,'register'));
	}
	public function register(){
		add_role(
			'representant',
			'Representant',
			[
				'read'         => true,
				'edit_posts'   => true,
				'upload_files' => true,
			]
		);
	}
}

<?php 
namespace Zonapro\WedContest\Profile\Extrafields;
use Zonapro\WedContest\Profile\Extrafields\Representant;
class Initialize{

	public function __construct()
	{
		add_action( 'show_user_profile',
			array(
				'\Zonapro\WedContest\Profile\Extrafields\Representant',
				'extra_profile_fields' 
			)
		);
		add_action( 
			'edit_user_profile',
			array(
			'\Zonapro\WedContest\Profile\Extrafields\Representant',
			'extra_profile_fields' )
		);
		add_action( 
			'personal_options_update', 
			array(
				'\Zonapro\WedContest\Profile\Extrafields\Representant',
				'save_extra_user_profile_fields' 
			)
		);
		add_action( 
			'edit_user_profile_update', 
			array(
				'\Zonapro\WedContest\Profile\Extrafields\Representant',
				'save_extra_user_profile_fields' 
			)
		);
	}


}
	
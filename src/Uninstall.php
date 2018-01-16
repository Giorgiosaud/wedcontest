<?php 
namespace Zonapro\WedContest;

class Uninstall{
	/**
	 * install initial dependencies
	 * @return void
	 */
	public static function uninstall(){
		set_transient( 'wedcontest_uninstalling', 'yes', MINUTE_IN_SECONDS * 10 );
		// die(var_dump('unistalling'));
		wedcontest_maybe_define_constant( 'WEDCONTEST_UNINSTALLING', true );
		self::delete_roles();
		self::delete_capabilities();
		delete_transient( 'wedcontest_uninstalling' );

		do_action( 'wedcontest_flush_rewrite_rules' );
		do_action( 'wedcontest_uninstalled' );
	}

	/**
	 * Create roles and capabilities.
	 */
	public static function delete_roles() {
		remove_role('representant');
	}
	public static function delete_capabilities(){
		$mainRoles=array('administrator','editor');
		$secondaryRoles=array('author','contributor','subscriber');
		foreach ($mainRoles as $role) {
			$rolex = get_role($role);
			$rolex->remove_cap('edit_participant');
			$rolex->remove_cap('read_participant');
			$rolex->remove_cap('delete_participant');
			$rolex->remove_cap('edit_participants');
			$rolex->remove_cap('edit_others_participants');
			$rolex->remove_cap('publish_participant');
			$rolex->remove_cap('read_private_participants');
		}
		foreach ($secondaryRoles as $role) {
			$rolex = get_role($role);
			$rolex->remove_cap('read_participant');
		}
	}
	/**
	 * Setup WC environment - post types, taxonomies, endpoints.
	 *
	 * @since 3.2.0
	 */
	private static function setup_environment() {
		// new PostTypes();
		// WedContest_Post_types::register_taxonomies();
		// WC()->query->init_query_vars();
		// WC()->query->add_endpoints();
		// WC_API::add_endpoint();
		// WC_Auth::add_endpoint();
	}
}
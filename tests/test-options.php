<?php
/**
 * Class SampleTest
 *
 * @package Wedcontest
 */

/**
 * Sample test case.
 */
class OptionsTest extends WP_UnitTestCase {

	/**
	 * A wedcontest Option Page Exist
	 * @test
	 */
	public function an_admin_user_can_see_wedcontest_options_page(){
		set_current_screen('admin.php?page=wedcontest');
		//this will cause is_admin to return true
		$this->admin_user_id = $this->factory->user->create( array( 'role' => 'representant' ) );
//		dd($this->admin_user_id);
		wp_set_current_user( $this->admin_user_id );
//		dd($this->editor_user_id);
		$this->assertTrue( is_admin() );
	}
}

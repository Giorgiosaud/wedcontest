<?php
/**
 * Class SampleTest
 *
 * @package Wedcontest
 */

/**
 * Sample test case.
 */
class RoleTest extends WP_UnitTestCase {

	/**
	 * A single example test.
	 * @test
	 */
	function a_user_can_be_a_representant() {
		// Replace this with some actual testing code.
		$user_id = $this->factory->user->create( array( 'role' => 'representant' ) );
		$oUser = get_user_by( 'id', $user_id );
		$aUser = get_object_vars( $oUser );
		
		$sRole = $aUser['roles'][0];
		// var_dump($sRole);
		// global $wp_roles;
		// var_dump($wp_roles);
		$this->assertEquals( 'representant', $sRole);

	}
}

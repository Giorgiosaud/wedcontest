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
		$this->assertEquals( 'representant', $sRole);
	}
	/**
	 * A register_representant shortcode.
	 * @test
	 */
	public function a_visitant_can_see_a_register_form_via_shortcode_in_page(){
		// $post = $this->factory->post->create( array( 'post_content' => 'representant' ) );
		$content = '[register_representant]';
		$shortcoderesult=do_shortcode($content);
		// var_dump($shortcoderesult);
        $hopeHas='Registering Representant';
        $this->assertContains($hopeHas,$shortcoderesult);

		// var_dump($go);
		// do_shortcode('[register_representant/]');
		// $this->assertSee('Registering Representant');

	}
}

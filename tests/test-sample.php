<?php
/**
 * Class SampleTest
 *
 * @package Wedcontest
 */

/**
 * Sample test case.
 */
class SampleTest extends WP_UnitTestCase {

	/**
	 * A single example test.
	 */
	function test_sample() {
		// Replace this with some actual testing code.
		$user_id = $this->factory->user->create( array( 'role' => 'representant' ) );
		$this->assertTrue( true );

	}
}

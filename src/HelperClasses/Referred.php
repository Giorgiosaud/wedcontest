<?php 
namespace Zonapro\WedContest\HelperClasses;
class Referred{
	public static $all = array(
		"diproinduca_guest"=>"I'm a guest of diproinduca",
		"invited"=>"I am invited by a relative or contact in Diproinduca",
		"other"=>"Other, please specify"
	);
	

	public static function all(){
		return self::$all;
	}
}

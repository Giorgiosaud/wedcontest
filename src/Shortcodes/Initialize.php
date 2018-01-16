<?php 
namespace Zonapro\WedContest\Shortcodes;

class Initialize{
	public function __construct(){
		add_shortcode('register_representant',array('\Zonapro\WedContest\Shortcodes\RegisterRepresentant','show'));
	}
}
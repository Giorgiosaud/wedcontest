<?php 
namespace Zonapro\WedContest\Widgets;

class Initialize{
	public function __construct(){
		add_action( 'widgets_init', array($this,'register') );
	}
	public function register(){
		register_widget( Session::class );
	}
}

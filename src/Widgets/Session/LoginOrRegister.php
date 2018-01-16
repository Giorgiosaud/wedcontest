<?php 
namespace Zonapro\WedContest\Widgets\Session;

class LoginOrRegister implements InterfaceSession{
	public function show(){
		$wedaction = get_query_var('wedaction');
		if($wedaction!='register'){
			$display=new LoginForm();
		}
		else{
			$display=new RegisterForm();
		}
		$display->show();
		
	}
}
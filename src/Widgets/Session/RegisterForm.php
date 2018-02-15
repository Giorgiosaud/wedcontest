<?php 
namespace Zonapro\WedContest\Widgets\Session;
class RegisterForm implements InterfaceSession{
	public function show(){
		?>
		<h3 style="text-align: center; color: #333333;" ><?php _e('Register Form','wedcontest'); ?></h3>
		<form action="<?php site_url( 'wp-login.php' )?>" method="post" accept-charset="utf-8">
			<input type="text" name="username" value="" placeholder="<?php _e('Username','wedcontest'); ?> ">
			<input type="password" name="password" value="" placeholder="<?php _e('Password','wedcontest'); 
			?>">
			
		</form>
		<a href="?wedaction=register"><?php _e('Register','wedcontest')?></a>
		<?php
	}	
}
<?php 
namespace Zonapro\WedContest\Widgets\Session;

use Zonapro\WedContest\HelperClasses\Countries;
use Zonapro\WedContest\HelperClasses\Referred;
class RegisterForm implements InterfaceSession{
	
public function __construct(){
	wp_enqueue_script( 'password-strength-meter' );
	// add_action( 'admin_post_register_representant', array($thisedhis,'register_new_representant'));
	// add_action('wp_ajax_nopriv_register_representant','register_new_representant');
}
public function register_new_representant(){
	// echo 'hola';
	// die( "Hello World" );
	echo json_encode($_POST);
	wp_die();
	// die(var_dump($_POST));
}
public function show(){
	?>
	<h3 style="text-align: center; color: #333333;" ><?php _e('Login Form','wedcontest'); ?></h3>
	<form action="<?php echo  admin_url( 'admin-post.php' )?>" method="POST" accept-charset="utf-8" id="register_form">
		<input type="text" name="username" value="" placeholder="<?php _e('Username','wedcontest'); ?> " required>
		<input type="text" name="name" value="" placeholder="<?php _e('Name','wedcontest'); ?> " required>
		<input type="text" name="last_name" value="" placeholder="<?php _e('Last Name','wedcontest'); ?> " required>
		<input type="email" name="email" value="" placeholder="<?php _e('Email','wedcontest'); ?> " required>
		<select name="country" required>
			<option value=""><?php _e('Select Your Country','wedcontest')?></option>}
			option
			<?php 
			
			foreach (Countries::all() as $key => $country) { ?>;
			<option value="<?= $key ?>"><?php _e($country,'wedcontest') ?></option>
			<?php } ?>
		</select>
		<input type="text" name="phone" value="" placeholder="<?php _e('Phone Number','wedcontest'); ?> " required>
		<select name="referral" required>
			<option value=""><?php _e('How did you find out about the contest? ')?></option>
			<?php foreach (Referred::all() as $key => $refered) { ?>;
			<option value="<?= $key ?>"><?php _e($refered,'wedcontest') ?></option>
			<?php } ?>
		</select>
		<input type="password" name="password" value="" placeholder="<?php _e('Password','wedcontest'); ?>" required>
		<input type="password" name="password_retyped" value="" placeholder="<?php _e('Password Confirmation','wedcontest'); 
		?>" required>
		<span id="password-strength"></span>
		<?php wp_nonce_field( 'register_representant' ); ?>
		<input type="hidden" name="action" value="register_representant">
		<div class="w-form-row for_links">
			<button type="submit" disabled="disabled"><?php _e('Submit','wedcontest')?></button>
		</div>
	</form>
	<?php
}
}
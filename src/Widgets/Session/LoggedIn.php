<?php 
namespace Zonapro\WedContest\Widgets\Session;


class LoggedIn implements InterfaceSession{

	public function show(){
	    ?>
        <p>
        <?= $this->logedinUsername();?>
        </p>
        <a href="?wedaction=register_participant">
            <?php _e('Register a new Participant','wedcontest')?>
        </a>
        <?php
	}

    private function logedinUsername()
    {
        $current_user = wp_get_current_user();
//        var_dump($current_user);
        return $current_user->user_firstname.' '.$current_user->user_lastname;
    }
}
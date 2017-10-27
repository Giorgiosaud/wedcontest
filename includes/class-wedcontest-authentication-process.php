<?php
if ( ! defined( 'ABSPATH' ) ){
    exit;
}

/**
 * WooCommerce Autoloader.
 *
 * @class       WedContest_Autoloader
 * @version     2.3.0
 * @package     WedContest/Classes
 * @category    Class
 * @author      Giorgiosaud
 */
class WedContest_Authentication_Process{
    public function __construct()
    {
        add_filter( 'authenticate', array($this,'checkForKey'), 10, 3 );
        add_filter( 'query_vars', array($this,'addConfirmQueryVars') );
        add_filter( 'template_include', array($this,'confirmationLink'), 99 ));

    }
    public function confirmationLink( $template)
    {
        var_dump($template);
        if (get_query_var('confirm') !== '') {
            var_dump('confirmation url');
            // $new_template = locate_template( array( 'confirmation-page-template.php' ) );
            // return $new_template;
        }

        return $template;
    }
    public function addConfirmQueryVars($vars)
    {
        $vars[]='confirm';
        return $vars;
    }
    public function checkForKey($user, $username, $password)
    {
        $user_obj = get_user_by( 'login', $username );

        if ($username != '') {
            $value = get_user_meta( $user->ID, 'confirmed', true );
            if ($value != null) {
                $user = new WP_Error( 'denied', __( "<strong>ERROR</strong>: You need to activate your account." . $value . "" ) );//create an error
                remove_action( 'authenticate', 'wp_authenticate_username_password', 20 ); //key found - don't proceed!
            }
        }

        return $user;
    }
}

new WedContest_Authentication_Process();
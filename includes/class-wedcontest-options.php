<?php
/**
 * Shortcodes
 *
 * @author   Automattic
 * @category Class
 * @package  WedContest/Classes
 * @version  3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WedContest Shortcodes class.
 */
class WedContest_Options {
	/**
     * Holds the values to be used in the fields callbacks
     */
	private $options;

    /**
     * Start up
     */
    public function __construct()
    {
    	add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
    	add_action( 'admin_init', array( $this, 'page_init' ) );
    }

    /**
     * Add options page
     */
    public function add_plugin_page()
    {
        // This page will be under "Settings"
    	add_options_page(
    		'Settings Admin', 
    		'wedcontest',
    		'manage_options', 
    		'wedcontest',
    		array( $this, 'create_admin_page' )
    	);
    }

    /**
     * Options page callback
     */
    public function create_admin_page()
    {
        // Set class property
    	$this->options = get_option( 'wedcontest' );
    	?>
    	<div class="wrap">
    		<h1>My Settings</h1>
    		<form method="post" action="options.php">
    			<?php
                // This prints out all hidden setting fields
    			settings_fields( 'my_option_group' );
    			do_settings_sections( 'wedcontest' );
    			submit_button();
    			?>
    		</form>
    	</div>
    	<?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
    	register_setting(
            'my_option_group', // Option group
            'wedcontest', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

    	add_settings_section(
            'setting_section_id', // ID
            'My Custom Settings', // pass
            array( $this, 'print_section_info' ), // Callback
            'my-setting-admin' // Page
        );  
    	add_settings_field(
    		'pass', 
    		'Pass', 
    		array( $this, 'pass_callback' ), 
    		'my-setting-admin', 
    		'setting_section_id'
    	);      
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
    	$new_input = array();
    	// if( isset( $input['id_number'] ) )
    	// 	$new_input['id_number'] = absint( $input['id_number'] );

    	if( isset( $input['pass'] ) )
    		$new_input['pass'] = sanitize_text_field( $input['pass'] );

    	return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function print_section_info()
    {
    	print 'Enter your settings below:';
    }

    /** 
     * Get the settings option array and print one of its values
     */
    // public function id_number_callback()
    // {
    // 	printf(
    // 		'<input type="text" id="id_number" name="wedcontest[id_number]" value="%s" />',
    // 		isset( $this->options['id_number'] ) ? esc_attr( $this->options['id_number']) : ''
    // 	);
    // }

    /** 
     * Get the settings option array and print one of its values
     */
    public function pass_callback()
    {
    	printf(
    		'<input type="text" id="pass" name="wedcontest[pass]" value="%s" />',
    		isset( $this->options['pass'] ) ? esc_attr( $this->options['pass']) : ''
    	);
    }

}
if( is_admin() )
	$my_settings_page = new WedContest_Options();
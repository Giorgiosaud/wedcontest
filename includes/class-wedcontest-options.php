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
	    add_menu_page(
		    'Wedcontest Settings',
		    'Wedcontest',
		    'manage_options',
		    'wedcontest',
		    array( $this, 'create_admin_page' ),
		    'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACIAAAAUCAYAAADoZO9yAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAgY0hSTQAAeiYAAICEAAD6AAAAgOgAAHUwAADqYAAAOpgAABdwnLpRPAAAAAZiS0dEAP8A/wD/oL2nkwAAAAlwSFlzAAAASAAAAEgARslrPgAABzNJREFUSMd1lnuMVdUVh7+1z7n3nvuAedBRhpGRgmi11heVEsQi1UaCpZQUJLbMVNumtXFQq1asYmlrRS1VfGErNTLyilqDgWoLasrDB2oRxVh1AIeBgRFxYGa8cx/n3rP36h9cHtWykp2c7L3Ozpe1fr+VLVRir1Mv6O+9yKlOqAlk0M+Wtn/87MbOVbMnn7b1lumn8/m468PmqtyBYspGbgiQBcrAfmA4EAH9wODKmQcUgBOB/QhVKO2V8xJgfIA5GwoD3+8sPDW2zkwUz8OLC1inf/nF2XMvHzN44WzV60XEHQtiDKcbo2PVsLsC0QX4wEhgAJBFqBHoUWhAeQ8YijAIiCNsx3EKkAba/H6npi9ihbHliVnPZ9kr+/S1jR+QH9xAalBGIJwF8Z3AgmNBgoTboind4qzzAE8dcfE4iKMbKCA4MZ5gjIdzKs6WHKQxpmzE4NQVcW49ShnB+ls/zo8f/qVg0r5+5c2PuhlVV+Kel99Xr66H9DcC2dSW0Noq+xtVfVxE+g6D3HBrfcxm80WsA1gEHABuwJgiuIFgeonFPFben2fq9T5RuRHVm/C8u1n1UCdTZgmq/agbADLUPLBm56S4b6SvYFm96i1tuu0lHTT6PCLrmPXwZhY/+Tqn1XnVwOhjKxKP6zVBSucHaVcbpN3mIO06EmlXl0hGM4Kkmx2k3Kgg6S4ACNLu6iCt/UFaO4OkvSS44ppzgqRtCZJRY5Dm7qDKM/7u7nzVGx05/XD3Lsn2vEfQOEpqTj5Bx41I8ofmc6Xr05CSl6akfPl/NCJaVKPzgBnARKBH4AGFamAHogqRyTTNiiuaJub1qrMRzjUAjUAPhu/hmfn5ZQ92mO5te/f99tnt7A/b9PyLX5HBhc8Y1N4lY0cONTs3vciOJ+/ksT8tZP0LH2Q/Z5w80A0IsBnYpooCAdCGag3W1TobPY5IlFv6UFk8H6CMqg8qKHWoK6Sbr73crx92wtozvjLkNtuxW6r/1cuKJ6bJS2t203bvlWzdtY7QenjGoz0Ru+N3F9ZvmPvyx10VEDVijMM5IAQUwQDnACngA9BJKA2HvqECLcA7wEzQTTjXo648ysw4c/Dr5w/wXxn7zUlyyYwbGYByYnCAvu0vcqDssStb4pOShXgwwnn+7CP1EAmcaiNwEIgBvcBXgZXAvZW9M4B5aqNhqZktojYKKlZfC9QDEarVqKs2LVNH2JEjan/aGHcbhpw3nsS7rzK41iMUQ19YBs+n57MivYUS1h3ViRXzCcZMAXkGeAtYBfwAeL3StiJwO6qbsG4DNpqOdTFU20CGIfI+yGLgamCPHL5YVSW0TNWdbd8JAqZde8WF/dv2fFrvVHBOGVFfR00isSUVeK1+Plx426v7XLJp1hCx0XCcvgF6D/DGISjpAB0ODKtUqQdkN8LXBBapmEfxzNPGuR3OuYmoRuZopUUDX1YG+Y4fs3/7jHnjf8+ExtFk4h4NNVVFQ/mufClsyOZKD5asHceVNycVmYvxcnhmGiLPg5wJ3Ak6FriwMupPAXkNI1Mw3lo1JoUxbfmlDz+nfrwbYwaBbD0CcgTo7InIqMn/zBTqp84ecytPTl5B69cf5c+/Wr4sMuH0UhhucLYcYaMJoI/llz38tnj+KInF1uGZg4gIcGnluh1AJ8JejOnKL1/4oRi/F5GTMlddX5174v5uxLQjdH4B5CiRO6tQLlB2ZcJ8bgv1fTc9smD5tny+/yJs9BroGeLcu5nmFjAmzC15yInnxysT1lTEGgH2UO8Zl/7RdXPxfMSYOzWy96Zmtvg4Z1HwVfUsYChQVZkBfgkI71g9034aIcBH6dqz1tSMabpx//pZf13+921y3qVL/DM1ElV1lpjgwsMDt+KKTRURPgtoxbLrELMg13qfAnvSTS0v4uz5OLWgvqko/PAqAMWSEvWe+7fRfZc9g9fvUzBBZn3uxB8SeLeTMC8AeMZ0AcNRW9YoClJNLZ4rW+tUCoqsReRUxIAxIOIQkVzrAk1fdcNP0s3XxdRpCjAYMRgT+SKyo9LLI6HX/WNgpjg98d7F6+fU9sk9iUtX3/zUfZ2dZOtVnv/2PgAvHl8jLnpAo2iRc7RHZdcaWZkvxh8fixH6HovEGIeRDnEaOnXDUzNb5mkpXAu6SMT0E0+0It5AhIPCcaLt4Pf9PaWe9u5C7tSaZM0jJpNfd0lm49JjczI//3VKo3JYKjhbzjp/5Zw3zbauuHfL1PWFZPMvKSw5+nLINF0r6iKjzll8H0kkyT02/6gkjwfS7qalO3fmdh00uYaqTPV34x8lrxw35qnLjpffURgnG/9t5rz6Hw2f3nzy4kKxdqTniRMjWXWuRm1ksTaLmJIkEntzrffnjv3fP65rLvhWodjX/cchLlVOVLF6Xz4b7DlnCSe90/x/00Mb5+xTwrfve46Tc+VQTWSL6lyfCh5KL2jy0LhCMN4X3PpfZSRl6BaGCWQAAABidEVYdGNvbW1lbnQAYm9yZGVyIGJzOjAgYmM6IzAwMDAwMCBwczowIHBjOiNlZWVlZWUgZXM6MCBlYzojMDAwMDAwIGNrOjUwMGQwMmE0ZjFmMWQ3NDk3MzQwY2M1ODY4OTZiZjExhJ/QAAAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxNy0xMC0yNVQyMTo0ODo0OSswMDowMFqGcm8AAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTctMTAtMjVUMjE6NDg6NDkrMDA6MDAr28rTAAAAAElFTkSuQmCC'
	    );
        // This page will be under "Settings"

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
    			settings_fields( 'wedcontest_settings' );
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
            'wedcontest_settings', // Option group
            'wedcontest', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );

    	add_settings_section(
            'wedcontest_main_setting', // ID
            'My Webhook Settings', // pass
            array( $this, 'print_section_info' ), // Callback
            'wedcontest' // Page
        );  
    	add_settings_field(
    		'pass', 
    		'Pass', 
    		array( $this, 'pass_callback' ), 
    		'wedcontest',
    		'wedcontest_main_setting'
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
    	_e('Enter your Webhook Settings below:','wedcontest');
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
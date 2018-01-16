<?php 
namespace Zonapro\WedContest;

use Zonapro\WedContest\Options;
class Initialize{
	/**
	 * The single instance of the class.
	 *
	 * @var wedcontest
	 * @since 2.1
	 */
	protected static $_instance = null;
	public $version="1.0";
	/**
	 * Main WedContest Instance.
	 *
	 * Ensures only one instance of WedContest is loaded or can be loaded.
	 *
	 * @since 2.1
	 * @static
	 * @see wedcontest()
	 * @return WedContest - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}
		/**
	 * Cloning is forbidden.
	 *
	 * @since 2.1
	 */
		public function __clone() {
			wc_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'wedcontest' ), '2.1' );
		}

	/**
	 * Unserializing instances of this class is forbidden.
	 *
	 * @since 2.1
	 */
	public function __wakeup() {
		wc_doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'wedcontest' ), '2.1' );
	}

	/**
	 * Define constant if not already set.
	 *
	 * @param string      $name  Constant name.
	 * @param string|bool $value Constant value.
	 */
	private function define( $name, $value ) {
		if ( ! defined( $name ) ) {
			define( $name, $value );
		}
	}
	/**
	 * Ensures fatal errors are logged so they can be picked up in the status report.
	 *
	 * @since 3.2.0
	 */
	public function log_errors() {
		$error = error_get_last();
		if ( E_ERROR === $error['type'] ) {
			$logger = wed_get_logger();
			$logger->critical(
				$error['message'] . PHP_EOL,
				array(
					'source' => 'fatal-errors',
				)
			);
		}
	}
	/**
	 * on creation of class execute.
	 *
	 * @param mixed $key Key name.
	 * @return mixed
	 */
	public function __construct()
	{
		$this->define_constants();
		
		$this->init_hooks();
		if( is_admin() )
			$my_settings_page = new Options();
		do_action( 'wedcontest_loaded' );

	}
	/**
	 * Define WedContest Constants.
	 */
	private function define_constants() {
		$upload_dir = wp_upload_dir( null, false );

		$this->define( 'WEDCONTEST_ABSPATH', dirname( WEDCONTEST_PLUGIN_FILE ) . '/' );
		$this->define( 'WEDCONTEST_PLUGIN_BASENAME', plugin_basename( WEDCONTEST_PLUGIN_FILE ) );
		$this->define( 'WEDCONTEST_VERSION', $this->version );
		// $this->define( 'WEDCONTEST_DELIMITER', '|' );
		$this->define( 'WEDCONTEST_LOG_DIR', $upload_dir['basedir'] . '/wed-logs/' );
		// $this->define( 'WEDCONTEST_SESSION_CACHE_GROUP', 'wedcontest_session_id' );
		// $this->define( 'WEDCONTEST_TEMPLATE_DEBUG_MODE', false );
	}
	/**
	 * Initialize Hooks
	 */
	private function init_hooks() {

		register_activation_hook( WEDCONTEST_PLUGIN_FILE, array( Install::class, 'install' ) );
		new \Zonapro\WedContest\Capabilities\Initialize();
		
		register_deactivation_hook(WEDCONTEST_PLUGIN_FILE, array( Uninstall::class, 'uninstall' ));
		new \Zonapro\WedContest\CustomPosts\Initialize();
		new \Zonapro\WedContest\Capabilities\Initialize();
		// add_action('init',array('\Zonapro\WedContest\PostTypes','create'));
		// add_action('init',array('\Zonapro\WedContest\Capabilities','update'));
		// register_shutdown_function( array( $this, 'log_errors' ) );
		new \Zonapro\WedContest\Shortcodes\Initialize();
		new \Zonapro\WedContest\Widgets\Initialize();
		new \Zonapro\WedContest\Profile\Extrafields\Initialize();
		// add_action( 'after_setup_theme', array( $this, 'setup_environment' ) );
		// add_action( 'after_setup_theme', array( $this, 'include_template_functions' ), 11 );
		// add_action( 'init', array( $this, 'init' ), 0 );
		// add_action( 'init', array( 'WedContest_Shortcodes', 'init' ) );
		// add_action( 'init', array( 'WC_Emails', 'init_transactional_emails' ) );
		// add_action( 'init', array( $this, 'wpdb_table_fix' ), 0 );
		// add_action( 'switch_blog', array( $this, 'wpdb_table_fix' ), 0 );

		add_action( 'wp_enqueue_scripts', array($this,'scripts' ));
		add_action('wp_ajax_nopriv_register_representant',array($this,'register_new_representant'));
	}
	public function register_new_representant(){
		
		$email=$_POST['email'];
		$username=$_POST['email'];
		$password=$_POST['password'];
		$password_verify=$_POST['password_retyped'];
		$nonce=$_POST['_wpnonce'];
	// $email=json_decode($_POST['data']);
	// echo $email;
		if ( ! wp_verify_nonce( $nonce, 'register_representant' ) ){
			status_header(403);
			$error = new WP_Error( '-1', 'The nonce not exist please dont cheat us' );
			wp_send_json_error( $error );
		}
		if ( email_exists( $email ) ) {
			status_header(403);
			$error = new WP_Error( '-2', 'The email already exist' );
			wp_send_json_error( $error );
		}
		if(username_exists($username)){
			status_header(403);
			$error = new WP_Error( '-3', 'The username already exist' );
			wp_send_json_error( $error );	
		}
		if($password!=$password_verify){
			status_header(403);
			$error = new WP_Error( '-4', 'The passwords dont match' );
			wp_send_json_error( $error );
		}
		$name=$_POST['name'];
		$nick=$_POST['username'];
		$lastName=$_POST['last_name'];
		$userdata = array(
			'user_login' => $username,
			'user_pass'  => $password,
			'user_email' => $email,
			'first_name' => $name,
			'last_name'=>$lastName,
			'nickname'   => $nick,
			'role'=>'representant'
		);
		$user_id = wp_insert_user( $userdata ) ;
		update_user_meta( $user_id, 'country', $_POST['country'] );
		update_user_meta( $user_id, 'phone', $_POST['phone'] );
		update_user_meta( $user_id, 'email_confirmed', false );
		update_user_meta( $user_id, 'referral', $_POST['referral'] );
		$nonce = wp_create_nonce( $username.$email );
		update_user_meta( $user_id, 'email_confirm_number', $nonce );
		echo 'registered';
		wp_die();
	}
	public function scripts(){
		wp_register_script( 'wedcontest-script', WEDCONTEST_PLUGIN_URL.'js/wedcontest-script.js' );
		wp_enqueue_script( 'wedcontest-script' );
		wp_localize_script( 'wedcontest-script', 'wedcontest',
			array( 
				'ajax_url' => admin_url( 'admin-ajax.php' ), 
				'we_value' => 1234 
			));

	}
	
}
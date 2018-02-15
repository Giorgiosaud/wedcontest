<?php 
namespace Zonapro\WedContest\Widgets;

use Zonapro\WedContest\Widgets\Session\LoggedIn;
use Zonapro\WedContest\Widgets\Session\LoginOrRegister;

class Session extends \WP_Widget{
	function __construct() {
		parent::__construct(
			'zonapro_session',
			__('Session Widget Zonapro', 'wedcontest'),
			array( 'description' => __( 'Manage Widget Session login Register users for wedcontest of diproinduca', 'wedcontest' ), )
		);
	}
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

		if(is_user_logged_in()){
			$display=new LoggedIn();
		}
		else{
			$display=new LoginOrRegister();
		}
		echo $display->show();
		
		echo $args['after_widget'];

	}

	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'wedcontest' );
		}
	// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}

	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance;
	}

}

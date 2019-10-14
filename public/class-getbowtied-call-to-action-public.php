<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://getbowtied.com/
 * @since      1.0.0
 *
 * @package    Getbowtied_Call_To_Action
 * @subpackage Getbowtied_Call_To_Action/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * @package    Getbowtied_Call_To_Action
 * @subpackage Getbowtied_Call_To_Action/public
 * @author     GetBowtied <vanesa@getbowtied.com>
 */
class Getbowtied_Call_To_Action_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

		add_action( 'wp_footer', array( $this, 'get_buttons' ) );
	}

	public function get_buttons() {

		$purchase_link = get_option( 'purchase_button_link', '' );
		$purchase_text = get_option( 'purchase_button_text', '' );
		$message_link  = get_option( 'message_button_link', '' );
		$message_text  = get_option( 'message_button_text', '' );
	?>

		<div class="getbowtied_call_to_action">
			<?php if( !empty($message_link) && !empty($message_text) ) { ?>
				<a class="call_to_action_button message_button" href="<?php echo esc_url($message_link); ?>" target="_blank">
					<span class="action-btn message-btn">
						<svg
							xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
							width="18" height="18"
							viewBox="0 0 50 50"
							fill="#ffffff">
							<path d="M 25 2 C 12.300781 2 2 11.601563 2 23.5 C 2 29.800781 4.898438 35.699219 10 39.800781 L 10 48.601563 L 18.601563 44.101563 C 20.699219 44.699219 22.800781 44.898438 25 44.898438 C 37.699219 44.898438 48 35.300781 48 23.398438 C 48 11.601563 37.699219 2 25 2 Z M 27.300781 30.601563 L 21.5 24.398438 L 10.699219 30.5 L 22.699219 17.800781 L 28.601563 23.699219 L 39.101563 17.800781 Z "></path>
						</svg>
						<span><?php echo esc_attr($message_text); ?></span>
					</span>
				</a>
			<?php } ?>

			<?php if( !empty($purchase_link) && !empty($purchase_text) ) { ?>
				<a class="call_to_action_button purchase_button" href="<?php echo esc_url($purchase_link); ?>" target="_blank">
					<span class="action-btn purchase-btn">
						<svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 512 512"  fill="#ffffff" width="18" height="18"><path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm64-192c0-8.8 7.2-16 16-16h96c8.8 0 16 7.2 16 16v96c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16v-96zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z" class=""></path></svg>
						<span><?php echo esc_attr($purchase_text); ?></span>
					</span>
				</a>
			<?php } ?>
		</div>

	<?php
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/getbowtied-call-to-action-public.css', array(), $this->version, 'all' );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {}

}

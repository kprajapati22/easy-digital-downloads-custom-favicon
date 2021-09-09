<?php 

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Admin Class
 *
 * Handles generic Admin functionality and AJAX requests.
 *
 * @package Easy Digital Downloads - Custom Favicon
 * @since 1.0.0
 */
class Edd_Custom_Favicon_AdminPages {
	
	public function __construct() {		
		//constructer code here
	}
	
	
	/**
	 * Favicon Settings
	 *
	 * Its Add fields to settings
	 *
	 * @package Easy Digital Downloads - Custom Favicon
	 * @since 1.0.0
	 */
	public function edd_custom_favicon_settings($settings) {
		$new_settings = array(
				array(
						'id'    => 'edd_custom_favicon',
						'name'  => '<strong>' . __( 'Custom Favicon Settings', 'eddcustomfavicon' ) . '</strong>',
						'desc'  => '',
						'type'  => 'header'
				),
				array(
						'id'    => 'edd_custom_favicon_favicon',
						'name'  => __( 'Favicon', 'eddcustomfavicon' ),
						'desc'  => __( 'If your theme doesn\'t natively support favicons, upload one here!', 'eddcustomfavicon' ),
						'type'  => 'upload'
				),
				array(
						'id'    => 'edd_custom_favicon_color',
						'name'  => __( 'Text Color', 'eddcustomfavicon' ),
						'desc'  => __( 'Specify the color for the icon text', 'eddcustomfavicon' ),
						'type'  => 'color',
						'std'   => '#000000'
				),
				array(
						'id'    => 'edd_custom_favicon_background',
						'name'  => __( 'Background Color', 'eddcustomfavicon' ),
						'desc'  => __( 'Specify the background color for the icon', 'eddcustomfavicon' ),
						'type'  => 'color',
						'std'   => '#ffffff'
				),
				array(
						'id'    => 'edd_custom_favicon_style',
						'name'  => __( 'Font Style', 'eddcustomfavicon' ),
						'desc'  => __( 'Set the style for the badge text', 'eddcustomfavicon' ),
						'type'  => 'select',
						'options'   => array(
								'normal'    => __( 'Normal', 'eddcustomfavicon' ),
								'italic'    => __( 'Italic', 'eddcustomfavicon' ),
								'bold'      => __( 'Bold', 'eddcustomfavicon' )
						),
						'std'   => 'bold'
				),
				array(
						'id'    => 'edd_custom_favicon_shape',
						'name'  => __( 'Badge Shape', 'eddcustomfavicon' ),
						'desc'  => __( 'Specify the shape of the badge', 'eddcustomfavicon' ),
						'type'  => 'select',
						'options'   => array(
								'circle'    => __( 'Circle', 'eddcustomfavicon' ),
								'rectangle' => __( 'Rectangle', 'eddcustomfavicon' ),
						),
						'std'   => 'circle'
				),
				array(
						'id'    => 'edd_custom_favicon_animation',
						'name'  => __( 'Badge Animation', 'eddcustomfavicon' ),
						'desc'  => __( 'Specify the animation for badge updates', 'eddcustomfavicon' ),
						'type'  => 'select',
						'options'    => array(
								'none'      => __( 'None', 'eddcustomfavicon' ),
								'slide'     => __( 'Slide', 'eddcustomfavicon' ),
								'fade'      => __( 'Fade', 'eddcustomfavicon' ),
								'pop'       => __( 'Pop', 'eddcustomfavicon' ),
								'popFade'   => __( 'Pop/Fade', 'eddcustomfavicon' ),
								'random'	=> __( 'Random', 'eddcustomfavicon')
						),
						'std'   => 'random'
				)
		);
		
		return array_merge( $settings, $new_settings );
	}
	
	/**
	 * Adding Hooks
	 *
	 * @package Easy Digital Downloads - Custom Favicon
	 * @since 1.0.0
	 */
	public function add_hooks() {
		// Register settings
		add_filter( 'edd_settings_extensions', array( $this, 'edd_custom_favicon_settings' ), 1 );
	}	
}
?>
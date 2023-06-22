<?php
/**
 * Handles Admin functionality.
 *
 * @package Easy Digital Downloads - Custom Favicon
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Admin Class
 *
 * Handles generic Admin functionality and AJAX requests.
 *
 * @package Easy Digital Downloads - Custom Favicon
 * @since 1.0.0
 */
class Edd_Custom_Favicon_Admin {

	/**
	 * Add a settings section
	 *
	 * @param array $sections section names.
	 *
	 * @return array
	 */
	public function edd_custom_favicon_settings_section( $sections ) {
		$sections['custom_favicon'] = __( 'Custom Favicon', 'eddcustomfavicon' );

		return $sections;
	}

	/**
	 * Favicon Settings
	 *
	 * Its Add fields to settings
	 *
	 * @param array $settings edd settings array.
	 * @package Easy Digital Downloads - Custom Favicon
	 * @since 1.0.0
	 */
	public function edd_custom_favicon_settings( $settings ) {
		$edd_custom_favicon_settings = array(
			array(
				'id'   => 'edd_custom_favicon',
				'name' => '<strong>' . esc_html__( 'Custom Favicon Settings', 'eddcustomfavicon' ) . '</strong>',
				'desc' => '',
				'type' => 'header',
			),
			array(
				'id'   => 'edd_custom_favicon_favicon',
				'name' => esc_html__( 'Favicon', 'eddcustomfavicon' ),
				'desc' => esc_html__( 'If your theme doesn\'t natively support favicons, upload one here!', 'eddcustomfavicon' ),
				'type' => 'upload',
			),
			array(
				'id'   => 'edd_custom_favicon_color',
				'name' => esc_html__( 'Text Color', 'eddcustomfavicon' ),
				'desc' => esc_html__( 'Specify the color for the icon text', 'eddcustomfavicon' ),
				'type' => 'color',
				'std'  => '#000000',
			),
			array(
				'id'   => 'edd_custom_favicon_background',
				'name' => esc_html__( 'Background Color', 'eddcustomfavicon' ),
				'desc' => esc_html__( 'Specify the background color for the icon', 'eddcustomfavicon' ),
				'type' => 'color',
				'std'  => '#ffffff',
			),
			array(
				'id'      => 'edd_custom_favicon_style',
				'name'    => esc_html__( 'Font Style', 'eddcustomfavicon' ),
				'desc'    => esc_html__( 'Set the style for the badge text', 'eddcustomfavicon' ),
				'type'    => 'select',
				'options' => array(
					'normal' => esc_html__( 'Normal', 'eddcustomfavicon' ),
					'italic' => esc_html__( 'Italic', 'eddcustomfavicon' ),
					'bold'   => esc_html__( 'Bold', 'eddcustomfavicon' ),
				),
				'std'     => 'bold',
			),
			array(
				'id'      => 'edd_custom_favicon_shape',
				'name'    => esc_html__( 'Badge Shape', 'eddcustomfavicon' ),
				'desc'    => esc_html__( 'Specify the shape of the badge', 'eddcustomfavicon' ),
				'type'    => 'select',
				'options' => array(
					'circle'    => esc_html__( 'Circle', 'eddcustomfavicon' ),
					'rectangle' => esc_html__( 'Rectangle', 'eddcustomfavicon' ),
				),
				'std'     => 'circle',
			),
			array(
				'id'      => 'edd_custom_favicon_animation',
				'name'    => esc_html__( 'Badge Animation', 'eddcustomfavicon' ),
				'desc'    => esc_html__( 'Specify the animation for badge updates', 'eddcustomfavicon' ),
				'type'    => 'select',
				'options' => array(
					'none'    => esc_html__( 'None', 'eddcustomfavicon' ),
					'slide'   => esc_html__( 'Slide', 'eddcustomfavicon' ),
					'fade'    => esc_html__( 'Fade', 'eddcustomfavicon' ),
					'pop'     => esc_html__( 'Pop', 'eddcustomfavicon' ),
					'popFade' => esc_html__( 'Pop/Fade', 'eddcustomfavicon' ),
					'random'  => esc_html__( 'Random', 'eddcustomfavicon' ),
				),
				'std'     => 'random',
			),
		);

		return array_merge( $settings, array( 'custom_favicon' => $edd_custom_favicon_settings ) );
	}

	/**
	 * Adding Hooks
	 *
	 * @package Easy Digital Downloads - Custom Favicon
	 * @since 1.0.0
	 */
	public function add_hooks() {
		// Add tabs.
		add_filter( 'edd_settings_sections_extensions', array( $this, 'edd_custom_favicon_settings_section' ) );
		// Register settings.
		add_filter( 'edd_settings_extensions', array( $this, 'edd_custom_favicon_settings' ), 1 );
	}
}


<?php 

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Public Pages Class
 *
 * Handles front end functionality.
 *
 * @package Easy Digital Downloads - Custom Favicon
 * @since 1.0.0
 */
class Edd_Custom_Favicon_PublicPages {
	
	public function __construct() {
		//constructer code here
	}
	
	/**
	 * Conditionally add favicon
	 *
	 * @package 	Easy Digital Downloads - Custom Favicon
	 * @since       1.0.0
	 */
	public function edd_custom_favicon_add_favicon() {
		
		//get favicon
		$favicon = edd_get_option( 'edd_custom_favicon_favicon', false );
	
		if( $favicon ) {
			$type = edd_get_file_ctype( $favicon );
			echo '<link rel="icon" href="' . esc_url( $favicon ) . '" type="' . $type . '" />';
		}
	}
	
	/**
	 * Adding Hooks
	 *
	 * @package Easy Digital Downloads - Custom Favicon
	 * @since 1.0.0
	 */
	public function add_hooks() {
		
		// Add favicon
		add_action( 'wp_head', array( $this, 'edd_custom_favicon_add_favicon' ) );
	}
}
?>
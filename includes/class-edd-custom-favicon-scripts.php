<?php 

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * Scripts Class
 *
 * Includes required scripts
 *
 * @package Easy Digital Downloads - Custom Favicon
 * @since 1.0.0
 */
class Edd_Custom_Favicon_Scripts {
	
	public function __construct() {
		//constructer code here
	}
	
	public function edd_custom_favicon_scripts() {
		
		//include script
		wp_enqueue_script( 'favico', EDD_CUSTOM_FAVICON_URL . 'includes/js/favico-0.3.5.min.js' );
		
		//include script
		wp_enqueue_script( 'edd-custom-favicon', EDD_CUSTOM_FAVICON_URL . 'includes/js/edd-custom-favicon.js', array( 'jquery' ), EDD_CUSTOM_FAVICON_VERSION );
		
		//if random animation selected then pick one from available animation
		$defaut_animation = edd_get_option( 'edd_custom_favicon_animation', 'random' );
		$animation = array('none', 'slide', 'fade', 'pop', 'popFade');
		if($defaut_animation == 'random') {
			$value = array_rand($animation, 1);
			$defaut_animation = $animation[$value];
		}
		
		//localize script
		wp_localize_script( 'edd-custom-favicon', 'EddCustomFaviconVars', array(
				'color'     => edd_get_option( 'edd_custom_favicon_color', '#000000' ),
				'background'=> edd_get_option( 'edd_custom_favicon_background', '#ffffff' ),
				'style'     => edd_get_option( 'edd_custom_favicon_style', 'bold' ),
				'shape'     => edd_get_option( 'edd_custom_favicon_shape', 'circle' ),
				'animation' => $defaut_animation,
				'count'     => edd_get_cart_quantity()
		) );
	}
	
	/**
	 * Adding Hooks
	 *
	 * @package Easy Digital Downloads - Custom Favicon
	 * @since 1.0.0
	 */
	public function add_hooks() {
		add_action( 'wp_enqueue_scripts', array($this, 'edd_custom_favicon_scripts') );
	}
}
?>
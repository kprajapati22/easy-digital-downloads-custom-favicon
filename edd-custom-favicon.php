<?php
/**
 * Plugin Name:     Easy Digital Downloads - Custom Favicon
 * Description:     Adds a custom favicon to the EDD shopping cart
 * Version:         1.0.2
 * Author:          kprajapati22
 * Author URI:      https://profiles.wordpress.org/kprajapati22
 * Text Domain:     eddcustomfavicon
 * License: GPLv2
 *
 * @package Easy Digital Downloads - Custom Favicon
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Basic plugin definitions
 *
 * @package Easy Digital Downloads - Custom Favicon
 * @since 1.0.0
 */
if ( ! defined( 'EDD_CUSTOM_FAVICON_VERSION' ) ) {
	define( 'EDD_CUSTOM_FAVICON_VERSION', '1.0.1' ); // version of plugin.
}
if ( ! defined( 'EDD_CUSTOM_FAVICON_DIR' ) ) {
	define( 'EDD_CUSTOM_FAVICON_DIR', dirname( __FILE__ ) ); // plugin dir.
}
if ( ! defined( 'EDD_CUSTOM_FAVICON_URL' ) ) {
	define( 'EDD_CUSTOM_FAVICON_URL', plugin_dir_url( __FILE__ ) ); // plugin url.
}
if ( ! defined( 'EDD_CUSTOM_FAVICON_ADMIN' ) ) {
	define( 'EDD_CUSTOM_FAVICON_ADMIN', EDD_CUSTOM_FAVICON_DIR . '/includes/admin' ); // plugin admin dir.
}

/**
 * Load Text Domain
 *
 * This gets the plugin ready for translation.
 *
 * @package Easy Digital Downloads - Custom Favicon
 * @since 1.0.0
 */
load_plugin_textdomain( 'eddcustomfavicon', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );


/**
 * The main function responsible for returning the one true EDD_Dynamic_Icon
 * instance to functions everywhere
 *
 * @since       1.0.0
 * @return      Easy Digital Downloads - Custom Favicon
 */
function edd_custom_favicon_load() {
	if ( ! class_exists( 'Easy_Digital_Downloads' ) ) {
		/**
		 * Display notice
		 */
		function edd_custom_favicon_notice() {
			?>
			<div class="error">
				<p>
					<strong><?php esc_html_e( 'Its seems to be Easy Digital Downloads is not activated. Please first active Easy digital downloads. If you don\'t have Easy Digital Downloads then', 'eddcustomfavicon' ); ?></strong>
					<a href="https://wordpress.org/plugins/easy-digital-downloads/" target="_blank"><?php esc_html_e( 'CLICK HERE', 'eddcustomfavicon' ); ?></a>
					<strong><?php esc_html_e( 'to download', 'eddcustomfavicon' ); ?></strong>
				</p>
			</div>
			<?php
		}
		add_action( 'admin_notices', 'edd_custom_favicon_notice' );
	} else {
		/**
		 * Settings Link
		 *
		 * Adds a settings link to the plugin list.
		 *
		 * @package Easy Digital Downloads - Custom Favicon
		 * @param string $links plugin settings link.
		 * @param string $file plugin file name.
		 * @since 1.0.0
		 */
		function edd_custom_favicon_add_settings_link( $links, $file ) {

			static $this_plugin;
			if ( ! $this_plugin ) {
				$this_plugin = plugin_basename( __FILE__ );
			}
			if ( $file === $this_plugin ) {
				$settings_link = '<a href="edit.php?post_type=download&page=edd-settings&tab=extensions">' . esc_html__( 'Settings', 'eddcustomfavicon' ) . '</a>';
				array_unshift( $links, $settings_link );
			}
			return $links;
		}
		// adding setting link below plugin name in plugins list.
		add_filter( 'plugin_action_links', 'edd_custom_favicon_add_settings_link', 10, 2 );

		// global variables.
		global $edd_custom_favicon_scripts,$edd_custom_favicon_public, $edd_custom_favicon_admin;

		/**
		 * Includes Files
		 *
		 * Includes some required files for plugin
		 *
		 * @package Easy Digital Downloads - Custom Favicon
		 * @since 1.0.0
		 */

		// script class, handles all the scripts and css.
		include_once EDD_CUSTOM_FAVICON_DIR . '/includes/class-edd-custom-favicon-scripts.php';
		$edd_custom_favicon_scripts = new Edd_Custom_Favicon_Scripts();
		$edd_custom_favicon_scripts->add_hooks();

		// Public Pages Class for handling front side functionalities.
		require_once EDD_CUSTOM_FAVICON_DIR . '/includes/class-edd-custom-favicon-public.php';
		$edd_custom_favicon_public = new Edd_Custom_Favicon_Public();
		$edd_custom_favicon_public->add_hooks();

		// Admin Pages Class for admin site.
		require_once EDD_CUSTOM_FAVICON_ADMIN . '/class-edd-custom-favicon-admin.php';
		$edd_custom_favicon_admin = new Edd_Custom_Favicon_Admin();
		$edd_custom_favicon_admin->add_hooks();
	}
}
add_action( 'plugins_loaded', 'edd_custom_favicon_load' );

<?php
/**
 * Custom Products
 *
 * @package     LionHeart\CustomProducts
 * @author      Chris Norman
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Easy Products Add
 * Plugin URI:  https://lionheartdevs.com
 * Description: This is an light weight plugin that adds a custom post type for products and makes it easy to add your products to your website.
 * Version:     1.0.0
 * Author:      Chris Norman
 * Author URI:  https://lionheartdevs.com/about-us
 * Text Domain: customproducts
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

namespace LionHeart\CustomProducts;

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, please use this plugin as directed.' );
}

/**
 * Setup the plugin's constants.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_constants() {
	$plugin_url = plugin_dir_url( __FILE__ );
	if ( is_ssl() ) {
		$plugin_url = str_replace( 'http://', 'https://', $plugin_url );
	}

	define( 'CUSTOMPRODUCTS_URL', $plugin_url );
	define( 'CUSTOMPRODUCTS_DIR', plugin_dir_path( __DIR__ ) );
}

/**
 * Initialize the plugin hooks.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_hooks() {
	register_activation_hook( __FILE__, __NAMESPACE__ . '\activate_plugin' );
	register_deactivation_hook( __FILE__, __NAMESPACE__ . '\deactivate_plugin' );
}

/**
 * Fires when plugin is activated.
 *
 * @since 1.0.0
 *
 * @return void
 */
function activate_plugin() {
	init_autoloader();

	Custom\register_custom_post_type();
	Custom\register_custom_taxonomy();

	flush_rewrite_rules();
}

/**
 * The plugin is deactivating.  Delete out the rewrite rules option.
 *
 * @since 1.0.0
 *
 * @return void
 */
function deactivate_plugin() {
	delete_option( 'rewrite_rules' );
}


/**
 * Kick off the plugin by initializing the plugin files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function init_autoloader() {
	require_once( 'src/support/autoloader.php' );

	Support\autoload_files( __DIR__ . '/src/' );
}

/**
 * Launch the plugin
 *
 * @since 1.0.0
 *
 * @return void
 */
function launch() {
	init_constants();
	init_hooks();
	init_autoloader();
}


launch();

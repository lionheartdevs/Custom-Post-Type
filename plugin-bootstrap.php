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

/**********************************
 * security measures
 **********************************/

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Sorry, please use this plugin as directed.' );
}

/**********************************
 * constants and globals
 **********************************/
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

	define('SIMPLE_PRODUCTS_URL', $plugin_url);
	define('SIMPLE_PRODUCTS_DIR', plugin_dir_path(__DIR__));

}

/*******************************************
 * plugin text domain for translations
 *******************************************/
//what does this do?
load_plugin_textdomain( 'customproducts', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

/**********************************
 * includes
 **********************************/
//I like how this is constructed.
//if(is_admin()) {
//	// load admin includes
//	require_once SIMPLE_PRODUCTS_DIR . '/admin/simple-products-admin.php';
//} else {
//	// load any front-end include files
//}
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
	require_once('lib/vendor/autoload.php');
}

/**********************************
 * add_actions
 **********************************/
/**
 * hooks functions into proper actions.
 *
 * @since 1.0.0
 *
 * @return void
 */
function load_add_actions_setup() {
	add_action('admin_menu', 'LionHeart\CustomProducts\Custom\stripe_submenu_settings_setup');
}

function global_variables_setup() {
	$stripe_options = get_option('stripe_settings');
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
	global_variables_setup();
	load_add_actions_setup();
}


launch();

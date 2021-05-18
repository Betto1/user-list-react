<?php

/**
 *
 * @link              https://bettocorp.com/
 * @since             1.0.0
 * @package           User_List
 *
 * @wordpress-plugin
 * Plugin Name:       User Lists
 * Plugin URI:        https://bettocorp.com/
 * Description:       User Information
 * Version:           1.0.0
 * Author:            Alberto Pérez
 * Author URI:        https://bettocorp.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       user-list
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Define Plugin Constants
 */
define( 'USER_LIST_VERSION', '1.0.0' );

define( 'USER_LIST_URL', 'my-lovely-users-table' );

define ( 'USER_LIST_GET_URL', trailingslashit( plugins_url( '/', __FILE__ ) ) );

define( 'USER_LIST_PATH', trailingslashit( plugin_dir_path( __FILE__ ) ) );

/**
 * Loading Composer
 */
if (file_exists('./vendor/autoload.php')) {
	require_once './vendor/autoload.php';
}


/**
 * The code that runs during plugin activation.
 */
function activate_user_list() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-user-list-activator.php';
	User_List_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 */
function deactivate_user_list() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-user-list-deactivator.php';
	User_List_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_user_list' );
register_deactivation_hook( __FILE__, 'deactivate_user_list' );

/**
 * The core plugin class
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-user-list.php';

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_user_list() {

	$plugin = new User_List();
	$plugin->run();

}
run_user_list();

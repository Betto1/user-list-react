<?php

/**
 * Fired during plugin activation
 *
 * @link       https://bettocorp.com/
 * @since      1.0.0
 *
 * @package    User_List
 * @subpackage User_List/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    User_List
 * @subpackage User_List/includes
 * @author     Alberto Pérez <alberto@bettocorp.com>
 */
class User_List_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Update the permalink entries in the database, so the permalink structure needn't be redone every page load
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		add_rewrite_tag( '%'. USER_LIST_URL .'%', '([^/]+)' );
		add_permastruct( USER_LIST_URL, '/%'. USER_LIST_URL .'%' );
		flush_rewrite_rules();
	}

}

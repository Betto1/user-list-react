<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://bettocorp.com/
 * @since      1.0.0
 *
 * @package    User_List
 * @subpackage User_List/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    User_List
 * @subpackage User_List/includes
 * @author     Alberto Pérez <alberto@bettocorp.com>
 */
class User_List_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		flush_rewrite_rules();
	}

}

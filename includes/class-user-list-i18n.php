<?php

/**
 * Define the internationalization functionality.
 *
 * @since      1.0.0
 * @package    User_List
 * @subpackage User_List/includes
 * @author     Alberto Pérez <alberto@bettocorp.com>
 */
class User_List_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'user-list',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}

<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://bettocorp.com/
 * @since      1.0.0
 *
 * @package    User_List
 * @subpackage User_List/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    User_List
 * @subpackage User_List/public
 * @author     Alberto Pérez <alberto@bettocorp.com>
 */
class User_List_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * The User_List_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		if ( $query_var = get_query_var( USER_LIST_URL ) ) {
			wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/user-list-public.css', array(), $this->version, 'all' );

			wp_enqueue_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css', array(), $this->version, 'all' );

		}

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * The User_List_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		if ( $query_var = get_query_var( USER_LIST_URL ) ) {
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/user-list-public.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( 'boostrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js', array( 'jquery' ), $this->version, false );
			wp_enqueue_script( $this->plugin_name . '_bundle', USER_LIST_GET_URL . 'dist/bundle.js', [ 'jquery', 'wp-element' ], wp_rand(), true );

		}

	}

	/**
	 * Add page template.
	 * @param  array  $templates  The list of page templates
	 * @return array  $templates  The modified list of page templates* 
	 * @since 1.0.0
	 */
	public function user_list_add_page_template($templates) {
		$templates[USER_LIST_PATH . 'templates/user-list-page-template.php'] = __('Page Template From User-List', 'User-List');

		return $templates;
	}

	public function users_permalink_output() {
		add_rewrite_tag( '%'. USER_LIST_URL .'%', '([^/]+)' );
		add_permastruct( USER_LIST_URL, '/%'. USER_LIST_URL .'%' );
	}

	public function users_template_view() {
		if ( $query_var = get_query_var( USER_LIST_URL ) ) {
			include USER_LIST_PATH . 'templates/user-list-template.php';
			exit;
		}
	}

	

}

<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://cybercom.com
 * @since      1.0.0
 *
 * @package    Wp_Plugin_Openinghours
 * @subpackage Wp_Plugin_Openinghours/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Plugin_Openinghours
 * @subpackage Wp_Plugin_Openinghours/admin
 * @author     Andreas Färnstrand <andreas.farnstrand@cybercom.com>
 */
class Wp_Plugin_Openinghours_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $plugin_name The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string $version The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 *
	 * @param      string $plugin_name The name of this plugin.
	 * @param      string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name  = $plugin_name;
		$this->version      = $version;
		$this->url_to_files = get_stylesheet_directory_uri() . '/lib/himlabadet-opening-hours/admin/';
	}


	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Plugin_Openinghours_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Plugin_Openinghours_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, $this->url_to_files . 'css/wp-plugin-openinghours-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Plugin_Openinghours_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Plugin_Openinghours_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, $this->url_to_files . 'js/wp-plugin-openinghours-admin.js', array( 'jquery' ), $this->version, false );

	}

}

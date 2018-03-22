<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://cybercom.com
 * @since      1.0.0
 *
 * @package    Wp_Plugin_Openinghours
 * @subpackage Wp_Plugin_Openinghours/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Plugin_Openinghours
 * @subpackage Wp_Plugin_Openinghours/public
 * @author     Andreas Färnstrand <andreas.farnstrand@cybercom.com>
 * @modifier   Jonatan Olsson <jonatan@kingmary.se>
 */
class Wp_Plugin_Openinghours_Public {

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

	private $url_to_files;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 *
	 * @param      string $plugin_name The name of the plugin.
	 * @param      string $version The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name  = $plugin_name;
		$this->version      = $version;
		$this->url_to_files = get_stylesheet_directory_uri() . '/lib/himlabadet-opening-hours/public/';

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_register_style( 'wp-plugin-openinghours-datepicker', $this->url_to_files . 'css/datepicker/datepicker.css', array(), $this->version, 'all' );
		wp_register_style( $this->plugin_name, $this->url_to_files . 'css/wp-plugin-openinghours-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		//		wp_register_script( $this->plugin_name, $this->url_to_files . 'js/wp-plugin-openinghours-public.js', array( 'jquery' ), $this->version, false );
		wp_register_script( 'wp-plugin-openinghours-datepicker', $this->url_to_files . 'js/datepicker/bootstrap-datepicker.js', array( 'jquery' ), $this->version, false );
		wp_register_script( 'wp-plugin-openinghours-datepicker-locale', $this->url_to_files . 'js/datepicker/locales/bootstrap-datepicker.sv.js', array( 'jquery' ), $this->version, false );
		wp_localize_script(
			$this->plugin_name,
			'WP_PLUGIN_OPENINGHOURS',
			array(
				'ajax_url'   => admin_url( 'admin-ajax.php' ),
				'ajax_nonce' => wp_create_nonce( 'wp-plugin-openinghours' )
			)
		);

	}

}

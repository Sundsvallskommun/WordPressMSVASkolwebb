<?php
global $sk_search;
define( '__LIB_PATH__', __DIR__ . '/lib' );
//require_once get_parent_theme_file_path( 'functions.php' );
//include_once __LIB_PATH__ . '/sk-search/extra_class-sk-search.php';
//$sk_search = new HB_Search();


add_action( 'after_setup_theme', 'mega_test', 50 );


function mega_test() {
	if ( class_exists( 'sk_search' ) ) {
		include_once __LIB_PATH__ . '/extends/class-sk-search.php';
	}
}


require_once __LIB_PATH__ . '/hb-class-loader.php';

/**
 * Only Himlabadet options
 * Function hb_options_page
 * @since 1.0.0
 * @author Jonatan Olsson <jonatan@kingmary.se>
 *
 * @param $subpages
 *
 * @return array
 *
 */

add_filter( 'sk_acf_options_page', 'hb_options_page', 999, 1 );

function hb_options_page( $subpages ) {

	$subpages[] = array(

		'page_title'  => 'Anpassade inställningar för Himlabadet',
		'menu_title'  => 'Himlabadet',
		'parent_slug' => 'general-settings',

	);

	return $subpages;

}

/**
 * CSS setup for SK Child Theme.
 *
 * @author Daniel Pihlström
 * @modifier Jonatan Olsson <jonatan@kingmary.se>
 * @since  1.0.0
 *
 */
function sk_childtheme_enqueue_styles() {

	wp_enqueue_style( 'child-style',
		get_stylesheet_directory_uri() . '/assets/css/style.css',
		array( 'main' ),
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_script( 'main-child', get_stylesheet_directory_uri() . '/assets/js/app.js', [
		'jquery',
		'handlebars',
		'typeahead'
	] );

	wp_localize_script( 'main-child', 'ajax_object', array(
			'ajaxurl'    => admin_url( 'admin-ajax.php' ),
			'ajax_nonce' => wp_create_nonce( 'ajax_nonce' )
		)
	);
}

add_action( 'wp_enqueue_scripts', 'sk_childtheme_enqueue_styles' );











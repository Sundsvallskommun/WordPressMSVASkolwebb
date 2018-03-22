<?php

require_once __DIR__ . '/lib/hb-class-loader.php';

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


/**
 * Function get_shortcode_field
 * @since 1.0.0
 * @author Jonatan Olsson <jonatan@kingmary.se>
 *
 * @param string $selector
 * @param bool $post_id
 * @param string $if_false
 *
 * @return string
 *
 */
function get_shortcode_field( $selector = '', $post_id = false, $if_false = '' ) {
	$tmp_field = get_field( $selector, $post_id );

	if ( $tmp_field ) {
		return do_shortcode( $tmp_field );
	}

	return $if_false;
}


/**
 * Function the_shortcode_field
 * @since 1.0.0
 * @author Jonatan Olsson <jonatan@kingmary.se>
 *
 * @param string $selector
 * @param bool $post_id
 * @param string $if_false
 *
 */
function the_shortcode_field( $selector = '', $post_id = false, $if_false = '' ) {
	echo get_shortcode_field( $selector, $post_id, $if_false );
}


/**
 * Function get_format_link_group
 * @since 1.0.0
 * @author Jonatan Olsson <jonatan@kingmary.se>
 *
 * @param array $links
 * @param string $class
 *
 * @return array|bool
 *
 */
function get_format_link_group( $links = array(), $class = 'link' ) {

	if ( count( $links ) < 1 ) {
		return false;
	}

	foreach ( $links as $index => $link ) {
		$links[ $index ] = get_format_link( $link, $class );
		echo $links[ $index ];
	}

	return $links;
}

/**
 * Function get_format_link
 * @since 1.0.0
 * @author Jonatan Olsson <jonatan@kingmary.se>
 *
 * @param array $link
 * @param $class
 *
 * @return array|string
 *
 */
function get_format_link( $link = array(), $class ) {
	if ( ! $link ) {
		return $link;
	}

	switch ( $link['link_type'] ) {
		case 'external':
			$link['url'] = $link['link_external'];
			break;
		case 'telephone':
			$link['url'] = 'tel:' . get_international_phone_number( $link['link_telephone'] );
			break;
		case 'email':
			$link['url'] = 'mailto:' . $link['link_email'];
			break;
		case 'internal':
			$link['url'] = $link['link_internal'];
			break;
		default:
			$link['url'] = get_home_url();
	}

	$format             = '<a href="%s" class="%s" %s>%s%s</a>';
	$open_in_new_window = $link['link_new_window'] ? 'target="blank"' : '';
	$icon               = ( $link['link_icon'] !== 'none' ) ? get_icon( $link['link_icon'] ) : '';
	$link               = sprintf( $format, $link['url'], $class, $open_in_new_window, $icon, $link['link_title'] );

	return $link;
}


/**
 * Function get_footer_links
 * @since 1.0.0
 * @author Jonatan Olsson <jonatan@kingmary.se>
 *
 * @param bool $format_links
 *
 * @return bool
 *
 */
function get_footer_links( $format_links = true ) {

	$links = get_field( 'footer_links', 'options' );

	if ( ! isset( $links ) ) {
		return false;
	}

	if ( $format_links ) {
		$links = get_format_link_group( $links['hb_link_group'], 'link link--block' );
	}

}


/**
 * Function get_international_phone_number
 * @since 1.0.0
 * @author Jonatan Olsson <jonatan@kingmary.se>
 *
 * @param string $phone_number
 * @param string $country_code
 *
 * @return string
 */
function get_international_phone_number( $phone_number = '', $country_code = '+46' ) {
	return preg_replace( '/^0/', $country_code, $phone_number );
}


/**
 * Function get_current_template
 * @since 1.0.0
 * @author Jonatan Olsson <jonatan@kingmary.se>
 *
 * @param bool $echo
 *
 * @return bool|mixed
 *
 */
function get_current_template( $echo = false ) {
	if ( ! isset( $GLOBALS['current_theme_template'] ) ) {
		trigger_error( '$current_theme_template has not been defined yet', E_USER_WARNING );

		return false;
	}

	$current_theme_template = $GLOBALS['current_theme_template'];

	if ( $echo ) {
		echo $current_theme_template;

		return true;
	}

	return $current_theme_template;
}

/**
 * Function get_facebook_appid
 * @since 1.0.0
 * @author Jonatan Olsson <jonatan@kingmary.se>
 *
 * @return mixed|null|void
 *
 */
function get_facebook_app_id() {
	return get_field( 'hb_facebook_app_id', 'options' );
}

/**
 * Get post thumbnail alternative text.
 *
 * @since 1.0.0
 *
 * @param int $post_id Post ID
 *
 * @return string
 */
function get_post_thumbnail_alt( $post_id = null ) {
	if ( $post_id == null ) {
		global $post;
		$post_id = $post->ID;
	}

	$thumbnail_id = get_post_thumbnail_id( $post_id );

	if ( empty( $thumbnail_id ) ) {
		return false;
	}

	return get_image_alt( $thumbnail_id );
}

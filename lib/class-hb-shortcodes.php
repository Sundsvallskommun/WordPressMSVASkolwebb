<?php

class HB_Shortcodes {

	public function __construct() {
		$this->register_shortcodes();
	}

	public function register_shortcodes() {
		add_shortcode( 'facebook-widget', array( &$this, 'shortcode_facebook_widget' ) );
	}


	public function shortcode_facebook_widget() {
		$facebook_widget = get_field( 'hb_facebook_widget', 'options' );
		if ( strlen( $facebook_widget ) > 0 ) {
			return $facebook_widget;
		}

		return 'No faccebook widget code';
	}

	public function shortcode_footer_links() {

	}


}
<?php

namespace dragoncity\lib\iframe\shortcode;

class Iframe_Shortcode {

    public function __construct() {

    }

    public function register_hooks() {
        add_shortcode( 'iframe', [$this, 'output']);
    }

    public function output($atts = null) {
        ob_start();

		include('shortcode-template.php');
		$output = ob_get_contents();

		ob_end_clean();

		return $output;
    }

}
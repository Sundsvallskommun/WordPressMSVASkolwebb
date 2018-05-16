<?php

class Challenges_Short_code {


	public function __construct() {

		add_shortcode( 'challenges', [$this, 'shortcode'] );

	}


	public function shortcode($settings) {

		$args = array(
			'posts_per_page'   => 7,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => 'challenge',
			'post_status'      => 'publish',
		);

		$challenges_posts = get_posts($args);

		$output = '';

		// Buffer the contacts output
		ob_start();

		include('challenge-short-code-template.php');

		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
}
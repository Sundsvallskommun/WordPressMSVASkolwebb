<?php

class Challenges_Short_code {


	public function __construct() {

		add_shortcode( 'challenges', [$this, 'shortcode'] );

	}


	public function shortcode($settings) {

		$args = array(
			'posts_per_page'   => -1,
			'orderby'          => 'date',
			'order'            => 'DESC',
			'post_type'        => 'challenge',
			'post_status'      => 'publish',
		);

		$challenges_posts = get_posts($args);
		$number_of_challenges = count($challenges_posts);
		if($number_of_challenges > 6) {
			$challenges_posts = array_slice($challenges_posts, 0, 6);
		}

		$output = '';

		// Buffer the contacts output
		ob_start();

		include('challenge-short-code-template.php');

		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}
}
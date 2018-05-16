<?php


class Page_Bank_ShortCode {

	public function __construct() {

		add_shortcode( 'pagebank', [$this, 'shortcode'] );

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

		$page_categories = get_terms( array(
	    	'taxonomy' => 'page_category',
		    'hide_empty' => false,
		));

		$grouped_pages = [];

		foreach($page_categories as $page_category) {

			$grouped_pages[$page_category->name];

			$pages = get_posts(array(
			  'post_type' => 'page',
			  'numberposts' => -1,
			  'tax_query' => array(
			    array(
			      'taxonomy' => 'page_category',
			      'field' => 'id',
			      'terms' => $page_category->term_id, // Where term_id of Term 1 is "1".
			      'include_children' => false
			    )
			  )
			));

			$grouped_pages[$page_category->name] = $pages;

		}

		$output = '';

		// Buffer the contacts output
		ob_start();
		


		//var_dump($terms);
		include('page-bank-shortcode-template.php');

		$output = ob_get_contents();
		ob_end_clean();

		return $output;
	}


}
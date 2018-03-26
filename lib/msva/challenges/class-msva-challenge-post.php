<?php


class MSVA_Challenge_post {

    function __construct() {
		add_action( 'init', array(&$this, 'register_post_type'));
	}


    public function register_post_type() {

        $labels = array(
            'name'               => __( 'Challenge', 'msva' ),
            'singular_name'      => __( 'Challenge', 'msva' ),
            'menu_name'          => __( 'Challenge', 'msva' ),
            'name_admin_bar'     => __( 'Challenge', 'msva' ),
            'add_new'            => __( 'Skapa ny', 'msva' ),
            'add_new_item'       => __( 'Skapa ny challenge', 'msva' ),
            'new_item'           => __( 'Ny challenge', 'msva' ),
            'edit_item'          => __( 'Redigera challenge', 'msva' ),
            'view_item'          => __( 'Visa challenge', 'msva' ),
            'all_items'          => __( 'Alla challenges', 'msva' ),
            'search_items'       => __( 'Sök bland challenges', 'msva' ),
            'not_found'          => __( 'Hittade inga challenges.', 'msva' ),
            'not_found_in_trash' => __( 'Hittade inga challenges i papperskorgen.', 'msva' )
        );

        $args = array(
            'labels'             => $labels,
            'public'             => true,
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_icon'          => 'dashicons-id',
            //'supports'           => array( 'title', 'author', 'revisions', 'thumbnail' ),
        );

        register_post_type('challenge', $args);
    }

}
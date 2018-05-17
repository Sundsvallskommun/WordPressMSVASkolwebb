<?php


class MSVA_Challenge_post {

    const POST_TYPE = 'challenge';

    function __construct() {
		add_action( 'init', array(&$this, 'register_post_type'));
        add_action( 'pre_get_posts', array(&$this, 'archive_posts_by_name')); 
	}


    public function register_post_type() {

        $labels = array(
            'name'               => __( 'challenges', 'msva' ),
            'singular_name'      => __( 'challenges', 'msva' ),
            'menu_name'          => __( 'challenges', 'msva' ),
            'name_admin_bar'     => __( 'challenges', 'msva' ),
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
        );

        register_post_type(self::POST_TYPE, $args);
    }

    public function archive_posts_by_name($query) {
        
        if ( is_post_type_archive(self::POST_TYPE) ) {
           $query->set( 'order', 'ASC' );
           $query->set( 'orderby', 'title' );
        }
    }


}
<?php

class HB_Init {
	public function __construct() {


		add_action( 'after_setup_theme', array( &$this, 'custom_logo_change_size' ), 11 );

		add_action( 'admin_menu', array( &$this, 'hb_change_post_label' ) );
		add_action( 'init', array( &$this, 'hb_change_post_object' ) );
	}


	public function custom_logo_change_size() {
		remove_theme_support( 'custom-logo' );
		add_theme_support( 'custom-logo', array(
			'height'     => 200,
			'width'      => 500,
			'flex-width' => true,
		) );
	}


	public function hb_change_post_label() {
		global $menu;
		global $submenu;
		$menu[5][0]                 = 'Nyheter';
		$submenu['edit.php'][5][0]  = 'Nyheter';
		$submenu['edit.php'][10][0] = 'Lägg till nyhet';
		$submenu['edit.php'][16][0] = 'Nya taggar';
	}

	public function hb_change_post_object() {
		global $wp_post_types;
		$labels                     = &$wp_post_types['post']->labels;
		$labels->name               = 'Nyheter';
		$labels->singular_name      = 'Nyhet';
		$labels->add_new            = 'Lägg till nyhet';
		$labels->add_new_item       = 'Lägg till nyhet';
		$labels->edit_item          = 'Redigera nyhet';
		$labels->new_item           = 'Nyhet';
		$labels->view_item          = 'Se nyhet';
		$labels->search_items       = 'Sök nyhet';
		$labels->not_found          = 'Hittade inga nyheter';
		$labels->not_found_in_trash = 'Hittade inga nyheter i papperskorgen';
		$labels->all_items          = 'Alla nyheter';
		$labels->menu_name          = 'Nyheter';
		$labels->name_admin_bar     = 'Nyheter';
	}

}
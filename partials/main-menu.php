<?php

if ( has_nav_menu( 'main-menu' ) ) {

	$nav_args = array(
		'theme_location' => 'main-menu',
		'container'      => true,
		'menu_class'     => 'menu-container list-inline',
		'items_wrap'     => '<nav id="%1$s" class="%2$s">%3$s</nav>'
	);
	wp_nav_menu( $nav_args );
}

?>
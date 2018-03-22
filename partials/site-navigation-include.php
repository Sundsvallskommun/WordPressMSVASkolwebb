<div class="navbar">
	
	<div class="navbar__menu">
		<?php get_template_part( 'partials/main-menu' ); ?>
	</div>

	<?php do_action( 'hb_before_navbar_search' ); ?>

	<div class="navbar__search-form">
		<?php get_search_form( true ); ?>
	</div>
	<!-- /.navbar__searchform -->
	<?php do_action( 'hb_after_navbar_search' ); ?>

</div>
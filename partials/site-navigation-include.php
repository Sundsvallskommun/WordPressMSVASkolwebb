<div class="navbar">
	<div class="navbar__menu">
		<?php get_template_part( 'partials/main-menu' ); ?>
	</div>
	<! -- /.navbar__menu -->
	<div class="navbar__translate">
		<?php get_template_part( 'partials/google-translate.php' ); ?>
	</div>
	<!-- /.navbar__translate -->
	<div class="navbar__search-form">
		<?php get_search_form( true ); ?>
	</div>
	<!-- /.navbar__searchform -->
</div>

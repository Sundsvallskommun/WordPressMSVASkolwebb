<aside class="header-content__aside">
	<h1 class="header-content__large-title"><?php echo the_title(); ?></h1>
	<div class="header-content__content">
		<?php if ( ! $description = get_field( 'navigation_desctiption' ) ): ?>
			<?php echo do_shortcode( get_the_content() ); ?>
		<?php else: ?>
			<?php echo wpautop( $description ); ?>
		<?php endif; ?>
	</div>
</aside>
<!-- /.header-content__aside -->




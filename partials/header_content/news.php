<?php global $current_content_data; ?>

<aside class="header-content__aside">
	<div class="card card--transparent header-content__card">
		<div class="card-block card-block--small-y-padding">
			<h5 class="card-title">
				<?php _e( 'Nyheter' ); ?>
			</h5>
			<!-- /.card-title -->
			<?php get_template_part( 'partials/news-list', 'three' ); ?>
		</div>
		<!-- /.card-block -->
	</div><!-- /.card -->
</aside>
<!-- /.header-content__aside -->



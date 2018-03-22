<?php sk_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<div class="container-fluid">

		<div class="single-post__row">

			<aside class="sk-sidebar single-post__sidebar">

				<a href="#post-content" class="focus-only"><?php _e( 'Hoppa över sidomeny', 'sk_tivoli' ); ?></a>

				<?php do_action( 'sk_page_helpmenu' ); ?>

			</aside>

			<div class="single-post__content" id="post-content">

				<?php $has_top_image = get_field( 'top_image' ); ?>
				<?php do_action( 'sk_before_page_title' ); ?>
				<?php if ( ! $has_top_image ): ?>
				<div class="container-text"><?php endif; ?>
					<h1 class="single-post__title single-post__title--with-breadcrumb"><?php the_title(); ?></h1>
					<div class="single-post__breadcrumb">
						<?php the_breadcrumbs(); ?>
					</div>

					<?php if ( ! get_field( 'top_image' ) ): ?></div><?php endif; ?>

				<?php do_action( 'sk_after_page_title' ); ?>

				<?php do_action( 'sk_before_page_content' ); ?>

				<div class="card container-text <?php if ( $has_top_image ): ?>container-text--center<?php endif; ?>">
					<div class="card-block">
						<?php the_content(); ?>
					</div>
					<!-- /.card-block -->
				</div>

				<div class="clearfix"></div>

				<!-- /.card -->
				<div class="container-text m-t-1 <?php if ( $has_top_image ): ?>container-text--center<?php endif; ?>">
					<?php do_action( 'sk_after_page_content' ); ?>
				</div>
				<!-- /.container-text container-text--center -->

			</div>

		</div> <?php //.row ?>

	</div> <?php //.container-fluid ?>

<?php endwhile; ?>

<?php get_footer(); ?>

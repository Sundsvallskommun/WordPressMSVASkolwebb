<?php sk_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<div class="container-fluid">

		<div class="single-post__row">

			<aside class="sk-sidebar single-post__sidebar">

				<a href="#post-content" class="focus-only"><?php _e( 'Hoppa över sidomeny', 'sk_tivoli' ); ?></a>

				<?php do_action( 'sk_page_helpmenu' ); ?>

			</aside>

			<div class="single-post__content" id="post-content">

				<?php do_action( 'sk_before_page_title' ); ?>

				<h1 class="single-post__title"><?php the_title(); ?></h1>

				<?php if ( has_post_thumbnail() && ! get_field( 'top_image' ) ): ?>
					<?php the_post_thumbnail(); ?>
				<?php endif; ?>

				<?php do_action( 'sk_after_page_title' ); ?>

				<?php do_action( 'sk_before_page_content' ); ?>


				<div class="card container-text container-text--center">
					<div class="card-block">
						<?php the_content(); ?>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="clearfix"></div>

				<div class="container-text container-text--center m-t-1">
					<?php do_action( 'sk_after_page_content' ); ?>
				</div>

			</div>

		</div> <?php //.row ?>

	</div> <?php //.container-fluid ?>

<?php endwhile; ?>

<?php get_footer(); ?>

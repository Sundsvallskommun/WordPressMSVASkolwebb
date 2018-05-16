<?php
get_header();
?>

<div class="container-fluid archive">

	<h1 class="archive__title"><?php the_archive_title(); ?></h1>

	<div class="row posts">
		<div class="card-block challenges-list">
			<ul>
				<?php if ( have_posts() ): while ( have_posts() ): the_post(); ?>

					<li class="">
						<a href="<?php echo get_permalink($post); ?>"><?php echo $post->post_title; ?></a>
						<div class="excerpt"> Tre minuter förändrar allt </div>
					</li>

				<?php endwhile; endif; ?>
			</ul>
		</div>
	</div>

	<div class="infinite-nav">
		<?php get_template_part( 'partials/pagination' ); ?>
	</div>

</div>

<?php get_footer(); ?>

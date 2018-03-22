<div class="media news-item">
	<img src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" class="news-item__image" alt="<?php the_post_thumbnail_caption(); ?>">
	<div class="media-body news-item__content">
		<h5 class="news-item__title"><?php the_title(); ?></h5>
		<p class="news-item__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 15, ' ...' ); ?></p>
		<a class="news-item__link" href="<?php the_permalink(); ?>">Läs mer</a>
	</div>
</div>
<!-- /.media -->
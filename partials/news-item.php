<?php do_action( 'hb_before_news_item' ); ?>
	<a href="<?php the_permalink(); ?>" class="media news-item">

		<?php if ( has_post_thumbnail() ): ?>
			<img src="<?php the_post_thumbnail_url( 'thumbnail' ); ?>" class="news-item__image" alt="<?php get_post_thumbnail_alt( get_post_thumbnail_id() ) ?>">
		<?php else: ?>
			<img class="news-item__image" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8+fPXfwAJzAPtGEeprwAAAABJRU5ErkJggg==" alt="En bild på en ljusgrå bakgrund">
		<?php endif; ?>
		<div class="media-body news-item__content">

			<h5 class="news-item__title"><?php the_title(); ?></h5>

			<p class="news-item__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 15, ' ...' ); ?></p>

			<p class="news-item__link" href="<?php the_permalink(); ?>"><?php _e( 'Läs mer', 'hb' ); ?></p>

		</div>

	</a>
	<!-- /.media -->
<?php do_action( 'hb_after_news_item' ); ?>
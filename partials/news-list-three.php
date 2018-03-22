<?php

if ( ! get_transient( 'header_content_news' ) ) {
	$args        = array(
		'posts_per_page' => 3,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'post_type'      => 'post',
		'post_status'    => 'publish',
	);
	$posts_array = get_posts( $args );
	set_transient( 'header_content_news', $posts_array, HOUR_IN_SECONDS );
} else {
	$posts_array = get_transient( 'header_content_news' );
}

?>

<?php do_action( 'hb_before_news_list' ); ?>
<div class="news-list">
	<!-- /.news-list__title -->
	<?php foreach ( $posts_array as $post ) : setup_postdata( $post ); ?>
		<?php get_template_part( 'partials/news-item' ); ?>
	<?php endforeach; ?>
</div>
<?php do_action( 'hb_after_news_list' ); ?>

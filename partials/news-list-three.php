<?php $args  = array(
	'posts_per_page' => 3,
	'orderby'        => 'date',
	'order'          => 'DESC',
	'post_type'      => 'post',
	'post_status'    => 'publish',
);
$posts_array = get_posts( $args );

?>

<div class="news-list">
	<!-- /.news-list__title -->
	<?php foreach ( $posts_array as $post ) : setup_postdata( $post ); ?>
		<?php get_template_part( 'partials/news-item' ); ?>
	<?php endforeach; ?>
</div>


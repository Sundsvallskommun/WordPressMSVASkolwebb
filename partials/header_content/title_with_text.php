<?php global $current_content_data; ?>

<aside class="header-content__aside">
	<h1 class="header-content__large-title"><?php echo $current_content_data['title']; ?></h1>
	<div class="header-content__content">
		<?php echo do_shortcode( $current_content_data['text'] ); ?></div>
</aside>
<!-- /.header-content__aside -->




</main>

<?php
if ( ! is_front_page() && ! is_search() && ! is_archive() && ! is_home() ) {
	do_action( 'sk_page_widgets' );
}
?>

<?php
// if this is advanced template we use its footer column, else we use them options settings.
wp_reset_query();
$fields_id = is_advanced_template_child() ? advanced_template_top_ancestor() : 'option';
?>

<?php

/**
 * We serve site footer from saved transient to prevent a lot of meta queries
 * to happen for every visitor.
 */
//			$cached_footer = get_transient( "site_footer_$fields_id" );

if ( $cached_footer ):
	echo $cached_footer;
else:

	ob_start();

	?>

	<footer class="site-footer">

		<div class="container">
			<div class="row">
				<div class="col-xs-12 site-footer__upper">
					<?php get_template_part( 'partials/main-menu' ); ?>
				</div>
				<!-- /.col-sm-12 -->
			</div>
			<!-- /.row -->
			<div class="row site-footer__below">
				<div class="col-sm-6 ">
					<?php $has_logo = function_exists( 'the_custom_logo' ) && has_custom_logo(); ?>
					<div class="logo-container no-margin no-padding <?php echo $has_logo ? 'haslogo' : '' ?>">
						<?php the_custom_logo(); ?>
					</div>
				</div>
				<!-- /.col-sm-6 -->
				<div class="col-sm-6">
					<div class="rounded-iframe">
						<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fhimlabadet&tabs=timeline&width=340&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=260510397707106" width="340" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
					</div>
					<!-- /.rounded-iframe -->
				</div>
				<!-- /.col-sm 6 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->

	</footer>

	<?php

	$footer = ob_get_clean();

	//				set_transient( "site_footer_$fields_id", $footer, HOUR_IN_SECONDS );

	echo $footer;

endif;

?>

</div> <?php // .contentwrapper-inner ?>
</div> <?php // .contentwrapper-outer ?>

<?php wp_footer(); ?>
<?php if ( WP_DEBUG ): ?>
	<script>
		var page_fields = <?php echo json_encode( get_fields() ); ?>;
		console.info( "============= page-fields ==========" );
		console.log( page_fields );
		var option_fields = <?php echo json_encode( get_fields( 'option' ) ); ?>;
		console.info( "============= option-fields ==========" );
		console.log( option_fields );
	</script>
<?php endif; ?>
</body>
</html>

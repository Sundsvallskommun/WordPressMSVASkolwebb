<?php
/*
 * Template name: Navigation
 * */
sk_header();
?>


<?php

$template_theme_color_class = get_field( 'navtemplate_color' ) ? 'navigation-page--' . get_field( 'navtemplate_color' ) : '';

?>

<?php while ( have_posts() ) : the_post(); ?>


	<div class="container-fluid card <?php echo $template_theme_color_class; ?>">
		<div class="row">
			<div class="col-xs-12">
				<div class="card hidden-xs-up">
					<header class="card-block navigation-page__header">
						<div class="page-icon" style=""><?php ! get_field( 'navtemplate_material_icon' ) ?: material_icon( get_field( 'navtemplate_material_icon' ) ) ?></div>
						<div class="navigation-page__inner-container">
							<div class="navigation-page__header-title clearfix">
								<?php do_action( 'hb_before_page_title' ); ?>
								<h1 class="page-title"><?php the_title(); ?></h1>
								<?php do_action( 'hb_after_page_title' ); ?>
							</div>
							<div class="navigation-page__header-content col-xs-12 col-lg-8">
								<?php

								if ( get_the_content() ) {
									the_content();
								} else {
									echo wpautop( get_field( 'navigation_desctiption' ) );
								}

								?>
							</div>
							<!-- /.navigation-page__header-content -->
						</div>
						<!-- /.navigation-page__inner-container -->
					</header>
				</div>
				<!-- /.card -->

			</div>
			<!-- /.col-xs-12 -->


			<div class="col-xs-12">
				<div class="card">
					<div class="card-block">
						<?php get_template_part( 'partials/navigation-cards' ); ?>
					</div>
					<!-- /.card-block -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col-sm-12 -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container -->


<?php endwhile; ?>

<?php get_footer(); ?>

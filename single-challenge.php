<?php sk_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<div class="container-fluid mb-5">

		<div class="single-post__row">
			<div class="single-post__content" id="post-content">

				<?php do_action( 'sk_before_page_title' ); ?>

				<h1 class="single-post__title no-print"><?php the_title(); ?></h1>
                <div class="single-post__breadcrumb">
                    <?php the_breadcrumbs(); ?>
                </div>

				<?php if ( has_post_thumbnail() && ! get_field( 'top_image' ) ): ?>
					<?php the_post_thumbnail(); ?>
				<?php endif; ?>

				<?php do_action( 'sk_after_page_title' ); ?>

				<?php do_action( 'sk_before_page_content' ); ?>


				<div class="article-content card container-text container-text--center no-print">
					<div class="card-block no-print">
						<?php the_content(); ?>
						<div class="clearfix"></div>
					</div>

                    <div class="card-block">
                        <?php Green_Coin_Calc::output_calculator_view(); ?>
				    </div>


				</div>
				<?php Green_Coin_Calc::output_diploma(); ?>
				
				<div class="clearfix"></div>

				<div class="container-text container-text--center mt-01 no-print">
					<?php do_action( 'msva_after_page_content' ); ?>
				</div>

			</div>

		</div> <?php //.row ?>

	</div> <?php //.container-fluid ?>

<?php endwhile; ?>

<?php wp_footer(); ?>

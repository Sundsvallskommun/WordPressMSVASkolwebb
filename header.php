<?php get_template_part( 'head' ); ?>

<?php get_template_part( 'partials/navbar', 'mobile' ); ?>


<?php $background_image = wp_get_attachment_image_url( get_field( 'top_image' ), 'full' ); ?>
<header class="site-header himlabadet-header">
	<?php if ( $background_image ): ?>
		<div class="<?php echo 'background-image'; ?>" style="background-image:url(<?php echo $background_image; ?>)"></div> <!-- background-image--gradiented -->
	<?php endif; ?>
	<div class="container himlabadet-header__inner-container">
		<div class="row">
			<?php $has_logo = function_exists( 'the_custom_logo' ) && has_custom_logo(); ?>
			<div class="logo-container <?php echo $has_logo ? 'haslogo' : '' ?>">
				<h1><?php get_template_part( 'partials/site-logo' ); ?></h1>
			</div>
		</div>
	</div>


	<?php do_action( 'hb_header_content_start' ); ?>

	<?php get_template_part( 'partials/header_content' ); ?>

	<?php do_action( 'hb_header_content_end' ); ?>


	<?php do_action( 'hb_header_end' ); ?>


</header>

<?php do_action( 'hb_before_main_navigation' ); ?>

<div class="container">
	<div class="row">
		<?php get_template_part( 'partials/site-navigation', 'offcanvas' ); ?>
	</div>
	<!-- /.row -->
</div>
<!-- /.container -->

<?php do_action( 'hb_after_main_navigation' ); ?>

<div class="contentwrapper-outer"> <?php // Wrappers used by off-canvas mobile navigation ?>
	<div class="contentwrapper-inner"> <?php // Wrappers used by off-canvas mobile navigation ?>

		<?php do_action( 'hb_before_main_content' ); ?>

		<main id="content">
			<h1><?php the_icon(''); ?></h1>

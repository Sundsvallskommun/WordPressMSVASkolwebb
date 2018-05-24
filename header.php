<?php get_template_part( 'head' ); ?>

<?php if ( ! WP_DEBUG ): ?>
	<div class="screen"></div>
<?php endif; ?>

<?php get_template_part( 'partials/facebook-init-script' ); ?>

<div class="svg-wrap" style="position: absolute;top: -9999px;left: -9999px;width: 0;height: 0;overflow: hidden;">
	<?php require_once __DIR__ . '/assets/images/icons.svg'; ?>
</div>
<!-- /.svg-wrap -->

<?php get_template_part( 'partials/navbar', 'mobile' ); ?>
<?php get_template_part( 'partials/mobile', 'search' ); ?>
<?php $can_have_header_content = ( get_current_template() === 'page-start-advanced' || get_current_template() === 'page-navigation' ); ?>

<?php $background_color = get_field( 'header_background_color' ) ? "background-image--" . get_field( 'header_background_color' ) : ''; ?>
<?php $background_classes = ( $background_image ) ? 'background-image--tone ' . $background_color : $background_color; ?>

<link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
<header class="site-header himlabadet-header">

	<?php if ($can_have_header_content): ?>

		<div class="background-image <?php echo $background_classes; ?>" style="background-image:url(<?php echo get_stylesheet_directory_uri() . '/assets/images/kid.jpg' ?>)"> <div class="background-overlay"></div></div>

	<?php endif; ?>



	<div class="container-fluid himlabadet-header__inner-container">

		<?php $has_logo = function_exists( 'the_custom_logo' ) && has_custom_logo(); ?>

		<div class="col-sm-3 logo-container <?php echo $has_logo ? 'haslogo' : '' ?>">

			<div class="h1"><?php get_template_part( 'partials/site-logo' ); ?></div>

		</div>

		<?php get_template_part( 'partials/site-navigation', 'offcanvas' ); ?>

	</div>


	<?php if ( $can_have_header_content ): ?>

		<?php do_action( 'hb_header_content_start' ); ?>

		<?php get_template_part( 'partials/header_content' ); ?>

		<?php do_action( 'hb_header_content_end' ); ?>

	<?php endif; ?>

	<?php do_action( 'hb_header_end' ); ?>


</header>


<div class="contentwrapper-outer"> <?php // Wrappers used by off-canvas mobile navigation ?>

	<div class="contentwrapper-inner"> <?php // Wrappers used by off-canvas mobile navigation ?>

		<?php do_action( 'hb_before_main_content' ); ?>

		<main id="content" class="main-content">

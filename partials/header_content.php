<?php
global $current_content_data;


$header_contents = (array) get_field( 'header_content' );

?>
<?php if ( $header_contents ): ?>

	<div class="header-content container-fluid">

		<?php while ( the_flexible_field( 'header_content' ) ): ?>

			<?php

			/**
			 * The layout name
			 */
			$layout = get_row_layout();

			/**
			 * Used globaly in the partial
			 */
			$current_content_data = get_row( true );

			switch ( $layout ) {
				case 'large_title_with_caption':
				case 'title_with_text':
				case 'shortcode':
				case 'card':
				case 'news':
				case 'the_title_and_content':

					do_action( 'hb_before_header_content_item', $layout );

					get_template_part( 'partials/header_content/' . $layout ); // load only the specified layouts defined in acf

					do_action( 'hb_after_header_content_item', $layout );
					break;
				default:
					return; // die, i don't deserve this
					break; // you can break me
			}

			?>

		<?php endwhile; ?>

	</div>

<?php endif; ?>

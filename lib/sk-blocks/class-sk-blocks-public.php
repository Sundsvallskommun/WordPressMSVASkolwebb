<?php

/**
 * Class for page template flexible
 *
 * @author Daniel Pihlström <daniel.pihlstrom@cybercom.com>
 *
 */
class SK_Blocks_Public {

	/**
	 * SK_Blocks_Public constructor.
	 */
	public function __construct() {
		$this->init();
	}


	public function init() {

	}


	public function print_section( $section = '' ) {
		if ( empty ( $section ) ) {
			return false;
		}
		?>
		<div class="row">
			<?php foreach ( $section['sk-row'] as $row ) : ?>
				<div class="col-md-<?php echo $row['sk-grid']; ?>">
					<?php self::column_content( $row ); ?>
				</div>
			<?php endforeach; ?>
		</div><!-- .row -->
		<?php

		//util::debug( $section );


	}

	public static function print_shortcode( $column ) {
		//util::debug( $column );

		if ( (int) $column['sk-grid-border'] === 1 ) : ?>
			<div class="sk-grid-border-inner">
				<?php echo do_shortcode( $column['sk-short-code'] ); ?>
			</div>
		<?php else : ?>
			<?php echo do_shortcode( $column['sk-short-code'] ); ?>
		<?php endif; ?>
		<?php
	}

	public static function print_block( $block_id ) {

		$block = get_post( $block_id );

		$type = wp_get_post_terms( $block_id, 'block-type', array( 'fields' => 'slugs' ) );
		if ( empty( $type ) ) {
			return false;
		}

		self::get_block( $block_id, $type[0] );

		//util::debug( $block );
	}

	private static function get_block( $block_id = '', $type = '' ) {

		switch ( $type ) {
			case 'bild':
				echo self::get_block_image( $block_id );
				break;

			case 'bild-och-text':
				echo self::get_block_image_with_text( $block_id );
				break;

			case 'lanklista':
				echo self::get_block_link_list( $block_id );
				break;

			default:
				echo "något har gått fel";
		}


	}


	private static function get_block_image( $block_id = '' ) {
		$block = get_post( $block_id );

		/*
		$block->{'block'} = array(
			'image' => get_field( 'sk-blocks-image', $block_id )
		);
		*/

		$image_id = get_field( 'sk-blocks-image', $block_id );
		$image    = wp_get_attachment_image_src( $image_id, 'content-full' );

		$links['internal'] = get_field( 'sk-block-link-internal', $block_id );
		$links['external'] = get_field( 'sk-block-link-external', $block_id );

		$link = $links['internal'];

		if ( empty ( $link ) ) {
			$link = $links['external'];
		}


		ob_start();

		?>


		<div class="block block-image">
			<div class="block-block__image">
				<?php if ( ! empty( $link ) ) : ?>
				<a href="<?php echo $link; ?>">
					<?php endif; ?>
					<img src="<?php echo $image[0]; ?>">
					<?php if ( ! empty( $link ) ) : ?>
				</a>
			<?php endif; ?>
			</div>
		</div>

		<?php
		$block = ob_get_clean();

		return $block;

	}


	private static function get_block_image_with_text( $block_id = '' ) {
		$block = get_post( $block_id );

		/*
		$block->{'block'} = array(
			'image' => get_field( 'sk-blocks-image', $block_id )
		);
		*/

		$image_id         = get_field( 'sk-block-image-and-text', $block_id );
		$image            = wp_get_attachment_image_src( $image_id, 'news-thumb-medium' );
		$title            = get_field( 'sk-block-image-and-text-title', $block_id );
		$content          = get_field( 'sk-block-image-and-text-content', $block_id );
		$background_color = get_field( 'sk-block-image-and-text-background-color', $block_id );
		$inverted         = get_field( 'sk-block-image-and-text-invert-order', $block_id );


		$links['internal'] = get_field( 'sk-block-link-internal', $block_id );
		$links['external'] = get_field( 'sk-block-link-external', $block_id );
		$links['text']     = get_field( 'sk-block-link-text', $block_id );


		$link = $links['internal'];

		if ( empty ( $link ) ) {
			$link = $links['external'];
		}

		/**
		 * Get the post name
		 */
		if ( empty( $links['text'] ) ) {
			$link_title = get_the_title( url_to_postid( $link ) );
		}

		/**
		 * Trim title
		 */
		$link_title = mb_strimwidth( ( empty( $links['text'] ) ? get_the_title( url_to_postid( $link ) ) : $links['text'] ), 0, 30, '...' );

		ob_start();
		//util::debug( $link );
		?>
		<div class="card <?php echo ( $background_color ) ? 'card--' . $background_color : ''; ?>">
			<div class="block block-image-and-text  <?php echo ( $inverted ) ? 'block-image-and-text--invert-order' : ''; ?>">
				<div class="block-image-and-text__image col-sm-12 col-md-6 col-xs-12" style="background-image: url('<?php echo $image[0]; ?>');">
					<img src="<?php echo $image[0]; ?>" class="invisible"></div>
				<div class="block-image-and-text__footer col-sm-12 col-md-6 col-xs-12">
					<div class="block-image-and-text__title"><h3><?php echo $title; ?></h3></div>
					<div class="block-image-and-text__content"><?php echo $content; ?></div>
					<?php if ( ! empty( $link ) ) : ?>
						<div class="block-image-and-text__link">
							<a href="<?php echo $link; ?>" class="btn text-overflow"><?php echo sprintf( __( 'Läs mer om %s', 'sk-tivoli' ), strtolower( $link_title ) ); ?></a>
						</div>
					<?php endif; ?>
				</div>

			</div>
		</div>

		<!-- /.card -->


		<?php
		$block = ob_get_clean();

		return $block;

	}


	private static function get_block_link_list( $block_id = '' ) {

		$title  = get_field( 'sk_block_link_list_title', $block_id );
		$groups = (array) get_field( 'sk_block_link_list', $block_id );
		$markup = '<a class="link-list" href="%s" title="%3$s"><span><span class="link-list__icon">%s</span><span class="link-list__name">%s</span></span></a>';
		ob_start();
		?>

		<div class="block block-link-list">
			<?php if ( ! empty( $title ) ) : ?>
				<h3><?php echo $title; ?></h3>
			<?php endif; ?>
			<div class="block-link-list__columns">
				<?php foreach ( $groups as $group ) : ?>
					<div class="block-link-list__container">
						<div class="block-link-list__title"><?php echo $group['rubrik']; ?></div>
						<ul>
							<?php foreach ( $group['link'] as $link ) : ?>
								<li>
									<?php echo sprintf( $markup, $link['linklist_url'], get_icon( 'arrow-right' ), $link['linklist_title'] ) ?>
								</li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php endforeach; ?>
			</div>

		</div>

		<?php
		$block = ob_get_clean();

		return $block;

	}

	private static function get_block_lol() {

	}


}


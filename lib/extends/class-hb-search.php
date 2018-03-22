<?php

if ( class_exists( 'SK_Search' ) ) {
	/**
	 * Class HB_Search
	 */
	class HB_Search extends SK_Search {

		public function __construct() {
			parent::__construct();

			remove_action( 'wp_footer', array(
				&$this,
				'handlebar_templates'
			) ); // funkar förmodligen inte TODO: Testa!
			add_action( 'wp_footer', array( &$this, 'handlebar_templates' ), 1 );

		}


		/**
		 * Function item_template
		 * @since 1.0.0
		 * @author Jonatan Olsson <jonatan@kingmary.se>
		 *
		 * @return string
		 *
		 */
		public function item_template() {
			return '
			<li class="search-module__item search-module__item--%s">
				<a class="search-module__item__container" href="%s" title="%s">
						<h3 class="search-module__item__title"> %s </h3>
						<span class="search-module__item__description">
							%s
						</span>
				</a>
			</li>';
		}


		/**
		 * Function handlebar_templates
		 * @since 1.0.0
		 * @author Jonatan Olsson <jonatan@kingmary.se>
		 *
		 *
		 */
		public function handlebar_templates() {
			?>

			<script id="searchitem-template-posts" type="text/x-handlebars-template">
				<?php printf( $this->item_template(), '{{type}}', '{{url}}', '{{title}}', '{{title}}', '{{type_label}}', 'Uppdaterad {{modified}}' ); ?>
			</script>

			<script id="searchitem-template-attachments" type="text/x-handlebars-template">
				<?php printf( $this->item_template(), '{{type}}', '{{url}}', '{{title}}', '{{title}}', '{{file_type}}', 'Uppdaterad {{modified}}' ); ?>
			</script>

			<script id="searchitem-template-contacts" type="text/x-handlebars-template">
				<?php printf( $this->item_template(), '{{type}}', '{{url}}', '{{title}}', '{{title}}', '{{type_label}}', 'Uppdaterad {{modified}}' ); ?>
			</script>
			<?php
		}

	}

	$hb_search = new HB_Search();
}

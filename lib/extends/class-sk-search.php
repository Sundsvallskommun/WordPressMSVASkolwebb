<?php


class HB_Search extends SK_Search {

	public function __construct() {
		parent::__construct();


		$this->clear_parent_theme_hooks();

		add_action( 'wp_footer', array( &$this, 'handlebar_templates' ), 1 );

	}


	public function clear_parent_theme_hooks() {

		/**
		 * Updated handlebars
		 */
		return remove_action( 'wp_footer', array( &$this, 'handlebar_templates' ) );

	}


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
	 * Echo handlebar templates for each search type
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

$sk_search = new HB_Search();
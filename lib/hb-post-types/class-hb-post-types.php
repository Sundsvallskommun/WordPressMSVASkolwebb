<?php


class HB_Post_Types {

	/**
	 * HB_News constructor.
	 */
	public function __construct() {
		add_action( 'init', function () {
			$this->init();
		}, 50 );

	}

	/**
	 * Function init
	 * @since 1.0.0
	 * @author Jonatan Olsson <jonatan@kingmary.se>
	 *
	 *
	 */
	public function init() {

		$this->redeclare_custom_post_types();

	}

	/**
	 * Function redeclare_custom_post_types
	 * @since 1.0.0
	 * @author Jonatan Olsson <jonatan@kingmary.se>
	 *
	 * Redeclare without from
	 */
	public function redeclare_custom_post_types() {

		/**
		 * Contact persons
		 */


		$args                        = get_post_type_object( 'contact_persons' );
		$args->rewrite['with_front'] = false;
		//		unregister_post_type( $args->name );
		register_post_type( $args->name, $args );
	}


}
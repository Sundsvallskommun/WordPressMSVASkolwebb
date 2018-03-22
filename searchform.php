<?php
// Used in hidden input to set query parameter of advanced template
$parent_id = advanced_template_top_ancestor();
?>

<?php do_action( 'hb_before_search_form' ); ?>

<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<?php if ( $parent_id ): ?>
		<input type="hidden" value="<?php echo $parent_id; ?>" name="parent" />
	<?php endif; ?>

	<div class="input-group">
		<?php
		$site_name          = get_bloginfo( 'name', 'display' );
		$search_placeholder = sprintf( __( "Sök på %s", 'hb' ), $site_name );
		?>

		<input type="text" value="<?php echo get_search_query(); ?>" class="form-control" placeholder="<?php echo $search_placeholder ?>" name="s" id="s" />

		<label class="sr-only" for="s"><?php _e( 'Sök', 'hb' ); ?></label>

		<span class="input-group-btn">

			<button class="btn btn-secondary" type="submit" id="searchsubmit">

				<span><?php _e( 'Sök', 'hb' ); ?></span>

			</button>

		</span>
	</div>
</form>

<?php do_action( 'hb_after_search_form' ); ?>

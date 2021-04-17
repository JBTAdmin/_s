<?php
/**
 * Template for displaying search forms in Gautam in widgets.
 *
 * @package gautam
 *
 * @since 1.0
 */

?>

<div class="search_holder">
	<form role="search" class="search search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>"
			method="GET">
		<label> <span class="screen-reader-text">Search for</span>
			<input autocomplete="off" type="text" id="search-field" class="search-field" name="s"
					placeholder="<?php esc_attr_e( 'Search..', 'gautam' ); ?>" value="" >
			<button type="submit" class="search search-submit">
				<i class="fa fa-search" aria-hidden="true"></i>
			</button>
		</label>
	</form>
</div>

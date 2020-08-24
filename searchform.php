<?php
/**
 * Template for displaying search forms in Aaurora
 *
 * @since 1.0
 * @version 1.0
 */

?>

<?php //$unique_id = esc_attr( twentyseventeen_unique_id( 'search-form-' ) ); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="search-field">
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'aaurora' ); ?></span>
	</label>
	<input type="search" id="search-field" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'twentyseventeen' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
<!--	<button type="submit" class="search-submit">--><?php //echo twentyseventeen_get_svg( array( 'icon' => 'search' ) ); ?><!--<span class="screen-reader-text">--><?php //echo _x( 'Search', 'submit button', 'twentyseventeen' ); ?><!--</span></button>-->
</form>
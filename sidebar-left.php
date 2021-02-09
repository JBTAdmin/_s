<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aaurora
 */

get_theme_mod( 'sidebar_listing', 'right' );
$option = array( 'content-only', 'sidebar-right' );

if ( ! is_active_sidebar( 'aaurora-sidebar-left' ) || in_array( get_theme_mod( 'sidebar_layout_setting', 'content-only' ), $option, true ) ) {
	return;
}
?>

<aside id="secondary-sidebar" class="widget-area sidebar-left">
	<?php dynamic_sidebar( 'aaurora-sidebar-left' ); ?>
</aside><!-- #secondary -->

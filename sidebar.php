<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aaurora
 */

get_theme_mod( 'sidebar_listing', 'right' );
$option = array( 'content-only', 'aaurora-sidebar-left' );
if ( ! is_active_sidebar( 'aaurora-sidebar-right' ) || in_array( get_theme_mod( 'sidebar_layout_setting', 'content-only' ), $option, true ) ) {
	return;
}
?>

<aside id="primary-sidebar" class="widget-area sidebar-right">
	<?php dynamic_sidebar( 'aaurora-sidebar-right' ); ?>
</aside><!-- #secondary -->


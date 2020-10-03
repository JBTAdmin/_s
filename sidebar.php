<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aaurora
 */

get_theme_mod( 'sidebar_listing', 'right' );
$option = array( 'content-only', 'sidebar-left' );
if ( ! is_active_sidebar( 'sidebar-right' ) || in_array( get_theme_mod( 'sidebar_layout_setting', 'content-only' ), $option, true ) ) {
	return;
}
?>

<aside id="primary" class="widget-area sidebar-right">
	<?php dynamic_sidebar( 'sidebar-right' ); ?>
</aside><!-- #secondary -->


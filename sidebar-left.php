<?php
/**
 * The sidebar containing the left widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gautam
 */

get_theme_mod( 'sidebar_listing', 'right' );
$option = array( 'content-only', 'sidebar-right' );

if ( ! is_active_sidebar( 'gautam-sidebar-left' ) || in_array( get_theme_mod( 'sidebar_layout_setting', 'content-only' ), $option, true ) ) {
	return;
}
?>

<aside id="secondary-sidebar" class="widget-area sidebar-left">
	<?php dynamic_sidebar( 'gautam-sidebar-left' ); ?>
</aside><!-- #secondary-sidebar -->

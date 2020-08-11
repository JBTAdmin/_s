<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aaurora
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
    <div class="sidebar-close-btn">
		<?php load_inline_svg( 'close.svg' ); ?>
    </div>
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'menu-1',
			'menu_id'        => 'primary-menu-sidebar',
            'menu_class'     => 'sidebar-menu'
		)
	);
	?>
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
<div class="sidebar-overlay"></div>
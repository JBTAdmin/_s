<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aaurora
 */

get_theme_mod( 'sidebar_listing', 'right' );

if ( ! is_active_sidebar( 'sidebar-1' ) || get_theme_mod( 'sidebar_listing', 'right' ) === 'disable' ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<div class="aside-header-container">
		<div class="widget aside-header">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( ! get_theme_mod( 'custom_logo' ) ) :
					if ( is_front_page() && is_home() ) :
						?>
						<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
						<?php
					endif;
				$aaurora_description = get_bloginfo( 'description', 'display' );
				if ( $aaurora_description || is_customize_preview() ) :
					?>
                    <p class="site-description"> <?php echo $aaurora_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped. ?></p>
				<?php endif;
				endif;?>
			</div>
			<div class="sidebar-close-btn">
				<?php load_inline_svg( 'close.svg' ); ?>
			</div>
		</div>
	</div>
	<?php
	wp_nav_menu(
		array(
			'theme_location'  => 'menu-1',
			'menu_id'         => 'primary-menu-sidebar',
			'menu_class'      => 'sidebar-menu',
			'container_class' => 'widget widget-sidebar-menu',
		)
	);
	?>
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
<div class="sidebar-overlay"></div>

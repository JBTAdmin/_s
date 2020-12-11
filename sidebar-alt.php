<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aaurora
 */

get_theme_mod( 'sidebar_listing', 'right' );
?>

<aside id="secondary-alt" class="widget-area sidebar-alt-aside sidebar-alt">
	<div class="aside-header-container">
		<div class="widget aside-header">
			<div class="site-branding">
				<?php
				the_custom_logo();
				if ( ! get_theme_mod( 'custom_logo' ) ) :
					?>
					<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
											rel="home"><?php bloginfo( 'name' ); ?></a></div>
					<?php
					$aaurora_description = get_bloginfo( 'description', 'display' );
					if ( $aaurora_description || is_customize_preview() ) :
						?>
						<p class="site-description"> 
						<?php
						echo $aaurora_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped.
						?>
							</p>
						<?php
					endif;
				endif;
				?>
			</div>
			<div class="sidebar-close-btn">
				<button class="toggle sidebar-close desktop-sidebar-toggle" data-toggle-target=".sidebar-modal" data-toggle-body-class="closing-sidebar-modal" aria-expanded="false">
									<span class="toggle-inner">
										<?php load_inline_svg( 'close.svg' ); ?>
									</span>
				</button>
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
	<?php dynamic_sidebar( 'aaurora-sidebar-alt' ); ?>
</aside><!-- #secondary -->
<div class="sidebar-overlay"></div>

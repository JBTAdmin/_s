<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aaurora
 */

get_theme_mod( 'sidebar_listing', 'right' );

$class = 'widget-area sidebar-alt-aside sidebar-alt';

?>
<amp-sidebar id="drawermenu" layout="nodisplay" side="right">
	<aside id="secondary-alt" class="<?php esc_attr_e( $class ); ?>">
		<div class="wrap">
			<div class="aside-header-container">
				<div class="widget aside-header">
					<div class="sidebar-close-btn" on="tap:drawermenu.toggle" role="button" tabindex="1">
						<button class="toggle sidebar-close desktop-sidebar-toggle" data-toggle-target=".sidebar-modal"
								data-toggle-body-class="closing-sidebar-modal" aria-expanded="false">
									<span class="toggle-inner">
										<?php aaurora_load_inline_svg( 'close.svg' ); ?>
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
		</div>
	</aside><!-- #secondary -->
</amp-sidebar>
<div class="sidebar-overlay"></div>

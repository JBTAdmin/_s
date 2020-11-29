<?php
/**
 * Header elements.
 *
 * @package Aaurora
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Top bar.
 */
if ( ! function_exists( 'aaurora_top_bar_layout' ) ) {

	/**
	 * Top Bar Layout.
	 */
	function aaurora_top_bar_layout() {
			// Return if no top bar.
		if ( 'disabled' === get_theme_mod( 'top_bar_layout_setting', 'disabled' ) ) {
			return;
		}
		?>
		<div id="top-bar" class="top-menu aaurora-top-bar <?php get_theme_mod( 'top_bar_layout_setting' ); ?>">
			<div class="wrap">
				<div class="header-top-bar">
					<nav id="top-bar-navigation" class="secondary-navigation ">
						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'top-bar-menu',
								'menu_id'         => 'top-bar-menu',
								'menu_class'      => 'header-menu',
								'container_class' => 'header-menu-container',
								'fallback_cb'     => false,
								'depth'           => 1,
							)
						);
						?>
					</nav><!-- #top-bar-navigation -->
					<?php
					// Social Icons.
					aaurora_social_media( 'top-bar-social' );
					?>
				</div>
			</div>
		</div>
		<?php
	}

	add_action( 'aaurora_header_before', 'aaurora_top_bar_layout' );

}

/**
 * Header Branding.
 */
if ( ! function_exists( 'aaurora_header_branding_layout' ) ) {

	/**
	 * Aorora Branding Layout.
	 */
	function aaurora_header_branding_layout() {
		/**
		 * Return if no Header Branding Bar.
		 */
		if ( true != get_theme_mod( 'aaurora_site_branding', true ) ) {
			return;
		}

		$numbering_class = '';
		if ( true === get_theme_mod( 'main_menu_numbering' ) ) {
			$numbering_class = 'numbered';
		}

		$container_alignment_class = 'header-menu-container ' . $numbering_class . ' aligned-menu-' . get_theme_mod( 'main_menu_align', 'right' );
		?>
		<div class="header-menu-bar">
			<div class="wrap">
				<div class="header-container <?php echo esc_attr( get_theme_mod( 'header_layout_setting' ) ); ?>">
					<?php
					aaurora_site_branding( 'left' );
					?>
					<div class="main-header">
						<nav id="site-navigation" class="main-navigation ">
							<div class="menu-btn">
								<div class="menu-btn__burger"></div>
							</div>
							<?php

							wp_nav_menu(
								array(
									'theme_location'  => 'menu-1',
									'menu_id'         => 'primary-menu',
									'menu_class'      => 'header-menu',
									'container_class' => $container_alignment_class,
									'fallback_cb'     => false,
								)
							);
							aaurora_hamburger_menu();
							?>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	add_action( 'aaurora_header', 'aaurora_header_branding_layout' );
}

/**
 * Header Main Menu.
 */
if ( ! function_exists( 'aaurora_header_main_menu_layout' ) ) {

	/**
	 * Header Main Layout.
	 */
	function aaurora_header_main_menu_layout() {

		if ( true != get_theme_mod( 'aaurora_header_main_menu_layout', true ) ) {
			return;
		}
		?>
		<?php
	}

	add_action( 'aaurora_header_after', 'aaurora_header_main_menu_layout' );
}


if ( ! function_exists( 'aaurora_site_branding' ) ) :
	/**
	 * Displays Site Branding.
	 *
	 * @param string $location Needs to remove this todo.
	 */
	function aaurora_site_branding( $location ) {
		?>
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
		<?php
	}
endif;

if ( ! function_exists( 'aaurora_main_menu' ) ) :
	/**
	 * Displays Site Branding.
	 *
	 * @param String $menu_location Where this menu will be displayed.
	 */
	function aaurora_main_menu( $menu_location ) {
		?>
		<div class="main-header">
			<nav id="site-navigation" class="main-navigation">
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => $menu_location,
						'menu_id'         => 'primary-menu',
						'menu_class'      => 'header-menu',
						'container_class' => 'header-menu-container',
						'fallback_cb'     => false,
					)
				);
				?>
			</nav>
		</div>
		<?php
	}
endif;

if ( ! function_exists( 'aaurora_hamburger_menu' ) ) :
	/**
	 * Displays Hamburger Menu.
	 */
	function aaurora_hamburger_menu() {
		$sidebar_alt_class = '';
		if ( ! is_active_sidebar( 'sidebar-alt' ) ) {
			$sidebar_alt_class = 'menu_only';
		}
		?>
			<div class="hamburger-menu <?php echo esc_attr( $sidebar_alt_class ); ?>">
				<div class="toggle sidebar-open desktop-sidebar-toggle" data-toggle-target=".sidebar-modal"
						data-toggle-body-class="showing-sidebar-modal" aria-expanded="false">
									<span class="toggle-inner">
										<?php load_inline_svg( 'hamburger.svg' ); ?>
									</span>
				</div>
			</div>
			<?php
	}
endif;

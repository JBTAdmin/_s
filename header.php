<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aaurora
 */

$menu_class = '';

$header_class = '';

$header_class .= ' ' . get_theme_mod( 'header_layout', 'menu-below-logo' );

$header_class .= ' ' . get_theme_mod( 'header_layout_color', 'light' );

$header_class .= ' ' . get_theme_mod( 'search_position', 'header' );

$menu_class .= ' ' . get_theme_mod( 'main_menu_font_decoration', 'none' );

$menu_class .= ' ' . get_theme_mod( 'main_menu_font_weight', 'regularfont' );

$menu_class .= ' ' . get_theme_mod( 'main_menu_arrow_style', 'noarrow' );

// todo Top line section should be created and styling should be applied directly.
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script src="/wp-content/themes/aaurora/js/main.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary">
		<?php esc_html_e( 'Skip to content', 'aaurora' ); ?></a>
	<header id="masthead" class="site-header 
	<?php
	echo esc_attr( $header_class );
	echo esc_attr( $menu_class );
	?>
	">
		<div class="header-wrap">
			<div class="main-header">
				<div class="site-branding" style="width: 12rem">
<!--                    // TODO MOVE THIS TO SCSS-->
					<?php

					the_custom_logo();

					if ( ! get_theme_mod( 'custom_logo' ) ) :
						if ( is_front_page() && is_home() ) :
							?>
						<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
							<?php
					else :
						?>
						<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
						<?php
					endif;
					endif;
					$aaurora_description = get_bloginfo( 'description', 'display' );
					if ( $aaurora_description || is_customize_preview() ) :
						?>
						<!--				<p class="site-description">-->
						<?php
						// echo $aaurora_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped.
						?>
						<!--</p>-->
					<?php endif; ?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">

					<div class="menu-btn">
						<div class="menu-btn__burger"></div>
					</div>
					<!--			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">-->
					<?php // esc_html_e( 'Primary Menu', 'aaurora' ); ?><!--</button>-->

                    <div class="<?php echo esc_attr( 'aligned-menu-' . get_theme_mod( 'main_menu_align', 'right' ) ); ?>">
                    <?php
					wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'container'      => ''
						)
					);
					?>
            </div>
                    <div class="hamburger-menu">
						<?php load_inline_svg( 'hamburger.svg' ); ?>
                    </div>
                    
				</nav><!-- #site-navigation -->
			</div>
		</div>
	</header><!-- #masthead -->

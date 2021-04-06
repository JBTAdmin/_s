<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package gautam
 */

$menu_class = '';

$header_class = '';

$body_class = '';

$body_class .= ' ' . get_theme_mod( 'single_post_layout', 'in-header' );

if ( true === get_theme_mod( 'fixed-header', true ) ) {
	$body_class .= ' header-fixed';
}

$header_class .= ' ' . get_theme_mod( 'header_layout_color', 'light' );

$header_class .= ' ' . get_theme_mod( 'search_position', 'header' );

$header_class .= ' ' . get_theme_mod( 'header_layout_setting' );

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
	<?php wp_head(); ?>
</head>

<body <?php body_class( $body_class ); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary">
		<?php esc_html_e( 'Skip to content', 'gautam' ); ?></a>
	<header id="masthead" class="site-header
	<?php
	echo esc_attr( $header_class );
	echo esc_attr( $menu_class );
	?>
	">
		<?php gautam_header_before(); ?>
		<?php gautam_header(); ?>
		<?php gautam_header_after(); ?>
	</header><!-- #masthead -->

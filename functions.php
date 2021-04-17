<?php
/**
 * Gautam_ functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gautam
 */

if ( ! defined( 'GAUTAM_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'GAUTAM_VERSION', '1.0.0' );
}

/**
 * Functions which setup the default theme settings.
 */
require get_template_directory() . '/inc/core.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom template tags for the theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Registered Theme widgets.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Hooks used across theme.
 */
require get_template_directory() . '/inc/theme-hooks.php';


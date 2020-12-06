<?php
/**
 * Aaurora_ functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aaurora
 */

if ( ! defined( 'AAURORA_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'AAURORA_VERSION', '1.0.0' );
}

// todo Check this????.

require get_template_directory() . '/inc/core/core.php';
require get_template_directory() . '/inc/helper.php';
require get_template_directory() . '/inc/widgets.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/theme-hooks.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/template-parts/header/header.php'; // todo why we need this as it is specific to header template file.


// Compatibility
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// Admin
if ( is_admin() ) {
	require dirname( __FILE__ ) . '/inc/admin/class-aaurora-admin.php';
}

/**
 * Disable JQuery.
 */
function deregister_jquery() {
	if ( ! is_admin() ) {
		wp_deregister_script( 'jquery' );
	}
}
add_action( 'wp_enqueue_scripts', 'deregister_jquery' );

// todo check how good it is and should i do it?
// It should work without below changes coz in core.php given thing is already added. So check why that thing is not working and how that is different from this.
// core.php  search for html5
/**
 * Remove type attribute. To Fix W3 Validation.
 * https://wordpress.stackexchange.com/questions/287830/remove-type-attribute-from-script-and-style-tags-added-by-wordpress
 */
add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'html5', array( 'script', 'style' ) );
	}
);

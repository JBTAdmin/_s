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

// todo Check this????.

require get_template_directory() . '/inc/core.php';
require get_template_directory() . '/inc/widgets.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/theme-hooks.php';
require get_template_directory() . '/inc/template-functions.php';


// Compatibility.
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

// Admin.
if ( is_admin() ) {
	require dirname( __FILE__ ) . '/inc/admin/class-gautam-admin.php';
}

/**
 * Disable JQuery.
 * todo REMOVE THIS
 */
function deregister_jquery() {
	if ( ! is_admin() ) {
		wp_deregister_script( 'jquery' );
	}
}
add_action( 'wp_enqueue_scripts', 'deregister_jquery' );

// todo check how good it is and should i do it?
// It should work without below changes coz in core.php given thing is already added. So check why that thing is not working and how that is different from this.
// core.php  search for html5.
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




// Kirki Related.
// todo See if below options related to kirki needs to be enabled or not.
/**
 * Uses Embedded Kirki.
 */
require_once get_parent_theme_file_path( '/inc/kirki/kirki.php' );

/**
 * Embedded Kirki location.  // todo need to check if it really required
 */
function gautam_kirki_configuration() {
	return array( 'url_path' => get_stylesheet_directory_uri() . '/inc/kirki/' );
}
add_filter( 'kirki/config', 'gautam_kirki_configuration' );

/**
 * Use CDN Font instead of hosted fonts in Kirki.
 */
add_filter( 'kirki_use_local_fonts', '__return_false' );

/**
 * Kirki Customization File Location.
 */
require get_template_directory() . '/inc/kirki-configuration.php';

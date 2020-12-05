<?php
/**
 * Aaurora Theme Customizer
 *
 * @package aaurora
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function aaurora_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'aaurora_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'aaurora_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'aaurora_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function aaurora_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function aaurora_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function aaurora_customize_preview_js() {
	wp_enqueue_script( 'aaurora-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'aaurora_customize_preview_js' );



// Kirki Related.
// todo See if below options related to kirki needs to be enabled or not.
/**
 * Uses Embedded Kirki.
 */
require_once get_parent_theme_file_path('/inc/kirki/kirki.php' );

/**
 * Embedded Kirki location.  // todo need to check if it really required
 */
function aaurora_kirki_configuration() {
	return array( 'url_path' => get_stylesheet_directory_uri() . '/inc/kirki/' );
}
add_filter( 'kirki/config', 'aaurora_kirki_configuration' );

/**
 * Use CDN Font instead of hosted fonts in Kirki.
 */
add_filter( 'kirki_use_local_fonts', '__return_false' );

/**
 * Kirki Customization File Location.
 */
require get_template_directory() . '/inc/kirki-configuration.php';

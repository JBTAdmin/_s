<?php
/**
 * Theme Hook Alliance hook stub list.
 *
 * @see  https://github.com/zamoose/themehookalliance
 *
 * @package  gautam
 * @version  1.0.0
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Themes and Plugins can check for gautam_hooks using current_theme_supports( 'gautam_hooks', $hook )
 * to determine whether a theme declares itself to support this specific hook type.
 *
 * Example:
 * <code>
 *      // Declare support for all hook types
 *      add_theme_support( 'gautam_hooks', array( 'all' ) );
 *
 *      // Declare support for certain hook types only
 *      add_theme_support( 'gautam_hooks', array( 'header', 'content', 'footer' ) );
 * </code>
 */
add_theme_support(
	'gautam_hooks',
	array(

		/**
		 * As a Theme developer, use the 'all' parameter, to declare support for all
		 * hook types.
		 * Please make sure you then actually reference all the hooks in this file,
		 * Plugin developers depend on it!
		 */
		'all',

		/**
		 * Themes can also choose to only support certain hook types.
		 * Please make sure you then actually reference all the hooks in this type
		 * family.
		 *
		 * When the 'all' parameter was set, specific hook types do not need to be
		 * added explicitly.
		 */
		'html',
		'body',
		'head',
		'header',
		'content',
		'entry',
		'comments',
		'sidebars',
		'sidebar',
		'footer',

		/**
		 * If/when WordPress Core implements similar methodology, Themes and Plugins
		 * will be able to check whether the version of THA supplied by the theme
		 * supports Core hooks.
		 */
		// 'core',
	)
);

/**
 * Determines, whether the specific hook type is actually supported.
 *
 * Plugin developers should always check for the support of a <strong>specific</strong>
 * hook type before hooking a callback function to a hook of this type.
 *
 * Example:
 * <code>
 *      if ( current_theme_supports( 'gautam_hooks', 'header' ) )
 *          add_action( 'gautam_head_top', 'prefix_header_top' );
 * </code>
 *
 * @param bool  $bool true.
 * @param array $args The hook type being checked.
 * @param array $registered All registered hook types.
 *
 * @return bool
 */
function gautam_current_theme_supports( $bool, $args, $registered ) {
	return in_array( $args[0], $registered[0] ) || in_array( 'all', $registered[0] );
}

add_filter( 'current_theme_supports-gautam_hooks', 'gautam_current_theme_supports', 10, 3 );

/**
 * HTML <html> hook
 * Special case, useful for <DOCTYPE>, etc.
 * $gautam_supports[] = 'html;
 */
function gautam_html_before() {
	do_action( 'gautam_html_before' );
}

/**
 * HTML <body> hooks
 * $gautam_supports[] = 'body';
 */
function gautam_body_top() {
	do_action( 'gautam_body_top' );
}

/**
 * Body Bottom.
 */
function gautam_body_bottom() {
	do_action( 'gautam_body_bottom' );
}

/**
 * HTML <head> hooks
 *
 * $gautam_supports[] = 'head';
 */
function gautam_head_top() {
	do_action( 'gautam_head_top' );
}

/**
 * Head Bottom.
 */
function gautam_head_bottom() {
	do_action( 'gautam_head_bottom' );
}

/**
 * Semantic <header> hooks
 *
 * $gautam_supports[] = 'header';
 */
function gautam_header_before() {
	do_action( 'gautam_header_before' );
}

/**
 * Header.
 */
function gautam_header() {
	do_action( 'gautam_header' );
}

/**
 * Header After.
 */
function gautam_header_after() {
	do_action( 'gautam_header_after' );
}

/**
 * Header Top.
 */
function gautam_header_top() {
	do_action( 'gautam_header_top' );
}

/**
 * Header Bottom.
 */
function gautam_header_bottom() {
	do_action( 'gautam_header_bottom' );
}

/**
 * Content Top.
 */
function gautam_content_top() {
	do_action( 'gautam_content_top' );
}

/**
 * Content Bottom.
 */
function gautam_content_bottom() {
	do_action( 'gautam_content_bottom' );
}

/**
 * Content While Before.
 */
function gautam_content_while_before() {
	do_action( 'gautam_content_while_before' );
}

/**
 * Content While After.
 */
function gautam_content_while_after() {
	do_action( 'gautam_content_while_after' );
}

/**
 * Semantic <entry> hooks
 *
 * $gautam_supports[] = 'entry';
 */
function gautam_entry_before() {
	do_action( 'gautam_entry_before' );
}

/**
 * Entry After.
 */
function gautam_entry_after() {
	do_action( 'gautam_entry_after' );
}

/**
 * Entry Top.
 */
function gautam_entry_top() {
	do_action( 'gautam_entry_top' );
}

/**
 * Entry Bottom.
 */
function gautam_entry_bottom() {
	do_action( 'gautam_entry_bottom' );
}

/**
 * Comments block hooks
 *
 * $gautam_supports[] = 'comments';
 */
function gautam_comments_before() {
	do_action( 'gautam_comments_before' );
}

/**
 * Comments After.
 */
function gautam_comments_after() {
	do_action( 'gautam_comments_after' );
}

/**
 * Semantic <sidebar> hooks
 *
 * $gautam_supports[] = 'sidebar';
 */
function gautam_sidebars_before() {
	do_action( 'gautam_sidebars_before' );
}

/**
 * Right Sidebar.
 */
function gautam_right_sidebar() {
	do_action( 'gautam_right_sidebar' );
}

/**
 * Left Sidebar.
 */
function gautam_left_sidebar() {
	do_action( 'gautam_left_sidebar' );
}

/**
 * Sidebar After.
 */
function gautam_sidebars_after() {
	do_action( 'gautam_sidebars_after' );
}

/**
 * Sidebar Top.
 */
function gautam_sidebar_top() {
	do_action( 'gautam_sidebar_top' );
}

/**
 * Sidebar Bottom.
 */
function gautam_sidebar_bottom() {
	do_action( 'gautam_sidebar_bottom' );
}

/**
 * Semantic <footer> hooks
 *
 * $gautam_supports[] = 'footer';
 */
function gautam_footer_before() {
	do_action( 'gautam_footer_before' );
}

/**
 * Footer After.
 */
function gautam_footer() {
	do_action( 'gautam_footer' );
}

/**
 * Footer After.
 */
function gautam_footer_after() {
	do_action( 'gautam_footer_after' );
}

/**
 * Entry Content After.
 */
function gautam_entry_tag_before() {
	do_action( 'gautam_entry_tag_before' );
}

/**
 * Entry Content After.
 */
function gautam_entry_tag_after() {
	do_action( 'gautam_entry_tag_after' );
}

/**
 * Entry Content After.
 */
function gautam_entry_author_before() {
	do_action( 'gautam_entry_author_before' );
}

/**
 * Entry Content After.
 */
function gautam_entry_author_after() {
	do_action( 'gautam_entry_author_after' );
}

/**
 * Entry Content After.
 */
function gautam_entry_navigation_before() {
	do_action( 'gautam_entry_navigation_before' );
}

/**
 * Entry Content After.
 */
function gautam_entry_navigation_after() {
	do_action( 'gautam_entry_navigation_after' );
}

/**
 * Before Main Content
 */
function gautam_main_content_before() {
	do_action( 'gautam_main_content_before' );
}

/**
 * After Main Content.
 */
function gautam_main_content_after() {
	do_action( 'gautam_main_content_after' );
}

/**
 * Before Content.
 */
function gautam_content_before() {
	do_action( 'gautam_content_before' );
}

/**
 * After Content.
 */
function gautam_content_after() {
	do_action( 'gautam_content_after' );
}

/**
 * Before Entry Content.
 */
function gautam_entry_content_before() {
	do_action( 'gautam_entry_content_before' );
}

/**
 * Entry Content.
 */
function gautam_entry_content() {
	do_action( 'gautam_entry_content' );
}

/**
 * After Entry Content
 */
function gautam_entry_content_after() {
	do_action( 'gautam_entry_content_after' );
}

/**
 * Before Site Container
 */
function gautam_site_container_before() {
	do_action( 'gautam_site_container_before' );
}

/**
 * After Site Container
 */
function gautam_site_container_after() {
	do_action( 'gautam_site_container_after' );
}

/**
 * Before Footer Content.
 */
function gautam_footer_content_top() {
	do_action( 'gautam_footer_content_top' );
}

/**
 * Footer Content.
 */
function gautam_footer_content() {
	do_action( 'gautam_footer_content' );
}

/**
 * After Footer Content.
 */
function gautam_footer_content_bottom() {
	do_action( 'gautam_footer_content_bottom' );
}

/**
 * Before Singular Content.
 */
function gautam_singular_content_before() {
	do_action( 'gautam_singular_content_before' );
}

/**
 * Singular Content.
 */
function gautam_singular_content() {
	do_action( 'gautam_singular_content' );
}

/**
 * After Singular Content.
 */
function gautam_singular_content_after() {
	do_action( 'gautam_singular_content_after' );
}

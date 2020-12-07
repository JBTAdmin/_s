<?php
/**
 * Theme Hook Alliance hook stub list.
 *
 * @package  themehookalliance
 * @version  1.0-draft
 * @since    1.0-draft
 * @license  http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, v2 (or newer)
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Themes and Plugins can check for aaurora_hooks using current_theme_supports( 'aaurora_hooks', $hook )
 * to determine whether a theme declares itself to support this specific hook type.
 *
 * Example:
 * <code>
 *      // Declare support for all hook types
 *      add_theme_support( 'aaurora_hooks', array( 'all' ) );
 *
 *      // Declare support for certain hook types only
 *      add_theme_support( 'aaurora_hooks', array( 'header', 'content', 'footer' ) );
 * </code>
 */
add_theme_support(
	'aaurora_hooks',
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
 *      if ( current_theme_supports( 'aaurora_hooks', 'header' ) )
 *          add_action( 'aaurora_head_top', 'prefix_header_top' );
 * </code>
 *
 * @param bool  $bool true.
 * @param array $args The hook type being checked.
 * @param array $registered All registered hook types.
 *
 * @return bool
 */
function aaurora_current_theme_supports( $bool, $args, $registered ) {
	return in_array( $args[0], $registered[0] ) || in_array( 'all', $registered[0] );
}
add_filter( 'current_theme_supports-aaurora_hooks', 'aaurora_current_theme_supports', 10, 3 );

/**
 * HTML <html> hook
 * Special case, useful for <DOCTYPE>, etc.
 * $aaurora_supports[] = 'html;
 */
function aaurora_html_before() {
	do_action( 'aaurora_html_before' );
}
/**
 * HTML <body> hooks
 * $aaurora_supports[] = 'body';
 */
function aaurora_body_top() {
	do_action( 'aaurora_body_top' );
}

/**
 * Body Bottom.
 */
function aaurora_body_bottom() {
	do_action( 'aaurora_body_bottom' );
}

/**
 * HTML <head> hooks
 *
 * $aaurora_supports[] = 'head';
 */
function aaurora_head_top() {
	do_action( 'aaurora_head_top' );
}

/**
 * Head Bottom.
 */
function aaurora_head_bottom() {
	do_action( 'aaurora_head_bottom' );
}

/**
 * Semantic <header> hooks
 *
 * $aaurora_supports[] = 'header';
 */
function aaurora_header_before() {
	do_action( 'aaurora_header_before' );
}

/**
 * Header.
 */
function aaurora_header() {
	do_action( 'aaurora_header' );
}

/**
 * Header After.
 */
function aaurora_header_after() {
	do_action( 'aaurora_header_after' );
}

/**
 * Header Top.
 */
function aaurora_header_top() {
	do_action( 'aaurora_header_top' );
}

/**
 * Header Bottom.
 */
function aaurora_header_bottom() {
	do_action( 'aaurora_header_bottom' );
}

/**
 * Semantic <content> hooks
 *
 * $aaurora_supports[] = 'content';
 */
function aaurora_content_before() {
	do_action( 'aaurora_content_before' );
}

/**
 * Content After.
 */
function aaurora_content_after() {
	do_action( 'aaurora_content_after' );
}

/**
 * Content Top.
 */
function aaurora_content_top() {
	do_action( 'aaurora_content_top' );
}

/**
 * Content Bottom.
 */
function aaurora_content_bottom() {
	do_action( 'aaurora_content_bottom' );
}

/**
 * Content While Before.
 */
function aaurora_content_while_before() {
	do_action( 'aaurora_content_while_before' );
}

/**
 * Content While After.
 */
function aaurora_content_while_after() {
	do_action( 'aaurora_content_while_after' );
}

/**
 * Semantic <entry> hooks
 *
 * $aaurora_supports[] = 'entry';
 */
function aaurora_entry_before() {
	do_action( 'aaurora_entry_before' );
}

/**
 * Entry After.
 */
function aaurora_entry_after() {
	do_action( 'aaurora_entry_after' );
}

/**
 * Entry Content Before.
 */
function aaurora_entry_content_before() {
	do_action( 'aaurora_entry_content_before' );
}

/**
 * Entry Content Before.
 */
function aaurora_entry_content() {
	do_action( 'aaurora_entry_content' );
}

/**
 * Entry Content After.
 */
function aaurora_entry_content_after() {
	do_action( 'aaurora_entry_content_after' );
}

/**
 * Entry Top.
 */
function aaurora_entry_top() {
	do_action( 'aaurora_entry_top' );
}

/**
 * Entry Bottom.
 */
function aaurora_entry_bottom() {
	do_action( 'aaurora_entry_bottom' );
}

/**
 * Comments block hooks
 *
 * $aaurora_supports[] = 'comments';
 */
function aaurora_comments_before() {
	do_action( 'aaurora_comments_before' );
}

/**
 * Comments After.
 */
function aaurora_comments_after() {
	do_action( 'aaurora_comments_after' );
}

/**
 * Semantic <sidebar> hooks
 *
 * $aaurora_supports[] = 'sidebar';
 */
function aaurora_sidebars_before() {
	do_action( 'aaurora_sidebars_before' );
}

/**
 * Right Sidebar.
 */
function aaurora_right_sidebar() {
	do_action( 'aaurora_right_sidebar' );
}

/**
 * Left Sidebar.
 */
function aaurora_left_sidebar() {
	do_action( 'aaurora_left_sidebar' );
}

/**
 * Sidebar After.
 */
function aaurora_sidebars_after() {
	do_action( 'aaurora_sidebars_after' );
}

/**
 * Sidebar Top.
 */
function aaurora_sidebar_top() {
	do_action( 'aaurora_sidebar_top' );
}

/**
 * Sidebar Bottom.
 */
function aaurora_sidebar_bottom() {
	do_action( 'aaurora_sidebar_bottom' );
}

/**
 * Semantic <footer> hooks
 *
 * $aaurora_supports[] = 'footer';
 */
function aaurora_footer_before() {
	do_action( 'aaurora_footer_before' );
}

/**
 * Footer After.
 */
function aaurora_footer_after() {
	do_action( 'aaurora_footer_after' );
}

/**
 * Footer Top.
 */
function aaurora_footer_top() {
	do_action( 'aaurora_footer_top' );
}

/**
 * Footer Bottom.
 */
function aaurora_footer_bottom() {
	do_action( 'aaurora_footer_bottom' );
}

<?php
/**
 * Core Theme Helper Function Used throughout Themes.
 *
 * @package Gautam
 * @since 1.0.0
 */

/**
 * Do not allow direct script access.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// todo remove this file.
/**
 * Pagination Buttons
 */
function gautam_post_nav() {
	echo "<div class='gautam-pagination'>";
	the_posts_pagination(
		array(
			'prev_text' => __( '&lt;', 'gautam' ),
			'next_text' => __( '&gt;', 'gautam' ),
			'type'      => 'list',
		)
	);
	echo '</div>';
}

/**
 * Checks to see if homepage or not.
 *
 * @return boolean, if current page is front page.
 * @since 1.0.0
 */
function gautam_is_frontpage() {
	return is_front_page() && ! is_home();
}

/**
 * Use Specific Article Layout.
 *
 * @since 1.0.0
 */
function gautam_get_content_layout() {

	if ( is_home() || is_archive() || is_search() ) {
		get_template_part( 'template-parts/blog/blog', get_theme_mod( 'blog_layout_setting', '2' ), get_post_type() );
	} else {
		get_template_part( 'template-parts/single/single', 'layout', get_post_type() );
	}
}

<?php
/**
 * Template to display single post category.
 *
 * @package gautam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/* translators: used between list items, there is a space after the comma */
if ( 'post' === get_post_type() ) {
	$categories_list = get_the_category_list( ' ' );
	if ( $categories_list ) {
		/* translators: 1: list of categories. */
		printf( '<div class="cat-links">' . esc_html( '%1$s ' ) . '</div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

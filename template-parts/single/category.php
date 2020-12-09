<?php
/**
 * Do not allow direct script access.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Do not show if category is disabled. todo use the proper category key.
if ( get_theme_mod( 'blog_post_nav', true ) === false ) {
	return;
}

/* translators: used between list items, there is a space after the comma */
if ( 'post' === get_post_type() ) {
	$categories_list = get_the_category_list( esc_html__( ', ', 'aaurora' ) );
	if ( $categories_list ) {
		/* translators: 1: list of categories. */
		printf( '<div class="cat-links">' . esc_html( '%1$s ' ) . '</div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

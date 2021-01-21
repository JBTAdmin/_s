<?php
/**
 * Displayes Thumbnails.
 *
 * @package Aaurora
 * @since 1.0
 */

/**
 * Do not allow direct script access.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$in_style = false;
if ('column-2-title-image' === get_theme_mod( 'blog_post_in_page_header_layout', 'column-2-title-image' )){
	$in_style = true;
}
aaurora_post_thumbnail('post-thumbnail', '',  $in_style);

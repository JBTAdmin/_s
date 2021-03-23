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

if ( in_array( get_theme_mod( 'single_post_layout', 'single-in-content-1' ), array( 'column-2-title-image', 'column-2-title-image-compact' ), true ) ) {
	$in_style = true;
}

$size = get_theme_mod( 'single_post_layout', 'single-in-content-1' );

aaurora_post_thumbnail( $size, '', $in_style );

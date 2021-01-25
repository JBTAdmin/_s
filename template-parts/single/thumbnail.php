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
$size = 'aaurora-single-post';

if ('column-2-title-image' === get_theme_mod( 'blog_post_in_page_header_layout', 'column-2-title-image' )){
	$in_style = true;
}

if('aaurora_site_container_before' === get_theme_mod( 'blog_post_header_location', 'aaurora_site_container_before' )){
	$layout = get_theme_mod( 'blog_post_in_page_header_layout', 'column-2-title-image' );
	if('column-2-title-image' === $layout){
		$size = 'aaurora-single-post';
	} else if ('column-2-title-image-compact' === $layout) {
		$size = 'aaurora-single-post';
	} else{
		$size = 'aaurora-single-post';
	}
} else{
	$layout = get_theme_mod( 'blog_post_in_content_header_layout', 'layout-1' );
	if('layout-1' === $layout){
		$size = 'aaurora-single-post';
	} else {
		$size = 'aaurora-single-post';
	}
}


aaurora_post_thumbnail($size, '',  $in_style);

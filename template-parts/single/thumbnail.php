<?php
/**
 * Template to display post thumbnails.
 *
 * @package gautam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$in_style       = false;
$featured_image = array(
	'in-header'  => 'gautam-post-in-header-featured-image',
	'in-content' => 'gautam-post-in-content-featured-image',
);

if ( in_array( get_theme_mod( 'single_post_layout', 'in-header' ), array( 'in-header' ), true ) ) {
	$in_style = true;
}

$size = $featured_image[ get_theme_mod( 'single_post_layout', 'in-header' ) ];

gautam_post_thumbnail( $size, '', $in_style );

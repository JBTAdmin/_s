<?php

/**
 * Do not allow direct script access.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( get_theme_mod( 'blog_post_featured_image', true ) === true ) :
	aaurora_post_thumbnail();
endif;

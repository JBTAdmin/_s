<?php

/**
 * Do not allow direct script access.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( get_theme_mod( 'blog_post_tags', true ) === true ) :
	aaurora_meta_tag_list();
endif;
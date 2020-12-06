<?php
/**
 * Core Theme Helper Function Used throughout Themes.
 *
 * @package Aaurora
 * @since 1.0.0
 */

/**
 * Do not allow direct script access.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Pagination Buttons
 */
function post_nav() {
	echo "<div class='aaurora-pagination'>";
	the_posts_pagination(
		array(
			'prev_text' => __( '&lt;&nbsp;Previous', 'aaurora' ),
			'next_text' => __( 'Next&nbsp;&gt;', 'aaurora' ),
			'type'      => 'list',
		)
	);
	echo '</div>';
}

// todo remove unnecessary mapping.
/**
 * Load an inline SVG.
 *
 * @param string $filename The filename of the SVG.
 *
 * @return void
 */
function load_inline_svg( $filename ) {
	
	ob_start();
	
	locate_template(
		"assets/images/{$filename}",
		true,
		false
	);
	
	echo wp_kses(
		ob_get_clean(),
		array_merge(
			wp_kses_allowed_html( 'post' ),
			array(
				'svg'      => array(
					'role'            => true,
					'width'           => true,
					'height'          => true,
					'fill'            => true,
					'xmlns'           => true,
					'viewbox'         => true,
					'aria-hidden'     => true,
					'stroke'          => true,
					'stroke-width'    => true,
					'stroke-linecap'  => true,
					'stroke-linejoin' => true,
					'rect'            => true,
					'circle'          => true,
					'path'            => true,
					'polyline'        => true,
				),
				'path'     => array(
					'd'              => true,
					'fill'           => true,
					'fill-rule'      => true,
					'stroke'         => true,
					'stroke-width'   => true,
					'stroke-linecap' => true,
				),
				'line'     => array(
					'x1' => true,
					'y1' => true,
					'x2' => true,
					'y2' => true,
				),
				'polyline' => array(
					'points' => true,
				),
				'rect'     => array(
					'x'      => true,
					'y'      => true,
					'height' => true,
					'width'  => true,
					'rx'     => true,
					'ry'     => true,
				),
				'circle'   => array(
					'cx' => true,
					'cy' => true,
					'r'  => true,
				),
			)
		)
	);
}

/**
 * Checks to see if homepage or not.
 *
 * @since 1.0.0
 * @return boolean, if current page is front page.
 */
function aaurora_is_frontpage() {
	return ( is_front_page() && ! is_home() );
}

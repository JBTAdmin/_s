<?php
/**
 * Sidebar widget areas.
 *
 * @package gautam
 */

/**
 * Do not allow direct script access.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'gautam_widgets_init' ) ) :
	/**
	 * Register widget area.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
	 */
	function gautam_widgets_init() {
		register_sidebar(
			array(
				'name'          => esc_html__( 'Right Sidebar', 'gautam' ),
				'id'            => 'gautam-sidebar-right',
				'description'   => esc_html__( 'Add widgets here.', 'gautam' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Left Sidebar', 'gautam' ),
				'id'            => 'gautam-sidebar-left',
				'description'   => esc_html__( 'Add widgets here.', 'gautam' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

	}
endif;
add_action( 'widgets_init', 'gautam_widgets_init' );

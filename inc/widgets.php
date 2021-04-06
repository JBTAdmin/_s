<?php
/**
 * Sidebar widget areas.
 *
 * @package Gautam
 * @since   1.0.0
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
				'name'          => esc_html__( 'Sidebar Right', 'gautam' ),
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
				'name'          => esc_html__( 'Sidebar Left', 'gautam' ),
				'id'            => 'gautam-sidebar-left',
				'description'   => esc_html__( 'Add widgets here.', 'gautam' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Sidebar Alt', 'gautam' ),
				'id'            => 'gautam-sidebar-alt',
				'description'   => esc_html__( 'Add widgets here.', 'gautam' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h2 class="widget-title">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer 1', 'gautam' ),
				'id'            => 'gautam-footer-1',
				'description'   => esc_html__( 'Add widgets here.', 'gautam' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer 2', 'gautam' ),
				'id'            => 'gautam-footer-2',
				'description'   => esc_html__( 'Add widgets here.', 'gautam' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer 3', 'gautam' ),
				'id'            => 'gautam-footer-3',
				'description'   => esc_html__( 'Add widgets here.', 'gautam' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			)
		);

		register_sidebar(
			array(
				'name'          => esc_html__( 'Footer 4', 'gautam' ),
				'id'            => 'gautam-footer-4',
				'description'   => esc_html__( 'Add widgets here.', 'gautam' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			)
		);
	}
endif;
add_action( 'widgets_init', 'gautam_widgets_init' );

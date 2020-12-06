<?php
/**
 * Sidebar widget areas.
 *
 * @package Aaurora
 * @since   1.0.0
 */

/**
 * Do not allow direct script access.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aaurora_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Right', 'aaurora' ),
			'id'            => 'sidebar-right',
			'description'   => esc_html__( 'Add widgets here.', 'aaurora' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Left', 'aaurora' ),
			'id'            => 'sidebar-left',
			'description'   => esc_html__( 'Add widgets here.', 'aaurora' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar Alt', 'aaurora' ),
			'id'            => 'sidebar-alt',
			'description'   => esc_html__( 'Add widgets here.', 'aaurora' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 1', 'aaurora' ),
			'id'            => 'footer-column-1',
			'description'   => esc_html__( 'Add widgets here.', 'aaurora' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title"><span>',
			'after_title'   => '</span></h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 2', 'aaurora' ),
			'id'            => 'footer-column-2',
			'description'   => esc_html__( 'Add widgets here.', 'aaurora' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title"><span>',
			'after_title'   => '</span></h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 3', 'aaurora' ),
			'id'            => 'footer-column-3',
			'description'   => esc_html__( 'Add widgets here.', 'aaurora' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title"><span>',
			'after_title'   => '</span></h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Column 4', 'aaurora' ),
			'id'            => 'footer-column-4',
			'description'   => esc_html__( 'Add widgets here.', 'aaurora' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title"><span>',
			'after_title'   => '</span></h3>',
		)
	);
}

add_action( 'widgets_init', 'aaurora_widgets_init' );

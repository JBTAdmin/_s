<?php
/**
 * Core Theme setup.
 *
 * @package gautam
 */

if ( ! function_exists( 'gautam_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function gautam_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on gautam_, use a find and replace
		 * to change 'GAUTAM' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'GAUTAM', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in two location.
		register_nav_menus(
			array(
				'menu-1'   => esc_html__( 'Primary', 'gautam' ),
				'footer-1' => esc_html__( 'Footer Menu 1', 'gautam' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Gutenberg Support.
		 * Theme supports wide images, galleries and videos.
		 */
		add_theme_support( 'align-wide' );

		add_theme_support( 'wp-block-styles' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'gautam_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function gautam_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'gautam_content_width', 640 );
}
add_action( 'after_setup_theme', 'gautam_content_width', 0 );

/**
 * Enqueue scripts/styles.
 */
function gautam_scripts() {

	// Theme Stylesheet.
	wp_enqueue_style( 'gautam-style', get_stylesheet_uri(), array(), GAUTAM_VERSION );

	// Theme RTL Stylesheet.
	wp_style_add_data( 'gautam-style', 'rtl', 'replace' );

	// FontAwesome Icons.
	wp_enqueue_style( 'fontawesome', get_theme_file_uri( '/assets/css/font-awesome.css' ), array(), '4.7.0' );

	// Custom Scripts.
	wp_enqueue_script( 'gautam-main', get_template_directory_uri() . '/assets/js/main.js', array(), GAUTAM_VERSION, true );

	// Comment Reply Script.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'gautam_scripts' );

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load Embedded Kirki Configuration.
 */
require_once get_parent_theme_file_path( '/inc/kirki/kirki.php' );

require get_template_directory() . '/inc/kirki-configuration.php';

/**
 * Provides the proper file location while kirki is in customizer view.
 *
 * @return string[] kirki files location.
 */
function gautam_kirki_configuration() {
	return array( 'url_path' => get_template_directory_uri() . '/inc/kirki/' );
}
add_filter( 'kirki/config', 'gautam_kirki_configuration' );

/**
 * Theme Featured Image sizes.
 */
function gautam_add_image_sizes() {
	add_image_size( 'gautam-blog-3-featured-image', 762, 898, true ); // Used for Blog Layout 3.
	add_image_size( 'gautam-post-navigation-featured-image', 80, 80, true ); // Used for Post Navigation.
	add_image_size( 'gautam-post-in-content-featured-image', 1140, 500, true );// Used for Single Post In Content Featured Image.
	add_image_size( 'gautam-post-in-header-featured-image', 1840, 500, true );// Used for Single Post In Header Featured Image.
}
add_action( 'after_setup_theme', 'gautam_add_image_sizes' );

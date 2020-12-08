<?php
/**
 * Core Theme setup.
 */

if ( ! function_exists( 'aaurora_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function aaurora_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on aaurora_, use a find and replace
		 * to change 'AAURORA' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'AAURORA', get_template_directory() . '/languages' );
		
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
				'menu-1'       => esc_html__( 'Primary', 'aaurora' ),
				'top-bar-menu' => esc_html__( 'Top Bar', 'aaurora' ),
				'footer-1'     => esc_html__( 'Footer Menu 1', 'aaurora' ),
				'footer-2'     => esc_html__( 'Footer Menu 2', 'aaurora' ),
				'footer-3'     => esc_html__( 'Footer Menu 3', 'aaurora' ),
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
		
		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'aaurora_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
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
add_action( 'after_setup_theme', 'aaurora_setup' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function aaurora_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'aaurora_content_width', 640 );
}

add_action( 'after_setup_theme', 'aaurora_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function aaurora_scripts() {
	wp_enqueue_style( 'aaurora-style', get_stylesheet_uri(), array(), AAURORA_VERSION );
	wp_style_add_data( 'aaurora-style', 'rtl', 'replace' );
	
	wp_enqueue_script( 'aaurora-main', get_template_directory_uri() . '/js/main.js', array(), AAURORA_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'aaurora_scripts' );


/**
 * Theme Featured Image support.
 */
add_image_size( 'aaurora-blog-single-post-navigation-featured-image', 80, 80, true ); // This is used for Blog Layout 1.
add_image_size( 'aaurora-blog-1-featured-image', 530, 420, true ); // This is used for Blog Layout 1.
add_image_size( 'aaurora-blog-2-featured-image', 540, 185, true ); // This is used for Blog Layout 2.
add_image_size( 'aaurora-blog-3-featured-image', 340, 185, true ); // This is used for Blog Layout 2.
add_image_size( 'aaurora-blog-single-post-sidebar', 400, 500, true );
add_image_size( 'aaurora-blog-single-post-no-sidebar', 1000, 340, true );


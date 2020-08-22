<?php
/**
 * aaurora_ functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package aaurora_
 */

if ( ! defined( 'AAURORA_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'AAURORA_VERSION', '1.0.0' );
}

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'aaurora' ),
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
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function aaurora_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'aaurora' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'aaurora' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

}

add_action( 'widgets_init', 'aaurora_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function aaurora_scripts() {
	wp_enqueue_style( 'aaurora-style', get_stylesheet_uri(), array(), AAURORA_VERSION );
	wp_style_add_data( 'aaurora-style', 'rtl', 'replace' );

	wp_enqueue_script( 'aaurora-navigation', get_template_directory_uri() . '/js/navigation.js', array(), AAURORA_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'aaurora_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

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


/* Gutenberg Support */

function mytheme_setup_theme_supported_features() {

	// Theme supports wide images, galleries and videos.
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
}

add_action( 'after_setup_theme', 'mytheme_setup_theme_supported_features' );

/* Featured Image support */
/**
 * Theme images sizes
 */
add_image_size( 'aaurora-blog-single-post-navigation-featured-image', 80, 80, true ); // This is used for Blog Layout 1
add_image_size( 'aaurora-blog-1-featured-image', 530, 420, true ); // This is used for Blog Layout 1
add_image_size( 'aaurora-blog-2-featured-image', 125, 125, true ); // This is used for Blog Layout 2
add_image_size( 'aaurora-blog-single-post-sidebar', 400, 500, true );
add_image_size( 'aaurora-blog-single-post-no-sidebar', 1000, 570, true );

/*  Kirki plugin related changed */

// todo See if below options related to kirki needs to be enabled or not

/*
 * Use Kirki Embedded
 */
include_once( dirname( __FILE__ ) . '/inc/plugin/kirki/kirki.php' );

function mytheme_kirki_configuration() {
	return array( 'url_path'     => get_stylesheet_directory_uri() . '/inc/plugin/kirki/' );
}
add_filter( 'kirki/config', 'mytheme_kirki_configuration' );

/*
= Use External stylesheet for Kirki generated styles =*/
/*

// if (!is_customize_preview() ) {
// add_filter( 'kirki_output_inline_styles', '__return_false' );
// }

/*
 * It led Kirki use CDN font instead of hosting the local fonts.
 */
// add_filter( 'kirki_use_local_fonts', '__return_false' );

/*
 * Kirki Customization
 */
require get_template_directory() . '/inc/kirki_configuration.php';


/********PAGINATION  VIVEKA CHANGE THIS*/
function numeric_posts_nav() {

	if ( is_singular() ) {
		return;
	}

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if ( $wp_query->max_num_pages <= 1 ) {
		return;
	}

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/** Add current page to the array */
	if ( $paged >= 1 ) {
		$links[] = $paged;
	}

	/** Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="navigation"><ul>' . "\n";

	/** Previous Post Link */
	if ( get_previous_posts_link() ) {
		printf( '<li>%s</li>' . "\n", get_previous_posts_link( '&lt; Previous' ) );
	}

	/** Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) ) {
			echo '<li>…</li>';
		}
	}

	/** Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/** Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) ) {
			echo '<li>…</li>' . "\n";
		}

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/** Next Post Link */
	if ( get_next_posts_link() ) {
		printf( '<li>%s</li>' . "\n", get_next_posts_link( 'Next >' ) );
	}

	echo '</ul></div>' . "\n";

}

/*
 * Add Google Fonts
 */

function google_fonts() {
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Inter&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'google_fonts' );

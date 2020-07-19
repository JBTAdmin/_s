<?php
/**
 * _s functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( '_s_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _s_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change '_s' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( '_s', get_template_directory() . '/languages' );

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
				'menu-1' => esc_html__( 'Primary', '_s' ),
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
				'_s_custom_background_args',
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
add_action( 'after_setup_theme', '_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 640 );
}
add_action( 'after_setup_theme', '_s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', '_s' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', '_s' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	/*
	 * Footer Sidebar Registered
	 */


    register_sidebar(
        [
            'name' => esc_html__('Footer Column 1', 'writer'),
            'id' => 'footer-column-1',
            'description' => esc_html__('Add widgets here.', 'writer'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title"><span>',
            'after_title' => '</span></h3>',
        ]
    );

    register_sidebar(
        [
            'name' => esc_html__('Footer Column 2', 'writer'),
            'id' => 'footer-column-2',
            'description' => esc_html__('Add widgets here.', 'writer'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title"><span>',
            'after_title' => '</span></h3>',
        ]
    );

    register_sidebar(
        [
            'name' => esc_html__('Footer Column 3', 'writer'),
            'id' => 'footer-column-3',
            'description' => esc_html__('Add widgets here.', 'writer'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title"><span>',
            'after_title' => '</span></h3>',
        ]
    );

    register_sidebar(
        [
            'name' => esc_html__('Footer Column 4', 'writer'),
            'id' => 'footer-column-4',
            'description' => esc_html__('Add widgets here.', 'writer'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h3 class="widget-title"><span>',
            'after_title' => '</span></h3>',
        ]
    );
}
add_action( 'widgets_init', '_s_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function _s_scripts() {
	wp_enqueue_style( '_s-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( '_s-style', 'rtl', 'replace' );

	wp_enqueue_script( '_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', '_s_scripts' );

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



/* ============================================================================================================================================= */

if (!function_exists('_s_theme_comments')) :

    /*
    * Template for comments and pingbacks.
    * Used as a callback by wp_list_comments() for displaying the comments.
    */

    function _s_theme_comments($comment, $args, $depth)
    {
        $GLOBALS['comment'] = $comment;
        switch ($comment->comment_type) :

            case 'pingback' :

            case 'trackback' :

                // Display trackbacks differently than normal comments.
                ?>
                <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
                <p>
                    <?php
                    _e('Pingback:', 'read'); ?><?php comment_author_link(); ?><?php edit_comment_link(__('(Edit)', 'read'), '<span class="edit-link">', '</span>');
                    ?>
                </p>
                <?php
                break;

            default :

                // Proceed with normal comments.
                global $post;
                ?>

            <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                <article id="comment-<?php comment_ID(); ?>" class="comment">

                    <?php
                    if ('0' == $comment->comment_approved) :
                        ?>
                        <p class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.', 'read'); ?></p>
                    <?php
                    endif;
                    ?>

                    <section class="comment-content1 comment">
                        <?php
                        comment_text();
                        ?>
                    </section>

                    <header class="comment-meta comment-author vcard">
                        <?php
                        //echo get_avatar( $comment, 150 );

                        printf('<cite class="fn">%1$s %2$s</cite>',
                            get_comment_author_link(),
                            // If current post author is also comment author, make it known visually.
                            ($comment->user_id === $post->post_author) ? '<span></span>' : "");


                        printf('<a title="%3$s" href="%1$s"><i class="pw-icon-calendar-1"></i><time datetime="%2$s">%3$s</time></a>',
                            esc_url(get_comment_link($comment->comment_ID)),
                            get_comment_time('c'),
                            /* translators: 1: date, 2: time */
                            sprintf(__('%1$s at %2$s', 'read'), get_comment_date(), get_comment_time()));
                        ?>

                        <?php
                        edit_comment_link(__('Edit', 'read'));
                        ?>
                        <?php
                        comment_reply_link(array_merge($args, array('reply_text' => __('Reply', 'read'), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'])));
                        ?>

                    </header>

                </article>
                <?php
                break;

        endswitch;
    }

endif;


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
add_image_size( '_s-blog-small', 1140, 694, true);
add_image_size( '_s-blog-large-grid', 270, 200, true);
add_image_size( '_s-blog-thumb-widget', 220, 180, true);
add_image_size( '_s-blog-thumb-masonry', 360, 0, false);
<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package aaurora
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function aaurora_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'aaurora_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function aaurora_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'aaurora_pingback_header' );


/**
 * Outputs the Post in specific templates.
 *
 * @since 1.0.0
 */
function aaurora_content() {
	
	if ( have_posts() ) {
		?>
        <header class="page-header">
			<?php
			if ( is_archive() ) {
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
			} else if ( is_search() ) {
				?>
                <h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'aaurora' ), '<span>' . get_search_query() . '</span>' );
					?>
                </h1>
				<?php
			} else {
				?>
                <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				<?php
			}
			?>
        </header><!-- .page-header -->
        <div class="article-container">
			<?php
			while ( have_posts() ) :
				the_post();
				aaurora_get_content_layout();
			endwhile;
			?>
        </div>
		<?php
		post_nav();
	} else {
		get_template_part( 'template-parts/content/content', 'none' );
	}
}
add_action( 'aaurora_entry_content', 'aaurora_content' );
// add_action( 'aaurora_content_archive', 'aaurora_content' );
// add_action( 'aaurora_content_search', 'aaurora_content' );


/**
 * Display Sidebar.
 *
 * @since 1.0.0
 */
function aaurora_sidebar_left_output() {
	$option = array( 'sidebar-both', 'sidebar-left' );
	if ( is_active_sidebar( 'aaurora-sidebar-left' ) && in_array( get_theme_mod( 'sidebar_layout_setting', 'content-only' ), $option, true ) ) {
		return get_sidebar( 'left' );
	}
}
add_action( 'aaurora_left_sidebar', 'aaurora_sidebar_left_output' );

function aaurora_sidebar_right_output() {
	$option = array( 'sidebar-both', 'sidebar-right' );
	if ( is_active_sidebar( 'aaurora-sidebar-right' ) && in_array( get_theme_mod( 'sidebar_layout_setting', 'content-only' ), $option, true ) ) {
		return get_sidebar();
	}
}
add_action( 'aaurora_right_sidebar', 'aaurora_sidebar_right_output' );

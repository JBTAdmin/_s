<?php
/**
 * Functions which enhance the theme by hooking into WordPress.
 *
 * @package gautam
 * @author ipower
 * @copyright   Copyright (c) 2021, Gautam
 * @since       1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'wp_head', 'gautam_pingback_header' );
add_filter( 'body_class', 'gautam_body_classes' );
add_action( 'gautam_header', 'gautam_header_branding_layout' );
add_action( 'gautam_header_after', 'gautam_header_main_menu_layout' );
add_action( 'gautam_singular_content', 'gautam_singular_content_layout' );
add_action( 'gautam_content_page', 'gautam_single_page_layout' );
add_action( 'gautam_content_post', 'gautam_single_post_layout' );
add_action( 'gautam_entry_content_before', 'gautam_post_content_before' );
add_action( 'gautam_entry_content', 'gautam_content' );
add_action( 'gautam_entry_content_after', 'gautam_post_content_after' );
add_action( 'gautam_site_container_before', 'gautam_post_container_before' );
add_action( 'gautam_main_content_before', 'gautam_sidebar_left_output' );
add_action( 'gautam_main_content_after', 'gautam_sidebar_right_output' );
add_action( 'gautam_footer', 'gautam_footer_section' );
add_action( 'gautam_footer_content', 'gautam_footer_main_layout' );
add_action( 'gautam_footer_after', 'gautam_footer_share_layout' );
add_action( 'gautam_footer_after', 'gautam_footer_search_layout' );
add_action( 'gautam_footer_after', 'gautam_footer_go_to_top_layout' );
add_action( 'gautam_footer_after', 'gautam_social_media' );

if ( ! function_exists( 'gautam_pingback_header' ) ) {
	/**
	 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
	 *
	 * @since 1.0.0
	 */
	function gautam_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
}

if ( ! function_exists( 'gautam_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 * @since 1.0.0
	 */
	function gautam_body_classes( $classes ) {
		global $post;
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		if ( true === get_theme_mod( 'fixed-header', false ) ) {
			$classes[] = 'header-fixed';
		}

		$template_parts = get_theme_mod( 'entry_header_sequence', array( 'category', 'heading', 'metadata', 'thumbnail' ) );

		if ( isset( $post->ID ) && get_the_post_thumbnail( $post->ID ) && in_array( 'thumbnail', $template_parts, true ) && gautam_jetpack_featured_image_display() ) {
			$classes[] = 'has-featured-image';
		}

		$classes[] = get_theme_mod( 'single_post_layout', 'in-header' );

		$classes[] = get_theme_mod( 'header_layout_setting' );

		return $classes;
	}
}

if ( ! function_exists( 'gautam_header_branding_layout' ) ) {
	/**
	 * Gautam Header Branding Layout.
	 *
	 * @since 1.0.0
	 */
	function gautam_header_branding_layout() {
		// Return if no Header Branding Bar.
		if ( true !== get_theme_mod( 'gautam_site_branding', true ) ) {
			return;
		}

		$numbering_class = '';
		if ( true === get_theme_mod( 'main_menu_numbering', true ) ) {
			$numbering_class = 'numbered';
		}

		$container_alignment_class = 'header-menu-container ' . $numbering_class . ' aligned-menu-' . get_theme_mod( 'main_menu_align', 'center' );
		?>
		<div class="header-menu-bar">
			<!--			<div class="wrap">-->
			<div class="header-container">
				<?php
				gautam_site_branding();
				?>
				<div class="main-header">
					<nav id="site-navigation" class="main-navigation ">
						<?php
						gautam_hamburger_menu();
						?>
						<div class="mobile-menu-container">
							<?php

							wp_nav_menu(
								array(
									'theme_location'  => 'menu-1',
									'menu_id'         => 'primary-menu',
									'menu_class'      => 'header-menu',
									'container_class' => $container_alignment_class,
									'fallback_cb'     => false,
								)
							);
							?>
							<a href="#" class="mobile-cls-btn">
								<i class="fa fa-times fa-lg" aria-hidden="true"></i>
							</a>
						</div>
						<?php
						gautam_header_search();
						?>
					</nav>
				</div>
				<!--				</div>-->
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'gautam_header_main_menu_layout' ) ) {
	/**
	 * Header Main Layout.
	 *
	 * @since 1.0.0
	 */
	function gautam_header_main_menu_layout() {

		if ( true !== get_theme_mod( 'gautam_header_main_menu_layout', true ) ) {
			return;
		}
		?>
		<?php
	}
}

if ( ! function_exists( 'gautam_singular_content_layout' ) ) {
	/**
	 * Outputs the theme single content.
	 *
	 * @since 1.0.0
	 */
	function gautam_singular_content_layout() {

		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();

				if ( is_singular( 'post' ) ) {
					do_action( 'gautam_content_post' );
				} else {
					do_action( 'gautam_content_page' );
				}
			}
		} else {
			get_template_part( 'template-parts/content', 'none' );
		}
	}
}

if ( ! function_exists( 'gautam_single_page_layout' ) ) {
	/**
	 * Outputs the theme single page.
	 *
	 * @since 1.0.0
	 */
	function gautam_single_page_layout() {
		get_template_part( 'template-parts/content-page' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	}
}

if ( ! function_exists( 'gautam_single_post_layout' ) ) {
	/**
	 * Outputs the theme single post.
	 *
	 * @since 1.0.0
	 */
	function gautam_single_post_layout() {
		?>

		<?php gautam_content_before(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-article' ); ?>>

			<?php get_template_part( 'template-parts/single/layout' ); ?>

		</article><!-- #post-<?php the_ID(); ?> -->

		<?php
		gautam_content_after();

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	}
}

/**
 * It will handle thumbnail In content.
 */
if ( ! function_exists( 'gautam_post_content_before' ) ) {
	/**
	 * Output Metadata of Posts.
	 *
	 * @since 1.0.0
	 */
	function gautam_post_content_before() {

		if ( in_array(
			get_theme_mod( 'single_post_layout', 'in-header' ),
			array(
				'in-content',
			),
			true
		) ) {
			get_template_part( 'template-parts/single/post-header/in-content' );
		}
	}
}

if ( ! function_exists( 'gautam_content' ) ) {
	/**
	 * Outputs the Post in specific templates.
	 *
	 * @since 1.0.0
	 */
	function gautam_content() {

		if ( have_posts() ) {
			$container_class = ' blog-' . get_theme_mod( 'blog_layout_setting', '2' );
			?>
			<header class="page-header">
				<?php
				if ( is_archive() ) {
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				} elseif ( is_search() ) {
					?>
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'gautam' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
					<?php
				}
				?>
			</header><!-- .page-header -->
			<div class="article-container <?php echo esc_attr( $container_class ); ?>">
				<?php
				while ( have_posts() ) :
					the_post();
					gautam_get_content_layout();
				endwhile;
				?>
			</div>
			<?php
			gautam_post_nav();
		} else {
			get_template_part( 'template-parts/content', 'none' );
		}
	}
}

if ( ! function_exists( 'gautam_post_content_after' ) ) {
	/**
	 * Outputs Footer sections.
	 *
	 * @since 1.0.0
	 */
	function gautam_post_content_after() {
		$template_parts = get_theme_mod( 'entry_footer_sequence', array( 'tag', 'author', 'post-navigation' ) );

		foreach ( $template_parts as $template_part ) {
			get_template_part( 'template-parts/single/' . $template_part );
		}
	}
}

/**
 * It will handle thumbnail In Header.
 */
if ( ! function_exists( 'gautam_post_container_before' ) ) {

	/**
	 * Display Post Header as per selection in customizer.
	 *
	 * @since 1.0.0
	 */
	function gautam_post_container_before() {

		if ( in_array(
			get_theme_mod( 'single_post_layout', 'in-header' ),
			array(
				'in-header',
			),
			true
		) ) {
			get_template_part( 'template-parts/single/post-header/in-header' );
		}
	}
}

if ( ! function_exists( 'gautam_sidebar_left_output' ) ) {
	/**
	 * Display Sidebar.
	 *
	 * @since 1.0.0
	 */
	function gautam_sidebar_left_output() {
		$option = array( 'sidebar-both', 'sidebar-left' );
		if ( is_active_sidebar( 'gautam-sidebar-left' ) && in_array( get_theme_mod( 'sidebar_layout_setting', 'content-only' ), $option, true ) ) {
			return get_sidebar( 'left' );
		}
	}
}

if ( ! function_exists( 'gautam_sidebar_right_output' ) ) {
	/**
	 * Sidebar related checks.
	 *
	 * @return false|void
	 * @since 1.0.0
	 */
	function gautam_sidebar_right_output() {
		$option = array( 'sidebar-both', 'sidebar-right' );
		if ( is_active_sidebar( 'gautam-sidebar-right' ) && in_array( get_theme_mod( 'sidebar_layout_setting', 'content-only' ), $option, true ) ) {
			return get_sidebar();
		}
	}
}

if ( ! function_exists( 'gautam_footer_section' ) ) {
	/**
	 * Displays Footer Section.
	 *
	 * @since 1.0.0
	 */
	function gautam_footer_section() {
		?>
		<footer class="site-footer">

			<?php gautam_footer_content_top(); ?>

			<?php gautam_footer_content(); ?>

			<?php gautam_footer_content_bottom(); ?>

		</footer>
		<?php
	}
}

if ( ! function_exists( 'gautam_footer_main_layout' ) ) {
	/**
	 * Footer Main Layout Hooked in Footer Content.
	 *
	 * @since 1.0.0
	 */
	function gautam_footer_main_layout() {
		get_template_part( 'template-parts/footers/footer', get_theme_mod( 'footer_layout_setting', '2' ), get_post_type() );
	}
}

if ( ! function_exists( 'gautam_footer_share_layout' ) ) {
	/**
	 * Add Social Share button in footer.
	 *
	 * @since 1.0.0
	 */
	function gautam_footer_share_layout() {
		if ( get_theme_mod( 'general_social_share', 1 ) ) {
			$link_url   = get_the_permalink( get_the_ID() );
			$link_title = get_the_title( get_the_ID() );
			?>
			<div class="gautam-share fixed visible" tabindex="0">
				<a href="#" tabindex="-1">
					<i class="fa fa-share fa-lg" aria-hidden="true"></i>
				</a>
				<div class="gautam-share-inner">
					<a href="<?php echo esc_url( 'https://www.facebook.com/sharer/sharer.php?u=' . get_permalink( get_the_ID() ) ); ?>"
						target="_blank"  rel="nofollow">
						<i class="fa fa-facebook" aria-hidden="true"></i>
					</a>

					<a href="<?php echo esc_url( 'http://twitter.com/share?text=' . $link_title . '&url=' . $link_url ); ?>"
						target="_blank"  rel="nofollow">
						<i class="fa fa-twitter" aria-hidden="true"></i>
					</a>

					<a href="<?php echo esc_url( 'http://www.linkedin.com/shareArticle?mini=true&title=' . $link_title . '&url=' . $link_url ); ?>"
						target="_blank"  rel="nofollow">
						<i class="fa fa-linkedin" aria-hidden="true"></i>
					</a>
				</div>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'gautam_footer_search_layout' ) ) {
	/**
	 * Displays Search button in footer.
	 *
	 * @since 1.0.0
	 */
	function gautam_footer_search_layout() {
		if ( 'fixed' === get_theme_mod( 'general_search_visibility', 'fixed' ) ) {
			?>
			<a class="gautam-search footer-search" href="#">
				<i class="fa fa-search fa-lg"></i>
				<span class="screen-reader-text">Search</span>
			</a>
			<?php
			gautam_footer_popup_search_modal_layout();
		}
	}
}

if ( ! function_exists( 'gautam_footer_go_to_top_layout' ) ) {
	/**
	 * Displays Go to top button in footer.
	 *
	 * @since 1.0.0
	 */
	function gautam_footer_go_to_top_layout() {
		if ( get_theme_mod( 'general_scroll_to_top', 1 ) ) {
			?>
			<a class="top-link" href="#" id="js-top" on="tap:masthead.scrollTo" role="button">
				<i class="fa fa-long-arrow-up fa-lg" aria-hidden="true"></i>
				<span class="screen-reader-text">Back to top</span>
			</a>
			<?php
		}
	}
}

if ( ! function_exists( 'gautam_social_media' ) ) {
	/**
	 * Displays Social Media Button.
	 *
	 * @param string $social_class Class that needs to be applied.
	 *
	 * @since 1.0.0
	 */
	function gautam_social_media( $social_class = 'gautam_social_follow' ) {
		if ( 'top-bar-social' === $social_class && get_theme_mod( 'top_bar_social_media_button', true ) !== true ) {
			return;
		}

		if ( get_theme_mod( 'side_social_media_button', true ) !== true ) {
			return;
		}

		if ( 'top-bar-social' !== $social_class ) {
			$text_only = get_theme_mod( 'side_social_media_button_text', true );

			if ( get_theme_mod( 'side_social_media_button_color', false ) === false ) {
				$social_class .= ' no_social_color';
			}

			$social_class .= ' gautam_social_follow';
		} else {
			$text_only = false;
		}
		?>

		<div class="<?php echo esc_attr( $social_class ); ?>">
			<ul class="gautam-social-holder">
				<?php
				if ( get_theme_mod( 'social_media_fb_url', '' ) !== '' ) :
					?>
					<li>
						<a class="social-link facebook-social-icon"
							href="<?php echo esc_url( get_theme_mod( 'social_media_fb_url' ) ); ?>" target="_blank">
							<?php
							if ( $text_only ) {
								esc_html_e( ' facebook', 'gautam' );
							} else {
								?>
								<i class="fa fa-facebook fa-lg" aria-hidden="true"></i>
								<?php
							}
							?>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'social_media_tw_url', '' ) !== '' ) : ?>
					<li>
						<a class="social-link twitter-social-icon"
							href="<?php echo esc_url( get_theme_mod( 'social_media_tw_url' ) ); ?>" target="_blank">
							<?php
							if ( $text_only ) {
								esc_html_e( ' twitter', 'gautam' );
							} else {
								?>
								<i class="fa fa-twitter fa-lg" aria-hidden="true"></i>
								<?php
							}
							?>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'social_media_in_url', '' ) !== '' ) : ?>
					<li>
						<a class="social-link instagram-social-icon"
							href="<?php echo esc_url( get_theme_mod( 'social_media_in_url' ) ); ?>" target="_blank">
							<?php
							if ( $text_only ) {
								esc_html_e( ' instagram', 'gautam' );
							} else {
								?>
								<i class="fa fa-instagram fa-lg" aria-hidden="true"></i>
								<?php
							}
							?>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'social_media_ln_url', '' ) !== '' ) : ?>
					<li>
						<a class="social-link linkedin-social-icon"
							href="<?php echo esc_url( get_theme_mod( 'social_media_ln_url' ) ); ?>" target="_blank">
							<?php
							if ( $text_only ) {
								esc_html_e( ' linkedin', 'gautam' );
							} else {
								?>
								<i class="fa fa-linkedin fa-lg" aria-hidden="true"></i>
								<?php
							}
							?>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'social_media_yt_url', '' ) !== '' ) : ?>
					<li>
						<a class="social-link youtube-social-icon"
							href="<?php echo esc_url( get_theme_mod( 'social_media_yt_url' ) ); ?>" target="_blank">
							<?php
							if ( $text_only ) {
								esc_html_e( ' youtube', 'gautam' );
							} else {
								?>
								<i class="fa fa-youtube fa-lg" aria-hidden="true"></i>
								<?php
							}
							?>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'social_media_gh_url', '' ) !== '' ) : ?>
					<li>
						<a class="social-link github-social-icon"
							href="<?php echo esc_url( get_theme_mod( 'social_media_gh_url' ) ); ?>" target="_blank">
							<?php
							if ( $text_only ) {
								esc_html_e( ' github', 'gautam' );
							} else {
								?>
								<i class="fa fa-github fa-lg" aria-hidden="true"></i>
								<?php
							}
							?>
						</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
		<?php
	}
}

/**
 * Displays Site Branding.
 *
 * @since 1.0.0
 */
function gautam_site_branding() {
	?>
	<div class="site-branding">
		<?php
		the_custom_logo();

		if ( ! get_theme_mod( 'custom_logo' ) ) :
			?>
			<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
										rel="home"><?php bloginfo( 'name' ); ?></a></div>
			<?php
			$gautam_description = get_bloginfo( 'description', 'display' );
			if ( $gautam_description || is_customize_preview() ) :
				?>
				<p class="site-description">
					<?php
					echo esc_html( $gautam_description ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped.
					?>
				</p>
				<?php
			endif;
		endif;
		?>
	</div>
	<?php
}

/**
 * Displays Search Button in Header.
 *
 * @since 1.0.0
 */
function gautam_header_search() {
	if ( 'header' === get_theme_mod( 'general_search_visibility', 'fixed' ) ) {
		?>
		<div class="gautam-search header-search" role="button" tabindex="0">
			<i class="fa fa-search fa-lg"></i>
			<span class="screen-reader-text">Search</span>
		</div>
		<?php
		gautam_footer_popup_search_modal_layout();
	}
}

/**
 * Displays Hamburger Menu.
 *
 * @since 1.0.0
 */
function gautam_hamburger_menu() {
	$sidebar_alt_class = '';
	if ( ! is_active_sidebar( 'gautam-sidebar-alt' ) ) {
		$sidebar_alt_class = 'menu_only';
	}
	?>
	<div class="hamburger-menu <?php echo esc_attr( $sidebar_alt_class ); ?>" on="tap:drawermenu.toggle"
		role="button" tabindex="0">
		<button class="toggle sidebar-open desktop-sidebar-toggle" data-toggle-target=".sidebar-modal"
				data-toggle-body-class="showing-sidebar-modal" aria-expanded="false" tabindex="-1">
								<span class="toggle-inner">
									<i class="fa fa-bars fa-lg" aria-hidden="true"></i>
								</span>
		</button>
	</div>
	<?php
}

/**
 * Displays Search Modal.
 *
 * @since 1.0.0
 */
function gautam_footer_popup_search_modal_layout() {
	?>
	<div class="popup_search_modal">
		<a href="#" class="popup_modal_close_button">
			<i class="fa fa-times fa-lg" aria-hidden="true"></i>
		</a>
		<div class="search_holder">
			<form role="search" class="search search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>"
					method="GET">
                    <label> <span class="screen-reader-text">Search for</span>
                        <input autocomplete="off" type="text" id="search-field" class="search-field" name="s"
                                placeholder="<?php esc_attr_e( 'Search..', 'gautam' ); ?>" value="" autofocus>
                        <button type="submit" class="search search-submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </label>
			</form>
		</div>
	</div>
	<?php
}

/**
 * Use Specific Article Layout.
 *
 * @since 1.0.0
 */
function gautam_get_content_layout() {

	if ( is_home() || is_archive() || is_search() ) {
		get_template_part( 'template-parts/blog/blog', get_theme_mod( 'blog_layout_setting', '2' ), get_post_type() );
	} else {
		get_template_part( 'template-parts/single/single', 'layout', get_post_type() );
	}
}

<?php
/**
 * Functions which enhance the theme by hooking into WordPress.
 *
 * @package aaurora
 * @author ipower
 * @copyright   Copyright (c) 2021, Aaurora
 * @since       1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'wp_head', 'aaurora_pingback_header' );
add_action( 'aaurora_header_before', 'aaurora_top_bar_layout' );
add_action( 'aaurora_header', 'aaurora_header_branding_layout' );
add_action( 'aaurora_header_after', 'aaurora_header_main_menu_layout' );
add_action( 'aaurora_singular_content', 'aaurora_singular_content_layout' );
add_action( 'aaurora_content_page', 'aaurora_single_page_layout' );
add_action( 'aaurora_content_post', 'aaurora_single_post_layout' );
add_action( 'aaurora_entry_content_before', 'aaurora_post_content_before' );
add_action( 'aaurora_entry_content', 'aaurora_content' );
add_action( 'aaurora_entry_content_after', 'aaurora_post_content_after' );
add_action( 'aaurora_site_container_before', 'aaurora_post_container_before' );
add_action( 'aaurora_main_content_before', 'aaurora_sidebar_left_output' );
add_action( 'aaurora_main_content_after', 'aaurora_sidebar_right_output' );
add_action( 'aaurora_footer_before', 'aaurora_footer_call_to_action' );
add_action( 'aaurora_footer', 'aaurora_footer_section' );
add_action( 'aaurora_footer_content', 'aaurora_footer_main_layout' );
add_action( 'aaurora_footer_after', 'aaurora_footer_share_layout' );
add_action( 'aaurora_footer_after', 'aaurora_footer_popup_search_modal_layout' );
add_action( 'aaurora_footer_after', 'aaurora_footer_go_to_top_layout' );
add_action( 'aaurora_footer_after', 'aaurora_footer_search_layout' );
add_action( 'aaurora_footer_after', 'aaurora_social_media' );
add_filter( 'body_class', 'aaurora_body_classes' );


if ( ! function_exists( 'aaurora_singular_content_layout' ) ) {
	/**
	 * Outputs the theme single content.
	 *
	 * @since 1.0.0
	 */
	function aaurora_singular_content_layout() {

		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();

				if ( is_singular( 'post' ) ) {
					do_action( 'aaurora_content_post' );
				} else {
					do_action( 'aaurora_content_page' );
				}
			}
		} else {
			get_template_part( 'template-parts/content', 'none' );
		}
	}
}

if ( ! function_exists( 'aaurora_single_page_layout' ) ) {
	/**
	 * Outputs the theme single page.
	 *
	 * @since 1.0.0
	 */
	function aaurora_single_page_layout() {
		get_template_part( 'template-parts/content-page' );

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	}
}

if ( ! function_exists( 'aaurora_single_post_layout' ) ) {
	/**
	 * Outputs the theme single post.
	 *
	 * @since 1.0.0
	 */
	function aaurora_single_post_layout() {
		?>

		<?php aaurora_content_before(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-article' ); ?>>

			<?php get_template_part( 'template-parts/single/layout' ); ?>

		</article><!-- #post-<?php the_ID(); ?> -->

		<?php
		aaurora_content_after();

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	}
}

/**
 * It will handle thumbnail In content.
 */
if ( ! function_exists( 'aaurora_post_content_before' ) ) {
	/**
	 * Output Metadata of Posts.
	 *
	 * @since 1.0.0
	 */
	function aaurora_post_content_before() {

		if ( in_array( get_theme_mod( 'blog_post_header_location', 'aaurora_entry_content_before' ), array( 'aaurora-single-post', 'layout-2' ), true ) ) {
				get_template_part( 'template-parts/single/post-header/in-content' );
		}
	}
}

/**
 * It will handle thumbnail In Header.
 */
if ( ! function_exists( 'aaurora_post_container_before' ) ) {

	/**
	 * Display Post Header as per selection in customizer.
	 *
	 * @since 1.0.0
	 */
	function aaurora_post_container_before() {

		if ( in_array( get_theme_mod( 'blog_post_header_location', 'aaurora_entry_content_before' ), array( 'column-2-title-image', 'column-2-title-image-compact', 'column-2-title-image-column' ), true ) ) {
			get_template_part( 'template-parts/single/post-header/in-header' );
		}
	}
}

if ( ! function_exists( 'aaurora_post_content_after' ) ) {
	/**
	 * Outputs Footer sections.
	 *
	 * @since 1.0.0
	 */
	function aaurora_post_content_after() {
		$template_parts = get_theme_mod( 'entry_footer_sequence', array( 'tag', 'author', 'post-navigation' ) );

		foreach ( $template_parts as $template_part ) {
			get_template_part( 'template-parts/single/' . $template_part );
		}
	}
}

if ( ! function_exists( 'aaurora_body_classes' ) ) {
	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param array $classes Classes for the body element.
	 *
	 * @return array
	 * @since 1.0.0
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
}

if ( ! function_exists( 'aaurora_pingback_header' ) ) {
	/**
	 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
	 *
	 * @since 1.0.0
	 */
	function aaurora_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
}

if ( ! function_exists( 'aaurora_content' ) ) {
	/**
	 * Outputs the Post in specific templates.
	 *
	 * @since 1.0.0
	 */
	function aaurora_content() {

		if ( have_posts() ) {
			$container_class = ' blog-' . get_theme_mod( 'blog_layout_setting', '4' );
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
			<div class="article-container <?php echo esc_attr( $container_class ); ?>">
				<?php
				while ( have_posts() ) :
					the_post();
					aaurora_get_content_layout();
				endwhile;
				?>
			</div>
			<?php
			aaurora_post_nav();
		} else {
			get_template_part( 'template-parts/content', 'none' );
		}
	}
}

if ( ! function_exists( 'aaurora_sidebar_left_output' ) ) {
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
}

if ( ! function_exists( 'aaurora_sidebar_right_output' ) ) {
	/**
	 * Sidebar related checks.
	 *
	 * @return false|void
	 * @since 1.0.0
	 */
	function aaurora_sidebar_right_output() {
		$option = array( 'sidebar-both', 'sidebar-right' );
		if ( is_active_sidebar( 'aaurora-sidebar-right' ) && in_array( get_theme_mod( 'sidebar_layout_setting', 'content-only' ), $option, true ) ) {
			return get_sidebar();
		}
	}
}

if ( ! function_exists( 'aaurora_top_bar_layout' ) ) {
	/**
	 * Top Bar Layout.
	 *
	 * @since 1.0.0
	 */
	function aaurora_top_bar_layout() {
		// Return if no top bar.
		if ( 'disabled' === get_theme_mod( 'top_bar_layout_setting', 'disabled' ) ) {
			return;
		}
		?>
		<div id="top-bar" class="top-menu aaurora-top-bar <?php get_theme_mod( 'top_bar_layout_setting' ); ?>">
			<div class="wrap">
				<div class="header-top-bar">
					<nav id="top-bar-navigation" class="secondary-navigation ">
						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'top-bar-menu',
								'menu_id'         => 'top-bar-menu',
								'menu_class'      => 'header-menu',
								'container_class' => 'header-menu-container',
								'fallback_cb'     => false,
								'depth'           => 1,
							)
						);
						?>
					</nav><!-- #top-bar-navigation -->
					<?php
					// Social Icons.
					aaurora_social_media( 'top-bar-social' );
					?>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'aaurora_header_branding_layout' ) ) {
	/**
	 * Aaurora Header Branding Layout.
	 *
	 * @since 1.0.0
	 */
	function aaurora_header_branding_layout() {
		// Return if no Header Branding Bar.
		if ( true !== get_theme_mod( 'aaurora_site_branding', true ) ) {
			return;
		}

		$numbering_class = '';
		if ( true === get_theme_mod( 'main_menu_numbering' ) ) {
			$numbering_class = 'numbered';
		}

		$container_alignment_class = 'header-menu-container ' . $numbering_class . ' aligned-menu-' . get_theme_mod( 'main_menu_align', 'right' );
		?>
		<div class="header-menu-bar">
			<div class="wrap">
				<div class="header-container">
					<?php
					aaurora_site_branding( 'left' );
					?>
					<div class="main-header">
						<nav id="site-navigation" class="main-navigation ">
							<div class="menu-btn">
								<div class="menu-btn__burger"></div>
							</div>
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
							aaurora_header_search();
							aaurora_hamburger_menu();
							?>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'aaurora_header_main_menu_layout' ) ) {
	/**
	 * Header Main Layout.
	 *
	 * @since 1.0.0
	 */
	function aaurora_header_main_menu_layout() {

		if ( true !== get_theme_mod( 'aaurora_header_main_menu_layout', true ) ) {
			return;
		}
		?>
		<?php
	}
}

if ( ! function_exists( 'aaurora_site_branding' ) ) {
	/**
	 * Displays Site Branding.
	 *
	 * @param string $location Needs to remove this todo.
	 * @since 1.0.0
	 */
	function aaurora_site_branding( $location ) {
		?>
		<div class="site-branding">
			<?php
			the_custom_logo();

			if ( ! get_theme_mod( 'custom_logo' ) ) :
				?>
				<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
											rel="home"><?php bloginfo( 'name' ); ?></a></div>
				<?php
				$aaurora_description = get_bloginfo( 'description', 'display' );
				if ( $aaurora_description || is_customize_preview() ) :
					?>
					<p class="site-description">
						<?php
						echo esc_html( $aaurora_description ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped.
						?>
					</p>
					<?php
				endif;
			endif;
			?>
		</div>
		<?php
	}
}

if ( ! function_exists( 'aaurora_header_search' ) ) {
	/**
	 * Displays Search Button in Header.
	 *
	 * @since 1.0.0
	 */
	function aaurora_header_search() {
		if ( 'header' === get_theme_mod( 'general_search_visibility', 'fixed' ) ) {
			?>
			<div class="aaurora-header-search" role="button" tabindex="1">
				<?php aaurora_load_inline_svg( 'search.svg' ); ?>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'aaurora_hamburger_menu' ) ) {
	/**
	 * Displays Hamburger Menu.
	 *
	 * @since 1.0.0
	 */
	function aaurora_hamburger_menu() {
		$sidebar_alt_class = '';
		if ( ! is_active_sidebar( 'aaurora-sidebar-alt' ) ) {
			$sidebar_alt_class = 'menu_only';
		}
		?>
		<div class="hamburger-menu <?php echo esc_attr( $sidebar_alt_class ); ?>" on="tap:drawermenu.toggle"
			role="button" tabindex="1">
			<div class="toggle sidebar-open desktop-sidebar-toggle" data-toggle-target=".sidebar-modal"
				data-toggle-body-class="showing-sidebar-modal" aria-expanded="false">
									<span class="toggle-inner">
										<?php aaurora_load_inline_svg( 'hamburger.svg' ); ?>
									</span>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'aaurora_footer_call_to_action' ) ) {
	/**
	 * Displays call to Action.
	 *
	 * @since 1.0.0
	 */
	function aaurora_footer_call_to_action() {
		get_template_part( 'template-parts/footers/call-to-action', get_post_type() );
	}
}

if ( ! function_exists( 'aaurora_footer_section' ) ) {
	/**
	 * Displays Footer Section.
	 *
	 * @since 1.0.0
	 */
	function aaurora_footer_section() {
		?>
		<footer class="site-footer">

			<?php aaurora_footer_content_top(); ?>

			<?php aaurora_footer_content(); ?>

			<?php aaurora_footer_content_bottom(); ?>

		</footer>
		<?php
	}
}

if ( ! function_exists( 'aaurora_footer_main_layout' ) ) {
	/**
	 * Footer Main Layout Hooked in Footer Content.
	 *
	 * @since 1.0.0
	 */
	function aaurora_footer_main_layout() {
		get_template_part( 'template-parts/footers/footer', get_theme_mod( 'footer_layout_setting', '2' ), get_post_type() );
	}
}

if ( ! function_exists( 'aaurora_footer_share_layout' ) ) {
	/**
	 * Add Social Share button in footer.
	 *
	 * @since 1.0.0
	 */
	function aaurora_footer_share_layout() {
		if ( get_theme_mod( 'general_social_share', 1 ) ) {
			?>
			<div class="aaurora-share fixed visible">
				<a href="#">
					<?php aaurora_load_inline_svg( 'share.svg' ); ?>
				</a>
				<div class="aaurora-share-inner">
					<a href="https://www.facebook.com/sharer.php?u=<?php echo esc_attr( get_permalink( get_the_ID() ) ); ?>"
						target="blank" class="fb" rel="nofollow" data-social_name="facebook">
						<?php aaurora_load_inline_svg( 'facebook.svg' ); ?>
					</a>

					<a href="https://twitter.com/intent/tweet?text=<?php echo esc_attr( get_permalink( get_the_ID() ) ); ?>"
						target="blank" class="tw" rel="nofollow" data-social_name="twitter">
						<?php aaurora_load_inline_svg( 'twitter.svg' ); ?>
					</a>

					<a href="https://www.linkedin.com/cws/share?url=<?php echo esc_attr( get_permalink( get_the_ID() ) ); ?>"
						target="blank" class="ln" rel="nofollow" data-social_name="linkedin">
						<?php aaurora_load_inline_svg( 'linkedin.svg' ); ?>
					</a>
				</div>
			</div>
			<?php
		}
	}
}

if ( ! function_exists( 'aaurora_footer_popup_search_modal_layout' ) ) {
	/**
	 * Displays Search Modal.
	 *
	 * @since 1.0.0
	 */
	function aaurora_footer_popup_search_modal_layout() {
		?>
		<div class="popup_search_modal" tabindex="1">
			<div class="popup_modal_close_button">
				<?php aaurora_load_inline_svg( 'close.svg' ); ?>
			</div>
			<div class="search_holder">
				<!--        todo hard coding should be removed-->
				<form role="search" class="search search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>"
						method="GET" >
					<label> <span class="screen-reader-text">Search for</span>
						<input autocomplete="off" type="text" id="search-field" class="search-field" name="s"
								placeholder="Search..." value="" autofocus>
					</label>
				</form>
			</div>
		</div>
		<?php
	}
}

if ( ! function_exists( 'aaurora_footer_go_to_top_layout' ) ) {
	/**
	 * Displays Go to top button in footer.
	 *
	 * @since 1.0.0
	 */
	function aaurora_footer_go_to_top_layout() {
		if ( get_theme_mod( 'general_scroll_to_top', 1 ) ) {
			?>
			<a class="top-link" href="#" id="js-top" on="tap:masthead.scrollTo" role="button" tabindex="1">
				<?php aaurora_load_inline_svg( 'arrow-up.svg' ); ?>
				<span class="screen-reader-text">Back to top</span>
			</a>
			<?php
		}
	}
}

if ( ! function_exists( 'aaurora_footer_search_layout' ) ) {
	/**
	 * Displays Search button in footer.
	 *
	 * @since 1.0.0
	 */
	function aaurora_footer_search_layout() {
		if ( 'fixed' === get_theme_mod( 'general_search_visibility', 'fixed' ) ) {
			?>
			<a class="aaurora-search" href="#">
				<?php aaurora_load_inline_svg( 'search.svg' ); ?>
				<span class="screen-reader-text">Search</span>
			</a>

			<?php
		}
	}
}

if ( ! function_exists( 'aaurora_social_media' ) ) {
	/**
	 * Displays Social Media Button.
	 *
	 * @param string  $social_class Class that needs to be applied.
	 * @param boolean $text_only Social Button or Text should be displayed.
	 *
	 * @since 1.0.0
	 */
	function aaurora_social_media( $social_class = 'aaurora_social_follow', $text_only = true ) {
		if ( 'top-bar-social' === $social_class && get_theme_mod( 'top_bar_social_media_button', true ) !== true ) :
			return;
		endif;

		if ( get_theme_mod( 'side_social_media_button', true ) !== true ) {
			return;
		}

		$text_only = get_theme_mod( 'side_social_media_button_text', true );

		if ( get_theme_mod( 'side_social_media_button_color', false ) === false ) {
			$social_class .= ' no_social_color';
		}

		$social_class .= ' aaurora_social_follow';  // todo need to revisit this. passing parameter to Actions.
		?>

		<div class="<?php echo esc_attr( $social_class ); ?>">
			<ul class="aaurora-social-holder">
				<?php
				if ( get_theme_mod( 'social_media_fb_url', '' ) !== '' ) :
					?>
					<li>
						<a class="social-link facebook-social-icon"
							href="<?php echo esc_url( get_theme_mod( 'social_media_fb_url' ) ); ?>" target="_blank">
							<?php $text_only ? esc_html_e( ' facebook', 'aaurora' ) : aaurora_load_inline_svg( 'facebook.svg' ); ?>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'social_media_tw_url', '' ) !== '' ) : ?>
					<li>
						<a class="social-link twitter-social-icon"
							href="<?php echo esc_url( get_theme_mod( 'social_media_tw_url' ) ); ?>" target="_blank">
							<?php $text_only ? esc_html_e( ' twitter', 'aaurora' ) : aaurora_load_inline_svg( 'twitter.svg' ); ?>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'social_media_in_url', '' ) !== '' ) : ?>
					<li>
						<a class="social-link instagram-social-icon"
							href="<?php echo esc_url( get_theme_mod( 'social_media_in_url' ) ); ?>" target="_blank">
							<?php $text_only ? esc_html_e( ' instagram', 'aaurora' ) : aaurora_load_inline_svg( 'instagram.svg' ); ?>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'social_media_ln_url', '' ) !== '' ) : ?>
					<li>
						<a class="social-link linkedin-social-icon"
							href="<?php echo esc_url( get_theme_mod( 'social_media_ln_url' ) ); ?>" target="_blank">
							<?php $text_only ? esc_html_e( ' linkedin', 'aaurora' ) : aaurora_load_inline_svg( 'linkedin.svg' ); ?>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'social_media_yt_url', '' ) !== '' ) : ?>
					<li>
						<a class="social-link youtube-social-icon"
							href="<?php echo esc_url( get_theme_mod( 'social_media_yt_url' ) ); ?>" target="_blank">
							<?php $text_only ? esc_html_e( ' youtube', 'aaurora' ) : aaurora_load_inline_svg( 'youtube.svg' ); ?>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'social_media_gh_url', '' ) !== '' ) : ?>
					<li>
						<a class="social-link github-social-icon"
							href="<?php echo esc_url( get_theme_mod( 'social_media_gh_url' ) ); ?>" target="_blank">
							<?php $text_only ? esc_html_e( ' github', 'aaurora' ) : aaurora_load_inline_svg( 'github.svg' ); ?>
						</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
		<?php
	}
}

<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package aaurora
 */



/**
 * Outputs the theme single content.
 *
 * @since 1.0.0
 */
function aaurora_content_singular() {
	
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			
			if ( is_singular( 'post' ) ) {
				do_action( 'aaurora_content_single' );
			} else {
				do_action( 'aaurora_content_page' );
			}
		
		endwhile;
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif;
}
add_action( 'aaurora_content_singular', 'aaurora_content_singular' );

function aaurora_content_page_layout(){
	get_template_part( 'template-parts/content-page' );
}
add_action( 'aaurora_content_page', 'aaurora_content_page_layout' );


/**
 * Outputs the theme single content.
 *
 * @since 1.0.0
 */
function aaurora_content_single_layout() {
	?>
    <div class="article-container">
        <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-article' ); ?>>
            <div class="entry-header">
				<?php
				get_template_part( 'template-parts/single/category' );
				get_template_part( 'template-parts/single/heading' );
				get_template_part( 'template-parts/single/metadata' );
				?>
            </div><!-- .entry-header -->
			<?php
			get_template_part( 'template-parts/single/thumbnail' );
			?>
            <div class="entry-content">
				<?php
				the_content(
					sprintf(
						wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'aaurora' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
				echo 'page link before';
				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aaurora' ),
						'after'  => '</div>',
					)
				);
				echo 'page link after';
				?>
            </div><!-- .entry-content -->
        </article><!-- #post-<?php the_ID(); ?> -->
    </div>
	
	<?php
	
	get_template_part( 'template-parts/single/tag' );
	get_template_part( 'template-parts/single/author' );
	get_template_part( 'template-parts/single/post-navigation' );
	
	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) :
		comments_template();
	endif;
}

add_action( 'aaurora_content_single', 'aaurora_content_single_layout' );


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
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


function aaurora_entry_tag_layout() {

}

add_action( 'aaurora_entry_tag_before', 'aaurora_entry_tag_layout' );


/**
 * Header Related Action and Hooks.
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'aaurora_top_bar_layout' ) ) :

	/**
	 * Top Bar Layout.
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

	add_action( 'aaurora_header_before', 'aaurora_top_bar_layout' );
endif;

if ( ! function_exists( 'aaurora_header_branding_layout' ) ) :

	/**
	 * Aorora Branding Layout.
	 */
	function aaurora_header_branding_layout() {
		/**
		 * Return if no Header Branding Bar.
		 */
		if ( true != get_theme_mod( 'aaurora_site_branding', true ) ) {
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
				<div class="header-container <?php echo esc_attr( get_theme_mod( 'header_layout_setting' ) ); ?>">
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
							aaurora_hamburger_menu();
							?>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	add_action( 'aaurora_header', 'aaurora_header_branding_layout' );
endif;

if ( ! function_exists( 'aaurora_header_main_menu_layout' ) ) :

	/**
	 * Header Main Layout.
	 */
	function aaurora_header_main_menu_layout() {

		if ( true != get_theme_mod( 'aaurora_header_main_menu_layout', true ) ) {
			return;
		}
		?>
		<?php
	}

	add_action( 'aaurora_header_after', 'aaurora_header_main_menu_layout' );
endif;

if ( ! function_exists( 'aaurora_site_branding' ) ) :
	/**
	 * Displays Site Branding.
	 *
	 * @param string $location Needs to remove this todo.
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
						echo $aaurora_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped.
						?>
					</p>
					<?php
				endif;
			endif;
			?>
		</div>
		<?php
	}
endif;

if ( ! function_exists( 'aaurora_hamburger_menu' ) ) :
	/**
	 * Displays Hamburger Menu.
	 */
	function aaurora_hamburger_menu() {
		$sidebar_alt_class = '';
		if ( ! is_active_sidebar( 'sidebar-alt' ) ) {
			$sidebar_alt_class = 'menu_only';
		}
		?>
		<div class="hamburger-menu <?php echo esc_attr( $sidebar_alt_class ); ?>">
			<div class="toggle sidebar-open desktop-sidebar-toggle" data-toggle-target=".sidebar-modal"
				 data-toggle-body-class="showing-sidebar-modal" aria-expanded="false">
									<span class="toggle-inner">
										<?php load_inline_svg( 'hamburger.svg' ); ?>
									</span>
			</div>
		</div>
		<?php
	}
endif;

/**
 * Footer Related Action and Hooks.
 *
 * @since 1.0.0
 */

if ( ! function_exists( 'aaurora_footer_share_layout' ) ) :

	function aaurora_footer_share_layout() {
		?>
		<div class="aaurora-share fixed visible">
			<a href="#">
				<?php load_inline_svg( 'share.svg' ); ?>
			</a>
			<div class="aaurora-share-inner">
				<a href="https://www.facebook.com/" target="blank">
					<?php load_inline_svg( 'facebook.svg' ); ?>
				</a>

				<a href="https://twitter.com/" target="blank">
					<?php load_inline_svg( 'twitter.svg' ); ?>
				</a>

				<a href="https://www.linkedin.com/in/mistrykaran/" target="blank">
					<?php load_inline_svg( 'linkedin.svg' ); ?>
				</a>

				<a href="https://in.pinterest.com/mistrykaran91/" target="blank">
					<i class="fa fa-pinterest pinterest" aria-hidden="true"></i>
				</a>
			</div>
		</div>
		<?php
	}

	add_action( 'aaurora_footer_after', 'aaurora_footer_share_layout' );
endif;

if ( ! function_exists( 'aaurora_footer_popup_search_modal_layout' ) ) :

	function aaurora_footer_popup_search_modal_layout() {
		?>
		<div class="popup_search_modal">
			<div class="popup_modal_close_button">
				<?php load_inline_svg( 'close.svg' ); ?>
			</div>
			<div class="search_holder">
				<!--        todo hard coding should be removed-->
				<form role="search" class="search search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>"
					  method="GET">
					<label> <span class="screen-reader-text">Search for</span>
						<input autocomplete="off" type="text" class="search-field" name="s" placeholder="Search..."
							   value="">
					</label>
					<input type="submit" class="search search-submit" value="Submit">
				</form>
			</div>
		</div>
		<?php
	}

	add_action( 'aaurora_footer_after', 'aaurora_footer_popup_search_modal_layout' );
endif;


if ( ! function_exists( 'aaurora_footer_go_to_top_layout' ) ) :
	function aaurora_footer_go_to_top_layout() {
		?>
		<a class="top-link hide" href="" id="js-top">
			<?php load_inline_svg( 'arrow-up.svg' ); ?>
			<span class="screen-reader-text">Back to top</span>
		</a>
		<?php
	}

	add_action( 'aaurora_footer_after', 'aaurora_footer_go_to_top_layout' );
endif;


if ( ! function_exists( 'aaurora_footer_search_layout' ) ) :
	function aaurora_footer_search_layout() {
		?>
		<a class="aaurora-search" href="#">
			<?php load_inline_svg( 'search.svg' ); ?>
			<span class="screen-reader-text">Search</span>
		</a>
		
		<?php
	}

	add_action( 'aaurora_footer_after', 'aaurora_footer_search_layout' );
endif;


if ( ! function_exists( 'aaurora_social_media' ) ) :
	/**
	 * Social Media.
	 */
	function aaurora_social_media( $social_class = 'aaurora_social_follow', $text_only = true ) {
		if ( 'top-bar-social' === $social_class && get_theme_mod( 'top_bar_social_media_button', true ) !== true ) :
			return;
		endif;
		$social_class = 'aaurora_social_follow';  // todo need to revisit this. passing parameter to Actions.
		?>

		<div class="<?php echo esc_attr( $social_class ); ?>">
			<ul class="aaurora-social-holder">
				<li>Follow Us -</li>
				<?php
				if ( get_theme_mod( 'social_media_fb_url', '' ) !== '' ) :
					?>
					<li>
						<a class="social-link facebook-social-icon"
						   href="<?php echo esc_url( get_theme_mod( 'social_media_fb_url' ) ); ?>" target="_blank">
							<?php $text_only ? print ' Fb.' : load_inline_svg( 'facebook.svg' ); ?>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'social_media_tw_url', '' ) !== '' ) : ?>
					<li>
						<a class="social-link twitter-social-icon"
						   href="<?php echo esc_url( get_theme_mod( 'social_media_tw_url' ) ); ?>" target="_blank">
							<?php $text_only ? print ' Tw.' : load_inline_svg( 'twitter.svg' ); ?>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'social_media_in_url', '' ) !== '' ) : ?>
					<li>
						<a class="social-link instagram-social-icon"
						   href="<?php echo esc_url( get_theme_mod( 'social_media_in_url' ) ); ?>" target="_blank">
							<?php $text_only ? print ' In.' : load_inline_svg( 'instagram.svg' ); ?>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'social_media_ln_url', '' ) !== '' ) : ?>
					<li>
						<a class="social-link linkedin-social-icon"
						   href="<?php echo esc_url( get_theme_mod( 'social_media_ln_url' ) ); ?>" target="_blank">
							<?php $text_only ? print ' Ln.' : load_inline_svg( 'linkedin.svg' ); ?>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'social_media_yt_url', '' ) !== '' ) : ?>
					<li>
						<a class="social-link youtube-social-icon"
						   href="<?php echo esc_url( get_theme_mod( 'social_media_yt_url' ) ); ?>" target="_blank">
							<?php $text_only ? print ' Yt.' : load_inline_svg( 'youtube.svg' ); ?>
						</a>
					</li>
				<?php endif; ?>
				<?php if ( get_theme_mod( 'social_media_gh_url', '' ) !== '' ) : ?>
					<li>
						<a class="social-link github-social-icon"
						   href="<?php echo esc_url( get_theme_mod( 'social_media_gh_url' ) ); ?>" target="_blank">
							<?php $text_only ? print ' Gh.' : load_inline_svg( 'github.svg' ); ?>
						</a>
					</li>
				<?php endif; ?>
			</ul>
		</div>
		<?php
	}

	add_action( 'aaurora_footer_after', 'aaurora_social_media' );
endif;

<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package gautam
 */

if ( ! function_exists( 'wp_body_open' ) ) {
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

if ( ! function_exists( 'gautam_posted_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 *
	 * @param boolean $date_only Optional. Return Date or echo date on screen. Default echo.
	 * @param boolean $created_date Optional. Created or Updated Date. Default Updated Post Date.
	 *
	 * @since 1.0.0
	 */
	function gautam_posted_on( $date_only = false, $created_date = true ) {

		if ( $created_date ) {
			$time_string = '<span class="posted-on"> <time class="entry-date published" datetime="%1$s">%2$s</time></span>';
			$time_string = sprintf(
				$time_string,
				esc_attr( get_the_date( DATE_W3C ) ),
				esc_html( get_the_date() )
			);
		} else {
			$time_string = '<span class="updated-on"> <time class="entry-date updated" datetime="%1$s">%2$s</time></span>';
			$time_string = sprintf(
				$time_string,
				esc_attr( get_the_modified_date( DATE_W3C ) ),
				esc_html( get_the_modified_date() )
			);
		}

		$posted_on = '<div><span>Published On</span><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></div>';

		if ( $date_only ) {
			return get_the_date();
		} else {
			echo $posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

	}
}

if ( ! function_exists( 'gautam_updated_on' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 *
	 * @since 1.0.0
	 */
	function gautam_updated_on() {
		gautam_posted_on( false, false );
	}
}

function gautam_category() {
	global $post;

	if ( 'post' === get_post_type() ) {
		$categories_list = get_the_category_list( ' ' );
		if ( $categories_list ) {
			/* translators: 1: list of categories. */
			printf( '<div class="cat-links"><span>Published In</span>' . esc_html( '%1$s ' ) . '</div>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
	}
}


if ( ! function_exists( 'gautam_posted_by' ) ) {
	/**
	 * Prints HTML with meta information for the current author.
	 *
	 * @since 1.0.0
	 */
	function gautam_posted_by() {
		global $post;
		$author_id = $post->post_author;
		$byline    = sprintf(
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( $author_id ) ) . '">' . esc_html( get_the_author_meta( 'nickname', $author_id ) ) . '</a></span>'
		);

		echo '<span class="byline"> <figure></figure><span><span>Published By</span>' . $byline . '</span></span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
}

if ( ! function_exists( 'gautam_meta_comment' ) ) {
	/**
	 * Prints meta information for comment.
	 *
	 * @since 1.0.0
	 */
	function gautam_meta_comment() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'gautam' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}
	}
}

if ( ! function_exists( 'gautam_post_thumbnail' ) ) {
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 * @param int     $size Optional. Post Thumbnail Size.
	 * @param int     $date Optional. Post Date.
	 * @param boolean $in_style Optional. Image is added as div or in style.
	 * @param boolean $background_needed Optional. Should background be added in form of linear gradient.
	 *
	 * @since 1.0.0
	 */
	function gautam_post_thumbnail( $size = 'post-thumbnail', $date = '', $in_style = false, $background_needed = true ) {

		if ( post_password_required() || is_attachment() ) {
			return;
		}

		if ( ! has_post_thumbnail() & ! is_singular() ) {
			gautam_no_post_thumbnail( $date );
		} elseif ( has_post_thumbnail() && gautam_jetpack_featured_image_display() ) {
			gautam_blog_post_thumbnail( $date, $size, $in_style );
		}

	}
}

/**
 * Include Text based post thumbnail in case no featured post is provided for given post.
 *
 * @param string $date Optional. Post date to be included in post thumbnail.
 *
 * @since 1.0.0
 */
function gautam_no_post_thumbnail( $date = '' ) {
	?>
	<div class="post-thumbnail no-post-thumbnail">
		<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php if ( is_sticky() ) : ?>
				<span class="sticky-badge">
					<i class="fa fa-tags fa-lg" aria-hidden="true"></i>
				</span>
			<?php endif; ?>
			<span class="post-date">
				<?php echo esc_html( $date ); ?>
			</span>
		</a>
	</div>
	<?php
}

/**
 * Post thumbnail to be included for Blog or Single Post.
 *
 * @param String  $date Post date to be included in featured image.
 * @param String  $size Size of the featured image.
 * @param boolean $in_style Should image be included as Div or In style.
 */
function gautam_blog_post_thumbnail( $date, $size, $in_style ) {
	if ( $in_style && is_singular() ) {
		?>
		<div class="post-thumbnail in-style"
			style="background-image:url('<?php the_post_thumbnail_url( $size ); ?>')">
		</div>
		<?php
		return;
	} elseif ( $in_style && ! is_singular() ) {
		?>

		<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<div class="post-thumbnail in-style"
				style="background-image:url('<?php the_post_thumbnail_url( $size ); ?>')">
				<?php
				if ( is_sticky() ) :
					?>
					<span class="sticky-badge">
						<i class="fa fa-tags fa-lg" aria-hidden="true"></i>
				</span>
				<?php endif; ?>
				<span class="post-date">
					<?php echo esc_html( $date ); ?>
				</span>
			</div>
		</a>
		<?php
	} elseif ( is_singular() ) {
		?>
		<div class="post-thumbnail">
			<?php the_post_thumbnail( $size ); ?>
		</div><!-- .post-thumbnail -->
		<?php
	} else {
		?>
		<div class="post-thumbnail">
			<a href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
				the_post_thumbnail(
					$size,
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				if ( is_sticky() ) :
					?>
					<span class="sticky-badge">
						<i class="fa fa-tags fa-lg" aria-hidden="true"></i>
					</span>
				<?php endif; ?>
				<span class="post-date">
					<?php echo esc_html( $date ); ?>
				</span>
			</a>
		</div>
		<?php
	}
}

/**
 * Post Pagination Buttons.
 */
function gautam_post_nav() {
	echo "<div class='gautam-pagination'>";
	the_posts_pagination(
		array(
			'mid_size'  => 0,
			'prev_text' => '<i class="fa fa-angle-left"></i><span class="screen-reader-text">' . __( 'Previous Page', 'gautam' ) . '</span>',
			'next_text' => '<i class="fa fa-angle-right"></i><span class="screen-reader-text">' . __( 'Next Page', 'gautam' ) . '</span>',
			'type'      => 'list',
		)
	);
	echo '</div>';
}

/**
 * Show/Hide Featured Image outside of the loop in Jetpack.
 */
function gautam_jetpack_featured_image_display() {
	if ( ! function_exists( 'jetpack_featured_images_remove_post_thumbnail' ) ) {
		return true;
	} else {
		$options         = get_theme_support( 'jetpack-content-options' );
		$featured_images = ( ! empty( $options[0]['featured-images'] ) ) ? $options[0]['featured-images'] : null;

		$settings = array(
			'post-default' => ( isset( $featured_images['post-default'] ) && false === $featured_images['post-default'] ) ? '' : 1,
			'page-default' => ( isset( $featured_images['page-default'] ) && false === $featured_images['page-default'] ) ? '' : 1,
		);

		$settings = array_merge(
			$settings,
			array(
				'post-option' => get_option( 'jetpack_content_featured_images_post', $settings['post-default'] ),
				'page-option' => get_option( 'jetpack_content_featured_images_page', $settings['page-default'] ),
			)
		);

		if ( ( ! $settings['post-option'] && is_single() )
			|| ( ! $settings['page-option'] && is_singular() && is_page() ) ) {
			return false;
		} else {
			return true;
		}
	}
}

if ( ! function_exists( 'gautam_excerpt' ) ) :
	/**
	 * Get excerpt.
	 *
	 * @since 1.1.0
	 * @param int    $length the length of the excerpt.
	 * @param string $more Optional. What to append if $text needs to be trimmed.
	 */
	function gautam_excerpt( $length = null, $more = null ) {

		// Check if this post has a custom excerpt.
		if ( has_excerpt() ) {
			$output = get_the_excerpt();
		} else {
			// Check for more tag.
			if ( strpos( get_the_content(), '<!--more-->' ) ) {
				$output = apply_filters( 'the_content', get_the_content() ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
			} else {

				if ( null === $length ) {
					$length = apply_filters( 'excerpt_length', get_theme_mod( 'blog_excerpt_length', '20' ) ); // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedHooknameFound
				}

				$output = wp_trim_words( get_the_content(), $length );
			}
		}

		echo $output; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
endif;

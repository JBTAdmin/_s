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

		$posted_on = '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

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

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

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
<!--todo remove this as text should not be displayed in featured image.-->
<!--				<div class="post-thumbnail-drop-case">-->
<!--					-->
	<?php
	// if ( ! empty( get_the_title() ) ) {
	// echo esc_html( get_the_title()[0] );
	// }
	//
	?>
<!--				</div>-->

			<?php if ( is_sticky() ) : ?>
				<span class="badge">
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
 * Blog post thumbnail to be included for post.
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
					<span class="badge">
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
					<span class="badge">
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

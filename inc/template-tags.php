<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package aaurora
 */

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

if ( ! function_exists( 'aaurora_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 *
	 * @param boolean $date_only Optional. Return Date or echo date on screen. Default echo.
	 * @param boolean $created_date Optional. Created or Updated Date. Default Updated Post Date.
	 */
	function aaurora_posted_on( $date_only = false, $created_date = true ) {

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

		$posted_on = sprintf(
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);

		if ( $date_only ) {
			return get_the_date( 'j M' );
		} else {
			echo $posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}

	}
endif;

if ( ! function_exists( 'aaurora_updated_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function aaurora_updated_on( ) {
		aaurora_posted_on(false, false);
	}
endif;

if ( ! function_exists( 'aaurora_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function aaurora_posted_by() {
		$byline = sprintf(
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'aaurora_meta_comment' ) ) :
	/**
	 * Prints meta information for comment.
	 */
	function aaurora_meta_comment() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
					/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'aaurora' ),
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
endif;

if ( ! function_exists( 'aaurora_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 * @param int $size Optional. Post Thumbnail Size.
	 * @param int $date Optional. Post Date.
	 */
	function aaurora_post_thumbnail( $size = 'post-thumbnail', $date = '' ) {
		if ( post_password_required() || is_attachment() ) {
			return;
		}

		if ( ! has_post_thumbnail() & ! is_singular() ) {
			?>
			<div class="post-thumbnail-container">
				<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
					<div class="no-post-thumbnail">

						<div class="post-thumbnail-drop-case">
							<?php
							if ( ! empty( get_the_title() ) ) {
								echo esc_html( get_the_title()[0] );
							}
							?>
						</div>
					</div><!-- .post-thumbnail -->
					<?php if ( is_sticky() ) : ?>
						<span class="badge">
						<?php load_inline_svg( 'sticky.svg' ); ?>
				</span>
					<?php endif; ?>
					<span class="post-date">
					<?php echo esc_html( $date ); ?>
				</span>
				</a>
			</div>
			<?php
			return;
		}
		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail( 'full' ); ?>
			</div><!-- .post-thumbnail -->
		<?php else : ?>
			<div class="post-thumbnail-container">
				<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
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
						<?php load_inline_svg( 'sticky.svg' ); ?>
				</span>
					<?php endif; ?>
					<span class="post-date">
					<?php echo esc_html( $date ); ?>
				</span>
				</a>
			</div>
			<?php
		endif; // End is_singular().
	}
endif;




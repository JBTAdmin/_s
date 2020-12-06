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
	 */
	function aaurora_posted_on( $date_only = false, $created_date = false ) {

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

if ( ! function_exists( 'aaurora_meta_category_list' ) ) :
	/**
	 * Prints meta information for the categories.
	 */
	function aaurora_meta_category_list() {
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'aaurora' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html( '%1$s ' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}
	}
endif;

if ( ! function_exists( 'aaurora_meta_tag_list' ) ) :
	/**
	 * Prints meta information for the tags.
	 */
	function aaurora_meta_tag_list() {
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list();
			if ( $tags_list ) {
				printf( '<span class="tags-links">' . esc_html( ' %1$s' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}
	}
endif;

if ( ! function_exists( 'aaurora_meta_comment' ) ) :
	/**
	 * Prints meta information for comment.
	 */
	function aaurora_meta_comment() {
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
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
				<?php the_post_thumbnail( 'aaurora-blog-single-post-no-sidebar' ); ?>
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

if ( ! function_exists( 'aaurora_social_media' ) ) :
	/**
	 * Social Media.
	 */
	function aaurora_social_media( $social_class = '', $text_only = false ) {
		if ( 'top-bar-social' === $social_class && get_theme_mod( 'top_bar_social_media_button', true ) !== true ) :
			return;
		endif;
		?>

		<div class="<?php echo esc_attr( $social_class ); ?>">
			<ul class="aaurora-social-holder">
				<li>Follow Us - </li>
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
endif;



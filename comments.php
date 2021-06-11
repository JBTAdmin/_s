<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gautam
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h3 class="comments-title">
			<?php
			$gautam_comment_count = get_comments_number();
			if ( '1' === $gautam_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought', 'gautam' )
				);
			} else {
				printf(
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought ', '%1$s thoughts ', $gautam_comment_count, 'comments title', 'gautam' ) ),
					number_format_i18n( $gautam_comment_count ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
				);
			}
			?>
		</h3><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					// 'style'       => 'ol',
					'short_ping'  => true,
					// 'avatar_size' => 70,
                    'callback'       => 'gautam_comments',
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'gautam' ); ?></p>
			<?php
		endif;
	endif; // Check for have_comments().

	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = $req ? " aria-required='true'" : '';
	$fields    = array(
		'author' =>
			'<p class="comment-form-author">' .
			'<input id="author" name="author" type="text" placeholder="Name*" required value="' .
			esc_attr( $commenter['comment_author'] ) .
			'" size="30"' .
			$aria_req .
			' /></p>',
		'email'  =>
			'<p class="comment-form-email">' .
			'<input id="email" name="email" type="text" placeholder="Email*" required value="' .
			esc_attr( $commenter['comment_author_email'] ) .
			'" size="30"' .
			$aria_req .
			' /></p>',
		'url'    =>
			'<p class="comment-form-url">' .
			'<input id="url" name="url" type="text" placeholder="Website" required value="' .
			esc_attr( $commenter['comment_author_url'] ) .
			'" size="30"' .
			$aria_req .
			' /></p>',
	);

	$comment_field =
		'<p class="comment-form-comment">' .
		'<textarea id="comment" name="comment" placeholder="Express your thoughts" cols="45" rows="8" aria-required="true"></textarea>' .
		'</p>';

	$comments_args = array(
		'fields'        => $fields,
		'comment_field' => $comment_field,
		'label_submit'  => 'Post Comment',
	);
	comment_form( $comments_args );
	?>

</div><!-- #comments -->

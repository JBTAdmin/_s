<?php
/**
 * Display Post Navigation.
 *
 * @package Aaurora
 * @since 1.0
 */

$next_post     = get_next_post();
$previous_post = get_previous_post();

// Return if there are no other posts.
if ( empty( $next_post ) && empty( $previous_post ) ) {
	return;
}
?>
<section class="post-nav" role="navigation">
	<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'aaurora' ); ?></h2>
	<?php

	$previous_post_thumbnail = '';
	$next_post_thumbnail     = '';

	if ( is_a( $previous_post, 'WP_Post' ) ) :
		$previous_post_thumbnail = get_the_post_thumbnail( $previous_post->ID, 'aaurora-post-navigation-featured-image' );
	endif;

	if ( is_a( $next_post, 'WP_Post' ) ) :
		$next_post_thumbnail = get_the_post_thumbnail( $next_post->ID, 'aaurora-post-navigation-featured-image' );
	endif;

	the_post_navigation(
		array(
			'next_text' => '<div><small class="meta-nav" aria-hidden="true">' . __( 'Next Post', 'aaurora' ) . '</small> ' .
							'<span class="screen-reader-text">' . __( 'Next post:', 'aaurora' ) . '</span> ' .
							'<h2 class="post-title">%title</h2></div>' . $next_post_thumbnail,
			'prev_text' => $previous_post_thumbnail . '<div><small class="meta-nav" aria-hidden="true">' . __( 'Previous Post', 'aaurora' ) . '</small> ' .
							'<span class="screen-reader-text">' . __( 'Previous post:', 'aaurora' ) . '</span> ' .
							'<h2 class="post-title">%title</h2></div>',
		)
	);
	?>
</section>

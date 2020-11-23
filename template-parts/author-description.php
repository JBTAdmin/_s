<?php
/**
 * Template part for displaying Author Description
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aaurora
 */

?>
<div id="author-bio" class="author-bio">

	<div id="author-avatar" class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?></div>

	<div id="author-details" class="author_details">
		<span class="author_text"><?php esc_html_e( 'Author', 'aaurora' ); ?></span>
		<div class="author_name_wrapper"> <?php the_author_posts_link(); ?></div>
		<div class="author_description_wrapper"> <?php the_author_meta( 'description' ); ?> </div>
	</div><!-- #author-details -->

</div><!-- #author-bio -->

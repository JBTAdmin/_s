<?php
/**
 * Template part for displaying Author Description
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gautam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div id="author-bio" class="author-bio">

	<div id="author-avatar" class="author-avatar"><?php echo get_avatar( get_the_author_meta( 'ID' ), 100 ); ?></div>

	<div id="author-details" class="author_details">

		<div class="author_name_wrapper"> <?php the_author_posts_link(); ?></div>

		<div class="author_description_wrapper"> <?php the_author_meta( 'description' ); ?> </div>

	</div><!-- #author-details -->

</div><!-- #author-bio -->

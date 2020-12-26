<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aaurora
 * @since 1.0
 */

?>
<!--todo having some issues. Need to check. -->
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post-article-3' ); ?>>


		<div class="post-info">
			<div class="post-date">
				<?php aaurora_posted_on(); ?>
			</div>

			<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
		</div>

		<div class="post-excerpt">
			<a href=" <?php echo esc_url( get_permalink() ); ?>" rel="bookmark1">
				In just a few short days, we'll welcome over 1,200 of you to Revolution Hall for this year's XOXO. After last year's festival at Veterans Memorial Coliseum...
			</a>
		</div>


</article><!-- #post-<?php the_ID(); ?> -->

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
<article id="post-<?php the_ID(); ?>">

<div class="inner-entry">
		<div class="entry-meta">
			<div class="posted-on">
				<?php aaurora_posted_on(); ?>
			</div>
			<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
		</div>

		<div class="entry-excerpt">
			<a href="<?php echo esc_url( get_permalink() ); ?>">
				<?php esc_html_e(aaurora_excerpt( 20 )); ?>
			</a>
		</div>

</div>
</article><!-- #post-<?php the_ID(); ?> -->

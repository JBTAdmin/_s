<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gautam
 * @since 1.0
 */

?>
<!--todo having some issues. Need to check. -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<div class="inner-entry">
		<div class="entry-meta">
			<div class="posted-on">
				<?php gautam_posted_on(); ?>
			</div>
			<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
		</div>

		<div class="entry-excerpt">
			<a href="<?php echo esc_url( get_permalink() ); ?>" tabindex="-1">
				<?php echo esc_html( gautam_excerpt( 50 ) ); ?>
			</a>
		</div>

</div>
</article><!-- #post-<?php the_ID(); ?> -->

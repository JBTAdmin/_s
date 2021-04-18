<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gautam
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="inner-entry">
		<div class="entry-meta">
			<div class="posted-on">
				<?php gautam_posted_on(); ?>
				<?php
				if ( is_sticky() ) :
					?>
					<span class="sticky-badge">
					<i class="fa fa-tags fa-lg" aria-hidden="true"></i>
					</span>
					<?php
				endif;
				?>
			</div>
			<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
		</div>

		<div class="entry-excerpt">
			<a href="<?php echo esc_url( get_permalink() ); ?>" tabindex="-1">
				<?php the_excerpt(); ?>
			</a>
		</div>

	</div>
</article><!-- #post-<?php the_ID(); ?> -->

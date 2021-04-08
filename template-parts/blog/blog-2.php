<?php
/**
 * Template part for displaying posts in blog layout.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gautam
 * @since 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="inner-article">
		<div class="inner-entry">
			<?php
			if ( is_sticky() ) :
				?>
				<span class="badge">
					<i class="fa fa-tags fa-lg" aria-hidden="true"></i>
				</span>
			<?php endif; ?>
			<div class="entry-header">
				<div class="entry-meta">
					<div class="posted_on">
						<?php echo esc_html( gautam_posted_on( true ) ); ?>
					</div>
				</div>
				<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				?>
			</div><!-- .entry-header -->
			<div class="entry-footer">
				<div class="entry-meta">
					<span class="cat-links">
						<?php
						$categories = get_the_category();
						if ( ! empty( $categories ) ) {
							echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
						}
						?>
					</span>
				</div>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

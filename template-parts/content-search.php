<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aaurora
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post-article' ); ?>>
	<div  class="blog-type-list">
	<?php aaurora_post_thumbnail( 'aaurora-blog-1-featured-image', aaurora_posted_on( true ) ); ?>
	<div class="entry-header">
		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
				aaurora_posted_on();
				aaurora_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	</div><!-- .entry-header -->
	<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-link brand-color-hover">
		<?php esc_html_e( 'Read More', 'aaurora' ); ?>
	</a>
	<footer class="entry-footer">
		<?php aaurora_meta_category_list(); ?>
	</footer><!-- .entry-footer -->
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

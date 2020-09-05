<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aaurora
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post-article' ); ?>>
	
	<div  class="blog-type-list">
		<?php aaurora_post_thumbnail( 'aaurora-blog-2-featured-image', aaurora_posted_on( true ) ); ?>
		<div class="blog-type-list-content">
			<div class="entry-header">
				<div class="blog-list-content-meta-info">
					<?php
					aaurora_meta_category_list();
					?>
				</div>
				<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				?>
				
				<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-link brand-color-hover">
					<?php
					esc_html_e( 'Read More', 'aaurora' );
					?>
				</a>
			
			</div><!-- .entry-header -->
			
			<div class="entry-content">
			</div><!-- .entry-content -->
			
			<footer class="entry-footer">
			
			</footer><!-- .entry-footer -->
		
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->

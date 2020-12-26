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

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-layout-1' ); ?>>
	<div  class="blog-type-list">
		<div class="article-featured-image" style="background-image:url('<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ); ?>')">
<!--	        --><?php // aaurora_post_thumbnail( 'full', aaurora_posted_on( true ) ); ?>
		</div>
		
		<div class="blog-article-metainfo">
			<div class="post-date">
				<?php echo aaurora_posted_on(); ?>
			</div>
			<div class="article-header">
				<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				?>
			</div>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->

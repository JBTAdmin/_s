<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aaurora
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post-article-2' ); ?>>
	<div  class="blog-type-list">
		<div class="blog-article">
			<?php aaurora_post_thumbnail( 'aaurora-blog-2-featured-image', aaurora_posted_on( true ) ); ?>
			<div class="blog-type-list-content">
				<div class="entry-header">
					<?php
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					?>
				</div><!-- .entry-header -->
			</div>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->

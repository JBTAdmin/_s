<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aaurora
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post-article-3' ); ?>>
	
	<div  class="blog-type-list" style="background-image:url('<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>')">
	</div>
	<a href=" <?php echo esc_url( get_permalink() ); ?>" rel="bookmark"></a>
		<div class="blog-type-list-content">
<!--            todo class names proper-->
			<div class="post-date">
				<span class="post-date-day"><?php echo get_the_date( 'd' ); ?></span>
				<span class="post-date-month"><?php echo get_the_date( 'F' ); ?></span>
			</div>
			<div class="entry-header">
				<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				?>
				<div class="blog-list-content-meta-info">
					<?php
					aaurora_meta_category_list();
					?>
			</div>
			<?php
			// load_inline_svg('right-arrow.svg');
			?>
			</div><!-- .entry-header -->
		</div>


</article><!-- #post-<?php the_ID(); ?> -->

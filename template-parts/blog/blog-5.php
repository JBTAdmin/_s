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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="inner-entry">

		<?php gautam_post_thumbnail( 'gautam-blog-5-featured-image', gautam_posted_on( true ) ); ?>

		<div class="entry-header">
			<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
		</div><!-- .entry-header -->
	</div>

</article><!-- #post-<?php the_ID(); ?> -->

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
	<div  class="inner-entry">

		<?php gautam_post_thumbnail( 'gautam-blog-3-featured-image', gautam_posted_on( true ), false ); ?>

		<div class="entry-header">
			<div class="cat-links">
				<?php
				$categories = get_the_category();
				if ( ! empty( $categories ) ) {
					echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
				}
				?>
			</div>
			<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->

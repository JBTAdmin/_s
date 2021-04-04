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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div  class="inner-entry">

		<?php aaurora_post_thumbnail( 'aaurora-blog-3-featured-image', aaurora_posted_on( true ), false ); ?>

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

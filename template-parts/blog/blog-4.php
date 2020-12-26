<?php
/**
 * Template part for displaying posts in blog layout.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aaurora
 * @since 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-4' ); ?>>
	<div  class="blog-type-list">
		<div class="blog-article">
			<div class="blog-type-list-content">
				<div class="blog-type-published-date">
					<?php aaurora_posted_on( true ); ?>
				</div>
				<div class="entry-header">
					<?php
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
					?>
				</div><!-- .entry-header -->
				<div class="blog-type-post-category">
					<?php
						$categories = get_the_category();
					if ( ! empty( $categories ) ) {
						echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
					}
					?>
				</div>
			</div>
		</div>
	</div>

</article><!-- #post-<?php the_ID(); ?> -->

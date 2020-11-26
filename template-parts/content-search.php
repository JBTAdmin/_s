<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aaurora
 */

?>
<!-- todo with different layout this section should change-->
<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-post-article-4' ); ?>>
    <div  class="blog-type-list">
        <div class="blog-article">
            <div class="blog-type-list-content">
                <div class="blog-type-published-date">
					<?php echo aaurora_posted_on( true ); ?>
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

<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aaurora_
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'blog-layout-2' ); ?>>

	<div  class="blog-type-list">

	<?php aaurora_post_thumbnail( 'aaurora-blog-2-featured-image' ); ?>

<!--	<div class="blog-type-list-content">-->
		<?php
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		?>
		<div class="blog-list-content-meta-info">
			<?php
			aaurora_meta_category_list();
			?>
		</div>
	<div class="entry-content">
		<?php
		$content_preview = '';
		$content_preview = get_the_excerpt();

		if ( $content_preview ) {
			// $excerpt_length = 5;
			// $content_preview = preg_replace( '/\[.+?\]/', '', the_content() );
			$content_preview = wp_trim_words( get_the_content(), 20 );
			// $content_preview = wp_trim_words( $content_preview, $excerpt_length, apply_filters( 'excerpt_more', '&hellip;' ) );
		}

		echo( $content_preview );  // TODO THIS IS NOT THE RIGHT WAY TO DISPLAY CONTENT.


		// the_content(
		// sprintf(
		// wp_kses(
		// * translators: %s: Name of current post. Only visible to screen readers */
		// __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'AAURORA' ),
		// array(
		// 'span' => array(
		// 'class' => array(),
		// ),
		// )
		// ),
		// wp_kses_post( get_the_title() )
		// )
		// );

		// wp_link_pages(
		// array(
		// 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'AAURORA' ),
		// 'after'  => '</div>',
		// )
		// );.
		?>
		<a href="<?php echo esc_url( get_permalink() ); ?>" class="btn btn-link brand-color-hover">
			<?php esc_html_e( 'Read More', 'aaurora' ); ?>
		</a>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

	</footer><!-- .entry-footer -->

<!--	</div>-->
	</div>

</article><!-- #post-<?php the_ID(); ?> -->

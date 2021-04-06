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

		<?php gautam_post_thumbnail( 'gautam-blog-4-featured-image', gautam_posted_on( true ) ); ?>

		<div class="entry-header">
			<div class="entry-meta">
				<div class="posted-on">
					<?php gautam_posted_on(); ?>
				</div>
			</div>
			<?php
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			?>
		</div>
<!--         todo a better naming could be entry-excerpt-->
		<div class="entry-excerpt">
			<?php gautam_excerpt( 20 ); ?>
			<div class="read-more">
				<a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'read more', 'gautam' ); ?> <?php gautam_load_inline_svg( 'arrow-right-circle.svg' ); ?></a>
			</div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

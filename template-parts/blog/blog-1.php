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

<article id="post-<?php the_ID(); ?>">
	<div class="inner-entry">
		<div class="featured-image" >
			<?php aaurora_post_thumbnail( 'full', aaurora_posted_on( true ) ); ?>
		</div>

		<div class="entry-header">
			<div class="posted-on">
				<?php aaurora_posted_on(); ?>
			</div>
			<div class="entry-title">
				<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				?>
			</div>
		</div>
		<div class="entry-summary">
			<?php aaurora_excerpt( 20 ); ?>
            <div class="read-more">
                <a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'read more', 'aaurora' ); ?> <?php load_inline_svg( 'arrow-right-circle.svg' ); ?></a>
            </div>
		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->

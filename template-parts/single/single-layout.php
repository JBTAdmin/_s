<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aaurora
 */

?>
<div class="article-container">
<article id="post-<?php the_ID(); ?>" <?php post_class('post-article'); ?>>
    
    <div class="entry-header">
		<?php
		aaurora_meta_category_list();
		the_title( '<h1 class="entry-title">', '</h1>' );
		
		if ( 'post' === get_post_type() ) :
			?>
            <div class="entry-meta">
				<?php
				aaurora_posted_by();
				aaurora_posted_on();
				?>
            </div><!-- .entry-meta -->
		<?php endif; ?>
    </div><!-- .entry-header -->
    
	<?php aaurora_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'aaurora' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aaurora' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->
 
</article><!-- #post-<?php the_ID(); ?> -->
	<?php
	aaurora_meta_tag_list();
	?>
</div>
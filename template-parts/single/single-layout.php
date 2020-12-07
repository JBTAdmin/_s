<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aaurora
 */

/**
 * Do not allow direct script access.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<div class="article-container">
    <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-article' ); ?>>
        <div class="entry-header">
			<?php
			get_template_part( 'template-parts/single/single-category' );
			get_template_part( 'template-parts/single/single-heading' );
			get_template_part( 'template-parts/single/single-metadata' );
			?>
        </div><!-- .entry-header -->
		<?php
		get_template_part( 'template-parts/single/single-thumbnail' );
		?>
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
			echo 'page link before';
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aaurora' ),
					'after'  => '</div>',
				)
			);
			echo 'page link after';
			?>
        </div><!-- .entry-content -->
    </article><!-- #post-<?php the_ID(); ?> -->
	<?php
	get_template_part( 'template-parts/single/single-tag' );
	?>
</div>

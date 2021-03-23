<?php
/**
 * Template part for displaying Header Section in page.
 *
 * @package aaurora
 */

?>
<div class="site-container <?php echo esc_attr( get_theme_mod( 'single_post_layout', 'single-in-content-1' ) ); ?>">
	<div class="wrap">
		<?php get_template_part( 'template-parts/single/thumbnail' ); ?>

		<div class="meta-data">
			<?php
			$template_parts = get_theme_mod( 'entry_header_sequence', array( 'category', 'heading', 'metadata' ) );

			foreach ( $template_parts as $template_part ) {
				if ( 'thumbnail' !== $template_part ) {
					get_template_part( 'template-parts/single/' . $template_part );
				}
			}
			?>
		</div>
	</div>
</div>

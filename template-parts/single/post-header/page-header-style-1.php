<div class="site-container one <?php esc_attr_e(get_theme_mod( 'blog_post_in_page_header_layout', 'column-2-title-image' )); ?>">
    <div class="wrap">
<!--        todo probably this div is not required AS featured image also comes as wrapper to div-->
        <div class="featured-image">
			<?php get_template_part( 'template-parts/single/thumbnail' ); ?>
        </div>
        <div class="meta-data">
			<?php
			$template_parts = get_theme_mod( 'entry_header_sequence', array( 'category', 'heading', 'metadata' ) );
			
			foreach ( $template_parts as $template_part ) {
				if ( $template_part !== 'thumbnail' ) {
					get_template_part( 'template-parts/single/' . $template_part );
				}
			}
			?>
        </div>
    </div>
</div>

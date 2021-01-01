        <div class="site-container column-2-title-image">
            <div class="wrap">
                <div class="featured-image">
                <?php get_template_part( 'template-parts/single/thumbnail' ); ?>
                </div>
                <div class="meta-data">
                    <?php
                        $template_parts = get_theme_mod( 'entry_header_sequence', array( 'category', 'heading', 'metadata' ) );
                        
                        foreach ( $template_parts as $template_part ) {
                            if( $template_part !== 'thumbnail') {
	                            get_template_part( 'template-parts/single/' . $template_part );
                            }
                        }
                    ?>
                </div>
        </div>
    </div>

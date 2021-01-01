<?php
$template_parts = get_theme_mod( 'entry_header_sequence', array( 'category', 'heading', 'metadata' ) );

foreach ( $template_parts as $template_part ) {
get_template_part( 'template-parts/single/' . $template_part );
}
?>
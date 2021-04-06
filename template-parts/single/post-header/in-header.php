<?php
/**
 * Template part for displaying Header Section in page.
 *
 * @package gautam
 */

$template_parts = get_theme_mod( 'entry_header_sequence', array( 'category', 'heading', 'metadata', 'thumbnail' ) );

$container_class = '';
if ( in_array( 'thumbnail', $template_parts, true ) ) {
    $container_class = 'thumbnail' ;
}
?>
<div class="in-header-container <?php esc_attr_e($container_class) ?>">
	<?php
	if ( in_array( 'thumbnail', $template_parts, true ) ) {
		get_template_part( 'template-parts/single/thumbnail' );
	}
	?>
	<div class="wrap">
		<div class="meta-data">
			<?php

			foreach ( $template_parts as $template_part ) {
				if ( 'thumbnail' !== $template_part ) {
					get_template_part( 'template-parts/single/' . $template_part );
				}
			}
			?>
		</div>
	</div>
</div>

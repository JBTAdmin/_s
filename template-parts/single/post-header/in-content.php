<?php
/**
 * Template part for displaying Header Section in Content.
 *
 * @package aaurora
 */

$template_parts = get_theme_mod( 'entry_header_sequence', array( 'category', 'heading', 'metadata', 'thumbnail' ) );
?>
<div class="meta-data">
	<?php
	foreach ( $template_parts as $template_part ) {
		get_template_part( 'template-parts/single/' . $template_part );
	}
	?>
</div>

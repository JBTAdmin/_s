<?php
/**
 * Displayes Metadata Informations.
 *
 * @package Aaurora
 * @since 1.0
 */

/**
 * Do not allow direct script access.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( 'post' === get_post_type() ) :
	?>
	<div class="entry-meta">
		<?php
		$aaurora_meta_elements = get_theme_mod(
			'entry_header_metadata_element',
			array(
				'category',
				'updated_on',
				'posted_by',
			)
		);

		// Loop through meta items.
		foreach ( $aaurora_meta_elements as $aaurora_meta_item ) {

			// Call a template tag function.
			if ( function_exists( 'aaurora_' . $aaurora_meta_item ) ) {
				call_user_func( 'aaurora_' . $aaurora_meta_item );
			}
		}
		?>
	</div><!-- .entry-meta -->
<?php endif; ?>

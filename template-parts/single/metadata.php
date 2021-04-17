<?php
/**
 * Template to display metadata information.
 *
 * @package gautam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( 'post' === get_post_type() ) :
	?>
	<div class="entry-meta">
		<?php
		$gautam_meta_elements = get_theme_mod(
			'entry_header_metadata_element',
			array(
				'updated_on',
				'posted_by',
				'meta_comment',
			)
		);

		// Loop through meta items.
		foreach ( $gautam_meta_elements as $gautam_meta_item ) {

			// Call a template tag function.
			if ( function_exists( 'gautam_' . $gautam_meta_item ) ) {
				call_user_func( 'gautam_' . $gautam_meta_item );
			}
		}
		?>
	</div><!-- .entry-meta -->
<?php endif; ?>

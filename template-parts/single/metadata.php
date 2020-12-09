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
		aaurora_posted_by();
		aaurora_posted_on( false, true );
		aaurora_posted_on()
		?>
	</div><!-- .entry-meta -->
<?php endif; ?>

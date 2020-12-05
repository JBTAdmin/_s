<?php
/**
 * Core Theme Helper.
 *
 */


/**
 * Pagination Buttons
 */
function post_nav() {
	echo "<div class='aaurora-pagination'>";
	the_posts_pagination(
		array(
			'prev_text' => __( '&lt;&nbsp;Previous', 'aaurora' ),
			'next_text' => __( 'Next&nbsp;&gt;', 'aaurora' ),
			'type'      => 'list',
		)
	);
	echo '</div>';
}
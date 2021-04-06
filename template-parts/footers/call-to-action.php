<?php
/**
 * Call to action elements.
 *
 * @package Gautam
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( get_theme_mod( 'footer_call_to_action', true ) === false ) {
	return;
}

?>

<div id="colophon" class="site-footer-main">
	<div class="wrap">
		<div class="gautam-cta_wrapper">

			<div class="gautam-cta-text">
				<div class="cta-heading">
					Want to set up <br>your business today?
				</div>
				<div class="cta-text">
					Create a High Performed UI/UX Design from a Silicon Valley. Find More
				</div>
			</div>

			<div class="gautam-cta-button">
				<input type="button" value="Click Me" href="#">
			</div>

		</div>
	</div>
</div>

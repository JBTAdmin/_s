<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gautam
 */

get_header();

?>

	<div class="site-container">
		<div class="wrap">
			<div class="main-container">

				<?php gautam_main_content_before(); ?>

				<main id="primary" class="site-main primary-content">
					<?php gautam_entry_content(); ?>
				</main><!-- #main -->

				<?php gautam_main_content_after(); ?>
			</div>
		</div>
	</div>
<?php
get_footer();

<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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

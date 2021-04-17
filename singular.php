<?php
/**
 * The template for displaying all pages, single posts and attachments.
 *
 * This is a new template file that WordPress introduced in
 * version 4.3.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-page
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#attachment
 *
 * @package     gautam
 */

get_header();
gautam_site_container_before();
?>

	<div class="site-container">

		<div class="wrap">

			<div class="main-container">

				<?php gautam_main_content_before(); ?>

				<main id="primary" class="site-main primary-content">

					<?php gautam_singular_content_before(); ?>

					<?php gautam_singular_content(); ?>

					<?php gautam_singular_content_after(); ?>

				</main><!-- #content .site-content -->

				<?php gautam_main_content_after(); ?>

			</div><!-- #primary .content-area -->

		</div><!-- END .wrap -->

	</div>
<?php
gautam_site_container_after();
get_footer();

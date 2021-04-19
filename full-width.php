<?php
/**
 * Template Name: Full-Width
 *
 * The template for displaying pages in full width without
 * sidebars if enabled.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gautam
 */

?>

<?php get_header(); ?>
<?php gautam_site_container_before(); ?>

<div class="site-container">

	<div class="wrap">

		<div class="main-container">

			<main id="primary" class="site-main primary-content">

				<?php gautam_singular_content_before(); ?>

				<?php gautam_singular_content(); ?>

				<?php gautam_singular_content_after(); ?>

			</main><!-- #primary .primary-content -->

		</div><!-- .main-container -->

	</div><!-- END .wrap -->

</div>

<?php gautam_site_container_after(); ?>
<?php
get_footer();

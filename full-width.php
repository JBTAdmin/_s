<?php
/**
 * Template Name: Full-Width
 *
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package gautam
 */


?>

<?php get_header(); ?>
    <!--todo may be name of the hooks can be revisited-->
<?php gautam_site_container_before(); ?>

    <div class="site-container">

        <div class="wrap">

            <div class="main-container">
				
<!--				--><?php //gautam_main_content_before(); ?>

                <main id="primary" class="site-main primary-content">
					
					<?php gautam_singular_content_before(); ?>
					
					<?php gautam_singular_content(); ?>
					
					<?php gautam_singular_content_after(); ?>

                </main><!-- #content .site-content -->
				
<!--				--><?php //gautam_main_content_after(); ?>

            </div><!-- #primary .content-area -->

        </div><!-- END .wrap -->

    </div>
<?php
gautam_site_container_after();
get_footer();

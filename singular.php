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
 * @package     Aaurora
 * @since       1.0.0
 */

$sidebar_page_class = '';
?>

<?php get_header(); ?>
<!--todo may be name of the hooks can be revisited-->
<?php aaurora_site_container_before(); ?>

    <div class="site-container">

        <div class="wrap">

            <div class="main-container">
				
				<?php aaurora_main_content_before(); ?>

                <main id="primary" class="site-main primary-content <?php echo esc_attr( $sidebar_page_class ); ?>">
					
					<?php aaurora_singular_content_before(); ?>
                    
                    <?php aaurora_singular_content(); ?>
                    
                    <?php aaurora_singular_content_after(); ?>

                </main><!-- #content .site-content -->
				
				<?php aaurora_main_content_after(); ?>

            </div><!-- #primary .content-area -->

        </div><!-- END .wrap -->

    </div>
<?php
aaurora_site_container_after();
get_sidebar( 'alt' );
get_footer();

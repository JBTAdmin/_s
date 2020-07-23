<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();

$sidebar_page_class = '';
if (is_active_sidebar('sidebar-1')) {
    $sidebar_page_class = ' with-right-sidebar';
}

?>

    <div class="site-container">
        <div class="wrap">
            <div class="main-container">
                <main id="primary" class="site-main primary-content <?php echo esc_attr($sidebar_page_class); ?>">

                    <?php if (have_posts()) : ?>

                        <header class="page-header">
                            <?php
                            the_archive_title('<h1 class="page-title">', '</h1>');
                            the_archive_description('<div class="archive-description">', '</div>');
                            ?>
                        </header><!-- .page-header -->
                        <div class="article-container">
                            <?php
                            /* Start the Loop */
                            while (have_posts()) :
                                the_post();

                                /*
                                 * Include the Post-Type-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                 */
                                get_template_part('template-parts/blog/blog-layout', get_post_type());

                            endwhile;
                            ?>
                        </div>
                        <?php

                        the_posts_navigation();

                    else :

                        get_template_part('template-parts/content', 'none');

                    endif;
                    ?>

                </main><!-- #main -->

                <?php
                get_sidebar();
                ?>
            </div>
        </div>
    </div>
<?php
get_footer();

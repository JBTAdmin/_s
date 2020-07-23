<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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

                    <?php
                    while (have_posts()) :
                        the_post();

                        get_template_part('template-parts/content', 'page');

                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;

                    endwhile; // End of the loop.
                    ?>

                </main><!-- #main -->
                <?php
                get_sidebar();
                ?>
            </div>
        </div>
    </div> <!-- #container -->
<?php
get_footer();
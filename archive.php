<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aaurora
 */

get_header();

$sidebar_page_class = '';
?>

    <div class="site-container">
        <div class="wrap">
            <div class="main-container">
				<?php
				aaurora_left_sidebar();
				aaurora_content_before();
				?>
                <main id="primary" class="site-main primary-content <?php echo esc_attr( $sidebar_page_class ); ?>">
					<?php aaurora_entry_content() ?>
                </main><!-- #main -->
				<?php
				aaurora_content_after();
				aaurora_right_sidebar();
				?>
            </div>
        </div>
    </div>
<?php
get_sidebar( 'alt' );
get_footer();

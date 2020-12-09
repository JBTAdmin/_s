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
 * @package aaurora
 * @since 1.0
 */

get_header();

$sidebar_page_class = '';

?>

	<div class="site-container">
		<div class="wrap">
			<div class="main-container">

				<?php aaurora_main_content_before(); ?>

				<main id="primary" class="site-main primary-content <?php echo esc_attr( $sidebar_page_class ); ?>">
					<?php aaurora_entry_content(); ?>
				</main><!-- #main -->

				<?php aaurora_main_content_after(); ?>

			</div>
		</div>
	</div>
<?php
get_sidebar( 'alt' );
get_footer();

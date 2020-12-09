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

	<div class="site-container">
		<div class="wrap">
			<div class="main-container">

				<?php aaurora_main_content_before(); ?>

				<main id="primary" class="site-main primary-content <?php echo esc_attr( $sidebar_page_class ); ?>">

					<?php
					do_action( 'aaurora_before_singular' );

					do_action( 'aaurora_content_singular' );

					do_action( 'aaurora_after_singular' );
					?>

				</main><!-- #content .site-content -->

				<?php aaurora_main_content_after(); ?>

			</div><!-- #primary .content-area -->

		</div><!-- END .si-container -->
	</div>
<?php
get_footer();

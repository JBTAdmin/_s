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
 * @package aaurora
 */

get_header();

?>
	<div class="site-container">
		<div class="wrap">
			<div class="main-container">
				<?php
				get_sidebar( 'left' );
				?>
				<main id="primary" class="site-main primary-content">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div>
		</div>
	</div> <!-- #container -->
<?php
get_sidebar( 'alt' );
get_footer();

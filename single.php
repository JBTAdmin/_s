<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/single/single-layout', get_post_type() );

						get_template_part( 'template-parts/author-description' );
						
						get_template_part( 'template-parts/post-navigation' );
						
						
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->

				<?php
				aaurora_content_after();
				aaurora_right_sidebar();
				?>
			</div>
		</div>
	</div> <!-- #container -->
<?php
get_sidebar( 'alt' );
get_footer();

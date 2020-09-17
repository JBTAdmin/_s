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
 */

get_header();

$sidebar_page_class = '';
if ( is_active_sidebar( 'sidebar-1' ) ) {
	$sidebar_page_class = ' with-right-sidebar';
}

$sidebar_page_class = ' ' . get_theme_mod( 'sidebar_sticky', '0' );

$sidebar_page_class = ' sidebar_position_' . get_theme_mod( 'sidebar_blog', 'right' );
?>

	<div class="site-container">
		<div class="wrap">
			<div class="main-container">
				<?php
				get_sidebar('alt');
				get_sidebar('left');
				?>
				<main id="primary" class="site-main primary-content <?php echo esc_attr( $sidebar_page_class ); ?>">

					<?php
					if ( have_posts() ) :

						if ( is_home() && ! is_front_page() ) :
							?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
							</header>
							<?php
						endif;
						?>
					<div class="article-container">
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							get_template_part( 'template-parts/blog/blog-layout-2', get_post_type() );

						endwhile;
						?>
					</div>
						<?php
						post_nav();
						else :
							get_template_part( 'template-parts/content', 'none' );
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

<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package aaurora
 */

get_header();

$sidebar_page_class = '';
if ( is_active_sidebar( 'sidebar-1' ) ) {
	$sidebar_page_class = ' with-right-sidebar';
}

$sidebar_page_class = ' ' . get_theme_mod( 'sidebar_sticky', '0' );

$sidebar_page_class = ' sidebar_position_' . get_theme_mod( 'sidebar_search', 'right' );

?>

	<div class="site-container">
		<div class="wrap">
			<div class="main-container">
				<main id="primary" class="site-main primary-content <?php echo esc_attr( $sidebar_page_class ); ?>">

					<?php if ( have_posts() ) : ?>

						<header class="page-header">
							<h1 class="page-title">
								<?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Search Results for: %s', 'aaurora' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h1>
						</header><!-- .page-header -->

					<div class="article-container">
						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part( 'template-parts/content', 'search' );

						endwhile;
						?>
						</div>
						<?php
						numeric_posts_nav();

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

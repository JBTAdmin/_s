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
						?>
                        <div class="article-container">
                            <article id="post-<?php the_ID(); ?>" <?php post_class( 'post-article' ); ?>>
                                <div class="entry-header">
									<?php
									get_template_part( 'template-parts/single/category' );
									get_template_part( 'template-parts/single/heading' );
									get_template_part( 'template-parts/single/metadata' );
									?>
                                </div><!-- .entry-header -->
								<?php
								get_template_part( 'template-parts/single/thumbnail' );
								?>
                                <div class="entry-content">
									<?php
									the_content(
										sprintf(
											wp_kses(
											/* translators: %s: Name of current post. Only visible to screen readers */
												__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'aaurora' ),
												array(
													'span' => array(
														'class' => array(),
													),
												)
											),
											wp_kses_post( get_the_title() )
										)
									);
									echo 'page link before';
									wp_link_pages(
										array(
											'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'aaurora' ),
											'after'  => '</div>',
										)
									);
									echo 'page link after';
									?>
                                </div><!-- .entry-content -->
                            </article><!-- #post-<?php the_ID(); ?> -->
                        </div>
						
						<?php
						
						get_template_part( 'template-parts/single/tag' );
						get_template_part( 'template-parts/single/author' );
						get_template_part( 'template-parts/single/post-navigation' );
						
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

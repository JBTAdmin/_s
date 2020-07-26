<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package aaurora
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


    <?php aaurora_post_thumbnail(); ?>
	<div class="entry-header">

        <?php if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php
                aaurora_posted_on();
                aaurora_posted_by();
                ?>
            </div><!-- .entry-meta -->
        <?php endif; ?>


        <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	</div><!-- .entry-header -->



    <a href="<?php echo esc_url( get_permalink() ) ?>" class="btn btn-link brand-color-hover">
        <?php esc_html_e( 'Read More', 'aaurora' ); ?>
    </a>


<!--    <div class="entry-summary">-->
<!--		--><?php //the_excerpt(); ?>
<!--	</div><!-- .entry-summary -->-->

	<footer class="entry-footer">
		<?php aaurora_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

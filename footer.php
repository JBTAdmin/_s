<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aaurora
 */

$footer_widgets_count = 0;
if ( is_active_sidebar( 'footer-column-1' ) ) {
	$footer_widgets_count ++;
}
if ( is_active_sidebar( 'footer-column-2' ) ) {
	$footer_widgets_count ++;
}
if ( is_active_sidebar( 'footer-column-3' ) ) {
	$footer_widgets_count ++;
}
if ( is_active_sidebar( 'footer-column-4' ) ) {
	$footer_widgets_count ++;
}

$site_info_text_left   = 'Terms of Use / Privacy Policy / Sitemap / About Us / Contact Us / Partner Site iPowerUser';
$site_info_text_center = '';
$site_info_text_right  = 'crafted with by JBT Team / Copyright . JBT';

?>

<footer id="colophon" class="site-footer">
    <div class="wrap">
        <div class="main-footer">
			<?php if ( is_active_sidebar( 'footer-column-1' ) ) : ?>
                <div class="footer-sidebar-1-wrapper">
                    <div class="sidebar footer-sidebar-1-container">
                        <ul id="footer-sidebar-1">
							<?php dynamic_sidebar( 'footer-column-1' ); ?>
                        </ul>
                    </div>
                </div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-column-2' ) ) : ?>
                <div class="footer-sidebar-2-wrapper">
                    <div class="sidebar footer-sidebar-2-container">
                        <ul id="footer-sidebar-2">
							<?php dynamic_sidebar( 'footer-column-2' ); ?>
                        </ul>
                    </div>
                </div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-column-3' ) ) : ?>
                <div class="footer-sidebar-3-wrapper">
                    <div class="sidebar footer-sidebar-3-container">
                        <ul id="footer-sidebar-3">
							<?php dynamic_sidebar( 'footer-column-3' ); ?>
                        </ul>
                    </div>
                </div>
			<?php endif; ?>

			<?php if ( is_active_sidebar( 'footer-column-4' ) ) : ?>
                <div class="footer-sidebar-4-wrapper">
                    <div class="sidebar footer-sidebar-4-container">
                        <ul id="footer-sidebar-4">
							<?php dynamic_sidebar( 'footer-column-4' ); ?>
                        </ul>
                    </div>
                </div>
			<?php endif; ?>
        </div>
    </div>
    <div class="wrap-site-info">
        <div class="site-info">
            <div class="row">
                <div class="site-info-holder">
                    <div class="left">
						<?php echo wp_kses( $site_info_text_left, 'post' ); ?>
                    </div>
                    <div class="right">
						<?php echo wp_kses( $site_info_text_right, 'post' ); ?>
                    </div>
                    <div class="center">
						<?php echo wp_kses( $site_info_text_center, 'post' ); ?>
                    </div>
                </div>
            </div>
        </div><!-- .site-info -->
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

<?php
/**
 * Footer #3
 *
 * @package Gautam
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$site_info_text_left  = get_theme_mod( 'footer_copyright', 'Powered by <a href="https://www.wordpress.org">WordPress</a>' );
$site_info_text_right = 'Crafted with &#10084; by <a href=""></a> Team';

?>

<div id="colophon" class="site-footer-2-main">
	<div class="wrap">
		<div class="main-footer-2">
			<?php if ( has_nav_menu( 'footer-1' ) || is_customize_preview() ) : ?>
				<nav class="footer-navigation" aria-label="<?php esc_attr_e( 'Footer Menu', 'gautam' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-1',
							'menu_class'     => 'footer-menu footer-menu--1 list-reset',
							'depth'          => 1,
						)
					);
					?>
				</nav>
			<?php endif; ?>

		</div>
	</div>
</div>

<div class="site-footer-2-info">
	<div class="wrap">
		<div class="wrap-site-info">
			<div class="site-info">
				<div class="row">
					<div class="site-info-holder">
						<div class="left">
							<?php echo wp_kses( $site_info_text_left, 'post' ); ?>
						</div>
						&nbsp; • &nbsp;
						<div class="right">
							<?php echo wp_kses( $site_info_text_right, 'post' ); ?>
						</div>
					</div>
				</div>
			</div><!-- .site-info -->
		</div>
	</div>
</div>

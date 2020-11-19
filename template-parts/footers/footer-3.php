<?php
/**
 * Footer 3 Layout elements.
 *
 * @package Aaurora
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$site_info_text_left  = get_theme_mod( 'footer_copyright', '<a href="https://javabeginnerstutorial.com/disclaimer/">Terms of Use</a>  /  <a href="https://javabeginnerstutorial.com/privacy-policy-2/">Privacy Policy</a>  /  <a href="https://javabeginnerstutorial.com/sitemap_index.xml"> Sitemap </a>  /  <a href="https://javabeginnerstutorial.com/about-us/">About Us</a>  /  <a href="https://javabeginnerstutorial.com/contact-us/">Contact Us</a>  /  <b>Partner Site</b> <a href="https://ipoweruser.com/">iPowerUser</a>' );
$site_info_text_right = 'Crafted with  &#10084; <em>by</em> JBT Team  / Copyright . <a href="https://javabeginnerstutorial.com"> JBT</a>';

?>

<div id="colophon" class="site-footer-main">
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
			<?php if ( has_nav_menu( 'footer-1' ) ) : ?>
				<div class="footer-sidebar-2-wrapper">
					<div class="sidebar footer-sidebar-1-container">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer-1',
								'menu_class'     => 'footer-menu list-reset',
								'depth'          => 1,
							)
						);
						?>
					</div>
				</div>
			<?php endif; ?>
			<?php if ( has_nav_menu( 'footer-2' ) ) : ?>
				<div class="footer-sidebar-3-wrapper">
					<div class="sidebar footer-sidebar-2-container">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer-2',
								'menu_class'     => 'footer-menu list-reset',
								'depth'          => 1,
							)
						);
						?>
					</div>
				</div>
			<?php endif; ?>
			<?php if ( has_nav_menu( 'footer-3' ) ) : ?>
				<div class="footer-sidebar-4-wrapper">
					<div class="sidebar footer-sidebar-3-container">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'footer-3',
								'menu_class'     => 'footer-menu list-reset',
								'depth'          => 1,
							)
						);
						?>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<div class="site-footer-info">
	<div class="wrap">
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
					</div>
				</div>
			</div><!-- .site-info -->
		</div>
	</div>
</div>

<?php
/**
 * Footer #3
 *
 * @package Aaurora
 * @since 1.0
 */

?>

<footer id="colophon" class="site-footer site-footer--2 <?php echo esc_attr( $has_background ); ?>">

	<div class="site-footer__inner flex flex-column lg:flex-row lg:flex-wrap items-center align-center max-w-wide m-auto px">

		<?php if ( has_nav_menu( 'footer-1' ) || is_customize_preview() ) : ?>
			<nav class="footer-navigation text-sm" aria-label="<?php esc_attr_e( 'Footer Menu', 'aaurora' ); ?>">
				<?php
					wp_nav_menu(
						array(
							'theme_location' => 'aaurora-footer-1',
							'menu_class'     => 'footer-menu footer-menu--1 list-reset',
							'depth'          => 1,
						)
					);
				?>
			</nav>
		<?php endif; ?>


	</div>

</footer>

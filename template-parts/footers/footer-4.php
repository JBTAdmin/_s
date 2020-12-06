<?php
/**
 * Footer #4
 *
 * @package Go
 */

$has_social_icons = Go\has_social_icons();
$has_background   = Go\has_footer_background();
?>

<footer id="colophon" class="site-footer site-footer--4 <?php echo esc_attr( $has_background ); ?>">

	<div class="site-footer__inner m-auto max-w-wide px">

		<div class="flex flex-wrap lg:justify-start lg:flex-nowrap">

			<?php Go\display_site_branding( array( 'description' => false ) ); ?>

			<?php if ( has_nav_menu( 'aaurora-footer-1' ) || is_customize_preview() ) : ?>
				<nav class="footer-navigation footer-navigation--1 text-sm" aria-label="<?php esc_attr_e( 'Primary Footer Menu', 'aaurora' ); ?>">
					<span class="footer-navigation__title"><?php echo esc_html( wp_get_nav_menu_name( 'aaurora-footer-1' ) ); ?></span>

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

			<?php if ( has_nav_menu( 'aaurora-footer-2' ) || is_customize_preview() ) : ?>
				<nav class="footer-navigation footer-navigation--2 text-sm" aria-label="<?php esc_attr_e( 'Secondary Footer Menu', 'aaurora' ); ?>">
					<span class="footer-navigation__title"><?php echo esc_html( wp_get_nav_menu_name( 'aaurora-footer-2' ) ); ?></span>

					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'aaurora-footer-2',
								'menu_class'     => 'footer-menu footer-menu--2 list-reset',
								'depth'          => 1,
							)
						);
					?>
				</nav>
			<?php endif; ?>

			<?php if ( has_nav_menu( 'aaurora-footer-3' ) || is_customize_preview() ) : ?>
				<nav class="footer-navigation footer-navigation--3 text-sm" aria-label="<?php esc_attr_e( 'Tertiary Footer Menu', 'aaurora' ); ?>">
					<span class="footer-navigation__title"><?php echo esc_html( wp_get_nav_menu_name( 'aaurora-footer-3' ) ); ?></span>

					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'aaurora-footer-3',
								'menu_class'     => 'footer-menu footer-menu--3 list-reset',
								'depth'          => 1,
							)
						);
					?>
				</nav>
			<?php endif; ?>
		</div>
	</div>

</footer>

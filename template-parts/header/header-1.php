<div class="header-wrap">
	<div class="main-header">
		<div class="site-branding">
			<?php

			the_custom_logo();

			if ( ! get_theme_mod( 'custom_logo' ) ) :
				?>
				<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"
										   rel="home"><?php bloginfo( 'name' ); ?></a></div>
				<?php
				$aaurora_description = get_bloginfo( 'description', 'display' );
				if ( $aaurora_description || is_customize_preview() ) :
					?>
					<p class="site-description">
						<?php
						echo $aaurora_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped.
						?>
					</p>
					<?php
				endif;
			endif;
			?>
		</div><!-- .site-branding -->
		
		<nav id="site-navigation" class="main-navigation">
			
			<div class="menu-btn">
				<div class="menu-btn__burger"></div>
			</div>
			<div class="<?php echo esc_attr( 'aligned-menu-' . get_theme_mod( 'main_menu_align', 'right' ) ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'menu-1',
						'menu_id'         => 'primary-menu',
						'menu_class'      => 'header-menu',
						'container_class' => 'header-menu-container',
					)
				);
				?>
			</div>
			<?php if ( get_theme_mod( 'sidebar_listing', 'right' ) !== 'disable' ) : ?>
				<div class="hamburger-menu">
					<button class="toggle sidebar-open desktop-sidebar-toggle" data-toggle-target=".sidebar-modal" data-toggle-body-class="showing-sidebar-modal" aria-expanded="false">
									<span class="toggle-inner">
										<?php load_inline_svg( 'hamburger.svg' ); ?>
									</span>
					</button>
				</div>
			<?php endif; ?>
		</nav><!-- #site-navigation -->
	</div>
</div>

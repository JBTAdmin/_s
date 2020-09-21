<?php

$site_info_text_left   = get_theme_mod( 'footer_copyright', 'Powered by <a href="https://www.wordpress.org">WordPress</a>' );
$site_info_text_right  = 'Crafted with &#10084; by <a href="https:ipoweruser.com">iPoweruser</a> Team';

?>

<div id="colophon" class="site-footer-main">
    <div class="wrap">
        <div class="main-footer">

            <div class="footer-sidebar-1-wrapper">
                <div class="sidebar footer-sidebar-1-container">
            <?php aaurora_site_branding('left') ?>
                </div>
            </div>
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
			                    'theme_location' => 'footer-1',
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
			                    'theme_location' => 'footer-1',
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
<?php

$site_info_text_left  = get_theme_mod( 'footer_copyright', 'Powered by <a href="https://www.wordpress.org">WordPress</a>' );
$site_info_text_right = 'Crafted with &#10084; by <a href="https:ipoweruser.com">iPoweruser</a> Team';

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

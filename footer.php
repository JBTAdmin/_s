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


$site_info_text_left   = 'Terms of Use / Privacy Policy / Sitemap / About Us / Contact Us / Partner Site iPowerUser';
$site_info_text_center = '';
$site_info_text_right  = 'crafted with by JBT Team / Copyright . JBT';

?>

<div id="colophon" class="site-footer">
	<footer>
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
							<div class="center">
								<?php echo wp_kses( $site_info_text_center, 'post' ); ?>
							</div>
						</div>
					</div>
				</div><!-- .site-info -->
			</div>
		</div>
	</footer>
</div><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

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

?>

<footer class="site-footer">
	<?php
		get_template_part( 'template-parts/new/footers/footer', get_theme_mod( 'footer_layout_setting', '3' ), get_post_type() );
	?>
	
</footer>
<?php wp_footer(); ?>

<a class="top-link hide" href="" id="js-top">
	<?php load_inline_svg( 'corner-right-up.svg' ); ?>
	<span class="screen-reader-text">Back to top</span>
</a>
</body>
</html>

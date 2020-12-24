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

<?php 	get_template_part( 'template-parts/footers/call-to-action', get_post_type() ); ?>
<footer class="site-footer">
	<?php
		get_template_part( 'template-parts/footers/footer', get_theme_mod( 'footer_layout_setting', '3' ), get_post_type() );
	?>
</footer>
<?php wp_footer(); ?>


<?php
// todo need to check the difference between top and before???.
aaurora_footer_before();
aaurora_footer_top();
aaurora_footer_bottom();
aaurora_footer_after();
?>


</div>
</body>
</html>

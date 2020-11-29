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
		get_template_part( 'template-parts/footers/footer', get_theme_mod( 'footer_layout_setting', '3' ), get_post_type() );
	?>
</footer>
<?php wp_footer(); ?>


<?php aaurora_social_media( 'aaurora_social_follow', true ); ?>

<a class="top-link hide" href="" id="js-top">
	<?php load_inline_svg( 'arrow-up.svg' ); ?>
	<span class="screen-reader-text">Back to top</span>
</a>

<a class="aaurora-search" href="#" >
	<?php load_inline_svg( 'search.svg' ); ?>
	<span class="screen-reader-text">Search</span>
</a>

<div class="aaurora-share fixed visible">
	<a href="#">
		<?php load_inline_svg( 'share.svg' ); ?>
    </a>
    
    <div class="aaurora-share-inner">
        <a href="https://www.facebook.com/" target="blank">
	        <?php load_inline_svg( 'facebook.svg' ); ?>
        </a>

        <a href="https://twitter.com/" target="blank">
	        <?php load_inline_svg( 'twitter.svg' ); ?>
        </a>

        <a href="https://www.linkedin.com/in/mistrykaran/" target="blank">
	        <?php load_inline_svg( 'linkedin.svg' ); ?>
        </a>

        <a href="https://in.pinterest.com/mistrykaran91/" target="blank">
            <i class="fa fa-pinterest pinterest" aria-hidden="true"></i>
        </a>
    </div>
</div>

<div class="popup_search_modal">
	<div class="popup_modal_close_button">
		<?php load_inline_svg( 'close.svg' ); ?>
	</div>
	<div class="search_holder">
<!--        todo hard coding should be removed-->
		<form role="search" class="search search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="GET">
			<label> <span class="screen-reader-text">Search for</span>
				<input autocomplete="off" type="text" class="search-field" name="s" placeholder="Search..." value="">
			</label>
			<input type="submit" class="search search-submit" value="Submit">
		</form>
	</div>
</div>

</div>
</body>
</html>

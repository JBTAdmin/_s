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
	<?php load_inline_svg( 'corner-right-up.svg' ); ?>
	<span class="screen-reader-text">Back to top</span>
</a>

<a class="aaurora-search" href="#" >
	<?php load_inline_svg( 'search.svg' ); ?>
    <span class="screen-reader-text">Search</span>
</a>

<div class="aaurora-share" href="#">
    <a href="#">
	    <?php load_inline_svg( 'share.svg' ); ?>
    </a>
	
    <span class="screen-reader-text">Social Share</span>

    <div class="social-share-inner">
        <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&source=http://localhost:10013/#">
            <?php load_inline_svg( 'linkedin.svg' ); ?>
        </a>
    
        <a href="http://twitter.com/home?status=Currentlyreading <?php the_permalink(); ?>" title="Click to share this post on Twitter"">
            <?php load_inline_svg( 'twitter.svg' ); ?>
        </a>
        
        <a href="http://www.facebook.com/share.php?u=<url>" onclick="return fbs_click()" target="_blank">
            <?php load_inline_svg( 'facebook.svg' ); ?>
        </a>
    </div>
<!--    -->
<!--    <div class="social-share-inner">-->
<!--        <a class="facebook-share" href="#">-->
<!--	        --><?php //load_inline_svg( 'facebook.svg' ); ?>
<!--        </a>-->
<!--        <a class="twitter-share" href="#" >-->
<!--	        --><?php //load_inline_svg( 'twitter.svg' ); ?>
<!--        </a>-->
<!--        <a class="linkedin-share" href="#">-->
<!--	        --><?php //load_inline_svg( 'linkedin.svg' ); ?>
<!--        </a>-->
<!--    </div>-->
    
</div>

<div class="popup_search_modal">
    <div class="popup_modal_close_button">
        <?php load_inline_svg( 'close.svg' ); ?>
    </div>
    <div class="search_holder">
<!--        todo hard coding should be removed-->
        <form role="search" class="search search-form" action="https://javabeginnerstutorial.com/" method="GET">
            <label> <span class="screen-reader-text">Search for</span>
                <input autocomplete="off" type="text" class="search-field" name="s" placeholder="Search..." value="">
            </label>
            <button type="submit" class="search search-submit">
            </button>
        </form>
    </div>
</div>

</body>
</html>

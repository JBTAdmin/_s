<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package aaurora
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=PT+Sans&family=Noto+Serif:wght@400;700&family=Arbutus+Slab&display=swap"
          rel="stylesheet">
    <script src="/wp-content/themes/aaurora-master/js/main.js"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary">
        <?php esc_html_e('Skip to content', 'aaurora'); ?></a>

    <header id="masthead" class="site-header">
        <div class="wrap">
            <div class="main-header">
                <div class="site-branding">
                    <?php
                    the_custom_logo();
                    if (is_front_page() && is_home()) :
                        ?>
                        <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                  rel="home"><?php bloginfo('name'); ?></a></h1>
                    <?php
                    else :
                        ?>
                        <div class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                   rel="home"><?php bloginfo('name'); ?></a></div>
                    <?php
                    endif;
                    $aaurora_description = get_bloginfo('description', 'display');
                    if ($aaurora_description || is_customize_preview()) :
                        ?>
<!--				<p class="site-description">--><?php //echo $aaurora_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?><!--</p>-->
                    <?php endif; ?>
                </div><!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation">

                    <div class="menu-btn">
                        <div class="menu-btn__burger"></div>
                    </div>
            <!--			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">--><?php //esc_html_e( 'Primary Menu', 'aaurora' ); ?><!--</button>-->
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'menu-1',
                            'menu_id' => 'primary-menu',
                        )
                    );
                    ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>
    </header><!-- #masthead -->

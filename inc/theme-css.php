<?php
// **
// * Theme CSS cache generation
// */
//
// add_action( 'wp_enqueue_scripts', 'inhype_enqueue_dynamic_styles', '999' );
// add_action( 'admin_init', 'inhype_enqueue_editor_dynamic_styles', '999' );
//
//
// if(!function_exists('inhype_enqueue_dynamic_styles')):
// function inhype_enqueue_dynamic_styles( ) {
//
// Fonts configuration for editor
// $headers_font = inhype_get_fonts_settings('headers_font');
// $body_font = inhype_get_fonts_settings('body_font');
// $additional_font = inhype_get_fonts_settings('additional_font');
//
// require_once(ABSPATH . 'wp-admin/includes/file.php'); // required to use WP_Filesystem();
//
// WP_Filesystem();
//
// global $wp_filesystem;
//
//
// Customizer preview
// if(is_customize_preview()) {
// if ( function_exists( 'is_multisite' ) && is_multisite() ){
// $cache_file_name = 'preview-cache-'.wp_get_theme()->get('TextDomain').'-b' . get_current_blog_id();
// } else {
// $cache_file_name = 'preview-cache-'.wp_get_theme()->get('TextDomain');
// }
// }
//
// $wp_upload_dir = wp_upload_dir();
//
// Frontend CSS cache files
// $css_cache_file = $wp_upload_dir['basedir'].'/'.$cache_file_name.'.css';
// $css_cache_file_url = $wp_upload_dir['baseurl'].'/'.$cache_file_name.'.css';
//
// $themeoptions_saved_date = get_option( 'themeoptions_saved_date', 1 );
// $cache_saved_date = get_option( 'cache_css_saved_date', 0 );
//
// Check if frontend cache files exists
// if( file_exists( $css_cache_file ) ) {
// $cache_status = 'exist';
//
// if($themeoptions_saved_date > $cache_saved_date) {
// $cache_status = 'no-exist';
// }
//
// } else {
// $cache_status = 'no-exist';
// }
//
// if ( defined('DEMO_MODE') ) {
// $cache_status = 'no-exist';
// }
//
// if(is_customize_preview()) {
// $cache_status = 'no-exist';
// }
//
// FS_CHMOD_FILE required by WordPress guideliness - https://codex.wordpress.org/Filesystem_API#Using_the_WP_Filesystem_Base_Class
// if ( defined( 'FS_CHMOD_FILE' ) ) {
// $chmod_file = FS_CHMOD_FILE;
// } else {
// $chmod_file = ( 0644 & ~ umask() );
// }
//
// Frontend styles
// if ( $cache_status == 'exist' ) {
//
// wp_register_style( $cache_file_name, $css_cache_file_url, array(), $cache_saved_date);
// wp_enqueue_style( $cache_file_name );
//
// } else {
//
// $out = '/* Cache file created at '.date('Y-m-d H:i:s').' */';
//
// $generated = microtime(true);
//
// $out .= inhype_get_css();
//
// $out = str_replace( array( "\t", "
// ", "\n", "  ", "   ", ), array( "", "", " ", " ", " ", ), $out );
//
// $out .= '/* CSS Generator Execution Time: ' . floatval( ( microtime(true) - $generated ) ) . ' seconds */';
//
// if ( $wp_filesystem->put_contents( $css_cache_file, $out, $chmod_file) ) {
//
// wp_register_style( $cache_file_name, $css_cache_file_url, array(), $cache_saved_date);
// wp_enqueue_style( $cache_file_name );
//
// Update save options date
// update_option( 'cache_css_saved_date', microtime(true), 'no' );
// }
//
// }
// }
// endif;
//
// if(!function_exists('inhype_get_css')):
// function inhype_get_css() {
//
// Fonts configuration for frontend
// $headers_font = inhype_get_fonts_settings('headers_font');
// $body_font = inhype_get_fonts_settings('body_font');
// $additional_font = inhype_get_fonts_settings('additional_font');
//
// ===
// ob_start();
//    ?>
<!--    -->
<?php
// THEME OPTIONS DEFAULTS FOR CSS
//
// Header height
// $header_height = get_theme_mod('header_height', 140);
//
// Logo width
// $logo_width = get_theme_mod( 'logo_width', 162 );
//
// Slider height
// $slider_height = get_theme_mod('slider_height', 420);
//
// Main Menu paddings
// $mainmenu_paddings = get_theme_mod('mainmenu_paddings', '10px');
//
// Top Menu paddings
// $topmenu_paddings = get_theme_mod('topmenu_paddings', '10px');
//
// Thumbs height proportion
// $thumb_height_proportion = get_theme_mod('thumb_height_proportion', 64.8648);
//
//
//
?>
<!--    -->
<?php
// Retina logo
//
?>
<!--    header .logo-link img {-->
<!--        width: --><?php // echo esc_attr($logo_width); ?><!--px;-->
<!--    }-->
<!--    .inhype-blog-posts-slider .inhype-post {-->
<!--        height: --><?php // echo esc_attr($slider_height); ?><!--px;-->
<!--    }-->
<!--    .inhype-blog-posts-slider {-->
<!--        max-height: --><?php // echo esc_attr($slider_height); ?><!--px;-->
<!--    }-->
<!---->
<!---->
<!--    /**-->
<!--    * Theme Google Fonts-->
<!--    **/-->
<!--    -->
<?php
// Logo text font
// if ( get_theme_mod( 'logo_text', true ) == true && get_theme_mod( 'logo_text_title', '' ) !== '' ) {
//
// $logo_text_font = get_theme_mod( 'logo_text_font', array(
// 'font-family'    => 'Cormorant Garamond',
// 'font-size'    => '62px',
// 'variant'        => 'regular',
// 'color'          => '#000000',
// ));
//
//
?>
<!--        header .logo-link.logo-text {-->
<!--            font-family: '--><?php // echo esc_attr($logo_text_font['font-family']); ?><!--';-->
<!--            --><?php // echo esc_attr(inhype_get_font_style_css($logo_text_font['variant'])); ?>
<!--            font-size: --><?php // echo esc_attr($logo_text_font['font-size']); ?><!--;-->
<!--            color: --><?php // echo esc_attr($logo_text_font['color']); ?><!--;-->
<!--        }-->
<!--        -->
<?php
// }
//
//
?>
<!--   -->
<!--    -->
<?php
//
//
// Demo settings
// if ( defined('DEMO_MODE') && isset($_GET['color_skin']) ) {
// $color_skin = $_GET['color_skin'];
// }
//
//
// Default skin
// if($color_skin == 'default') {
//
// $color_main = '#2568ef';
// $color_mainmenu_link_hover = $color_main;
// $color_mainmenu_submenu_link_hover = $color_main;
//
// }
//
?>
<!--    -->
<?php
// Body background
// $body_background = get_theme_mod( 'body_background', false );
//
// if(empty($body_background['background-color'])) {
// $body_background['background-color'] = '#ffffff';
// }
//
// if(!empty($body_background['background-image'])):
?>
<!--    body {-->
<!--        -->
<?php
// echo 'background-image: url('.esc_url($body_background['background-image']).');';
// echo 'background-repeat: '.$body_background['background-repeat'].';';
// echo 'background-position: '.$body_background['background-position'].';';
// echo 'background-size: '.$body_background['background-size'].';';
// echo 'background-attachment: '.$body_background['background-attachment'].';';
//
?>
<!--    }-->
<!--    --><?php // endif; ?>
<!---->
<!--    :root {-->
<!--        --color-body-bg: --><?php // echo esc_html($body_background['background-color']); ?><!--;-->
<!--        --color-body-text: --><?php // echo esc_html($color_text); ?><!--;-->
<!--        --color-theme: --><?php // echo esc_html($color_main); ?><!--;-->
<!--        --color-theme-alt: --><?php // echo esc_html($color_main_alt); ?><!--;-->
<!--        --color-button: --><?php // echo esc_html($color_button); ?><!--;-->
<!--        --color-button-hover: --><?php // echo esc_html($color_button_hover); ?><!--;-->
<!--        --color-mainmenu-dark-bg: --><?php // echo esc_html($color_mainmenu_dark_bg); ?><!--;-->
<!--        --color-mainmenu-dark-bg-grad: --><?php // echo esc_html($color_mainmenu_dark_bg_grad); ?><!--;-->
<!--        --color-mainmenu-link: --><?php // echo esc_html($color_mainmenu_link); ?><!--;-->
<!--        --color-mainmenu-link-hover: --><?php // echo esc_html($color_mainmenu_link_hover); ?><!--;-->
<!--        --color-mainmenu-submenu-bg: --><?php // echo esc_html($color_mainmenu_submenu_bg); ?><!--;-->
<!--        --color-mainmenu-submenu-link: --><?php // echo esc_html($color_mainmenu_submenu_link); ?><!--;-->
<!--        --color-mainmenu-submenu-link-hover: --><?php // echo esc_html($color_mainmenu_submenu_link_hover); ?><!--;-->
<!--        --color-bg-topmenu: --><?php // echo esc_html($color_topmenu_bg); ?><!--;-->
<!--        --color-bg-topmenu-dark-bg: --><?php // echo esc_html($color_topmenu_dark_bg); ?><!--;-->
<!--        --color-bg-footer: --><?php // echo esc_html($color_footer_bg); ?><!--;-->
<!--        --color-bg-footer-dark: --><?php // echo esc_html($color_footer_dark_bg); ?><!--;-->
<!--        --color-reading-progress-bar: --><?php // echo esc_html($color_post_reading_progressbar); ?><!--;-->
<!--    }-->
<!---->
<!--    -->
<?php
//
// $out = ob_get_clean();
//
// $out .= ' /*' . date("Y-m-d H:i") . '*/';
// * RETURN */
// return $out;
// }
// endif;

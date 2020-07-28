<?php

/** viveka CHange this**/

//// Update options cache on customizer save
//if(!function_exists('aaurora_update_options_cache')):
//    function aaurora_update_options_cache() {
//        $option_name = 'themeoptions_saved_date';
//
//        $new_value = microtime(true) ;
//
//        if ( get_option( $option_name ) !== false ) {
//
//            // The option already exists, so we just update it.
//            update_option( $option_name, $new_value );
//
//        } else {
//
//            // The option hasn't been added yet. We'll add it with $autoload set to 'no'.
//            $deprecated = null;
//            $autoload = 'no';
//            add_option( $option_name, $new_value, $deprecated, $autoload );
//        }
//    }
//endif;
//add_action( 'customize_save_after', 'aaurora_update_options_cache');
//
//// Change default Customizer options, add new logo option
//if(!function_exists('aaurora_theme_customize_register')):
//    function aaurora_theme_customize_register( $wp_customize ) {
//        $wp_customize->remove_section( 'colors' );
//
//        $wp_customize->get_section('header_image')->title = esc_html__( 'Logo', 'aaurora' );
//
//        $wp_customize->get_section('title_tagline')->title = esc_html__( 'Site Title and Favicon', 'aaurora' );
//
//        $wp_customize->add_setting( 'aaurora_header_transparent_logo' , array(
//            array ( 'default' => '',
//                'sanitize_callback' => 'esc_url_raw'
//            ),
//            'transport'   => 'refresh',
//        ) );
//
//        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aaurora_header_transparent_logo', array(
//            'label'    => esc_html__( 'Logo for Transparent Header (Light logo)', 'aaurora' ),
//            'section'  => 'header_image',
//            'settings' => 'aaurora_header_transparent_logo',
//        ) ) );
//
//        // Move header image section to theme settings
//        $wp_customize->get_section( 'header_image' )->panel = 'theme_settings_panel';
//        $wp_customize->get_section( 'header_image' )->priority = 20;
//    }
//endif;
//add_action( 'customize_register', 'aaurora_theme_customize_register' );


// Create theme options
Kirki::add_config( 'aaurora_theme_options', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
) );

// Create main panel
Kirki::add_panel( 'theme_settings_panel', array(
    'title'       => esc_attr__( 'Theme Settings', 'aaurora' ),
    'description' => esc_attr__( 'Manage theme settings', 'aaurora' ),
) );


// SECTION: General
Kirki::add_section( 'general', array(
    'title'          => esc_attr__( 'General', 'aaurora' ),
    'description'    => '',
    'panel'          => 'theme_settings_panel',
    'priority'       => 10,
) );


Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'button_backtotop',
    'label'       => esc_attr__( 'Scroll to top button', 'aaurora' ),
    'description' => esc_attr__( 'Show scroll to top button after page scroll.', 'aaurora' ),
    'section'     => 'general',
    'default'     => '1',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'background',
    'settings'    => 'body_background',
    'label'       => esc_attr__( 'Body background', 'aaurora' ),
    'description' => esc_attr__( 'Change your site main background settings.', 'aaurora' ),
    'section'     => 'general',
    'default'     => array(
        'background-color'      => '#ffffff',
        'background-image'      => '',
        'background-repeat'     => 'repeat',
        'background-position'   => 'center center',
        'background-size'       => 'cover',
        'background-attachment' => 'fixed',
    ),
	'transport'  => 'auto',
    'output' => array(
	    array(
		    'element'  => 'body'
	    ),
    ),
) );


Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'logo_text',
    'label'       => esc_attr__( 'Text logo', 'aaurora' ),
    'description' => esc_attr__( 'Use text logo instead of image.', 'aaurora' ),
    'section'     => 'header_image',
    'default'     => '0',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'     => 'text',
    'settings' => 'logo_text_title',
    'label'    => esc_attr__( 'Text logo title', 'aaurora' ),
    'section'  => 'header_image',
    'default'     => '',
    'description'  => esc_attr__( 'Add your site text logo. HTML tags allowed.', 'aaurora' ),
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'typography',
    'settings'    => 'logo_text_font',
    'label'       => esc_attr__( 'Text logo font', 'aaurora' ),
    'section'     => 'header_image',
    'default'     => array(
        'font-family'    => 'Cormorant Garamond',
        'font-size'    => '62px',
        'variant'        => 'regular',
        'color'          => '#000000',
    ),
    'output'      => ''
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'header_tagline',
    'label'       => esc_attr__( 'Header tagline', 'aaurora' ),
    'description' => esc_attr__( 'Show text tagline in header.', 'aaurora' ),
    'section'     => 'header_image',
    'default'     => '0',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'header_tagline_style',
    'label'       => esc_attr__( 'Header tagline text style', 'aaurora' ),
    'section'     => 'header_image',
    'default'     => 'regular',
    'choices'     => array(
        'regular'   => esc_attr__( 'Regular', 'aaurora' ),
        'uppercase' => esc_attr__( 'UPPERCASE', 'aaurora' ),
    ),
    'description'  => esc_attr__( 'Change header tagline text transform style.', 'aaurora' ),
) );
// END SECTION: Logo settings (default WordPress modified)

// SECTION: Header
Kirki::add_section( 'header', array(
    'title'          => esc_attr__( 'Header', 'aaurora' ),
    'description'    => '',
    'panel'          => 'theme_settings_panel',
    'priority'       => 30,
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'select',
    'settings'    => 'header_layout',
    'label'       => esc_html__( 'Header layout', 'aaurora' ),
    'section'     => 'header',
    'default'     => 'menu-in-header',
    'multiple'    => 0,
    'choices'     => array(
        'menu-in-header'   => esc_attr__( '1. Menu in header', 'aaurora' ),
        'menu-below-header-left'   => esc_attr__( '2. Menu below header, Left logo', 'aaurora' ),
        'menu-below-header-left-border'   => esc_attr__( '3. Menu below header, Left logo, Border', 'aaurora' ),
        'menu-below-header-left-border-fullwidth'   => esc_attr__( '4. Menu below header, Left logo, Fullwidth Border', 'aaurora' ),
        'menu-below-header-center'   => esc_attr__( '5. Menu below header, Center logo', 'aaurora' ),
        'menu-below-header-center-border'   => esc_attr__( '6. Menu below header, Center logo, Border', 'aaurora' ),
        'menu-below-header-center-border-fullwidth'   => esc_attr__( '7. Menu below header, Center logo, Fullwidth border', 'aaurora' ),
    ),
    'description' => esc_attr__( 'This option completely change site header layout and style.', 'aaurora' ),
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'number',
    'settings'    => 'header_height',
    'label'       => esc_attr__( 'Header height (px)', 'aaurora' ),
    'description' => esc_attr__( 'For example: 140', 'aaurora' ),
    'section'     => 'header',
    'default'     => '140',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'header_sticky',
    'label'       => esc_attr__( 'Sticky header', 'aaurora' ),
    'description' => esc_attr__( 'Main Menu fixed to top on scroll.', 'aaurora' ),
    'section'     => 'header',
    'default'     => '1',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'search_position',
    'label'       => esc_attr__( 'Search field', 'aaurora' ),
    'section'     => 'header',
    'default'     => 'header',
    'choices'     => array(
        'header' => esc_attr__( 'Header', 'aaurora' ),
        'fullscreen' => esc_attr__( 'Fullscreen', 'aaurora' ),
        'disable' => esc_attr__( 'Disable', 'aaurora' ),
    ),
    'description'  => esc_attr__( 'Search field type.', 'aaurora' ),
) );


Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'header_center_custom',
    'label'       => esc_attr__( 'Header center custom content', 'aaurora' ),
    'description' => esc_attr__( 'Enable to display custom content (e.g. banner) in header center.', 'aaurora' ),
    'section'     => 'header',
    'default'     => '0',
    'active_callback'  => array(
        array(
            'setting'  => 'header_layout',
            'operator' => 'in',
            'value'    => array('menu-below-header-left', 'menu-below-header-left-border', 'menu-below-header-left-border-fullwidth'),
        ),
    )
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'editor',
    'settings'     => 'header_center_custom_content',
    'label'       => esc_attr__( 'Header center custom content HTML', 'aaurora' ),
    'description' => esc_attr__( 'HTML and shortcodes supported.', 'aaurora' ),
    'section'     => 'header',
    'default'     => '',
    'active_callback'  => array(
        array(
            'setting'  => 'header_layout',
            'operator' => 'in',
            'value'    => array('menu-below-header', 'menu-below-header-border'),
        ),
    )
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'header_topline',
    'label'       => esc_attr__( 'Top line', 'aaurora' ),
    'description' => esc_attr__( 'Enable to display header topline slider with trending posts.', 'aaurora' ),
    'section'     => 'header',
    'default'     => '0',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'editor',
    'settings'     => 'header_topline_content',
    'label'       => esc_attr__( 'Top line text', 'aaurora' ),
    'description' => esc_attr__( 'Add top line text here. HTML and shortcodes supported.', 'aaurora' ),
    'section'     => 'header',
    'default'     => '',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'color',
    'settings'    => 'header_topline_bgcolor_1',
    'label'       => esc_attr__( 'Top line background color', 'aaurora' ),
    'description' => esc_attr__( 'First background color for ', 'aaurora' ),
    'section'     => 'header',
    'default'     => '#2568ef',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'background',
    'settings'    => 'header_topline_background',
    'label'       => esc_attr__( 'Topline background image', 'aaurora' ),
    'description' => esc_attr__( 'Change your topline background image settings.', 'aaurora' ),
    'section'     => 'header',
    'default'     => array(
        'background-color'      => '#ffffff',
        'background-image'      => '',
        'background-repeat'     => 'repeat',
        'background-position'   => 'center center',
        'background-size'       => 'cover',
        'background-attachment' => 'fixed',
    ),
) );

// END SECTION: Header



// SECTION: Main menu
Kirki::add_section( 'mainmenu', array(
    'title'          => esc_attr__( 'Main menu', 'aaurora' ),
    'description'    => '',
    'panel'          => 'theme_settings_panel',
    'priority'       => 50,
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'mainmenu_style',
    'label'       => esc_attr__( 'Main menu below header style', 'aaurora' ),
    'section'     => 'mainmenu',
    'default'     => 'light',
    'choices'     => array(
        'light'   => esc_attr__( 'Light', 'aaurora' ),
        'dark' => esc_attr__( 'Dark', 'aaurora' ),
    ),
    'description'  => esc_attr__( 'You can change dark menu background and menu links colors in "Theme settings > Colors" section.', 'aaurora'),
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'mainmenu_align',
    'label'       => esc_attr__( 'Main menu align', 'aaurora' ),
    'section'     => 'mainmenu',
    'default'     => 'left',
    'choices'     => array(
        'left'   => esc_attr__( 'Left', 'aaurora' ),
        'center' => esc_attr__( 'Center', 'aaurora' ),
        'right' => esc_attr__( 'Right', 'aaurora' ),
    ),
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'mainmenu_font_decoration',
    'label'       => esc_attr__( 'Main menu font decoration', 'aaurora' ),
    'section'     => 'mainmenu',
    'default'     => 'none',
    'choices'     => array(
        'uppercase'   => esc_attr__( 'UPPERCASE', 'aaurora' ),
        'italic' => esc_attr__( 'Italic', 'aaurora' ),
        'none' => esc_attr__( 'None', 'aaurora' ),
    ),
    'description'  => '',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'mainmenu_font_weight',
    'label'       => esc_attr__( 'Main menu font weight', 'aaurora' ),
    'section'     => 'mainmenu',
    'default'     => 'regularfont',
    'choices'     => array(
        'regularfont'   => esc_attr__( 'Regular', 'aaurora' ),
        'boldfont' => esc_attr__( 'Bold', 'aaurora' ),
    ),
    'description'  => '',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'mainmenu_arrow_style',
    'label'       => esc_attr__( 'Main menu dropdown arrows', 'aaurora' ),
    'section'     => 'mainmenu',
    'default'     => 'noarrow',
    'choices'     => array(
        'rightarrow'   => esc_attr__( 'Right >', 'aaurora' ),
        'downarrow' => esc_attr__( 'Down V', 'aaurora' ),
        'noarrow' => esc_attr__( 'Disable', 'aaurora' ),
    ),
    'description'  => '',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'dimension',
    'settings'    => 'mainmenu_paddings',
    'label'       => esc_attr__( 'Main menu top/bottom paddings (px)', 'aaurora' ),
    'description' => esc_attr__( 'Adjust this value to change menu height. Default: 10px', 'aaurora' ),
    'section'     => 'mainmenu',
    'default'     => '10px',
) );

// END SECTION: Main menu

// SECTION: Footer
Kirki::add_section( 'footer', array(
    'title'          => esc_attr__( 'Footer', 'aaurora' ),
    'description'    => '',
    'panel'          => 'theme_settings_panel',
    'priority'       => 60,
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'footer_style',
    'label'       => esc_attr__( 'Footer style', 'aaurora' ),
    'section'     => 'footer',
    'default'     => 'white',
    'choices'     => array(
        'white'   => esc_attr__( 'Light', 'aaurora' ),
        'black' => esc_attr__( 'Dark', 'aaurora' ),
    ),
    'description'  => esc_attr__( 'Change colors styling for footer.', 'aaurora' ),
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'footer_sidebar_homepage',
    'label'       => esc_attr__( 'Footer sidebar only on homepage', 'aaurora' ),
    'description' => esc_attr__( 'Disable this option to show footer sidebar on all site pages.', 'aaurora' ),
    'section'     => 'footer',
    'default'     => '1',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'editor',
    'settings'     => 'footer_copyright',
    'label'       => esc_attr__( 'Footer copyright text', 'aaurora' ),
    'description' => esc_attr__( 'Change your footer copyright text.', 'aaurora' ),
    'section'     => 'footer',
    'default'     => '',
) );


Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'footer_htmlblock',
    'label'       => esc_attr__( 'Footer HTML block', 'aaurora' ),
    'description' => esc_attr__( 'Fullwidth block with any HTML and background image in footer.', 'aaurora' ),
    'section'     => 'footer',
    'default'     => '0',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'footer_htmlblock_homepage',
    'label'       => esc_attr__( 'Footer HTML block only on homepage', 'aaurora' ),
    'description' => esc_attr__( 'Disable this option to show footer HTML block on all site pages.', 'aaurora' ),
    'section'     => 'footer',
    'default'     => '1',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'background',
    'settings'    => 'footer_htmlblock_background',
    'label'       => esc_attr__( 'Footer HTML block background', 'aaurora' ),
    'description' => esc_attr__( 'Upload your footer HTML Block background image (1600x1200px JPG recommended). Remove image to remove background.', 'aaurora' ),
    'section'     => 'footer',
    'default'     => array(
        'background-color'      => '#ffffff',
        'background-image'      => '',
        'background-repeat'     => 'no-repeat',
        'background-position'   => 'center center',
        'background-size'       => 'cover',
        'background-attachment' => 'fixed',
    ),
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'color',
    'settings'    => 'footer_htmlblock_color_text',
    'label'       => esc_attr__( 'Footer HTML block text color', 'aaurora' ),
    'description' => esc_attr__( 'Change text color in footer HTML block', 'aaurora' ),
    'section'     => 'footer',
    'default'     => '#ffffff',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'editor',
    'settings'     => 'footer_htmlblock_html',
    'label'       => esc_attr__( 'Footer HTML block content', 'aaurora' ),
    'description' => esc_attr__( 'You can use any HTML and shortcodes here to display any content in your footer block.', 'aaurora' ),
    'section'     => 'footer',
    'default'     => '',
) );
// END SECTION: Footer

// SECTION: Blog
Kirki::add_section( 'blog', array(
    'title'          => esc_attr__( 'Blog: Listing', 'aaurora' ),
    'description'    => esc_attr__( 'This settings affect your blog list display (homepage, archive, search).', 'aaurora' ),
    'panel'          => 'theme_settings_panel',
    'priority'       => 70,
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'select',
    'settings'    => 'blog_layout',
    'label'       => esc_html__( 'Blog layout', 'aaurora' ),
    'section'     => 'blog',
    'default'     => 'standard',
    'multiple'    => 0,
    'choices'     => array(

        'large-grid'   => esc_attr__( 'First large then grid', 'aaurora' ),
        'overlay-grid'   => esc_attr__( 'First large overlay then grid', 'aaurora' ),
        'large-list'   => esc_attr__( 'First large then list', 'aaurora' ),
        'overlay-list'   => esc_attr__( 'First large overlay then list', 'aaurora' ),
        'mixed-overlays'   => esc_attr__( 'Mixed overlays', 'aaurora' ),
        'grid'   => esc_attr__( 'Grid', 'aaurora' ),
        'list'   => esc_attr__( 'List', 'aaurora' ),
        'standard'   => esc_attr__( 'Classic', 'aaurora' ),
        'overlay'   => esc_attr__( 'Grid overlay', 'aaurora' ),
        'mixed-large-grid'   => esc_attr__( 'Mixed large and grid', 'aaurora' ),
        'masonry'   => esc_attr__( 'Masonry', 'aaurora' ),

    ),
    'description' => esc_attr__( 'This option completely change blog listing layout and posts display.', 'aaurora' ),
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'select',
    'settings'    => 'blog_posts_excerpt',
    'label'       => esc_html__( 'Blog posts short content display', 'aaurora' ),
    'section'     => 'blog',
    'default'     => 'excerpt',
    'multiple'    => 0,
    'choices'     => array(
        'content'   => esc_attr__('Full content (You will add <!--more--> tag manually)', 'aaurora'),
        'excerpt' => esc_attr__('Excerpt (Auto crop by words)', 'aaurora'),
        'none'  => esc_attr__('Disable short content and Continue reading button', 'aaurora'),
    ),
    'description' => wp_kses_post(__( 'Change short post content display in blog listing.<br/><a href="https://en.support.wordpress.com/more-tag/" target="_blank">Read more</a> about &#x3C;!--more--&#x3E; tag.', 'aaurora' )),
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'number',
    'settings'    => 'blog_posts_excerpt_limit',
    'label'       => esc_attr__( 'Post excerpt length (words)', 'aaurora' ),
    'description' => esc_attr__( 'Used by WordPress for post shortening. Default: 35', 'aaurora' ),
    'section'     => 'blog',
    'default'     => '22',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'blog_posts_date_hide',
    'label'       => esc_attr__( 'Hide posts dates', 'aaurora' ),
    'description' => '',
    'section'     => 'blog',
    'default'     => '0',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'blog_posts_author',
    'label'       => esc_attr__( 'Author name ("by author")', 'aaurora' ),
    'description' => '',
    'section'     => 'blog',
    'default'     => '0',
) );

$blog_exclude_categories = Kirki_Helper::get_terms( 'category' );

// END SECTION: Blog

// SECTION: Blog Single Post
Kirki::add_section( 'blog_post', array(
    'title'          => esc_attr__( 'Blog: Single post', 'aaurora' ),
    'description'    => esc_attr__( 'This settings affect your blog single post display.', 'aaurora' ),
    'panel'          => 'theme_settings_panel',
    'priority'       => 80,
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'select',
    'settings'    => 'blog_post_header_image_type',
    'label'       => esc_attr__( 'Blog post header image', 'aaurora' ),
    'section'     => 'blog_post',
    'default'     => 'header',
    'choices'     => array(
        'header'   => esc_attr__( 'Post header image', 'aaurora' ),
        'thumb'   => esc_attr__( 'Post featured image', 'aaurora' ),
    ),
    'active_callback'  => array(
        array(
            'setting'  => 'blog_post_header_layout',
            'operator' => 'in',
            'value'    => array('inheader', 'inheader2'),
        ),
    ),
    'description'  => esc_attr__( 'Use this if you want to display post featured image as post header image without uploading new images for your existing posts.', 'aaurora' ),
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'blog_post_header_width',
    'label'       => esc_attr__( 'Blog post header width', 'aaurora' ),
    'section'     => 'blog_post',
    'default'     => 'boxed',
    'choices'     => array(
        'fullwidth'   => esc_attr__( 'Fullwidth', 'aaurora' ),
        'boxed' => esc_attr__( 'Boxed', 'aaurora' ),

    ),
    'active_callback'  => array(
        array(
            'setting'  => 'blog_post_header_layout',
            'operator' => 'in',
            'value'    => array('inheader', 'inheader2', 'inheader3'),
        ),
    )
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'blog_post_transparent_header',
    'label'       => esc_attr__( 'Transparent header', 'aaurora' ),
    'description' => esc_attr__( 'This feature make your header transparent and will show it above post header image. You need to upload light logo version to use this feature and assign header image for posts where you want to see this feature. Transparent header for post available only with "In header - Style 1" blog post header layout option.', 'aaurora' ),
    'section'     => 'blog_post',
    'default'     => '0',
    'active_callback'  => array(
        array(
            'setting'  => 'blog_post_header_layout',
            'operator' => '==',
            'value'    => 'inheader',
        ),
    )
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'blog_post_author',
    'label'       => esc_attr__( 'Author details', 'aaurora' ),
    'description' => esc_attr__( 'Show post author details with avatar after post content. You need to fill your post author biography details and social links in "Users" section in WordPress.', 'aaurora' ),
    'section'     => 'blog_post',
    'default'     => '1',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'blog_post_featured_image',
    'label'       => esc_attr__( 'Featured image', 'aaurora' ),
    'description' => esc_attr__( 'Disable to hide post featured image on single post page (Globally on all site).', 'aaurora' ),
    'section'     => 'blog_post',
    'default'     => '1',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'blog_post_reading_progress',
    'label'       => esc_attr__( 'Reading progress bar', 'aaurora' ),
    'description' => esc_attr__( 'Show reading progress bar in fixed header.', 'aaurora' ),
    'section'     => 'blog_post',
    'default'     => '0',
) );


Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'blog_post_tags',
    'label'       => esc_attr__( 'Tags', 'aaurora' ),
    'description' => esc_attr__( 'Disable to hide post tags on single post page.', 'aaurora' ),
    'section'     => 'blog_post',
    'default'     => '1',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'blog_post_comments',
    'label'       => esc_attr__( 'Comments counter', 'aaurora' ),
    'description' => '',
    'section'     => 'blog_post',
    'default'     => '0',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'blog_post_share',
    'label'       => esc_attr__( 'Share buttons', 'aaurora' ),
    'description' => '',
    'section'     => 'blog_post',
    'default'     => '1',
) );


Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'blog_post_nav',
    'label'       => esc_attr__( 'Navigation links', 'aaurora' ),
    'description' => esc_attr__( 'Previous/next posts navigation links below post content.', 'aaurora' ),
    'section'     => 'blog_post',
    'default'     => '1',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'blog_post_subscribe',
    'label'       => esc_attr__( 'Subscribe form', 'aaurora' ),
    'description' => esc_attr__( 'Show subscribe form on single blog post page.', 'aaurora' ),
    'section'     => 'blog_post',
    'default'     => '0',
) );


// END SECTION: Blog Single Post

// SECTION: Blog Single Post
Kirki::add_section( 'page', array(
    'title'          => esc_attr__( 'Page: Single page', 'aaurora' ),
    'description'    => esc_attr__( 'This settings affect your pages display.', 'aaurora' ),
    'panel'          => 'theme_settings_panel',
    'priority'       => 130,
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'page_header_width',
    'label'       => esc_attr__( 'Page header width', 'aaurora' ),
    'section'     => 'page',
    'default'     => 'boxed',
    'choices'     => array(
        'fullwidth'   => esc_attr__( 'Fullwidth', 'aaurora' ),
        'boxed' => esc_attr__( 'Boxed', 'aaurora' ),
    ),
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'blog_page_transparent_header',
    'label'       => esc_attr__( 'Transparent header', 'aaurora' ),
    'description' => esc_attr__( 'This feature make your header transparent and will show it above page header image. You need to upload light logo version to use this feature and assign header image for pages where you want to see this feature.', 'aaurora' ),
    'section'     => 'page',
    'default'     => '0',
    'active_callback'  => array(
        array(
            'setting'  => 'page_header_width',
            'operator' => '==',
            'value'    => 'fullwidth',
        )
    )
) );

// SECTION: Sidebars
Kirki::add_section( 'sidebars', array(
    'title'          => esc_attr__( 'Sidebars', 'aaurora' ),
    'description'    => esc_attr__( 'Choose your sidebar positions for different WordPress pages.', 'aaurora' ),
    'panel'          => 'theme_settings_panel',
    'priority'       => 140,
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'sidebar_sticky',
    'label'       => esc_attr__( 'Sticky sidebar', 'aaurora' ),
    'description' => esc_attr__( 'Enable sticky sidebar feature for all sidebars. Supported by Edge, Safari, Firefox, Google Chrome and other modern browsers.', 'aaurora' ),
    'section'     => 'sidebars',
    'default'     => '0',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'sidebar_blog',
    'label'       => esc_attr__( 'Blog listing', 'aaurora' ),
    'section'     => 'sidebars',
    'default'     => 'right',
    'choices'     => array(
        'left'   => esc_attr__( 'Left', 'aaurora' ),
        'right' => esc_attr__( 'Right', 'aaurora' ),
        'disable' => esc_attr__( 'Disable', 'aaurora' ),
    ),
    'description'  => '',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'sidebar_post',
    'label'       => esc_attr__( 'Single Post', 'aaurora' ),
    'section'     => 'sidebars',
    'default'     => 'disable',
    'choices'     => array(
        'left'   => esc_attr__( 'Left', 'aaurora' ),
        'right' => esc_attr__( 'Right', 'aaurora' ),
        'disable' => esc_attr__( 'Disable', 'aaurora' ),
    ),
    'description'  => esc_attr__( 'You can override sidebar position for every post in post settings.', 'aaurora' ),
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'sidebar_page',
    'label'       => esc_attr__( 'Single page', 'aaurora' ),
    'section'     => 'sidebars',
    'default'     => 'disable',
    'choices'     => array(
        'left'   => esc_attr__( 'Left', 'aaurora' ),
        'right' => esc_attr__( 'Right', 'aaurora' ),
        'disable' => esc_attr__( 'Disable', 'aaurora' ),
    ),
    'description'  => esc_attr__( 'You can override sidebar position for every page in page settings.', 'aaurora' ),
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'sidebar_archive',
    'label'       => esc_attr__( 'Archive', 'aaurora' ),
    'section'     => 'sidebars',
    'default'     => 'right',
    'choices'     => array(
        'left'   => esc_attr__( 'Left', 'aaurora' ),
        'right' => esc_attr__( 'Right', 'aaurora' ),
        'disable' => esc_attr__( 'Disable', 'aaurora' ),
    ),
    'description'  => '',
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'radio-buttonset',
    'settings'    => 'sidebar_search',
    'label'       => esc_attr__( 'Search', 'aaurora' ),
    'section'     => 'sidebars',
    'default'     => 'right',
    'choices'     => array(
        'left'   => esc_attr__( 'Left', 'aaurora' ),
        'right' => esc_attr__( 'Right', 'aaurora' ),
        'disable' => esc_attr__( 'Disable', 'aaurora' ),
    ),
    'description'  => '',
) );

// END SECTION: Sidebars


// SECTION: Colors
Kirki::add_section( 'colors', array(
    'title'          => esc_attr__( 'Colors', 'aaurora' ),
    'description'    => '',
    'panel'          => 'theme_settings_panel',
    'priority'       => 170,
) );
//
//
//Kirki::add_field( 'aaurora_theme_options', array(
//    'type'        => 'toggle',
//    'settings'    => 'color_darktheme',
//    'label'       => esc_attr__('Enable dark theme', 'aaurora' ),
//    'description' => esc_html__('Use this option if you set dark backgrounds and light colors for texts. You need to set dark Header and Body backgrounds colors manually.', 'aaurora'),
//    'section'     => 'colors',
//    'default'     => '0',
//) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'color',
    'settings'    => 'color_text',
    'label'       => esc_attr__( 'Body text color', 'aaurora' ),
    'description' => '',
    'section'     => 'colors',
    'default'     => '#333333',
    'transport'   => 'auto',
    'output' => array(
	    array(
		    'element'  => 'body',
		    'property' => 'color',
	    ),
    )
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'color',
    'settings'    => 'color_mainmenu_link',
    'label'       => esc_attr__( 'Mainmenu link color', 'aaurora' ),
    'description' => '',
    'section'     => 'colors',
    'default'     => '#000000',
    'transport'   => 'auto',
    'output' => array(
	    array(
		    'element'  => '.menu a',
		    'property' => 'color',
	    ),
    )
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'color',
    'settings'    => 'color_mainmenu_link_hover',
    'label'       => esc_attr__( 'Mainmenu link hover color', 'aaurora' ),
    'description' => '',
    'section'     => 'colors',
    'default'     => '#2568ef',
    'transport'   => 'auto',
    'output' => array(
	    array(
		    'element'  => 'body',
		    'property' => 'color',
	    ),
    )
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'color',
    'settings'    => 'color_footer_bg',
    'label'       => esc_attr__( 'Footer background color (light footer)', 'aaurora' ),
    'description' => '',
    'section'     => 'colors',
    'default'     => '#FFFFFF',
    'transport'   => 'auto',
    'output' => array(
	    array(
		    'element'  => '.site-footer',
		    'property' => 'background-color',
	    ),
    )
) );

// END SECTION: Colors


// SECTION: Fonts
Kirki::add_section( 'fonts', array(
    'title'          => esc_attr__( 'Fonts', 'aaurora' ),
    'description'    => '',
    'panel'          => 'theme_settings_panel',
    'priority'       => 160,
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'typography',
    'settings'    => 'headers_font',
    'label'       => esc_attr__( 'Headers font', 'aaurora' ),
    'section'     => 'fonts',
    'default'     => array(
        'font-family'    => 'Nunito',
        'variant'        => '800',
    ),
    'description' => esc_attr__( 'Font used in headers (H1-H6 tags).', 'aaurora' ),
    'output'      => [
        [
            'element' => array( 'h1', 'h2', 'h3' ),
        ],
    ],
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'typography',
    'settings'    => 'body_font',
    'label'       => esc_attr__( 'Body font', 'aaurora' ),
    'section'     => 'fonts',
    'default'     => array(
        'font-family'    => 'Rubik',
        'variant'        => 'regular',
        'font-size'      => '15px',
    ),
    'description' => esc_attr__( 'Font used in text elements.', 'aaurora' ),
    'output'      => [
        [
            'element' => 'body',
        ],
    ]
) );

Kirki::add_field( 'aaurora_theme_options', array(
    'type'        => 'toggle',
    'settings'    => 'webfonts_loadallvariants',
    'label'       => esc_attr__( 'Load all Google Fonts variants', 'aaurora' ),
    'description' => esc_attr__( 'Enable to load all available variants and subsets for fonts that you selected.', 'aaurora' ),
    'section'     => 'fonts',
    'default'     => '0',
) );

// END SECTION: Fonts
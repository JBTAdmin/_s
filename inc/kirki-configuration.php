<?php
/** Viveka CHange this**/
// Update options cache on customizer save
// if(!function_exists('aaurora_update_options_cache')):
// function aaurora_update_options_cache() {
// $option_name = 'themeoptions_saved_date';
//
// $new_value = microtime(true) ;
//
// if ( get_option( $option_name ) !== false ) {
//
// The option already exists, so we just update it.
// update_option( $option_name, $new_value );
//
// } else {
//
// The option hasn't been added yet. We'll add it with $autoload set to 'no'.
// $deprecated = null;
// $autoload = 'no';
// add_option( $option_name, $new_value, $deprecated, $autoload );
// }
// }
// endif;
// add_action( 'customize_save_after', 'aaurora_update_options_cache');
//
// Change default Customizer options, add new logo option
// if(!function_exists('aaurora_theme_customize_register')):
// function aaurora_theme_customize_register( $wp_customize ) {
// $wp_customize->remove_section( 'colors' );
//
// $wp_customize->get_section('header_image')->title = esc_html__( 'Logo', 'aaurora' );
//
// $wp_customize->get_section('title_tagline')->title = esc_html__( 'Site Title and Favicon', 'aaurora' );
//
// $wp_customize->add_setting( 'aaurora_header_transparent_logo' , array(
// array ( 'default' => '',
// 'sanitize_callback' => 'esc_url_raw'
// ),
// 'transport'   => 'refresh',
// ) );
//
// $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'aaurora_header_transparent_logo', array(
// 'label'    => esc_html__( 'Logo for Transparent Header (Light logo)', 'aaurora' ),
// 'section'  => 'header_image',
// 'settings' => 'aaurora_header_transparent_logo',
// ) ) );
//
// Move header image section to theme settings
// $wp_customize->get_section( 'header_image' )->panel = 'theme_settings_panel';
// $wp_customize->get_section( 'header_image' )->priority = 20;
// }
// endif;
// add_action( 'customize_register', 'aaurora_theme_customize_register' );.


// Create theme options.
Kirki::add_config(
	'aaurora_theme_options',
	array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	)
);

// Create main panel.
Kirki::add_panel(
	'theme_settings_panel',
	array(
		'title'       => esc_attr__( 'Theme Settings', 'aaurora' ),
		'description' => esc_attr__( 'Manage theme settings', 'aaurora' ),
	)
);

// SECTION: General.
Kirki::add_section(
	'general',
	array(
		'title'       => esc_attr__( 'General', 'aaurora' ),
		'description' => '',
		'panel'       => 'theme_settings_panel',
		'priority'    => 10,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'button_backtotop',
		'label'       => esc_attr__( 'Scroll to top button', 'aaurora' ),
		'description' => esc_attr__( 'Show scroll to top button after page scroll.', 'aaurora' ),
		'section'     => 'general',
		'default'     => '1',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
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
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => 'body',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'logo_text',
		'label'       => esc_attr__( 'Text logo', 'aaurora' ),
		'description' => esc_attr__( 'Use text logo instead of image.', 'aaurora' ),
		'section'     => 'header_image',
		'default'     => '0',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'text',
		'settings'    => 'logo_text_title',
		'label'       => esc_attr__( 'Text logo title', 'aaurora' ),
		'section'     => 'header_image',
		'default'     => '',
		'description' => esc_attr__( 'Add your site text logo. HTML tags allowed.', 'aaurora' ),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'     => 'typography',
		'settings' => 'logo_text_font',
		'label'    => esc_attr__( 'Text logo font', 'aaurora' ),
		'section'  => 'header_image',
		'default'  => array(
			'font-family' => 'Cormorant Garamond',
			'font-size'   => '62px',
			'variant'     => 'regular',
			'color'       => '#000000',
		),
		'output'   => '',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'header_tagline',
		'label'       => esc_attr__( 'Header tagline', 'aaurora' ),
		'description' => esc_attr__( 'Show text tagline in header.', 'aaurora' ),
		'section'     => 'header_image',
		'default'     => '0',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'radio-buttonset',
		'settings'    => 'header_tagline_style',
		'label'       => esc_attr__( 'Header tagline text style', 'aaurora' ),
		'section'     => 'header_image',
		'default'     => 'regular',
		'choices'     => array(
			'regular'   => esc_attr__( 'Regular', 'aaurora' ),
			'uppercase' => esc_attr__( 'UPPERCASE', 'aaurora' ),
		),
		'description' => esc_attr__( 'Change header tagline text transform style.', 'aaurora' ),
	)
);
// END SECTION: Logo settings (default WordPress modified).

// SECTION: Header.
Kirki::add_section(
	'header',
	array(
		'title'       => esc_attr__( 'Header', 'aaurora' ),
		'description' => '',
		'panel'       => 'theme_settings_panel',
		'priority'    => 30,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'select',
		'settings'    => 'header_layout',
		'label'       => esc_html__( 'Header layout', 'aaurora' ),
		'section'     => 'header',
		'default'     => 'menu-below-logo',
		'multiple'    => 0,
		'choices'     => array(
			'menu-below-logo'      => esc_attr__( '1. Menu below Logo', 'aaurora' ),
			'right-menu-left-logo' => esc_attr__( '2. Menu With Logo, Right Menu , Left logo', 'aaurora' ),
			'left-menu-right-logo' => esc_attr__( '3. Menu With Logo, Left Menu , Right logo', 'aaurora' ),
		),
		'description' => esc_attr__( 'This option completely change site header layout and style.', 'aaurora' ),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'radio-buttonset',
		'settings'    => 'header_layout_color',
		'label'       => esc_attr__( 'Main menu style', 'aaurora' ),
		'section'     => 'header',
		'default'     => 'light',
		'choices'     => array(
			'light' => esc_attr__( 'Light', 'aaurora' ),
			'dark'  => esc_attr__( 'Dark', 'aaurora' ),
		),
		'description' => esc_attr__( 'You can change dark menu background and menu links colors in "Theme settings > Colors" section.', 'aaurora' ),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'radio-buttonset',
		'settings'    => 'search_position',
		'label'       => esc_attr__( 'Search field', 'aaurora' ),
		'section'     => 'header',
		'default'     => 'header',
		'choices'     => array(
			'header'     => esc_attr__( 'Header', 'aaurora' ),
			'fullscreen' => esc_attr__( 'Fullscreen', 'aaurora' ),
			'disable'    => esc_attr__( 'Disable', 'aaurora' ),
		),
		'description' => esc_attr__( 'Search field type.', 'aaurora' ),
	)
);


// todo what is the use of below.
//
// Kirki::add_field(
// 'aaurora_theme_options',
// array(
// 'type'            => 'toggle',
// 'settings'        => 'header_center_custom',
// 'label'           => esc_attr__( 'Header center custom content', 'aaurora' ),
// 'description'     => esc_attr__( 'Enable to display custom content (e.g. banner) in header center.', 'aaurora' ),
// 'section'         => 'header',
// 'default'         => '0',
// 'active_callback' => array(
// array(
// 'setting'  => 'header_layout',
// 'operator' => 'in',
// 'value'    => array( 'menu-below-header-left', 'menu-below-header-left-border', 'menu-below-header-left-border-fullwidth' ),
// ),
// ),
// )
// );.

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'            => 'editor',
		'settings'        => 'header_center_custom_content',
		'label'           => esc_attr__( 'Header center custom content HTML', 'aaurora' ),
		'description'     => esc_attr__( 'HTML and shortcodes supported.', 'aaurora' ),
		'section'         => 'header',
		'default'         => '',
		'active_callback' => array(
			array(
				'setting'  => 'header_layout',
				'operator' => 'in',
				'value'    => array( 'menu-below-header', 'menu-below-header-border' ),
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'header_topline',
		'label'       => esc_attr__( 'Top line', 'aaurora' ),
		'description' => esc_attr__( 'Enable to display header topline slider with trending posts.', 'aaurora' ),
		'section'     => 'header',
		'default'     => '0',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'editor',
		'settings'    => 'header_topline_content',
		'label'       => esc_attr__( 'Top line text', 'aaurora' ),
		'description' => esc_attr__( 'Add top line text here. HTML and shortcodes supported.', 'aaurora' ),
		'section'     => 'header',
		'default'     => '',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'background',
		'settings'    => 'header_top_line_background',
		'label'       => esc_attr__( 'Top line background', 'aaurora' ),
		'description' => esc_attr__( 'Change your top line background settings.', 'aaurora' ),
		'section'     => 'header',
		'default'     => array(
			'background-color'      => '#ffffff',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'fixed',
		),
	)
);

// END SECTION: Header.

// SECTION: Main menu.
Kirki::add_section(
	'main_menu',
	array(
		'title'       => esc_attr__( 'Main menu', 'aaurora' ),
		'description' => '',
		'panel'       => 'theme_settings_panel',
		'priority'    => 50,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'     => 'radio-buttonset',
		'settings' => 'main_menu_align',
		'label'    => esc_attr__( 'Main menu align', 'aaurora' ),
		'section'  => 'main_menu',
		'default'  => 'right',
		'choices'  => array(
			'center' => esc_attr__( 'Center', 'aaurora' ),
			'right'  => esc_attr__( 'Right', 'aaurora' ),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'radio-buttonset',
		'settings'    => 'main_menu_font_decoration',
		'label'       => esc_attr__( 'Main menu font decoration', 'aaurora' ),
		'section'     => 'main_menu',
		'default'     => 'none',
		'choices'     => array(
			'uppercase' => esc_attr__( 'UPPERCASE', 'aaurora' ),
			'italic'    => esc_attr__( 'Italic', 'aaurora' ),
			'none'      => esc_attr__( 'None', 'aaurora' ),
		),
		'description' => '',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'radio-buttonset',
		'settings'    => 'main_menu_font_weight',
		'label'       => esc_attr__( 'Main menu font weight', 'aaurora' ),
		'section'     => 'main_menu',
		'default'     => 'regularfont',
		'choices'     => array(
			'regularfont' => esc_attr__( 'Regular', 'aaurora' ),
			'boldfont'    => esc_attr__( 'Bold', 'aaurora' ),
		),
		'description' => '',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'radio-buttonset',
		'settings'    => 'main_menu_arrow_style',
		'label'       => esc_attr__( 'Main menu dropdown arrows', 'aaurora' ),
		'section'     => 'main_menu',
		'default'     => 'noarrow',
		'choices'     => array(
			'rightarrow' => esc_attr__( 'Right >', 'aaurora' ),
			'downarrow'  => esc_attr__( 'Down V', 'aaurora' ),
			'noarrow'    => esc_attr__( 'Disable', 'aaurora' ),
		),
		'description' => '',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'dimension',
		'settings'    => 'mainmenu_paddings',
		'label'       => esc_attr__( 'Main menu top/bottom paddings (px)', 'aaurora' ),
		'description' => esc_attr__( 'Adjust this value to change menu height. Default: 10px', 'aaurora' ),
		'section'     => 'main_menu',
		'default'     => '10px',
	)
);

// END SECTION: Main menu.

// SECTION: Footer.
Kirki::add_section(
	'footer',
	array(
		'title'       => esc_attr__( 'Footer', 'aaurora' ),
		'description' => '',
		'panel'       => 'theme_settings_panel',
		'priority'    => 60,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'footer_text_color',
		'label'       => esc_attr__( 'Footer text color', 'aaurora' ),
		'description' => esc_attr__( 'Change text color in footer HTML block', 'aaurora' ),
		'section'     => 'footer',
		'default'     => '#fff',
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => '.site-footer',
				'property' => 'color',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'editor',
		'settings'    => 'footer_copyright',
		'label'       => esc_attr__( 'Footer copyright text', 'aaurora' ),
		'description' => esc_attr__( 'Change your footer copyright text.', 'aaurora' ),
		'section'     => 'footer',
		'default'     => '#fff',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'footer_background_color',
		'label'       => esc_attr__( 'Footer background', 'aaurora' ),
		'description' => esc_attr__( 'Upload your footer HTML Block background image (1600x1200px JPG recommended). Remove image to remove background.', 'aaurora' ),
		'section'     => 'footer',
		'default'     => '#fff',
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => '.site-footer',
				'property' => 'background-color',
			),
		),
	)
);

// END SECTION: Footer.

// SECTION: Blog.
Kirki::add_section(
	'blog',
	array(
		'title'       => esc_attr__( 'Blog: Listing', 'aaurora' ),
		'description' => esc_attr__( 'This settings affect your blog list display (homepage, archive, search).', 'aaurora' ),
		'panel'       => 'theme_settings_panel',
		'priority'    => 70,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'select',
		'settings'    => 'blog_layout',
		'label'       => esc_html__( 'Blog layout', 'aaurora' ),
		'section'     => 'blog',
		'default'     => 'standard',
		'multiple'    => 0,
		'choices'     => array(

			'large-grid'       => esc_attr__( 'First large then grid', 'aaurora' ),
			'overlay-grid'     => esc_attr__( 'First large overlay then grid', 'aaurora' ),
			'large-list'       => esc_attr__( 'First large then list', 'aaurora' ),
			'overlay-list'     => esc_attr__( 'First large overlay then list', 'aaurora' ),
			'mixed-overlays'   => esc_attr__( 'Mixed overlays', 'aaurora' ),
			'grid'             => esc_attr__( 'Grid', 'aaurora' ),
			'list'             => esc_attr__( 'List', 'aaurora' ),
			'standard'         => esc_attr__( 'Classic', 'aaurora' ),
			'overlay'          => esc_attr__( 'Grid overlay', 'aaurora' ),
			'mixed-large-grid' => esc_attr__( 'Mixed large and grid', 'aaurora' ),
			'masonry'          => esc_attr__( 'Masonry', 'aaurora' ),

		),
		'description' => esc_attr__( 'This option completely change blog listing layout and posts display.', 'aaurora' ),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'select',
		'settings'    => 'blog_posts_excerpt',
		'label'       => esc_html__( 'Blog posts short content display', 'aaurora' ),
		'section'     => 'blog',
		'default'     => 'excerpt',
		'multiple'    => 0,
		'choices'     => array(
			'content' => esc_attr__( 'Full content (You will add <!--more--> tag manually)', 'aaurora' ),
			'excerpt' => esc_attr__( 'Excerpt (Auto crop by words)', 'aaurora' ),
			'none'    => esc_attr__( 'Disable short content and Continue reading button', 'aaurora' ),
		),
		'description' => wp_kses_post( __( 'Change short post content display in blog listing.<br/><a href="https://en.support.wordpress.com/more-tag/" target="_blank">Read more</a> about &#x3C;!--more--&#x3E; tag.', 'aaurora' ) ),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'number',
		'settings'    => 'blog_posts_excerpt_limit',
		'label'       => esc_attr__( 'Post excerpt length (words)', 'aaurora' ),
		'description' => esc_attr__( 'Used by WordPress for post shortening. Default: 35', 'aaurora' ),
		'section'     => 'blog',
		'default'     => '22',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'blog_posts_date_hide',
		'label'       => esc_attr__( 'Hide posts dates', 'aaurora' ),
		'description' => '',
		'section'     => 'blog',
		'default'     => '0',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'blog_posts_author',
		'label'       => esc_attr__( 'Author name ("by author")', 'aaurora' ),
		'description' => '',
		'section'     => 'blog',
		'default'     => '0',
	)
);

$blog_exclude_categories = Kirki_Helper::get_terms( 'category' );

// END SECTION: Blog.

// SECTION: Blog Single Post.
Kirki::add_section(
	'blog_post',
	array(
		'title'       => esc_attr__( 'Blog: Single post', 'aaurora' ),
		'description' => esc_attr__( 'This settings affect your blog single post display.', 'aaurora' ),
		'panel'       => 'theme_settings_panel',
		'priority'    => 80,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'typography',
		'settings'    => 'blog_post_title_font',
		'label'       => esc_attr__( 'Post Title Size', 'aaurora' ),
		'section'     => 'blog_post',
		'default'     => array(
			'font-size'      => '7.2rem',
			'line-height'    => '1.1',
			'letter-spacing' => '-2.1px',
			'text-transform' => 'none',
		),
		'description' => esc_attr__( 'Font used in Single Post Header .', 'aaurora' ),
		'output'      => array(
			array(
				'element' => array( 'h1.entry-title' ),
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'            => 'toggle',
		'settings'        => 'blog_post_transparent_header',
		'label'           => esc_attr__( 'Transparent header', 'aaurora' ),
		'description'     => esc_attr__( 'This feature make your header transparent and will show it above post header image. You need to upload light logo version to use this feature and assign header image for posts where you want to see this feature. Transparent header for post available only with "In header - Style 1" blog post header layout option.', 'aaurora' ),
		'section'         => 'blog_post',
		'default'         => '0',
		'active_callback' => array(
			array(
				'setting'  => 'blog_post_header_layout',
				'operator' => '==',
				'value'    => 'inheader',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'blog_post_author',
		'label'       => esc_attr__( 'Author details', 'aaurora' ),
		'description' => esc_attr__( 'Show post author details with avatar after post content. You need to fill your post author biography details and social links in "Users" section in WordPress.', 'aaurora' ),
		'section'     => 'blog_post',
		'default'     => '1',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'blog_post_featured_image',
		'label'       => esc_attr__( 'Featured image', 'aaurora' ),
		'description' => esc_attr__( 'Disable to hide post featured image on single post page (Globally on all site).', 'aaurora' ),
		'section'     => 'blog_post',
		'default'     => '1',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'blog_post_tags',
		'label'       => esc_attr__( 'Tags', 'aaurora' ),
		'description' => esc_attr__( 'Disable to hide post tags on single post page.', 'aaurora' ),
		'section'     => 'blog_post',
		'default'     => '1',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'blog_post_comments',
		'label'       => esc_attr__( 'Comments counter', 'aaurora' ),
		'description' => '',
		'section'     => 'blog_post',
		'default'     => '0',
	)
);


Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'blog_post_nav',
		'label'       => esc_attr__( 'Navigation links', 'aaurora' ),
		'description' => esc_attr__( 'Previous/next posts navigation links below post content.', 'aaurora' ),
		'section'     => 'blog_post',
		'default'     => '1',
	)
);

// END SECTION: Blog Single Post.

// SECTION: Blog Single Post.
Kirki::add_section(
	'page',
	array(
		'title'       => esc_attr__( 'Page: Single page', 'aaurora' ),
		'description' => esc_attr__( 'This settings affect your pages display.', 'aaurora' ),
		'panel'       => 'theme_settings_panel',
		'priority'    => 130,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'     => 'radio-buttonset',
		'settings' => 'page_header_width',
		'label'    => esc_attr__( 'Page header width', 'aaurora' ),
		'section'  => 'page',
		'default'  => 'boxed',
		'choices'  => array(
			'fullwidth' => esc_attr__( 'Fullwidth', 'aaurora' ),
			'boxed'     => esc_attr__( 'Boxed', 'aaurora' ),
		),
	)
);

// SECTION: Sidebars.
Kirki::add_section(
	'sidebars',
	array(
		'title'       => esc_attr__( 'Sidebars', 'aaurora' ),
		'description' => esc_attr__( 'Choose your sidebar positions for different WordPress pages.', 'aaurora' ),
		'panel'       => 'theme_settings_panel',
		'priority'    => 140,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'sidebar_sticky',
		'label'       => esc_attr__( 'Sticky sidebar', 'aaurora' ),
		'description' => esc_attr__( 'Enable sticky sidebar feature for all sidebars. Supported by Edge, Safari, Firefox, Google Chrome and other modern browsers.', 'aaurora' ),
		'section'     => 'sidebars',
		'default'     => '0',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'radio-buttonset',
		'settings'    => 'sidebar_blog',
		'label'       => esc_attr__( 'Blog listing', 'aaurora' ),
		'section'     => 'sidebars',
		'default'     => 'right',
		'choices'     => array(
			'left'    => esc_attr__( 'Left', 'aaurora' ),
			'right'   => esc_attr__( 'Right', 'aaurora' ),
			'disable' => esc_attr__( 'Disable', 'aaurora' ),
		),
		'description' => '',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'radio-buttonset',
		'settings'    => 'sidebar_post',
		'label'       => esc_attr__( 'Single Post', 'aaurora' ),
		'section'     => 'sidebars',
		'default'     => 'disable',
		'choices'     => array(
			'left'    => esc_attr__( 'Left', 'aaurora' ),
			'right'   => esc_attr__( 'Right', 'aaurora' ),
			'disable' => esc_attr__( 'Disable', 'aaurora' ),
		),
		'description' => esc_attr__( 'You can override sidebar position for every post in post settings.', 'aaurora' ),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'radio-buttonset',
		'settings'    => 'sidebar_page',
		'label'       => esc_attr__( 'Single page', 'aaurora' ),
		'section'     => 'sidebars',
		'default'     => 'disable',
		'choices'     => array(
			'left'    => esc_attr__( 'Left', 'aaurora' ),
			'right'   => esc_attr__( 'Right', 'aaurora' ),
			'disable' => esc_attr__( 'Disable', 'aaurora' ),
		),
		'description' => esc_attr__( 'You can override sidebar position for every page in page settings.', 'aaurora' ),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'radio-buttonset',
		'settings'    => 'sidebar_archive',
		'label'       => esc_attr__( 'Archive', 'aaurora' ),
		'section'     => 'sidebars',
		'default'     => 'right',
		'choices'     => array(
			'left'    => esc_attr__( 'Left', 'aaurora' ),
			'right'   => esc_attr__( 'Right', 'aaurora' ),
			'disable' => esc_attr__( 'Disable', 'aaurora' ),
		),
		'description' => '',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'radio-buttonset',
		'settings'    => 'sidebar_search',
		'label'       => esc_attr__( 'Search', 'aaurora' ),
		'section'     => 'sidebars',
		'default'     => 'right',
		'choices'     => array(
			'left'    => esc_attr__( 'Left', 'aaurora' ),
			'right'   => esc_attr__( 'Right', 'aaurora' ),
			'disable' => esc_attr__( 'Disable', 'aaurora' ),
		),
		'description' => '',
	)
);

// END SECTION: Sidebars.


// SECTION: Colors.
Kirki::add_section(
	'colors',
	array(
		'title'       => esc_attr__( 'Colors', 'aaurora' ),
		'description' => '',
		'panel'       => 'theme_settings_panel',
		'priority'    => 170,
	)
);

// Kirki::add_field( 'aaurora_theme_options', array(
// 'type'        => 'toggle',
// 'settings'    => 'color_darktheme',
// 'label'       => esc_attr__('Enable dark theme', 'aaurora' ),
// 'description' => esc_html__('Use this option if you set dark backgrounds and light colors for texts. You need to set dark Header and Body backgrounds colors manually.', 'aaurora'),
// 'section'     => 'colors',
// 'default'     => '0',
// ) );.

// todo Other two fields in color section is coming from the core WordPress.

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'color_site_title_text',
		'label'       => esc_attr__( 'Site Title Color', 'aaurora' ),
		'description' => '',
		'section'     => 'colors',
		'default'     => '#333333',
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => '.site-title > a',
				'property' => 'color',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'color_body_text',
		'label'       => esc_attr__( 'Body text color', 'aaurora' ),
		'description' => '',
		'section'     => 'colors',
		'default'     => '#333333',
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => 'body',
				'property' => 'color',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'color_main_menu_link',
		'label'       => esc_attr__( 'Mainmenu link color', 'aaurora' ),
		'description' => '',
		'section'     => 'colors',
		'default'     => '#000000',
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => '.menu a',
				'property' => 'color',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'color_main_menu_link_hover',
		'label'       => esc_attr__( 'Mainmenu link hover color', 'aaurora' ),
		'description' => '',
		'section'     => 'colors',
		'default'     => '#2568ef',
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => '.menu li:hover > a',
				'property' => 'color',
			),
		),
	)
);

// END SECTION: Colors.

// SECTION: Fonts.
Kirki::add_section(
	'fonts',
	array(
		'title'       => esc_attr__( 'Fonts', 'aaurora' ),
		'description' => '',
		'panel'       => 'theme_settings_panel',
		'priority'    => 160,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'typography',
		'settings'    => 'font_header_h1',
		'label'       => esc_attr__( 'H1 font', 'aaurora' ),
		'section'     => 'fonts',
		'default'     => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
			'variant'        => '800',
			'font-size'      => 'calc(46px + 26 * ((100vw - 576px)/ 1024))',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'description' => esc_attr__( 'Font used in H1 Header .', 'aaurora' ),
		'output'      => array(
			array(
				'element' => array( 'h1' ),
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'typography',
		'settings'    => 'font_header_h2',
		'label'       => esc_attr__( 'H2 font', 'aaurora' ),
		'section'     => 'fonts',
		'default'     => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
			'variant'        => '800',
			'font-size'      => '14px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'description' => esc_attr__( 'Font used in H2 header.', 'aaurora' ),
		'output'      => array(
			array(
				'element' => array( 'h2' ),
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'typography',
		'settings'    => 'font_header_h3',
		'label'       => esc_attr__( 'H3 font', 'aaurora' ),
		'section'     => 'fonts',
		'default'     => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
			'variant'        => '800',
			'font-size'      => '14px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'description' => esc_attr__( 'Font used in H3 header.', 'aaurora' ),
		'output'      => array(
			array(
				'element' => array( 'h3' ),
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'typography',
		'settings'    => 'body_font',
		'label'       => esc_attr__( 'Body font', 'aaurora' ),
		'section'     => 'fonts',
		'default'     => array(   // TODO  In default can i use Initial as font-family.
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
			'variant'        => '400',
			'font-size'      => '18px',
			'line-height'    => '1.8',
			'letter-spacing' => '0',
			'text-transform' => 'none',
		),
		'description' => esc_attr__( 'Font used in text elements.', 'aaurora' ),
		'output'      => array(
			array(
				'element' => 'body',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'webfonts_loadallvariants',
		'label'       => esc_attr__( 'Load all Google Fonts variants', 'aaurora' ),
		'description' => esc_attr__( 'Enable to load all available variants and subsets for fonts that you selected.', 'aaurora' ),
		'section'     => 'fonts',
		'default'     => '0',
	)
);

// END SECTION: Fonts.

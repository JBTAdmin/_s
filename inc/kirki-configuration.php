<?php
/**
 * Create theme options.
 *
 * @package gautam
 */

if ( ! function_exists( 'gautam_theme_customize_register' ) ) :
	/**
	 * Change default Customizer options.
	 *
	 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
	 */
	function gautam_theme_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
		$wp_customize->remove_section( 'colors' );

		$wp_customize->remove_section( 'header_image' );

		$wp_customize->remove_section( 'background_image' );

		$wp_customize->get_section( 'title_tagline' )->panel = 'theme_settings_panel';

		$wp_customize->get_section( 'title_tagline' )->title    = esc_html__( 'Site Identity', 'gautam' );
		$wp_customize->get_section( 'title_tagline' )->priority = 10;
	}
endif;
add_action( 'customize_register', 'gautam_theme_customize_register' );

/**
 * Load all Google font variants.
 */
function gautam_fonts_load_all_variants() {
	if ( class_exists( 'Kirki_Fonts_Google' ) ) {
		if ( get_theme_mod( 'fonts_load_all_variant', false ) ) {
			Kirki_Fonts_Google::$force_load_all_variants = true;
			Kirki_Fonts_Google::$force_load_all_subsets  = true;
		} else {
			Kirki_Fonts_Google::$force_load_all_variants = false;
			Kirki_Fonts_Google::$force_load_all_subsets  = false;
		}
	}
}
add_action( 'init', 'gautam_fonts_load_all_variants' );

Kirki::add_config(
	'gautam_theme_options',
	array(
		'capability'  => 'edit_theme_options',
		'option_type' => 'theme_mod',
	)
);

// Create main panel.
Kirki::add_panel(
	'theme_settings_panel',
	array(
		'title'       => esc_attr__( 'Theme Settings', 'gautam' ),
		'description' => esc_attr__( 'Manage theme settings', 'gautam' ),
	)
);

// SECTION: Site Identity (default WordPress title_tagline modified).
Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'number',
		'settings'    => 'logo_width',
		'label'       => esc_attr__( 'Logo width (px)', 'gautam' ),
		'description' => esc_attr__( 'example: 150', 'gautam' ),
		'section'     => 'title_tagline',
		'default'     => '170',
		'output'      => array(
			array(
				'element'  => '.custom-logo-link img',
				'property' => 'max-width',
				'units'    => 'px',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'logo_text_toggle',
		'label'       => esc_attr__( 'Text logo', 'gautam' ),
		'description' => esc_attr__( 'Enable to use text logo instead of image.', 'gautam' ),
		'section'     => 'title_tagline',
		'default'     => '1',
	)
);
// SECTION: SITE IDENTITY.

// SECTION: GENERAL.
Kirki::add_section(
	'general',
	array(
		'title'    => esc_attr__( 'General', 'gautam' ),
		'panel'    => 'theme_settings_panel',
		'priority' => 20,
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'slider',
		'settings' => 'slider_setting',
		'label'    => esc_attr__( 'Container Width (px)', 'gautam' ),
		'section'  => 'general',
		'default'  => '1150',
		'choices'  => array(
			'min'  => 900,
			'max'  => 1900,
			'step' => 10,
		),
		'output'   => array(
			array(
				'element'  => '.wrap',
				'property' => 'max-width',
				'units'    => 'px',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'slider',
		'settings'    => 'sidebar_width_setting',
		'label'       => esc_attr__( 'Max Sidebar Width (px)', 'gautam' ),
		'description' => 'Capped to 25% of container width.',
		'section'     => 'general',
		'default'     => '250',
		'choices'     => array(
			'min'  => 200,
			'max'  => 500,
			'step' => 10,
		),
		'output'      => array(
			array(
				'element'  => '#secondary-sidebar, #primary-sidebar',
				'property' => 'max-width',
				'units'    => 'px',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'slider',
		'settings'    => 'button_border_radius',
		'label'       => esc_attr__( 'Button Border Radius (px)', 'gautam' ),
		'description' => 'Choose Button Border Radius',
		'section'     => 'general',
		'default'     => '5',
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 5,
		),
		'output'      => array(
			array(
				'element'  => ':root',
				'property' => '--button-border-radius',
				'units'    => 'px',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'select',
		'settings'    => 'general_search_visibility',
		'label'       => esc_attr__( 'Search Visibility', 'gautam' ),
		'section'     => 'general',
		'default'     => 'header',
		'multiple'    => 0,
		'choices'     => array(
			'none'   => esc_attr__( 'None', 'gautam' ),
			'header' => esc_attr__( 'Header', 'gautam' ),
			'fixed'  => esc_attr__( 'Fixed', 'gautam' ),
		),
		'description' => esc_attr__( 'Select the Search button visibility and position.', 'gautam' ),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'background',
		'settings'    => 'body_background',
		'label'       => esc_attr__( 'Body Background', 'gautam' ),
		'description' => esc_attr__( 'Change your site background settings.', 'gautam' ),
		'section'     => 'general',
		'default'     => array(
			'background-color'      => '#fff',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		),
		'output'      => array(
			array(
				'element' => 'body',
			),
		),
	)
);
// SECTION GENERAL END.

// SECTION: PADDING AND MARGIN.
Kirki::add_section(
	'padding_margin',
	array(
		'title'    => esc_attr__( 'Padding & Margin', 'gautam' ),
		'panel'    => 'theme_settings_panel',
		'priority' => 30,
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'dimensions',
		'settings'    => 'container_padding_setting',
		'label'       => esc_attr__( 'Container Padding (Use CSS units)', 'gautam' ),
		'description' => 'Content + Sidebar',
		'section'     => 'padding_margin',
		'default'     => array(
			'padding-top'    => '0',
			'padding-bottom' => '0',
			'padding-left'   => '0',
			'padding-right'  => '0',
		),
		'choices'     => array(
			'labels' => array(
				'padding-top'    => esc_html__( 'Padding Top', 'gautam' ),
				'padding-bottom' => esc_html__( 'Padding Bottom', 'gautam' ),
				'padding-left'   => esc_html__( 'Padding Left', 'gautam' ),
				'padding-right'  => esc_html__( 'Padding Right', 'gautam' ),
			),
		),
		'output'      => array(
			array(
				'element' => '.main-container',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'dimensions',
		'settings'    => 'container_margin_setting',
		'label'       => esc_attr__( 'Container Margin (Use CSS units)', 'gautam' ),
		'description' => 'Content + Sidebar',
		'section'     => 'padding_margin',
		'default'     => array(
			'margin-top'    => '0',
			'margin-bottom' => '2rem',
			'margin-left'   => '0',
			'margin-right'  => '0',
		),
		'choices'     => array(
			'labels' => array(
				'margin-top'    => esc_html__( 'Margin Top', 'gautam' ),
				'margin-bottom' => esc_html__( 'Margin Bottom', 'gautam' ),
				'margin-left'   => esc_html__( 'Margin Left', 'gautam' ),
				'margin-right'  => esc_html__( 'Margin Right', 'gautam' ),
			),
		),
		'output'      => array(
			array(
				'element' => '.main-container',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'dimensions',
		'settings'    => 'article_container_padding_setting',
		'label'       => esc_attr__( 'Content Padding (Use CSS units)', 'gautam' ),
		'description' => 'Content Only',
		'section'     => 'padding_margin',
		'default'     => array(
			'padding-top'    => '8rem',
			'padding-bottom' => '0',
			'padding-left'   => '0',
			'padding-right'  => '0',
		),
		'choices'     => array(
			'labels' => array(
				'padding-top'    => esc_html__( 'Padding Top', 'gautam' ),
				'padding-bottom' => esc_html__( 'Padding Bottom', 'gautam' ),
				'padding-left'   => esc_html__( 'Padding Left', 'gautam' ),
				'padding-right'  => esc_html__( 'Padding Right', 'gautam' ),
			),
		),
		'output'      => array(
			array(
				'element' => '.primary-content',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'dimensions',
		'settings'    => 'article_container_margin_setting',
		'label'       => esc_attr__( 'Content Margin (Use CSS units)', 'gautam' ),
		'description' => 'Content Only',
		'section'     => 'padding_margin',
		'default'     => array(
			'margin-top'    => '0',
			'margin-bottom' => '0',
			'margin-left'   => '0',
			'margin-right'  => '0',
		),
		'choices'     => array(
			'labels' => array(
				'margin-top'    => esc_html__( 'Margin Top', 'gautam' ),
				'margin-bottom' => esc_html__( 'Margin Bottom', 'gautam' ),
				'margin-left'   => esc_html__( 'Margin Left', 'gautam' ),
				'margin-right'  => esc_html__( 'Margin Right', 'gautam' ),
			),
		),
		'output'      => array(
			array(
				'element' => '.primary-content',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'dimensions',
		'settings'    => 'right_sidebar_padding_setting',
		'label'       => esc_attr__( 'Right Sidebar Padding (Use CSS units)', 'gautam' ),
		'description' => 'Right Sidebar Only',
		'section'     => 'padding_margin',
		'default'     => array(
			'padding-top'    => '8rem',
			'padding-bottom' => '0',
			'padding-left'   => '0',
			'padding-right'  => '0',
		),
		'choices'     => array(
			'labels' => array(
				'padding-top'    => esc_html__( 'Padding Top', 'gautam' ),
				'padding-bottom' => esc_html__( 'Padding Bottom', 'gautam' ),
				'padding-left'   => esc_html__( 'Padding Left', 'gautam' ),
				'padding-right'  => esc_html__( 'Padding Right', 'gautam' ),
			),
		),
		'output'      => array(
			array(
				'element' => '.sidebar-right',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'dimensions',
		'settings'    => 'right_sidebar_margin_setting',
		'label'       => esc_attr__( 'Right Sidebar Margin (Use CSS units)', 'gautam' ),
		'description' => 'Right Sidebar Only',
		'section'     => 'padding_margin',
		'default'     => array(
			'margin-top'    => '0',
			'margin-bottom' => '0',
			'margin-left'   => '3rem',
			'margin-right'  => '0',
		),
		'choices'     => array(
			'labels' => array(
				'margin-top'    => esc_html__( 'Margin Top', 'gautam' ),
				'margin-bottom' => esc_html__( 'Margin Bottom', 'gautam' ),
				'margin-left'   => esc_html__( 'Margin Left', 'gautam' ),
				'margin-right'  => esc_html__( 'Margin Right', 'gautam' ),
			),
		),
		'output'      => array(
			array(
				'element' => '.sidebar-right',
			),
		),
	)
);


Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'dimensions',
		'settings'    => 'left_sidebar_padding_setting',
		'label'       => esc_attr__( 'Left Sidebar Padding (Use CSS units)', 'gautam' ),
		'description' => 'Left Sidebar Only',
		'section'     => 'padding_margin',
		'default'     => array(
			'padding-top'    => '8rem',
			'padding-bottom' => '0',
			'padding-left'   => '0',
			'padding-right'  => '0',
		),
		'choices'     => array(
			'labels' => array(
				'padding-top'    => esc_html__( 'Padding Top', 'gautam' ),
				'padding-bottom' => esc_html__( 'Padding Bottom', 'gautam' ),
				'padding-left'   => esc_html__( 'Padding Left', 'gautam' ),
				'padding-right'  => esc_html__( 'Padding Right', 'gautam' ),
			),
		),
		'output'      => array(
			array(
				'element' => '.sidebar-left',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'dimensions',
		'settings'    => 'left_sidebar_margin_setting',
		'label'       => esc_attr__( 'Left Sidebar Margin (Use CSS units)', 'gautam' ),
		'description' => 'Left Sidebar Only',
		'section'     => 'padding_margin',
		'default'     => array(
			'margin-top'    => '0',
			'margin-bottom' => '0',
			'margin-left'   => '0',
			'margin-right'  => '3rem',
		),
		'choices'     => array(
			'labels' => array(
				'margin-top'    => esc_html__( 'Margin Top', 'gautam' ),
				'margin-bottom' => esc_html__( 'Margin Bottom', 'gautam' ),
				'margin-left'   => esc_html__( 'Margin Left', 'gautam' ),
				'margin-right'  => esc_html__( 'Margin Right', 'gautam' ),
			),
		),
		'output'      => array(
			array(
				'element' => '.sidebar-left',
			),
		),
	)
);
// END SECTION: PADDING AND MARGIN.

// SECTION: Header.
Kirki::add_section(
	'header',
	array(
		'title'    => esc_attr__( 'Header', 'gautam' ),
		'panel'    => 'theme_settings_panel',
		'priority' => 40,
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'select',
		'settings'    => 'header_layout_setting',
		'label'       => esc_attr__( 'Select Header Layout', 'gautam' ),
		'section'     => 'header',
		'default'     => '',
		'multiple'    => 0,
		'choices'     => array(
			''                     => esc_attr__( 'Logo Left, Menu Right', 'gautam' ),
			'flex-dir-row-reverse' => esc_attr__( 'Logo Right, Menu Left', 'gautam' ),
		),
		'description' => esc_attr__( 'Here you can select which Header layout will be used.', 'gautam' ),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'background',
		'settings' => 'color_site_header',
		'label'    => esc_attr__( 'Header Background Color', 'gautam' ),
		'section'  => 'header',
		'default'  => array(
			'background-color'      => 'transparent',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		),
		'output'   => array(
			array(
				'element' => '.header-menu-bar',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'color',
		'settings' => 'color_site_title_text',
		'label'    => esc_attr__( 'Color', 'gautam' ),
		'section'  => 'header',
		'default'  => '#000',
		'output'   => array(
			array(
				'element'  => '.header-menu-bar',
				'property' => 'color',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'fixed-header',
		'label'       => esc_attr__( 'Fixed Header', 'gautam' ),
		'description' => esc_attr__( 'Enable to fix header.', 'gautam' ),
		'section'     => 'header',
		'default'     => '0',
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'main_menu_numbering',
		'label'       => esc_attr__( 'Menu Numbering', 'gautam' ),
		'description' => esc_attr__( 'Enable to add Numbering to Main Menu.', 'gautam' ),
		'section'     => 'header',
		'default'     => '1',
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'radio-buttonset',
		'settings' => 'main_menu_align',
		'label'    => esc_attr__( 'Menu alignment', 'gautam' ),
		'section'  => 'header',
		'default'  => 'center',
		'choices'  => array(
			'center' => esc_attr__( 'Center', 'gautam' ),
			'right'  => esc_attr__( 'Right', 'gautam' ),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'radio-buttonset',
		'settings' => 'main_menu_font_decoration',
		'label'    => esc_attr__( 'Menu font decoration', 'gautam' ),
		'section'  => 'header',
		'default'  => 'none',
		'choices'  => array(
			'uppercase' => esc_attr__( 'UPPERCASE', 'gautam' ),
			'none'      => esc_attr__( 'None', 'gautam' ),
		),
		'output'   => array(
			array(
				'element'  => '.header-menu',
				'property' => 'text-transform',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'radio-buttonset',
		'settings' => 'main_menu_font_weight',
		'label'    => esc_attr__( 'Menu font weight', 'gautam' ),
		'section'  => 'header',
		'default'  => '500',
		'choices'  => array(
			'400' => esc_attr__( '400', 'gautam' ),
			'500' => esc_attr__( '500', 'gautam' ),
			'700' => esc_attr__( '700', 'gautam' ),
		),
		'output'   => array(
			array(
				'element'  => '.header-menu',
				'property' => 'font-weight',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'radio-buttonset',
		'settings' => 'main_menu_font_style',
		'label'    => esc_attr__( 'Menu font style', 'gautam' ),
		'section'  => 'header',
		'default'  => 'normal',
		'choices'  => array(
			'normal' => esc_attr__( 'Regular', 'gautam' ),
			'italic' => esc_attr__( 'Italic', 'gautam' ),
		),
		'output'   => array(
			array(
				'element'  => '.header-menu',
				'property' => 'font-style',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'typography',
		'settings'    => 'header_menu_font',
		'label'       => esc_attr__( 'Menu Typography (Use CSS units)', 'gautam' ),
		'section'     => 'header',
		'default'     => array(
			'font-family' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
			'font-size'   => '1.6rem',
		),
		'description' => esc_attr__( 'Font used in Single Post Header.', 'gautam' ),
		'output'      => array(
			array(
				'element' => '.main-navigation',
			),
		),
	)
);
// END SECTION: HEADER.

// SECTION: BLOG.
Kirki::add_section(
	'blog_settings',
	array(
		'title'    => esc_attr__( 'Blog', 'gautam' ),
		'panel'    => 'theme_settings_panel',
		'priority' => 50,
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'select',
		'settings'    => 'blog_layout_setting',
		'label'       => esc_attr__( 'Blog Layout', 'gautam' ),
		'section'     => 'blog_settings',
		'default'     => '2',
		'multiple'    => 0,
		'choices'     => array(
			'1' => esc_attr__( 'Layout 1', 'gautam' ),
			'2' => esc_attr__( 'Layout 2', 'gautam' ),
			'3' => esc_attr__( 'Layout 3', 'gautam' ),
		),
		'description' => esc_attr__( 'Here you can select which layout will be used to display the blog posts on Home or Index pages.', 'gautam' ),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'number',
		'settings' => 'blog_excerpt_length',
		'label'    => esc_attr__( 'Excerpt length', 'gautam' ),
		'section'  => 'blog_settings',
		'default'  => 20,
		'priority' => 10,
		'choices'  => array(
			'min'  => 5,
			'max'  => 60,
			'step' => 1,
		),
	)
);
// END SECTION: BLOG.

// SECTION: SINGLE POST.
Kirki::add_section(
	'blog_post',
	array(
		'title'       => esc_attr__( 'Single Post', 'gautam' ),
		'description' => esc_attr__( 'These settings affect single post display.', 'gautam' ),
		'panel'       => 'theme_settings_panel',
		'priority'    => 60,
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'select',
		'settings'    => 'single_post_layout',
		'label'       => esc_html__( 'Layout', 'gautam' ),
		'section'     => 'blog_post',
		'default'     => 'in-header',
		'placeholder' => esc_html__( 'Select Single Post Layout.', 'gautam' ),
		'multiple'    => 0,
		'choices'     => array(
			'in-content' => esc_html__( 'Layout 1', 'gautam' ),
			'in-header'  => esc_html__( 'Layout 2', 'gautam' ),
		),
	)
);

Kirki::add_field(
	'theme_config_id',
	array(
		'type'      => 'sortable',
		'settings'  => 'entry_header_sequence',
		'label'     => esc_html__( 'Post Elements', 'gautam' ),
		'section'   => 'blog_post',
		'default'   => array(
			'category',
			'heading',
			'metadata',
			'thumbnail',
		),
		'transport' => 'auto',
		'choices'   => array(
			'category'  => esc_html__( 'Category', 'gautam' ),
			'heading'   => esc_html__( 'Heading', 'gautam' ),
			'metadata'  => esc_html__( 'Metadata', 'gautam' ),
			'thumbnail' => esc_html__( 'Featured Image', 'gautam' ),
		),
		'priority'  => 10,
	)
);

Kirki::add_field(
	'theme_config_id',
	array(
		'type'     => 'sortable',
		'settings' => 'entry_header_metadata_element',
		'label'    => esc_html__( 'Post Metadata Elements', 'gautam' ),
		'section'  => 'blog_post',
		'default'  => array(
			'updated_on',
			'posted_by',
			'meta_comment',
		),
		'choices'  => array(
			'posted_on'    => esc_html__( 'Posted Date', 'gautam' ),
			'updated_on'   => esc_html__( 'Updated Date', 'gautam' ),
			'posted_by'    => esc_html__( 'Author', 'gautam' ),
			'meta_comment' => esc_html__( 'Comment', 'gautam' ),
		),
		'priority' => 10,
	)
);

Kirki::add_field(
	'theme_config_id',
	array(
		'type'     => 'sortable',
		'settings' => 'entry_footer_sequence',
		'label'    => esc_html__( 'Post Footer Elements', 'gautam' ),
		'section'  => 'blog_post',
		'default'  => array(
			'tag',
			'author',
			'post-navigation',
		),
		'choices'  => array(
			'tag'             => esc_html__( 'Tag', 'gautam' ),
			'author'          => esc_html__( 'Author', 'gautam' ),
			'post-navigation' => esc_html__( 'Post Navigation', 'gautam' ),
		),
		'priority' => 10,
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'typography',
		'settings'    => 'blog_post_title_font',
		'label'       => esc_attr__( 'Title Typography (Use CSS units)', 'gautam' ),
		'section'     => 'blog_post',
		'default'     => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
			'font-size'      => '35px',
			'variant'        => '700',
			'line-height'    => '1',
			'letter-spacing' => '0',
		),
		'description' => esc_attr__( 'Single Post Title Typography.', 'gautam' ),
		'output'      => array(
			array(
				'element'       => array( 'h1.entry-title' ),
				'choice'        => 'font-size',
				'value_pattern' => 'calc($ + 34 * ((100vw - 300px) / (1400)))',
			),
			array(
				'element' => array( 'h1.entry-title' ),
				'choice'  => 'variant',
			),
			array(
				'element' => array( 'h1.entry-title' ),
				'choice'  => 'font-family',
			),
			array(
				'element' => array( 'h1.entry-title' ),
				'choice'  => 'line-height',
			),
			array(
				'element' => array( 'h1.entry-title' ),
				'choice'  => 'letter-spacing',
			),
			array(
				'element' => array( 'h1.entry-title' ),
				'choice'  => 'color',
			),
		),
	)
);
// END SECTION: SINGLE POST.

// SECTION: SIDEBARS.
Kirki::add_section(
	'sidebars',
	array(
		'title'       => esc_attr__( 'Sidebars', 'gautam' ),
		'description' => esc_attr__( 'Select Sidebar Position for Site.', 'gautam' ),
		'panel'       => 'theme_settings_panel',
		'priority'    => 70,
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'radio-buttonset',
		'settings'    => 'sidebar_layout_setting',
		'label'       => esc_attr__( 'Sidebar Layout', 'gautam' ),
		'section'     => 'sidebars',
		'default'     => 'content-only',
		'multiple'    => 0,
		'choices'     => array(
			'sidebar-left'  => esc_attr__( 'Left', 'gautam' ),
			'content-only'  => esc_attr__( 'Disable', 'gautam' ),
			'sidebar-right' => esc_attr__( 'Right', 'gautam' ),
			'sidebar-both'  => esc_attr__( 'Both', 'gautam' ),
		),
		'description' => esc_attr__( 'Select Sidebar Layout.', 'gautam' ),
	)
);

// END SECTION: SIDEBAR.

// SECTION: FOOTER.
Kirki::add_section(
	'footer',
	array(
		'title'    => esc_attr__( 'Footer', 'gautam' ),
		'panel'    => 'theme_settings_panel',
		'priority' => 80,
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'general_scroll_to_top',
		'label'       => esc_attr__( 'Scroll Top Button', 'gautam' ),
		'description' => esc_attr__( 'Enable to display go to Top Button.', 'gautam' ),
		'section'     => 'footer',
		'default'     => '1',
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'select',
		'settings'    => 'footer_layout_setting',
		'label'       => esc_attr__( 'Layout', 'gautam' ),
		'section'     => 'footer',
		'default'     => '1',
		'multiple'    => 0,
		'choices'     => array(
			'1' => esc_attr__( 'Layout 1', 'gautam' ),
		),
		'description' => esc_attr__( 'Here you can select which layout will be used to display the blog posts on Home or Index pages.', 'gautam' ),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'footer_text_color',
		'label'       => esc_attr__( 'Text Color', 'gautam' ),
		'description' => esc_attr__( 'Change text color in footer HTML block', 'gautam' ),
		'section'     => 'footer',
		'default'     => '#fff',
		'output'      => array(
			array(
				'element'  => '.site-footer',
				'property' => 'color',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'footer_background_color',
		'label'       => esc_attr__( 'Background', 'gautam' ),
		'description' => esc_attr__( 'Change Background color of the footer section.', 'gautam' ),
		'section'     => 'footer',
		'default'     => '#050826',
		'output'      => array(
			array(
				'element'  => '.site-footer',
				'property' => 'background-color',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'textarea',
		'settings'    => 'footer_copyright',
		'label'       => esc_attr__( 'Footer copyright text', 'gautam' ),
		'description' => esc_attr__( 'Change your footer copyright text.', 'gautam' ),
		'section'     => 'footer',
		'default'     => 'Powered by <a href="https://www.wordpress.org">WordPress</a> <br />All rights reserved',
	)
);
// END SECTION: FOOTER.

// SECTION: FONTS.
Kirki::add_section(
	'fonts',
	array(
		'title'    => esc_attr__( 'Typography', 'gautam' ),
		'panel'    => 'theme_settings_panel',
		'priority' => 90,
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'typography',
		'settings'    => 'font_header_blog',
		'label'       => esc_attr__( 'Blog Title Typography (Use CSS units)', 'gautam' ),
		'section'     => 'fonts',
		'default'     => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
			'variant'        => '500',
			'font-size'      => '25px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
		),
		'description' => esc_attr__( 'Font used in Blog Post Header on Home Page.', 'gautam' ),
		'output'      => array(
			array(
				'element' => array( 'h2.entry-title' ),
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'typography',
		'settings'    => 'body_font',
		'label'       => esc_attr__( 'Body Typography (Use CSS units)', 'gautam' ),
		'section'     => 'fonts',
		'default'     => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
			'variant'        => 'regular',
			'font-size'      => '16px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
		),
		'description' => esc_attr__( 'Font used in text elements.', 'gautam' ),
		'output'      => array(
			array(
				'element' => 'body',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'typography',
		'settings'    => 'font_header_h1',
		'label'       => esc_attr__( 'H1 Typography (Use CSS units)', 'gautam' ),
		'section'     => 'fonts',
		'default'     => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
			'variant'        => '500',
			'font-size'      => '40px',
			'line-height'    => '1',
			'letter-spacing' => '0',
		),
		'description' => esc_attr__( 'Font used in H1 Header.', 'gautam' ),
		'output'      => array(
			array(
				'element'       => array( 'h1' ),
				'choice'        => 'font-size',
				'value_pattern' => 'calc($ + 34 * ((100vw - 300px) / (1400)))',
			),
			array(
				'element' => array( 'h1' ),
				'choice'  => 'variant',
			),
			array(
				'element' => array( 'h1' ),
				'choice'  => 'font-family',
			),
			array(
				'element' => array( 'h1' ),
				'choice'  => 'line-height',
			),
			array(
				'element' => array( 'h1' ),
				'choice'  => 'letter-spacing',
			),
			array(
				'element' => array( 'h1' ),
				'choice'  => 'color',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'typography',
		'settings'    => 'font_header_h2',
		'label'       => esc_attr__( 'H2 Typography (Use CSS units)', 'gautam' ),
		'section'     => 'fonts',
		'default'     => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
			'variant'        => '500',
			'font-size'      => '40px',
			'line-height'    => '1.05',
			'letter-spacing' => '0',
		),
		'description' => esc_attr__( 'Font used in H2 header.', 'gautam' ),
		'output'      => array(
			array(
				'element'       => array( 'h2' ),
				'choice'        => 'font-size',
				'value_pattern' => 'calc($ + 14 * ((100vw - 576px) / (1024)))',
			),
			array(
				'element' => array( 'h2' ),
				'choice'  => 'variant',
			),
			array(
				'element' => array( 'h2' ),
				'choice'  => 'font-family',
			),
			array(
				'element' => array( 'h2' ),
				'choice'  => 'line-height',
			),
			array(
				'element' => array( 'h2' ),
				'choice'  => 'letter-spacing',
			),
			array(
				'element' => array( 'h2' ),
				'choice'  => 'color',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'typography',
		'settings'    => 'font_header_h3',
		'label'       => esc_attr__( 'H3 Typography (Use CSS units)', 'gautam' ),
		'section'     => 'fonts',
		'default'     => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
			'variant'        => '500',
			'font-size'      => '36px',
			'line-height'    => '1.1',
			'letter-spacing' => '0',
		),
		'description' => esc_attr__( 'Font used in H3 header.', 'gautam' ),
		'output'      => array(
			array(
				'element'       => array( 'h3' ),
				'choice'        => 'font-size',
				'value_pattern' => 'calc($ + 4 * ((100vw - 576px) / (1024)))',
			),
			array(
				'element' => array( 'h3' ),
				'choice'  => 'variant',
			),
			array(
				'element' => array( 'h3' ),
				'choice'  => 'font-family',
			),
			array(
				'element' => array( 'h3' ),
				'choice'  => 'line-height',
			),
			array(
				'element' => array( 'h3' ),
				'choice'  => 'letter-spacing',
			),
			array(
				'element' => array( 'h3' ),
				'choice'  => 'color',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'fonts_load_all_variant',
		'label'       => esc_attr__( 'Load all Google Fonts variants', 'gautam' ),
		'description' => esc_attr__( 'Enable to load all available google font variants and subsets.', 'gautam' ),
		'section'     => 'fonts',
		'default'     => '0',
	)
);
// END SECTION: FONTS.

// SECTION: COLORS.
Kirki::add_section(
	'general_color',
	array(
		'title'    => esc_attr__( 'Colors', 'gautam' ),
		'panel'    => 'theme_settings_panel',
		'priority' => 100,
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'color',
		'settings' => 'color_theme',
		'label'    => esc_attr__( 'Theme color', 'gautam' ),
		'section'  => 'general_color',
		'default'  => '#d90a2c',
		'output'   => array(
			array(
				'element'  => ':root',
				'property' => '--theme-color',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'color',
		'settings' => 'second_color_theme',
		'label'    => esc_attr__( 'Secondary Theme color', 'gautam' ),
		'section'  => 'general_color',
		'default'  => '#fff',
		'output'   => array(
			array(
				'element'  => ':root',
				'property' => '--second-theme-color',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'color',
		'settings' => 'blog_title_color',
		'label'    => esc_attr__( 'Blog Title Color', 'gautam' ),
		'section'  => 'general_color',
		'default'  => '#000',
		'output'   => array(
			array(
				'element'  => 'h2.entry-title',
				'property' => 'color',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'color',
		'settings' => 'heading_color',
		'label'    => esc_attr__( 'Heading Color', 'gautam' ),
		'section'  => 'general_color',
		'default'  => '#000',
		'output'   => array(
			array(
				'element'  => array( 'h1', 'h2', 'h3', 'h4', 'h5', 'h6' ),
				'property' => 'color',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'color',
		'settings' => 'color_body_text',
		'label'    => esc_attr__( 'Text Color', 'gautam' ),
		'section'  => 'general_color',
		'default'  => '#454545',
		'output'   => array(
			array(
				'element'  => 'body',
				'property' => 'color',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'color',
		'settings' => 'button_bkg_clr',
		'label'    => esc_attr__( 'Button Background Color', 'gautam' ),
		'section'  => 'general_color',
		'default'  => '#fff',
		'output'   => array(
			array(
				'element'  => ':root',
				'property' => '--button-background',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'color',
		'settings' => 'button_bkg_hover_clr',
		'label'    => esc_attr__( 'Button Background Hover Color', 'gautam' ),
		'section'  => 'general_color',
		'default'  => '#d90a2c',
		'output'   => array(
			array(
				'element'  => ':root',
				'property' => '--button-hover-background',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'color',
		'settings' => 'button_text_clr',
		'label'    => esc_attr__( 'Button Text Color', 'gautam' ),
		'section'  => 'general_color',
		'default'  => '#000',
		'output'   => array(
			array(
				'element'  => ':root',
				'property' => '--button-text-color',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'color',
		'settings' => 'button_text_hover_clr',
		'label'    => esc_attr__( 'Button Text Hover Color', 'gautam' ),
		'section'  => 'general_color',
		'default'  => '#fff',
		'output'   => array(
			array(
				'element'  => ':root',
				'property' => '--button-hover-text-color',
			),
		),
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'color',
		'settings' => 'button_border_clr',
		'label'    => esc_attr__( 'Button Border Color', 'gautam' ),
		'section'  => 'general_color',
		'default'  => '#000',
		'output'   => array(
			array(
				'element'  => ':root',
				'property' => '--button-border-color',
			),
		),
	)
);

// END SECTION: COLORS.

// SECTION: SOCIAL.
Kirki::add_section(
	'social_media',
	array(
		'title'    => esc_attr__( 'Social Media', 'gautam' ),
		'panel'    => 'theme_settings_panel',
		'priority' => 110,
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'general_social_share',
		'label'       => esc_attr__( 'Social Share', 'gautam' ),
		'description' => esc_attr__( 'Enable to display Social Share Button.', 'gautam' ),
		'section'     => 'social_media',
		'default'     => '1',
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'side_social_media_button',
		'label'       => esc_attr__( 'Social Follow', 'gautam' ),
		'description' => esc_attr__( 'Enable to show Social Media Button on side.', 'gautam' ),
		'section'     => 'social_media',
		'default'     => '1',
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'side_social_media_button_text',
		'label'       => esc_attr__( 'Social Text vs Icons', 'gautam' ),
		'description' => esc_attr__( 'Enable to show social text instead of icon.', 'gautam' ),
		'section'     => 'social_media',
		'default'     => '1',
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'side_social_media_button_color',
		'label'       => esc_attr__( 'Social Media Color Code', 'gautam' ),
		'description' => esc_attr__( 'Enable to use Social Media color code.', 'gautam' ),
		'section'     => 'social_media',
		'default'     => '0',
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'text',
		'settings' => 'social_media_fb_url',
		'label'    => esc_html__( 'Facebook Url', 'gautam' ),
		'section'  => 'social_media',
		'priority' => 10,
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'text',
		'settings' => 'social_media_tw_url',
		'label'    => esc_html__( 'Twitter Url', 'gautam' ),
		'section'  => 'social_media',
		'priority' => 10,
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'text',
		'settings' => 'social_media_in_url',
		'label'    => esc_html__( 'LinkedIn Url', 'gautam' ),
		'section'  => 'social_media',
		'priority' => 10,
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'text',
		'settings' => 'social_media_ln_url',
		'label'    => esc_html__( 'Instagram Url', 'gautam' ),
		'section'  => 'social_media',
		'priority' => 10,
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'text',
		'settings' => 'social_media_yt_url',
		'label'    => esc_html__( 'YouTube Url', 'gautam' ),
		'section'  => 'social_media',
		'priority' => 10,
	)
);

Kirki::add_field(
	'gautam_theme_options',
	array(
		'type'     => 'text',
		'settings' => 'social_media_gh_url',
		'label'    => esc_html__( 'Github Url', 'gautam' ),
		'section'  => 'social_media',
		'priority' => 10,
	)
);
// END SECTION : SOCIAL PROFILE.

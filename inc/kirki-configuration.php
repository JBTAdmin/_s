<?php
/**
 * Create theme options.
 *
 * @package aaurora
 */

if ( ! function_exists( 'aaurora_theme_customize_register' ) ) :
	/**
	 * Change default Customizer options.
	 *
	 * @param WP_Customize_Manager $wp_customize instance of WP_Customize_Manager.
	 */
	function aaurora_theme_customize_register( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
		$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
		$wp_customize->remove_section( 'colors' );

		$wp_customize->remove_section( 'header_image' );

		$wp_customize->remove_section( 'background_image' );

		$wp_customize->get_section( 'title_tagline' )->panel = 'theme_settings_panel';

		$wp_customize->get_section( 'title_tagline' )->title = esc_html__( 'Site Logo and Favicon', 'aaurora' );
	}
endif;
add_action( 'customize_register', 'aaurora_theme_customize_register' );

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
		'priority'    => 1,
	)
);

Kirki::add_section(
	'general_color',
	array(
		'title'       => esc_attr__( 'Color', 'aaurora' ),
		'description' => '',
		'section'     => 'general',
		'priority'    => 1,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'color_theme',
		'label'       => esc_attr__( 'Theme color', 'aaurora' ),
		'description' => '',
		'section'     => 'general_color',
		'default'     => '#ffd01b',
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => ':root',
				'property' => '--theme-color',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'general_scroll_to_top',
		'label'       => esc_attr__( 'Enable Scroll Top Button', 'aaurora' ),
		'description' => esc_attr__( 'Enable to display go to Top Button.', 'aaurora' ),
		'section'     => 'general',
		'default'     => '1',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'general_social_share',
		'label'       => esc_attr__( 'Enable Social Share Button', 'aaurora' ),
		'description' => esc_attr__( 'Enable to display Social Share Button.', 'aaurora' ),
		'section'     => 'general',
		'default'     => '1',
	)
);


Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'select',
		'settings'    => 'general_search_visibility',
		'label'       => esc_attr__( 'Search Visibility', 'aaurora' ),
		'section'     => 'general',
		'default'     => 'fixed',
		'multiple'    => 0,
		'choices'     => array(
			'none' => esc_attr__( 'None', 'aaurora' ),
			'header' => esc_attr__( 'Header', 'aaurora' ),
			'fixed' => esc_attr__( 'Fixed', 'aaurora' ),
		),
		'description' => esc_attr__( 'Select the Search button visibiity and position.', 'aaurora' ),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'color_body_text',
		'label'       => esc_attr__( 'Body text color', 'aaurora' ),
		'description' => '',
		'section'     => 'general_color',
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
		'type'        => 'background',
		'settings'    => 'body_background',
		'label'       => esc_attr__( 'Body background', 'aaurora' ),
		'description' => esc_attr__( 'Change your site main background settings.', 'aaurora' ),
		'section'     => 'general_color',
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
		'type'        => 'color',
		'settings'    => 'color_theme',
		'label'       => esc_attr__( 'Theme Color', 'aaurora' ),
		'description' => '',
		'section'     => 'general',
		'default'     => '#ffd01b',
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => ':root',
				'property' => '--theme-color',
			),
		),
	)
);


// General Button START.
Kirki::add_section(
	'general_button',
	array(
		'title'       => esc_attr__( 'Button', 'aaurora' ),
		'description' => '',
		'section'     => 'general',
		'priority'    => 1,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'button_bkg_clr',
		'label'       => esc_attr__( 'Background Color', 'aaurora' ),
		'description' => '',
		'section'     => 'general_button',
		'default'     => '#fff',
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => ':root',
				'property' => '--button-background',
			),
		),
	)
);


Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'button_bkg_hover_clr',
		'label'       => esc_attr__( 'Background Hover Color', 'aaurora' ),
		'description' => '',
		'section'     => 'general_button',
		'default'     => '#d90a2c',
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => ':root',
				'property' => '--button-hover-background',
			),
		),
	)
);


Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'button_text_clr',
		'label'       => esc_attr__( 'Text Color', 'aaurora' ),
		'description' => '',
		'section'     => 'general_button',
		'default'     => '#000',
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => ':root',
				'property' => '--button-text-color',
			),
		),
	)
);


Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'button_text_hover_clr',
		'label'       => esc_attr__( 'Text Hover Color', 'aaurora' ),
		'description' => '',
		'section'     => 'general_button',
		'default'     => '#fff',
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => ':root',
				'property' => '--button-hover-text-color',
			),
		),
	)
);

Kirki::add_field(
	'theme_config_id',
	array(
		'type'        => 'dimension',
		'settings'    => 'button_border_radius',
		'label'       => esc_html__( 'Dimension Control', 'aaurora' ),
//		todo what is the use of this field
		'description' => esc_html__( 'Description Here. TODO....', 'aaurora' ),
		'section'     => 'general_button',
		'default'     => '10px',
		'output'      => array(
			array(
				'element'  => ':root',
				'property' => '--button-border-radius',
			),
		),
	)
);
// SECTION GENERAL END.

// SECTION: General Layout.
Kirki::add_section(
	'general_layout',
	array(
		'title'       => esc_attr__( 'Layout', 'aaurora' ),
		'description' => '',
		'panel'       => 'theme_settings_panel',
		'priority'    => 2,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'slider',
		'settings'    => 'slider_setting',
		'label'       => esc_attr__( 'Container Width (px)', 'aaurora' ),
		'description' => '',
		'section'     => 'general_layout',
		'default'     => '1150',
		'choices'     => array(
			'min'  => 900,
			'max'  => 1900,
			'step' => 10,
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => '.wrap',
				'property' => 'max-width',
				'units'    => 'px',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'slider',
		'settings'    => 'sidebar_width_setting',
		'label'       => esc_attr__( 'Sidebar Width (px)', 'aaurora' ),
		'description' => '',
		'section'     => 'general_layout',
		'default'     => '250',
		'choices'     => array(
			'min'  => 200,
			'max'  => 500,
			'step' => 10,
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => 'aside',
				'property' => 'max-width',
				'units'    => 'px',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'select',
		'settings'    => 'blog_layout_setting',
		'label'       => esc_attr__( 'Blog Layout', 'aaurora' ),
		'section'     => 'general_layout',
		'default'     => '4',
		'multiple'    => 0,
		'choices'     => array(
			'1' => esc_attr__( 'Layout 1', 'aaurora' ),
			'2' => esc_attr__( 'Layout 2', 'aaurora' ),
			'3' => esc_attr__( 'Layout 3', 'aaurora' ),
			'4' => esc_attr__( 'Layout 4', 'aaurora' ),
			'5' => esc_attr__( 'Layout 5', 'aaurora' ),
		),
		'description' => esc_attr__( 'Here you can select which layout will be used to display the blog posts on Home or Index pages.', 'aaurora' ),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'select',
		'settings'    => 'sidebar_layout_setting',
		'label'       => esc_attr__( 'Sidebar Layout', 'aaurora' ),
		'section'     => 'general_layout',
		'default'     => 'content-only',
		'multiple'    => 0,
		'choices'     => array(
			'content-only'  => esc_attr__( 'Content', 'aaurora' ),
			'sidebar-right' => esc_attr__( 'Content / Sidebar', 'aaurora' ),
			'sidebar-left'  => esc_attr__( 'Sidebar / Content', 'aaurora' ),
			'sidebar-both'  => esc_attr__( 'Sidebar / Content / Sidebar', 'aaurora' ),
		),
		'description' => esc_attr__( 'Here you can select Sidebar Layout.', 'aaurora' ),
	)
);
// SECTION: LAYOUT END.

// SECTION: Padding and Margin.
Kirki::add_section(
	'padding_margin',
	array(
		'title'       => esc_attr__( 'Padding & Margin', 'aaurora' ),
		'description' => '',
		'panel'       => 'theme_settings_panel',
		'priority'    => 3,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'dimensions',
		'settings'    => 'container_padding_setting',
		'label'       => esc_attr__( 'Container Padding', 'aaurora' ),
		'description' => '',
		'section'     => 'padding_margin',
		'default'     => array(
			'padding-top'    => '3rem',
			'padding-bottom' => '3rem',
			'padding-left'   => '1vh',
			'padding-right'  => '1vh',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.main-container',
			),
		),
	)
);


Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'dimensions',
		'settings'    => 'container_margin_setting',
		'label'       => esc_attr__( 'Container Margin', 'aaurora' ),
		'description' => '',
		'section'     => 'padding_margin',
		'default'     => array(
			'margin-top'    => '3rem',
			'margin-bottom' => '3rem',
			'margin-left'   => '1vh',
			'margin-right'  => '1vh',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.main-container',
			),
		),
	)
);


Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'dimensions',
		'settings'    => 'article_container_padding_setting',
		'label'       => esc_attr__( 'Content Padding', 'aaurora' ),
		'description' => '',
		'section'     => 'padding_margin',
		'default'     => array(
			'padding-top'    => '0',
			'padding-bottom' => '0',
			'padding-left'   => '1vh',
			'padding-right'  => '1vh',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.primary-content',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'dimensions',
		'settings'    => 'article_container_margin_setting',
		'label'       => esc_attr__( 'Content Margin', 'aaurora' ),
		'description' => '',
		'section'     => 'padding_margin',
		'default'     => array(
			'margin-top'    => '3rem',
			'margin-bottom' => '3rem',
			'margin-left'   => '1vh',
			'margin-right'  => '1vh',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.primary-content',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'dimensions',
		'settings'    => 'sidebar_padding_setting',
		'label'       => esc_attr__( 'Sidebar Padding', 'aaurora' ),
		'description' => '',
		'section'     => 'padding_margin',
		'default'     => array(
			'padding-top'    => '3rem',
			'padding-bottom' => '3rem',
			'padding-left'   => '1vh',
			'padding-right'  => '1vh',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => 'aside:not(.sidebar-alt)',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'dimensions',
		'settings'    => 'sidebar_margin_setting',
		'label'       => esc_attr__( 'Sidebar Margin', 'aaurora' ),
		'description' => '',
		'section'     => 'padding_margin',
		'default'     => array(
			'margin-top'    => '3rem',
			'margin-bottom' => '3rem',
			'margin-left'   => '1vh',
			'margin-right'  => '1vh',
		),
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => 'aside:not(.sidebar-alt)',
			),
		),
	)
);


// SECTION: TOP-BAR.
Kirki::add_section(
	'top_bar',
	array(
		'title'       => esc_attr__( 'Top Bar', 'aaurora' ),
		'description' => '',
		'panel'       => 'theme_settings_panel',
		'priority'    => 4,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'select',
		'settings'    => 'top_bar_layout_setting',
		'label'       => esc_attr__( 'Select Top bar Layout', 'aaurora' ),
		'section'     => 'top_bar',
		'default'     => 'disabled',
		'multiple'    => 0,
		'choices'     => array(
			'disabled'   => esc_attr__( 'Disabled', 'aaurora' ),
			'menu-left'  => esc_attr__( 'Menu Left, Social Icon Right', 'aaurora' ),
			'menu-right' => esc_attr__( 'Social Icon Right, Menu Right', 'aaurora' ),
		),
		'description' => esc_attr__( 'Here you can select Top Bar Layout.', 'aaurora' ),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'top_bar_color',
		'label'       => esc_attr__( 'Top Bar Color', 'aaurora' ),
		'description' => esc_attr__( 'Change Top Bar color settings.', 'aaurora' ),
		'section'     => 'top_bar',
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => '.aaurora-top-bar',
				'property' => 'color',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'background',
		'settings'    => 'top_bar_background',
		'label'       => esc_attr__( 'Top Bar background', 'aaurora' ),
		'description' => esc_attr__( 'Change Top Bar site main background settings.', 'aaurora' ),
		'section'     => 'top_bar',
		'default'     => '#2b2d32',
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element' => '.aaurora-top-bar',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'typography',
		'settings'    => 'top_bar_font',
		'label'       => esc_attr__( 'Top Bar Font Size', 'aaurora' ),
		'section'     => 'top_bar',
		'default'     => array(
			'font-family' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
			'font-size'   => '1.3rem',
		),
		'description' => esc_attr__( 'Font used in Single Post Header .', 'aaurora' ),
		'output'      => array(
			array(
				'choice'  => 'font-size',
				'element' => '.aaurora-top-bar .header-menu',
			),
			array(
				'choice'  => 'font-family',
				'element' => '.aaurora-top-bar',
			),
		),
	)
);
// SECTION: TOP-BAR END.

// SECTION: Header.
Kirki::add_section(
	'header',
	array(
		'title'       => esc_attr__( 'Header', 'aaurora' ),
		'description' => '',
		'panel'       => 'theme_settings_panel',
		'priority'    => 5,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'select',
		'settings'    => 'header_layout_setting',
		'label'       => esc_attr__( 'Select Header Layout', 'aaurora' ),
		'section'     => 'header',
		'default'     => '',
		'multiple'    => 0,
		'choices'     => array(
			''                        => esc_attr__( 'Logo Left, Menu Right', 'aaurora' ),
			'flex-dir-row-reverse'    => esc_attr__( 'Logo Right, Menu Left', 'aaurora' ),
			'flex-dir-column'         => esc_attr__( 'Logo Top, Menu Below', 'aaurora' ),
			'flex-dir-column-reverse' => esc_attr__( 'Logo Below, Menu Top', 'aaurora' ),
		),
		'description' => esc_attr__( 'Here you can select which Header layout will be used.', 'aaurora' ),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'color_site_header',
		'label'       => esc_attr__( 'Header Background Color', 'aaurora' ),
		'description' => '',
		'section'     => 'header',
		'default'     => '#fff',
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => '.site-header, .aside-header-container',
				'property' => 'background',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'color_site_title_text',
		'label'       => esc_attr__( 'Site Title Color', 'aaurora' ),
		'description' => '',
		'section'     => 'header',
		'default'     => '#333333',
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => '.site-branding',
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
		'section'     => 'header',
		'default'     => '#000000',
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => '.main-navigation, .sidebar-close-btn',
				'property' => 'color',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'fixed-header',
		'label'       => esc_attr__( 'Header Fixed', 'aaurora' ),
		'description' => esc_attr__( 'Enable to fixed header.', 'aaurora' ),
		'section'     => 'header',
		'default'     => '1',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'main_menu_numbering',
		'label'       => esc_attr__( 'Main Menu Numbering', 'aaurora' ),
		'description' => esc_attr__( 'Enable to add Numbering to Main Menu.', 'aaurora' ),
		'section'     => 'header',
		'default'     => '1',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'     => 'radio-buttonset',
		'settings' => 'main_menu_align',
		'label'    => esc_attr__( 'Main menu align', 'aaurora' ),
		'section'  => 'header',
		'default'  => 'center',
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
		'section'     => 'header',
		'default'     => 'none',
		'choices'     => array(
			'uppercase' => esc_attr__( 'UPPERCASE', 'aaurora' ),
			'none'      => esc_attr__( 'None', 'aaurora' ),
		),
		'description' => '',
		'output'      => array(
			array(
				'element'  => '.header-menu',
				'property' => 'text-transform',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'radio-buttonset',
		'settings'    => 'main_menu_font_weight',
		'label'       => esc_attr__( 'Main menu font weight', 'aaurora' ),
		'section'     => 'header',
		'default'     => '500',
		'choices'     => array(
			'500' => esc_attr__( 'Regular', 'aaurora' ),
			'700' => esc_attr__( 'Bold', 'aaurora' ),
		),
		'description' => '',
		'output'      => array(
			array(
				'element'  => '.header-menu',
				'property' => 'font-weight',
			),
		),
	)
);


Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'radio-buttonset',
		'settings'    => 'main_menu_font_style',
		'label'       => esc_attr__( 'Main menu font style', 'aaurora' ),
		'section'     => 'header',
		'default'     => 'normal',
		'choices'     => array(
			'normal' => esc_attr__( 'Regular', 'aaurora' ),
			'italic' => esc_attr__( 'Italic', 'aaurora' ),
		),
		'description' => '',
		'output'      => array(
			array(
				'element'  => '.header-menu',
				'property' => 'font-style',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'dimension',
		'settings'    => 'mainmenu_height',
		'label'       => esc_attr__( 'Main Header Height', 'aaurora' ),
		'description' => esc_attr__( 'Use this option to change header height. Default: 8rem', 'aaurora' ),
		'section'     => 'header',
		'default'     => '8rem',
		'output'      => array(
			array(
				'element'  => '.header-menu-bar',
				'property' => 'height',
			),
//			array(
//				'element'  => '.site-header + .site-container::before',
//				'property' => 'height',
//			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'typography',
		'settings'    => 'header_menu_font',
		'label'       => esc_attr__( 'Header Menu Size', 'aaurora' ),
		'section'     => 'header',
		'default'     => array(
			'font-family' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
			'font-size'   => '1.6rem',
		),
		'description' => esc_attr__( 'Font used in Single Post Header .', 'aaurora' ),
		'output'      => array(
			array(
				'element' => '.main-navigation',
			),
		),
	)
);
// END SECTION: Header.

// SECTION: Footer.
Kirki::add_section(
	'footer',
	array(
		'title'       => esc_attr__( 'Footer', 'aaurora' ),
		'description' => '',
		'panel'       => 'theme_settings_panel',
		'priority'    => 6,
	)
);


Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'select',
		'settings'    => 'footer_layout_setting',
		'label'       => esc_attr__( 'Footer Layout', 'aaurora' ),
		'section'     => 'footer',
		'default'     => '4',
		'multiple'    => 0,
		'choices'     => array(
			'1' => esc_attr__( 'Layout 1', 'aaurora' ),
			'2' => esc_attr__( 'Layout 2', 'aaurora' ),
			'3' => esc_attr__( 'Layout 3', 'aaurora' ),
			'4' => esc_attr__( 'Layout 4', 'aaurora' ),
		),
		'description' => esc_attr__( 'Here you can select which layout will be used to display the blog posts on Home or Index pages.', 'aaurora' ),
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
		'type'        => 'color',
		'settings'    => 'footer_background_color',
		'label'       => esc_attr__( 'Footer background', 'aaurora' ),
		'description' => esc_attr__( 'Change Background color of the footer section.', 'aaurora' ),
		'section'     => 'footer',
		'default'     => '#050826',
		'transport'   => 'auto',
		'output'      => array(
			array(
				'element'  => '.site-footer',
				'property' => 'background-color',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'textarea',
		'settings'    => 'footer_copyright',
		'label'       => esc_attr__( 'Footer copyright text', 'aaurora' ),
		'description' => esc_attr__( 'Change your footer copyright text.', 'aaurora' ),
		'section'     => 'footer',
		'default'     => 'Powered by <a href="https://www.wordpress.org">WordPress</a> <br />All rights reserved',
	)
);
// END SECTION: Footer.


// SECTION: Blog Single Post.
Kirki::add_section(
	'blog_post',
	array(
		'title'       => esc_attr__( 'Single Post', 'aaurora' ),
		'description' => esc_attr__( 'These settings affect single post display.', 'aaurora' ),
		'panel'       => 'theme_settings_panel',
		'priority'    => 7,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'select',
		'settings'    => 'blog_post_header_location',
		'label'       => esc_html__( 'Header Location', 'aaurora' ),
		'section'     => 'blog_post',
		'default'     => 'in-content',
		'placeholder' => esc_html__( 'Select an option to display header in Content or in Page Header.', 'aaurora' ),
		'multiple'    => 0,
		'choices'     => array(
			'aaurora_entry_content_before'  => esc_html__( 'In Content', 'aaurora' ),
			'aaurora_site_container_before' => esc_html__( 'Page Header', 'aaurora' ),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'            => 'select',
		'settings'        => 'blog_post_in_content_header_layout',
		'label'           => esc_html__( 'Post Header Layout', 'aaurora' ),
		'section'         => 'blog_post',
		'default'         => 'in-content',
		'placeholder'     => esc_html__( 'Select the layout.', 'aaurora' ),
		'multiple'        => 0,
		'choices'         => array(
			'layout-1' => esc_html__( 'Layout 1', 'aaurora' ),
			'layout-2' => esc_html__( 'Layout 2', 'aaurora' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'blog_post_header_location',
				'operator' => '==',
				'value'    => 'aaurora_entry_content_before',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'            => 'select',
		'settings'        => 'blog_post_in_page_header_layout',
		'label'           => esc_html__( 'Post Header Layout', 'aaurora' ),
		'section'         => 'blog_post',
		'default'         => 'in-content',
		'placeholder'     => esc_html__( 'Select the layout.', 'aaurora' ),
		'multiple'        => 0,
		'choices'         => array(
			'column-2-title-image'         => esc_html__( 'Layout 3', 'aaurora' ),
			'column-2-title-image-compact' => esc_html__( 'Layout 4', 'aaurora' ),
			'column-2-title-image-column'  => esc_html__( 'Layout 5', 'aaurora' ),
		),
		'active_callback' => array(
			array(
				'setting'  => 'blog_post_header_location',
				'operator' => '==',
				'value'    => 'aaurora_site_container_before',
			),
		),
	)
);

Kirki::add_field(
	'theme_config_id',
	array(
		'type'     => 'sortable',
		'settings' => 'entry_header_sequence',
		'label'    => esc_html__( 'Header Elements', 'aaurora' ),
		'section'  => 'blog_post',
		'default'  => array(
			'category',
			'heading',
			'thumbnail',
		),
		'choices'  => array(
			'category'  => esc_html__( 'Category', 'aaurora' ),
			'heading'   => esc_html__( 'Heading', 'aaurora' ),
			'metadata'  => esc_html__( 'Metadata', 'aaurora' ),
			'thumbnail' => esc_html__( 'Thumbnail', 'aaurora' ),
		),
		'priority' => 10,
	)
);

Kirki::add_field(
	'theme_config_id',
	array(
		'type'     => 'sortable',
		'settings' => 'entry_header_metadata_element',
		'label'    => esc_html__( 'Header Metadata Elements', 'aaurora' ),
		'section'  => 'blog_post',
		'default'  => array(
			'category',
			'updated_on',
			'posted_by',
		),
		'choices'  => array(
			'category'     => esc_html__( 'Category', 'aaurora' ),
			'posted_on'    => esc_html__( 'Posted Date', 'aaurora' ),
			'updated_on'   => esc_html__( 'Updated Date', 'aaurora' ),
			'posted_by'    => esc_html__( 'Author', 'aaurora' ),
			'meta_comment' => esc_html__( 'Comment', 'aaurora' ),
		),
		'priority' => 10,
	)
);

Kirki::add_field(
	'theme_config_id',
	array(
		'type'     => 'sortable',
		'settings' => 'entry_footer_sequence',
		'label'    => esc_html__( 'Footer Elements', 'aaurora' ),
		'section'  => 'blog_post',
		'default'  => array(
			'tag',
			'author',
			'post-navigation',
		),
		'choices'  => array(
			'tag'             => esc_html__( 'Tag', 'aaurora' ),
			'author'          => esc_html__( 'Author', 'aaurora' ),
			'post-navigation' => esc_html__( 'Post Navigation', 'aaurora' ),
		),
		'priority' => 10,
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
			'font-family' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
			'font-size'   => '40px',
		),
		'description' => esc_attr__( 'Font used in Single Post Header .', 'aaurora' ),
		'output'      => array(
			array(
				'choice'   => 'font-size',
				'element'  => ':root',
				'property' => '--font_size_post-title_mobile',
			),
			array(
				'choice'  => 'font-family',
				'element' => 'h1.entry-title',
			),
		),
	)
);
// END SECTION: Blog Single Post.

// SECTION: Sidebars.
Kirki::add_section(
	'sidebars',
	array(
		'title'       => esc_attr__( 'Sidebars', 'aaurora' ),
		'description' => esc_attr__( 'Choose your sidebar positions for different WordPress pages.', 'aaurora' ),
		'panel'       => 'theme_settings_panel',
		'priority'    => 8,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'radio-buttonset',
		'settings'    => 'sidebar_listing',
		'label'       => esc_attr__( 'Sidebar Alt listing', 'aaurora' ),
		'section'     => 'sidebars',
		'default'     => 'right',
		'choices'     => array(
			'right'   => esc_attr__( 'Right', 'aaurora' ),
			'left'    => esc_attr__( 'Left', 'aaurora' ),
			'disable' => esc_attr__( 'Disable', 'aaurora' ),
		),
		'description' => '',
	)
);

// END SECTION: Sidebars.

// SECTION: Fonts.
Kirki::add_section(
	'fonts',
	array(
		'title'       => esc_attr__( 'Fonts', 'aaurora' ),
		'description' => '',
		'panel'       => 'theme_settings_panel',
		'priority'    => 9,
	)
);


Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'typography',
		'settings'    => 'font_header_blog',
		'label'       => esc_attr__( 'Blog Title font', 'aaurora' ),
		'section'     => 'fonts',
		'default'     => array(
			'font-family' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
		),
		'description' => esc_attr__( 'Font used in Blog Post Header on Home Page.', 'aaurora' ),
		'output'      => array(
			array(
				'element' => array( 'h2.entry-title' ),
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
			'font-family' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
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
		'type'        => 'typography',
		'settings'    => 'font_header_h1',
		'label'       => esc_attr__( 'H1 font', 'aaurora' ),
		'section'     => 'fonts',
		'default'     => array(
			'font-family' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
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
			'font-family' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
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
			'font-family' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
		),
		'description' => esc_attr__( 'Font used in H3 header.', 'aaurora' ),
		'output'      => array(
			array(
				'element' => array( 'h3' ),
			),
		),
	)
);
// END SECTION: Fonts.


// SECTION: SOCIAL.
Kirki::add_section(
	'social_media',
	array(
		'title'       => esc_attr__( 'Social Media', 'aaurora' ),
		'description' => '',
		'panel'       => 'theme_settings_panel',
		'priority'    => 10,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'top_bar_social_media_button',
		'label'       => esc_attr__( 'Social Icons', 'aaurora' ),
		'description' => esc_attr__( 'Disable to hide Social Media Button on Top Bar..', 'aaurora' ),
		'section'     => 'social_media',
		'default'     => '1',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'side_social_media_button',
		'label'       => esc_attr__( 'Social Icons', 'aaurora' ),
		'description' => esc_attr__( 'Disable to hide Social Media Button on SIDE.', 'aaurora' ),
		'section'     => 'social_media',
		'default'     => '1',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'side_social_media_button_text',
		'label'       => esc_attr__( 'Social text or Icons', 'aaurora' ),
		'description' => esc_attr__( 'Disable to show social icon insted of text.', 'aaurora' ),
		'section'     => 'social_media',
		'default'     => '1',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'side_social_media_button_color',
		'label'       => esc_attr__( 'Use Color code social media', 'aaurora' ),
		'description' => esc_attr__( 'Disable to use only black color.', 'aaurora' ),
		'section'     => 'social_media',
		'default'     => '1',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'     => 'text',
		'settings' => 'social_media_fb_url',
		'label'    => esc_html__( 'Facebook Url', 'aaurora' ),
		'section'  => 'social_media',
		'priority' => 10,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'     => 'text',
		'settings' => 'social_media_tw_url',
		'label'    => esc_html__( 'Twitter Url', 'aaurora' ),
		'section'  => 'social_media',
		'priority' => 10,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'     => 'text',
		'settings' => 'social_media_in_url',
		'label'    => esc_html__( 'LinkedIn Url', 'aaurora' ),
		'section'  => 'social_media',
		'priority' => 10,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'     => 'text',
		'settings' => 'social_media_ln_url',
		'label'    => esc_html__( 'Instagram Url', 'aaurora' ),
		'section'  => 'social_media',
		'priority' => 10,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'     => 'text',
		'settings' => 'social_media_yt_url',
		'label'    => esc_html__( 'YouTube Url', 'aaurora' ),
		'section'  => 'social_media',
		'priority' => 10,
	)
);


Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'     => 'text',
		'settings' => 'social_media_gh_url',
		'label'    => esc_html__( 'Github Url', 'aaurora' ),
		'section'  => 'social_media',
		'priority' => 10,
	)
);

// SECTION END: SOCIAL PROFILE.

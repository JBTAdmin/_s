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

		$wp_customize->get_section( 'title_tagline' )->title = esc_html__( 'Site Identity', 'aaurora' );
	}
endif;
add_action( 'customize_register', 'aaurora_theme_customize_register' );

/**
 * Load all Google font variants.
 */
function aaurora_fonts_load_all_variants() {
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
add_action( 'init', 'aaurora_fonts_load_all_variants' );

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

// SECTION: GENERAL.
Kirki::add_section(
	'general',
	array(
		'title'       => esc_attr__( 'General', 'aaurora' ),
		'description' => '',
		'panel'       => 'theme_settings_panel',
		'priority'    => 1,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'slider',
		'settings'    => 'slider_setting',
		'label'       => esc_attr__( 'Container Width (px)', 'aaurora' ),
		'description' => '',
		'section'     => 'general',
		'default'     => '1300',
		'choices'     => array(
			'min'  => 900,
			'max'  => 1900,
			'step' => 10,
		),
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
		'label'       => esc_attr__( 'Max Sidebar Width (px)', 'aaurora' ),
		'description' => 'Sidebar Width is capped to 25% of container width.',
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
	'aaurora_theme_options',
	array(
		'type'        => 'slider',
		'settings'    => 'button_border_radius',
		'label'       => esc_attr__( 'Button Border Radius (px)', 'aaurora' ),
		'description' => 'Select Button Border Radius',
		'section'     => 'general',
		'default'     => '10',
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
	'aaurora_theme_options',
	array(
		'type'        => 'select',
		'settings'    => 'general_search_visibility',
		'label'       => esc_attr__( 'Search Visibility', 'aaurora' ),
		'section'     => 'general',
		'default'     => 'fixed',
		'multiple'    => 0,
		'choices'     => array(
			'none'   => esc_attr__( 'None', 'aaurora' ),
			'header' => esc_attr__( 'Header', 'aaurora' ),
			'fixed'  => esc_attr__( 'Fixed', 'aaurora' ),
		),
		'description' => esc_attr__( 'Select the Search button visibiity and position.', 'aaurora' ),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'background',
		'settings'    => 'body_background',
		'label'       => esc_attr__( 'Body Background', 'aaurora' ),
		'description' => esc_attr__( 'Change your site background settings.', 'aaurora' ),
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
		'title'       => esc_attr__( 'Padding & Margin', 'aaurora' ),
		'description' => '',
		'panel'       => 'theme_settings_panel',
		'priority'    => 2,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'dimensions',
		'settings'    => 'container_padding_setting',
		'label'       => esc_attr__( 'Container Padding', 'aaurora' ),
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
				'padding-top'    => esc_html__( 'Padding Top', 'aaurora' ),
				'padding-bottom' => esc_html__( 'Padding Bottom', 'aaurora' ),
				'padding-left'   => esc_html__( 'Padding Left', 'aaurora' ),
				'padding-right'  => esc_html__( 'Padding Right', 'aaurora' ),
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
	'aaurora_theme_options',
	array(
		'type'        => 'dimensions',
		'settings'    => 'container_margin_setting',
		'label'       => esc_attr__( 'Container Margin', 'aaurora' ),
		'description' => 'Content + Sidebar',
		'section'     => 'padding_margin',
		'default'     => array(
			'margin-top'    => '5rem',
			'margin-bottom' => '2rem',
			'margin-left'   => '0',
			'margin-right'  => '0',
		),
		'choices'     => array(
			'labels' => array(
				'margin-top'    => esc_html__( 'Margin Top', 'aaurora' ),
				'margin-bottom' => esc_html__( 'Margin Bottom', 'aaurora' ),
				'margin-left'   => esc_html__( 'Margin Left', 'aaurora' ),
				'margin-right'  => esc_html__( 'Margin Right', 'aaurora' ),
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
	'aaurora_theme_options',
	array(
		'type'        => 'dimensions',
		'settings'    => 'article_container_padding_setting',
		'label'       => esc_attr__( 'Content Padding', 'aaurora' ),
		'description' => 'Content Only',
		'section'     => 'padding_margin',
		'default'     => array(
			'padding-top'    => '0',
			'padding-bottom' => '0',
			'padding-left'   => '0',
			'padding-right'  => '0',
		),
		'choices'     => array(
			'labels' => array(
				'padding-top'    => esc_html__( 'Padding Top', 'aaurora' ),
				'padding-bottom' => esc_html__( 'Padding Bottom', 'aaurora' ),
				'padding-left'   => esc_html__( 'Padding Left', 'aaurora' ),
				'padding-right'  => esc_html__( 'Padding Right', 'aaurora' ),
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
	'aaurora_theme_options',
	array(
		'type'        => 'dimensions',
		'settings'    => 'article_container_margin_setting',
		'label'       => esc_attr__( 'Content Margin', 'aaurora' ),
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
				'margin-top'    => esc_html__( 'Margin Top', 'aaurora' ),
				'margin-bottom' => esc_html__( 'Margin Bottom', 'aaurora' ),
				'margin-left'   => esc_html__( 'Margin Left', 'aaurora' ),
				'margin-right'  => esc_html__( 'Margin Right', 'aaurora' ),
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
	'aaurora_theme_options',
	array(
		'type'        => 'dimensions',
		'settings'    => 'sidebar_padding_setting',
		'label'       => esc_attr__( 'Sidebar Padding', 'aaurora' ),
		'description' => 'Sidebar Only',
		'section'     => 'padding_margin',
		'default'     => array(
			'padding-top'    => '0',
			'padding-bottom' => '0',
			'padding-left'   => '0',
			'padding-right'  => '0',
		),
		'choices'     => array(
			'labels' => array(
				'padding-top'    => esc_html__( 'Padding Top', 'aaurora' ),
				'padding-bottom' => esc_html__( 'Padding Bottom', 'aaurora' ),
				'padding-left'   => esc_html__( 'Padding Left', 'aaurora' ),
				'padding-right'  => esc_html__( 'Padding Right', 'aaurora' ),
			),
		),
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
		'description' => 'Sidebar Only',
		'section'     => 'padding_margin',
		'default'     => array(
			'margin-top'    => '0',
			'margin-bottom' => '0',
			'margin-left'   => '3rem',
			'margin-right'  => '0',
		),
		'choices'     => array(
			'labels' => array(
				'margin-top'    => esc_html__( 'Margin Top', 'aaurora' ),
				'margin-bottom' => esc_html__( 'Margin Bottom', 'aaurora' ),
				'margin-left'   => esc_html__( 'Margin Left', 'aaurora' ),
				'margin-right'  => esc_html__( 'Margin Right', 'aaurora' ),
			),
		),
		'output'      => array(
			array(
				'element' => 'aside:not(.sidebar-alt)',
			),
		),
	)
);
// END SECTION: PADDING AND MARGIN.

// SECTION: TOP-BAR.
Kirki::add_section(
	'top_bar',
	array(
		'title'       => esc_attr__( 'Top Bar', 'aaurora' ),
		'description' => '',
		'panel'       => 'theme_settings_panel',
		'priority'    => 3,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'select',
		'settings'    => 'top_bar_layout_setting',
		'label'       => esc_attr__( 'Layout', 'aaurora' ),
		'section'     => 'top_bar',
		'default'     => 'disabled',
		'multiple'    => 0,
		'choices'     => array(
			'disabled'   => esc_attr__( 'Disabled', 'aaurora' ),
			'menu-left'  => esc_attr__( 'Menu Left, Social Icon Right', 'aaurora' ),
			'menu-right' => esc_attr__( 'Social Icon Right, Menu Right', 'aaurora' ),
		),
		'description' => esc_attr__( 'Select Top Bar Layout. Menu should be assigned to top bar menu location', 'aaurora' ),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'top_bar_color',
		'label'       => esc_attr__( 'Color', 'aaurora' ),
		'description' => esc_attr__( 'Change Top Bar color settings.', 'aaurora' ),
		'default'     => '#fff',
		'section'     => 'top_bar',
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
		'label'       => esc_attr__( 'Background', 'aaurora' ),
		'description' => esc_attr__( 'Change Top Bar site main background settings.', 'aaurora' ),
		'section'     => 'top_bar',
		'default'     => array(
			'background-color'      => '#000',
			'background-image'      => '',
			'background-repeat'     => 'repeat',
			'background-position'   => 'center center',
			'background-size'       => 'cover',
			'background-attachment' => 'scroll',
		),
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
		'label'       => esc_attr__( 'Typography', 'aaurora' ),
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
		'priority'    => 4,
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
		'type'        => 'background',
		'settings'    => 'color_site_header',
		'label'       => esc_attr__( 'Header Background Color', 'aaurora' ),
		'description' => '',
		'section'     => 'header',
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
				'element' => '.site-header',
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
		'label'       => esc_attr__( 'Fixed Header', 'aaurora' ),
		'description' => esc_attr__( 'Enable to fix header.', 'aaurora' ),
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
		'type'        => 'typography',
		'settings'    => 'header_menu_font',
		'label'       => esc_attr__( 'Navigation Typography', 'aaurora' ),
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
// END SECTION: HEADER.

// SECTION: BLOG.
Kirki::add_section(
	'blog_settings',
	array(
		'title'       => esc_attr__( 'Blog', 'aaurora' ),
		'description' => '',
		'panel'       => 'theme_settings_panel',
		'priority'    => 5,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'select',
		'settings'    => 'blog_layout_setting',
		'label'       => esc_attr__( 'Blog Layout', 'aaurora' ),
		'section'     => 'blog_settings',
		'default'     => '2',
		'multiple'    => 0,
		'choices'     => array(
			'1' => esc_attr__( 'Layout 1', 'aaurora' ),
			'2' => esc_attr__( 'Layout 2', 'aaurora' ),
			'3' => esc_attr__( 'Layout 3', 'aaurora' ),
			'4' => esc_attr__( 'Layout 4-No', 'aaurora' ),
			'5' => esc_attr__( 'Layout 5-No', 'aaurora' ),
		),
		'description' => esc_attr__( 'Here you can select which layout will be used to display the blog posts on Home or Index pages.', 'aaurora' ),
	)
);
// END SECTION: BLOG.

// SECTION: SINGLE POST.
Kirki::add_section(
	'blog_post',
	array(
		'title'       => esc_attr__( 'Single Post', 'aaurora' ),
		'description' => esc_attr__( 'These settings affect single post display.', 'aaurora' ),
		'panel'       => 'theme_settings_panel',
		'priority'    => 6,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'select',
		'settings'    => 'single_post_layout',
		'label'       => esc_html__( 'Layout', 'aaurora' ),
		'section'     => 'blog_post',
		'default'     => 'single-in-content-1',
		'placeholder' => esc_html__( 'Select Single Post Layout.', 'aaurora' ),
		'multiple'    => 0,
		'choices'     => array(
			'single-in-content-1'          => esc_html__( 'Layout 1', 'aaurora' ),
			'column-2-title-image-column'  => esc_html__( 'Layout 2', 'aaurora' ),
			'column-2-title-image'         => esc_html__( 'Layout 3-No', 'aaurora' ),
			'column-2-title-image-compact' => esc_html__( 'Layout 4-No', 'aaurora' ),
			'layout-2'                     => esc_html__( 'Layout 5-No', 'aaurora' ),

		),
	)
);

Kirki::add_field(
	'theme_config_id',
	array(
		'type'      => 'sortable',
		'settings'  => 'entry_header_sequence',
		'label'     => esc_html__( 'Post Elements', 'aaurora' ),
		'section'   => 'blog_post',
		'default'   => array(
			'category',
			'heading',
			'metadata',
			'thumbnail',
		),
		'transport' => 'auto',
		'choices'   => array(
			'category'  => esc_html__( 'Category', 'aaurora' ),
			'heading'   => esc_html__( 'Heading', 'aaurora' ),
			'metadata'  => esc_html__( 'Metadata', 'aaurora' ),
			'thumbnail' => esc_html__( 'Thumbnail', 'aaurora' ),
		),
		'priority'  => 10,
	)
);

Kirki::add_field(
	'theme_config_id',
	array(
		'type'     => 'sortable',
		'settings' => 'entry_header_metadata_element',
		'label'    => esc_html__( 'Post Metadata Elements', 'aaurora' ),
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
		'label'    => esc_html__( 'Post Footer Elements', 'aaurora' ),
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
		'label'       => esc_attr__( 'Title Typography', 'aaurora' ),
		'section'     => 'blog_post',
		'default'     => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
			'font-size'      => '44px',
			'variant'        => 'regular',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
			'color'          => '#000',
		),
		'description' => esc_attr__( 'Single Post Title Typography.', 'aaurora' ),
		'output'      => array(
			array(
				'element' => array( 'h1.entry-title' ),
			),
		),
	)
);
// END SECTION: SINGLE POST.

// SECTION: SIDEBARS.
Kirki::add_section(
	'sidebars',
	array(
		'title'       => esc_attr__( 'Sidebars', 'aaurora' ),
		'description' => esc_attr__( 'Select Sidebar Position for Site.', 'aaurora' ),
		'panel'       => 'theme_settings_panel',
		'priority'    => 7,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'radio-buttonset',
		'settings'    => 'sidebar_layout_setting',
		'label'       => esc_attr__( 'Sidebar Layout', 'aaurora' ),
		'section'     => 'sidebars',
		'default'     => 'content-only',
		'multiple'    => 0,
		'choices'     => array(
			'sidebar-left'  => esc_attr__( 'Left', 'aaurora' ),
			'content-only'  => esc_attr__( 'Disable', 'aaurora' ),
			'sidebar-right' => esc_attr__( 'Right', 'aaurora' ),
			'sidebar-both'  => esc_attr__( 'Both', 'aaurora' ),
		),
		'description' => esc_attr__( 'Select Sidebar Layout.', 'aaurora' ),
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
// END SECTION: SIDEBAR.

// SECTION: FOOTER.
Kirki::add_section(
	'footer',
	array(
		'title'       => esc_attr__( 'Footer', 'aaurora' ),
		'description' => '',
		'panel'       => 'theme_settings_panel',
		'priority'    => 8,
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'general_scroll_to_top',
		'label'       => esc_attr__( 'Scroll Top Button', 'aaurora' ),
		'description' => esc_attr__( 'Enable to display go to Top Button.', 'aaurora' ),
		'section'     => 'footer',
		'default'     => '1',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'footer_call_to_action',
		'label'       => esc_attr__( 'Call To Action', 'aaurora' ),
		'description' => esc_attr__( 'Enable to display call to action.', 'aaurora' ),
		'section'     => 'footer',
		'default'     => '1',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'select',
		'settings'    => 'footer_layout_setting',
		'label'       => esc_attr__( 'Layout', 'aaurora' ),
		'section'     => 'footer',
		'default'     => '2',
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
		'label'       => esc_attr__( 'Text Color', 'aaurora' ),
		'description' => esc_attr__( 'Change text color in footer HTML block', 'aaurora' ),
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
	'aaurora_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'footer_background_color',
		'label'       => esc_attr__( 'Background', 'aaurora' ),
		'description' => esc_attr__( 'Change Background color of the footer section.', 'aaurora' ),
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
// END SECTION: FOOTER.

// SECTION: FONTS.
Kirki::add_section(
	'fonts',
	array(
		'title'       => esc_attr__( 'Typography', 'aaurora' ),
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
		'label'       => esc_attr__( 'Blog Title Typography', 'aaurora' ),
		'section'     => 'fonts',
		'default'     => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
			'variant'        => '500',
			'font-size'      => '25px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
			'color'          => '#000',
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
		'label'       => esc_attr__( 'Body Typography', 'aaurora' ),
		'section'     => 'fonts',
		'default'     => array(   // TODO  In default can i use Initial as font-family.
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
			'variant'        => 'regular',
			'font-size'      => '20px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
			'color'          => '#000',
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
		'label'       => esc_attr__( 'H1 Typography', 'aaurora' ),
		'section'     => 'fonts',
		'default'     => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
			'variant'        => '500',
			'font-size'      => '44px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
			'color'          => '#000',
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
		'label'       => esc_attr__( 'H2 Typography', 'aaurora' ),
		'section'     => 'fonts',
		'default'     => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
			'variant'        => 'regular',
			'font-size'      => '40px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
			'color'          => '#000',
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
		'label'       => esc_attr__( 'H3 Typography', 'aaurora' ),
		'section'     => 'fonts',
		'default'     => array(
			'font-family'    => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;',
			'variant'        => 'regular',
			'font-size'      => '34px',
			'line-height'    => '1.5',
			'letter-spacing' => '0',
			'color'          => '#000',
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
		'type'        => 'toggle',
		'settings'    => 'fonts_load_all_variant',
		'label'       => esc_attr__( 'Load all Google Fonts variants', 'aaurora' ),
		'description' => esc_attr__( 'Enable to load all available google font variants and subsets.', 'aaurora' ),
		'section'     => 'fonts',
		'default'     => '0',
	)
);
// END SECTION: FONTS.

// SECTION: COLORS.
Kirki::add_section(
	'general_color',
	array(
		'title'       => esc_attr__( 'Colors', 'aaurora' ),
		'description' => '',
		'panel'       => 'theme_settings_panel',
		'priority'    => 10,
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
		'default'     => '#165df5',
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
		'type'        => 'color',
		'settings'    => 'second_color_theme',
		'label'       => esc_attr__( 'Secondary Theme color', 'aaurora' ),
		'description' => '',
		'section'     => 'general_color',
		'default'     => '#fff',
		'output'      => array(
			array(
				'element'  => ':root',
				'property' => '--second-theme-color',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'color_body_text',
		'label'       => esc_attr__( 'Text Color', 'aaurora' ),
		'description' => '',
		'section'     => 'general_color',
		'default'     => '#333333',
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
		'settings'    => 'button_bkg_clr',
		'label'       => esc_attr__( 'Button Background Color', 'aaurora' ),
		'description' => '',
		'section'     => 'general_color',
		'default'     => '#fff',
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
		'label'       => esc_attr__( 'Button Background Hover Color', 'aaurora' ),
		'description' => '',
		'section'     => 'general_color',
		'default'     => '#d90a2c',
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
		'label'       => esc_attr__( 'Button Text Color', 'aaurora' ),
		'description' => '',
		'section'     => 'general_color',
		'default'     => '#000',
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
		'label'       => esc_attr__( 'Button Text Hover Color', 'aaurora' ),
		'description' => '',
		'section'     => 'general_color',
		'default'     => '#fff',
		'output'      => array(
			array(
				'element'  => ':root',
				'property' => '--button-hover-text-color',
			),
		),
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'color',
		'settings'    => 'button_border_clr',
		'label'       => esc_attr__( 'Button Border Color', 'aaurora' ),
		'description' => '',
		'section'     => 'general_color',
		'default'     => '#000',
		'output'      => array(
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
		'settings'    => 'general_social_share',
		'label'       => esc_attr__( 'Social Share', 'aaurora' ),
		'description' => esc_attr__( 'Enable to display Social Share Button.', 'aaurora' ),
		'section'     => 'social_media',
		'default'     => '1',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'top_bar_social_media_button',
		'label'       => esc_attr__( 'Top Bar Social Follow', 'aaurora' ),
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
		'label'       => esc_attr__( 'Social Follow', 'aaurora' ),
		'description' => esc_attr__( 'Enable to show Social Media Button on side.', 'aaurora' ),
		'section'     => 'social_media',
		'default'     => '1',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'side_social_media_button_text',
		'label'       => esc_attr__( 'Social Text vs Icons', 'aaurora' ),
		'description' => esc_attr__( 'Enable to show social text instead of icon.', 'aaurora' ),
		'section'     => 'social_media',
		'default'     => '1',
	)
);

Kirki::add_field(
	'aaurora_theme_options',
	array(
		'type'        => 'toggle',
		'settings'    => 'side_social_media_button_color',
		'label'       => esc_attr__( 'Social Media Color Code', 'aaurora' ),
		'description' => esc_attr__( 'Enable to use Social Media color code.', 'aaurora' ),
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
// END SECTION : SOCIAL PROFILE.

<?php

Kirki::add_config( 'wp_jbtwriter', array(
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
) );


Kirki::add_panel( 'font_panel_id', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Font', 'kirki' ),
    'description' => esc_html__( 'Configuration Fonts', 'kirki' ),
) );

Kirki::add_section( 'abs_fonts_settings_section', array(
    'title'          => esc_html__( 'Font Section', 'kirki' ),
    'description'    => esc_html__( 'Configure Fonts.', 'kirki' ),
    'panel'          => 'font_panel_id',
    'priority'       => 10,
) );

//Kirki::add_section( 'abs_fonts_settings_section1', array(
//    'title'          => esc_html__( 'Font Section1', 'kirki' ),
//    'description'    => esc_html__( 'Configure Fonts1   ds.', 'kirki' ),
//    'panel'          => 'font_panel_id',
//    'priority'       => 162,
//) );


Kirki::add_field( 'wp_jbtwriter', array(
    'type'        => 'typography',
    'settings'    => 'headers_font',
    'label'       => esc_attr__( 'Headers font', 'writer' ),
    'section'     => 'abs_fonts_settings_section',
    'default'     => array(
        'font-family'    => 'Nunito',
        'variant'        => '800',
    ),
    'description' => esc_attr__( 'Font used in headers (H1-H6 tags).', 'inhype' ),
    'output'      => [
        [
            'element' => array( 'h1', 'h2', 'h3' ),
        ],
    ],
) );

Kirki::add_field( 'wp_jbtwriter', array(
    'type'        => 'typography',
    'settings'    => 'body_font',
    'label'       => esc_attr__( 'Body font', 'writer' ),
    'section'     => 'abs_fonts_settings_section',
    'default'     => array(
        'font-family'    => 'Rubik',
        'variant'        => 'regular',
        'font-size'      => '15px',
    ),
    'description' => esc_attr__( 'Font used in text elements.', 'inhype' ),
    'output'      => [
        [
            'element' => 'body',
        ],
    ],
) );
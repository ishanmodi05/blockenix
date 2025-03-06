<?php

function blockenix_customize_register($wp_customize) {

     // Logo Setting
     $wp_customize->add_setting('blockenix_logo', array(
        'default'   => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Logo Control
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'blockenix_logo', array(
        'label'    => __('Site Logo', 'blockenix'),
        'section'  => 'title_tagline', // Default WordPress section for site identity
        'settings' => 'blockenix_logo',
    )));

    // Logo Width
    $wp_customize->add_setting('blockenix_logo_width', array(
        'default'   => '150', // Default width
        'transport' => 'refresh',
        'sanitize_callback' => 'absint', // Ensures integer values
    ));

    $wp_customize->add_control('blockenix_logo_width', array(
        'label'    => __('Logo Width (px)', 'blockenix'),
        'section'  => 'title_tagline',
        'type'     => 'number',
        'input_attrs' => array(
            'min'  => 50,
            'max'  => 500,
            'step' => 5,
        ),
    ));

    // Logo Height
    $wp_customize->add_setting('blockenix_logo_height', array(
        'default'   => '50', // Default height
        'transport' => 'refresh',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('blockenix_logo_height', array(
        'label'    => __('Logo Height (px)', 'blockenix'),
        'section'  => 'title_tagline',
        'type'     => 'number',
        'input_attrs' => array(
            'min'  => 20,
            'max'  => 300,
            'step' => 5,
        ),
    ));

    // Header Background Color
    $wp_customize->add_setting('header_bg_color', array(
        'default'   => '#222',
        'transport' => 'postMessage', // Enables live preview
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_bg_color', array(
        'label'    => __('Header Background Color', 'blockenix'),
        'section'  => 'colors',
        'settings' => 'header_bg_color',
    )));

    // Menu Background Color
    $wp_customize->add_setting('menu_bg_color', array(
        'default'   => '#222',
        'transport' => 'postMessage', // Enables live preview
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_bg_color', array(
        'label'    => __('Menu Background Color', 'blockenix'),
        'section'  => 'colors',
        'settings' => 'menu_bg_color',
    )));

    // Menu Text Color
    $wp_customize->add_setting('menu_text_color', array(
        'default'   => '#fff',
        'transport' => 'postMessage', // Enables live preview
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_text_color', array(
        'label'    => __('Menu Text Color', 'blockenix'),
        'section'  => 'colors',
        'settings' => 'menu_text_color',
    )));

    // Menu Hover Background Color
    $wp_customize->add_setting('menu_hover_bg_color', array(
        'default'   => '#444', // Default hover background
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_hover_bg_color', array(
        'label'    => __('Menu Hover Background Color', 'blockenix'),
        'section'  => 'colors',
        'settings' => 'menu_hover_bg_color',
    )));

    // Menu Hover Text Color
    $wp_customize->add_setting('menu_hover_text_color', array(
        'default'   => '#fff', // Default hover text color
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'menu_hover_text_color', array(
        'label'    => __('Menu Hover Text Color', 'blockenix'),
        'section'  => 'colors',
        'settings' => 'menu_hover_text_color',
    )));
}

add_action('customize_register', 'blockenix_customize_register');


function blockenix_customize_register1($wp_customize) {
    // Add Section for Layout Options
    $wp_customize->add_section('blockenix_layout_settings', array(
        'title'    => __('Layout Settings', 'blockenix'),
        'priority' => 30,
    ));

    // Add Setting for Container Type
    $wp_customize->add_setting('blockenix_container_type', array(
        'default'           => 'container',
        'transport'         => 'refresh',
        'sanitize_callback' => 'blockenix_sanitize_container_type',
    ));

    // Add Control for Selecting Container Type
    $wp_customize->add_control('blockenix_container_type_control', array(
        'label'    => __('Container Type', 'blockenix'),
        'section'  => 'blockenix_layout_settings',
        'settings' => 'blockenix_container_type',
        'type'     => 'radio',
        'choices'  => array(
            'container'       => __('Contained (Boxed)', 'blockenix'),
            'container-fluid' => __('Full Width', 'blockenix'),
            'custom-width'    => __('Custom Width', 'blockenix'),
        ),
    ));

    // Add Setting for Custom Width (Text Box)
    $wp_customize->add_setting('blockenix_custom_width', array(
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'absint', // Ensures only numbers are saved
    ));

    // Add Control for Custom Width (Text Box)
    $wp_customize->add_control('blockenix_custom_width_control', array(
        'label'    => __('Custom Width (px)', 'blockenix'),
        'section'  => 'blockenix_layout_settings',
        'settings' => 'blockenix_custom_width',
        'type'     => 'number',
        'input_attrs' => array(
            'min'  => 200,  // Minimum width
            'max'  => 2000, // Maximum width
            'step' => 10,   // Step size
        ),
    ));
}

add_action('customize_register', 'blockenix_customize_register1');


// Sanitize Function for Container Type
function blockenix_sanitize_container_type($input) {
    $valid = array('container', 'container-fluid', 'custom-width');
    return in_array($input, $valid) ? $input : 'container';
}

add_action('customize_register', 'blockenix_customize_register1');


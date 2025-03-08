<?php
/**
 * Theme Customizer Settings
 * 
 * This file handles all theme customization options including:
 * - Logo settings
 * - Header & Menu colors
 * - Footer settings
 * - Global colors
 * - Layout options
 */

/**
 * Main customizer registration function
 * Registers all the core theme customizer settings
 */
function blockenix_customize_register($wp_customize) {

    // Logo Settings
    blnx_add_logo_settings($wp_customize);
    
    // Header & Menu Colors
    blnx_add_header_menu_colors($wp_customize);
    
    // Footer Settings
    blnx_add_footer_settings($wp_customize);
    
    // Global Settings
    blnx_add_global_settings($wp_customize);
}

/**
 * Layout customizer registration function
 * Handles container and width settings
 */
function blockenix_customize_layout_settings($wp_customize) {
    // Layout Section
    $wp_customize->add_section('blockenix_layout_settings', [
        'title'    => __('Layout Settings', 'blockenix'),
        'priority' => 30,
    ]);

    // Container Type Setting
    $wp_customize->add_setting('blockenix_container_type', [
        'default'           => 'container',
        'transport'         => 'refresh',
        'sanitize_callback' => 'blockenix_sanitize_container_type',
    ]);

    // Container Type Control
    $wp_customize->add_control('blockenix_container_type_control', [
        'label'    => __('Container Type', 'blockenix'),
        'section'  => 'blockenix_layout_settings',
        'settings' => 'blockenix_container_type',
        'type'     => 'radio',
        'choices'  => [
            'container'       => __('Contained (Boxed)', 'blockenix'),
            'container-fluid' => __('Full Width', 'blockenix'),
            'custom-width'    => __('Custom Width', 'blockenix'),
        ],
    ]);

    // Custom Width Setting
    $wp_customize->add_setting('blockenix_custom_width', [
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'absint',
    ]);

    // Custom Width Control
    $wp_customize->add_control('blockenix_custom_width_control', [
        'label'       => __('Custom Width (px)', 'blockenix'),
        'section'     => 'blockenix_layout_settings',
        'settings'    => 'blockenix_custom_width',
        'type'        => 'number',
        'input_attrs' => [
            'min'  => 200,
            'max'  => 2000,
            'step' => 10,
        ],
    ]);
}

/**
 * Helper function to add logo related settings
 */
function blnx_add_logo_settings($wp_customize) {
    // Logo Upload
    $wp_customize->add_setting('blockenix_logo', [
        'default'           => '',
        'transport'         => 'refresh',
        'sanitize_callback' => 'esc_url_raw',
    ]);

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'blockenix_logo', [
        'label'    => __('Site Logo', 'blockenix'),
        'section'  => 'title_tagline',
        'settings' => 'blockenix_logo',
    ]));

    // Logo Dimensions
    $logo_dimensions = [
        'width' => [
            'default' => 150,
            'min'     => 50,
            'max'     => 500,
        ],
        'height' => [
            'default' => 50,
            'min'     => 20,
            'max'     => 300,
        ]
    ];

    foreach ($logo_dimensions as $dimension => $values) {
        $wp_customize->add_setting("blockenix_logo_$dimension", [
            'default'           => $values['default'],
            'transport'         => 'refresh',
            'sanitize_callback' => 'absint',
        ]);

        $wp_customize->add_control("blockenix_logo_$dimension", [
            'label'       => __("Logo $dimension (px)", 'blockenix'),
            'section'     => 'title_tagline',
            'type'        => 'number',
            'input_attrs' => [
                'min'  => $values['min'],
                'max'  => $values['max'],
                'step' => 5,
            ],
        ]);
    }
}

/**
 * Helper function to add header and menu color settings
 */
function blnx_add_header_menu_colors($wp_customize) {
    $color_settings = [
        'header_bg'        => ['#222', __('Header Background Color', 'blockenix')],
        'menu_bg'         => ['#222', __('Menu Background Color', 'blockenix')],
        'menu_text'       => ['#fff', __('Menu Text Color', 'blockenix')],
        'menu_hover_bg'   => ['#444', __('Menu Hover Background Color', 'blockenix')],
        'menu_hover_text' => ['#fff', __('Menu Hover Text Color', 'blockenix')],
    ];

    foreach ($color_settings as $setting => $values) {
        $wp_customize->add_setting($setting . '_color', [
            'default'           => $values[0],
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $setting . '_color', [
            'label'    => $values[1],
            'section'  => 'colors',
            'settings' => $setting . '_color',
        ]));
    }
}

/**
 * Helper function to add footer settings
 */
function blnx_add_footer_settings($wp_customize) {
    // Footer Panel
    $wp_customize->add_panel('blockenix_footer_panel', [
        'title'    => __('Footer Settings', 'blockenix'),
        'priority' => 160,
    ]);

    // Footer Colors Section
    $wp_customize->add_section('blockenix_footer_section', [
        'title'    => __('Footer Colors', 'blockenix'),
        'panel'    => 'blockenix_footer_panel',
        'priority' => 1,
    ]);

    // Footer Background Color
    $wp_customize->add_setting('footer_background_color', [
        'default'           => '#ffffff',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_hex_color',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_background_color', [
        'label'    => __('Footer Background Color', 'blockenix'),
        'section'  => 'blockenix_footer_section',
        'settings' => 'footer_background_color',
    ]));
}

/**
 * Helper function to add global settings
 */
function blnx_add_global_settings($wp_customize) {
    // Global Panel
    $wp_customize->add_panel('blockenix_global_panel', [
        'title'    => __('Global Settings', 'blockenix'),
        'priority' => 150,
    ]);

    // Global Colors Section
    $wp_customize->add_section('blockenix_global_colors', [
        'title'    => __('Global Colors', 'blockenix'),
        'panel'    => 'blockenix_global_panel',
        'priority' => 1,
    ]);
    // Global Typography Section
    $wp_customize->add_section('blockenix_global_typography', [
        'title'    => __('Global Typography', 'blockenix'),
        'panel'    => 'blockenix_global_panel', 
        'priority' => 2,
    ]);

    // Body Font Family
    $wp_customize->add_setting('body_font_family', [
        'default'           => 'Arial, sans-serif',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    // Get Google Fonts from API
    $google_fonts_url = 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyBEdyPl4aQp8zldXY0tIfrroY6kJyUdbAs';
    $response = wp_remote_get($google_fonts_url);
    $fonts_array = [];

    if (!is_wp_error($response)) {
        $fonts_data = json_decode(wp_remote_retrieve_body($response), true);
        if (!empty($fonts_data['items'])) {
            foreach ($fonts_data['items'] as $font) {
                $fonts_array[$font['family']] = $font['family'];
            }
        }
    }

    // Add some web safe fonts as fallback
    $web_safe_fonts = [
        'Arial, sans-serif' => 'Arial',
        'Helvetica, sans-serif' => 'Helvetica', 
        'Georgia, serif' => 'Georgia',
        'Times New Roman, serif' => 'Times New Roman',
        'system-ui, sans-serif' => 'System UI'
    ];

    $fonts_array = array_merge($web_safe_fonts, $fonts_array);

    $wp_customize->add_control('body_font_family', [
        'label'    => __('Body Font Family', 'blockenix'),
        'section'  => 'blockenix_global_typography',
        'type'     => 'select',
        'choices'  => $fonts_array
    ]);

    // Body Font Size
    $wp_customize->add_setting('body_font_size', [
        'default'           => '16',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'absint',
    ]);

    $wp_customize->add_control('body_font_size', [
        'label'    => __('Body Font Size (px)', 'blockenix'),
        'section'  => 'blockenix_global_typography',
        'type'     => 'number',
        'input_attrs' => [
            'min'  => 12,
            'max'  => 24,
            'step' => 1,
        ],
    ]);

    // Line Height
    $wp_customize->add_setting('body_line_height', [
        'default'           => '1.6',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('body_line_height', [
        'label'    => __('Body Line Height', 'blockenix'),
        'section'  => 'blockenix_global_typography',
        'type'     => 'number',
        'input_attrs' => [
            'min'  => 1,
            'max'  => 2,
            'step' => 0.1,
        ],
    ]);

    // Heading Font Family Setting
    $wp_customize->add_setting('heading_font_family', [
        'default'           => 'system-ui, sans-serif',
        'transport'         => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ]);

    $wp_customize->add_control('heading_font_family', [
        'label'    => __('Heading Font Family', 'blockenix'),
        'section'  => 'blockenix_global_typography',
        'type'     => 'select',
        'choices'  => $fonts_array,
        'priority' => 10
    ]);

    // Individual heading settings
    $heading_tags = [
        'h1' => __('H1', 'blockenix'),
        'h2' => __('H2', 'blockenix'),
        'h3' => __('H3', 'blockenix'),
        'h4' => __('H4', 'blockenix'),
        'h5' => __('H5', 'blockenix'),
        'h6' => __('H6', 'blockenix')
    ];

    foreach ($heading_tags as $tag => $label) {
        // Font size
        $wp_customize->add_setting($tag . '_font_size', [
            'default'           => ($tag === 'h1' ? 32 : ($tag === 'h2' ? 28 : ($tag === 'h3' ? 24 : ($tag === 'h4' ? 20 : ($tag === 'h5' ? 18 : 16))))),
            'transport'         => 'postMessage',
            'sanitize_callback' => 'absint',
        ]);

        $wp_customize->add_control($tag . '_font_size', [
            'label'    => sprintf(__('%s Font Size (px)', 'blockenix'), $label),
            'section'  => 'blockenix_global_typography',
            'type'     => 'number',
            'input_attrs' => [
                'min'  => 12,
                'max'  => 72,
                'step' => 1,
            ],
        ]);

        // Line height
        $wp_customize->add_setting($tag . '_line_height', [
            'default'           => 1.2,
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
        ]);

        $wp_customize->add_control($tag . '_line_height', [
            'label'    => sprintf(__('%s Line Height', 'blockenix'), $label),
            'section'  => 'blockenix_global_typography',
            'type'     => 'number',
            'input_attrs' => [
                'min'  => 1,
                'max'  => 2,
                'step' => 0.1,
            ],
        ]);
    }

    $global_colors = [
        'primary'   => ['#0073aa', __('Heading Color', 'blockenix')],
        // 'secondary' => ['#222222', __('Secondary Color', 'blockenix')],
        'text'      => ['#333333', __('Text Color', 'blockenix')],
    ];

    foreach ($global_colors as $color => $values) {
        $wp_customize->add_setting("global_{$color}_color", [
            'default'           => $values[0],
            'transport'         => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color',
        ]);

        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, "global_{$color}_color", [
            'label'    => $values[1],
            'section'  => 'blockenix_global_colors',
            'settings' => "global_{$color}_color",
        ]));
    }
}

// Register customizer settings
add_action('customize_register', 'blockenix_customize_register');
add_action('customize_register', 'blockenix_customize_layout_settings');

/**
 * Sanitize container type input
 */
function blockenix_sanitize_container_type($input) {
    $valid = ['container', 'container-fluid', 'custom-width'];
    return in_array($input, $valid) ? $input : 'container';
}
<?php

// Theme Setup
function mytheme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('editor-styles');
    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');

    // Register Menus
    register_nav_menus([
        'primary' => __('Primary Menu', 'mytheme'),
    ]);
}
add_action('after_setup_theme', 'mytheme_setup');

// Enqueue Scripts and Styles
require_once get_template_directory() . '/inc/enqueue-scripts.php';

// Include Mega Menu Walker
require_once get_template_directory() . '/inc/class-mega-menu-walker.php';
require_once get_template_directory() . '/inc/class-footer.php';

require_once get_template_directory() . '/inc/customizer.php';

function enqueue_dynamic_styles() {
    // Generate a dynamic CSS file via PHP
    wp_enqueue_style('dynamic-styles', add_query_arg('ver', time(), get_template_directory_uri() . '/inc/dynamic-styles.php'), array(), null);
    // wp_enqueue_script('mytheme-mega-menu', get_template_directory_uri() . '/assets/js/mega-menu.js', ['jquery'], true);
    
}
add_action('wp_enqueue_scripts', 'enqueue_dynamic_styles');


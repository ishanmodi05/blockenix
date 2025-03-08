<?php

/**
 * Main theme setup function
 * Adds theme supports and registers navigation menus
 */
function blnx_theme_setup() {
    // Add support for various WordPress features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('editor-styles');
    add_theme_support('align-wide');
    add_theme_support('wp-block-styles');
    add_theme_support('responsive-embeds');

    // Register navigation menus
    register_nav_menus([
        'primary' => __('Primary Menu', 'blockenix'),
    ]);
}
add_action('after_setup_theme', 'blnx_theme_setup');

// Include required theme files
require_once get_template_directory() . '/inc/enqueue-scripts.php';
require_once get_template_directory() . '/inc/class-mega-menu-walker.php';
require_once get_template_directory() . '/inc/class-footer.php';
require_once get_template_directory() . '/inc/customizer.php';


/**
 * Enqueue dynamic styles and scripts
 * Loads dynamic CSS file with version parameter for cache busting
 */
function blnx_enqueue_dynamic_styles() {
    // Enqueue dynamic styles with timestamp as version
    wp_enqueue_style('dynamic-styles', add_query_arg('ver', time(), get_template_directory_uri() . '/inc/dynamic-styles.php'), array(), null);
}
add_action('wp_enqueue_scripts', 'blnx_enqueue_dynamic_styles');

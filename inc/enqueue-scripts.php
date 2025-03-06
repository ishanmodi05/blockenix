<?php
// Enqueue Scripts and Styles
function mytheme_enqueue_assets() {
    wp_enqueue_style('mytheme-main-css', get_template_directory_uri() . '/assets/css/main.css', [], '1.0');
    wp_enqueue_script('mytheme-mega-menu', get_template_directory_uri() . '/assets/js/mega-menu.js', ['jquery'], true);
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_assets');

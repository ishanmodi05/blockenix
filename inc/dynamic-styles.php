<?php
// Find WordPress root directory
$root_path = dirname(__DIR__, 4) . '/wp-load.php';

// Check if the file exists before including
if (file_exists($root_path)) {
    require_once $root_path;
} else {
    die("Error: Cannot find wp-load.php at " . $root_path);
}

header("Content-type: text/css; charset: UTF-8");

// Get colors from the customizer
$customizer_colors = [
    'header_bg_color' => get_theme_mod('header_bg_color', '#222'),
    'menu_bg_color' => get_theme_mod('menu_bg_color', '#222'),
    'menu_text_color' => get_theme_mod('menu_text_color', '#fff'),
    'menu_hover_bg_color' => get_theme_mod('menu_hover_bg_color', '#444'),
    'menu_hover_text_color' => get_theme_mod('menu_hover_text_color', '#000'),
    'blockenix_custom_width' => get_theme_mod('blockenix_custom_width', '1200'),
    'footer_background_color' => get_theme_mod('footer_background_color', '#000'),
    'global_primary_color' => get_theme_mod('global_primary_color', '#000'),
    'global_text_color' => get_theme_mod('global_text_color', '#000'),
    'global_text_font_family' => get_theme_mod('body_font_family', 'open-sans'),
    'global_text_size' => get_theme_mod('body_font_size', '16'),
    'global_text_line_height' => get_theme_mod('', '1.2'),
    'global_heading_font_family' => get_theme_mod('heading_font_family', 'open-sans'),
    'global_heading_text_color' => get_theme_mod('heading_text_color', '#000'),
    'global_h1_font_size' => get_theme_mod('h1_font_size', '32'),
    'global_h1_line_height' => get_theme_mod('h1_line_height', '1.4'),
    'global_h2_font_size' => get_theme_mod('h2_font_size', '30'),
    'global_h2_line_height' => get_theme_mod('h2_line_height', '1.4'),
    'global_h3_font_size' => get_theme_mod('h3_font_size', '28'),
    'global_h3_line_height' => get_theme_mod('h3_line_height', '1.4'),
    'global_h4_font_size' => get_theme_mod('h4_font_size', '27'),
    'global_h4_line_height' => get_theme_mod('h4_line_height', '1.4'),
    'global_h5_font_size' => get_theme_mod('h5_font_size', '26'),
    'global_h5_line_height' => get_theme_mod('h5_line_height', '1.4'),
    'global_h6_font_size' => get_theme_mod('h6_font_size', '18'),
    'global_h6_line_height' => get_theme_mod('h6_line_height', '1.4'),

];

// Import Google Fonts
$text_font_family = str_replace(' ', '+', $customizer_colors['global_text_font_family']);
$heading_font_family = str_replace(' ', '+', $customizer_colors['global_heading_font_family']);

if ($text_font_family && $text_font_family !== '#fff') {
    echo "@import url('https://fonts.googleapis.com/css2?family=" . esc_attr($text_font_family) . ":wght@400;700&display=swap');\n";
}

if ($heading_font_family && $heading_font_family !== '#fff' && $heading_font_family !== $text_font_family) {
    echo "@import url('https://fonts.googleapis.com/css2?family=" . esc_attr($heading_font_family) . ":wght@400;700&display=swap');\n";
}
?>

/* Header Styles */
.site-header {
background-color: <?php echo esc_attr($customizer_colors['header_bg_color']); ?>;
}

/* Navigation Styles */
.menu li a {
background-color: <?php echo esc_attr($customizer_colors['menu_bg_color']); ?>;
color: <?php echo esc_attr($customizer_colors['menu_text_color']); ?>;
}

.primary-navigation .menu li a:hover {
background-color: <?php echo esc_attr($customizer_colors['menu_hover_bg_color']); ?>;
color: <?php echo esc_attr($customizer_colors['menu_hover_text_color']); ?>;
}

/* Layout Styles */
.custom-width {
max-width: <?php echo esc_attr($customizer_colors['blockenix_custom_width']); ?>px;
margin: 0 auto;
}

/* Footer Styles */
.site-footer {
background: <?php echo esc_attr($customizer_colors['footer_background_color']); ?>;
}

/* Typography Styles */
h1, h2, h3, h4, h5, h6 {
color: <?php echo esc_attr($customizer_colors['global_primary_color']); ?>;
}

p {
color: <?= esc_attr($customizer_colors['global_text_color']); ?>;
font-family: <?= esc_attr($customizer_colors['global_text_font_family']); ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
font-size: <?= esc_attr($customizer_colors['global_text_size']); ?>px;
line-height: <?= esc_attr($customizer_colors['global_text_line_height']); ?>;
}

h1,h2,h3,h4,h5,h6 {
font-family: <?= esc_attr($customizer_colors['global_heading_font_family']); ?>, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
color: <?= esc_attr($customizer_colors['global_primary_color']); ?>;
}

h1 {
font-size: <?= esc_attr($customizer_colors['global_h1_font_size']); ?>px;
line-height: <?= esc_attr($customizer_colors['global_h1_line_height']); ?>;
}

h2 {
font-size: <?= esc_attr($customizer_colors['global_h2_font_size']); ?>px;
line-height: <?= esc_attr($customizer_colors['global_h2_line_height']); ?>;
}

h3 {
font-size: <?= esc_attr($customizer_colors['global_h3_font_size']); ?>px;
line-height: <?= esc_attr($customizer_colors['global_h3_line_height']); ?>;
}

h4 {
font-size: <?= esc_attr($customizer_colors['global_h4_font_size']); ?>px;
line-height: <?= esc_attr($customizer_colors['global_h4_line_height']); ?>;
}

h5 {
font-size: <?= esc_attr($customizer_colors['global_h5_font_size']); ?>px;
line-height: <?= esc_attr($customizer_colors['global_h5_line_height']); ?>;
}

h6 {
font-size: <?= esc_attr($customizer_colors['global_h6_font_size']); ?>px;
line-height: <?= esc_attr($customizer_colors['global_h6_line_height']); ?>;
}
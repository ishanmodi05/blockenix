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
$header_bg_color = get_theme_mod('header_bg_color', '#222');
$menu_bg_color = get_theme_mod('menu_bg_color', '#222');
$menu_text_color = get_theme_mod('menu_text_color', '#fff');
$menu_hover_bg_color  = get_theme_mod('menu_hover_bg_color', '#444');
$menu_hover_text_color = get_theme_mod('menu_hover_text_color', '#fff');
$blockenix_custom_width = get_theme_mod('blockenix_custom_width', '#fff');

?>

/* Dynamic Menu Styles */
.site-header {
background-color: <?php echo esc_attr($header_bg_color); ?>;
}

.menu li a {
background-color: <?php echo esc_attr($menu_bg_color); ?>;
color: <?php echo esc_attr($menu_text_color); ?>;
}

.custom-width {
max-width: <?php echo esc_attr($blockenix_custom_width); ?>px;
margin: 0 auto;
}

.primary-navigation .menu li a:hover {
background-color: <?php echo esc_attr($menu_hover_bg_color); ?>;
color: <?php echo esc_attr($menu_hover_text_color); ?>;
}
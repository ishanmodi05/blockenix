<?php

class Mega_Menu_Walker extends Walker_Nav_Menu {
    
    // Start the sub-menu (level 1 is the mega menu container)
    function start_lvl( &$output, $depth = 0, $args = null ) {
        if ($depth === 0) {
            // Start the mega menu container
            $output .= '<div class="mega-menu"><ul class="mega-menu-items">';
        } else {
            // Regular submenu
            $output .= '<ul class="sub-menu">';
        }
    }

    // End the sub-menu
    function end_lvl( &$output, $depth = 0, $args = null ) {
        if ($depth === 0) {
            // Close mega menu div
            $output .= '</ul></div>';
        } else {
            // Close regular submenu
            $output .= '</ul>';
        }
    }

    // Start a menu item
    function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        // Get menu item classes
        $classes = !empty($item->classes) && is_array($item->classes) 
            ? implode(' ', $item->classes) 
            : '';

        // Check if this item should have a mega menu
        $is_mega_menu = in_array('mega-menu', $item->classes) ? ' mega-menu-item' : '';

        // Start menu item
        $output .= '<li class="' . esc_attr($classes . $is_mega_menu) . '">';
        $output .= '<a href="' . esc_url($item->url) . '">' . esc_html($item->title) . '</a>';
    }

    // End a menu item
    function end_el( &$output, $item, $depth = 0, $args = null ) {
        $output .= '</li>';
    }
}

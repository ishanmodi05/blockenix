<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <!-- Meta tags for character encoding and responsive viewport -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <!-- Hook for WordPress to inject necessary scripts and styles -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

     <!-- Main header section of the site -->
    <header class="site-header">
        <!-- Container div with dynamic width based on theme customizer setting -->
        <div class="<?php echo esc_attr(get_theme_mod('blockenix_container_type', 'container')); ?>">
            <div class="header-nav">
                <!-- Site logo/branding section -->
                <div class="site-logo">
                    <a href="<?php echo home_url(); ?>">
                        <?php
                        // Get logo settings from theme customizer
                        $logo = get_theme_mod('blockenix_logo');
                        $logo_width = get_theme_mod('blockenix_logo_width', 150);
                        $logo_height = get_theme_mod('blockenix_logo_height', 50);

                        // Display either custom logo or site name
                        if ($logo) { ?>
                            <img src="<?php echo esc_url($logo); ?>"
                                alt="<?php bloginfo('name'); ?>"
                                style="width: <?php echo esc_attr($logo_width); ?>px; height: <?php echo esc_attr($logo_height); ?>px;">
                        <?php } else { ?>
                            <?php bloginfo('name'); ?>
                        <?php } ?>
                    </a>
                </div>

                <!-- Mobile menu hamburger button -->
                <button id="mobile-menu-toggle" class="mobile-menu-toggle" aria-label="Toggle navigation">
                    ☰ <!-- Default Open Icon -->
                </button>

                <!-- Primary navigation menu -->
                <nav class="primary-navigation">
                    <?php
                    // WordPress menu with custom mega menu walker
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'menu',
                        'walker'         => new Blockenix_Mega_Menu_Walker(), // Custom walker for mega menu functionality
                    ]);
                    ?>
                </nav>
            </div>
        </div>
    </header>
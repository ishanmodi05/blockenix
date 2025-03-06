<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header class="site-header">
        <div class="<?php echo esc_attr(get_theme_mod('blockenix_container_type', 'container')); ?>">
            <div class="header-nav">
                <div class="site-logo">
                    <a href="<?php echo home_url(); ?>">
                        <?php
                        $logo = get_theme_mod('blockenix_logo');
                        $logo_width = get_theme_mod('blockenix_logo_width', 150);
                        $logo_height = get_theme_mod('blockenix_logo_height', 50);

                        if ($logo) { ?>
                            <img src="<?php echo esc_url($logo); ?>"
                                alt="<?php bloginfo('name'); ?>"
                                style="width: <?php echo esc_attr($logo_width); ?>px; height: <?php echo esc_attr($logo_height); ?>px;">
                        <?php } else { ?>
                            <?php bloginfo('name'); ?>
                        <?php } ?>
                    </a>
                </div>

                <!-- Mobile Menu Toggle Button -->
                <button id="mobile-menu-toggle" class="mobile-menu-toggle" aria-label="Toggle navigation">
                    ☰ <!-- Default Open Icon -->
                </button>


                <nav class="primary-navigation">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'menu',
                        'walker'         => new Mega_Menu_Walker(), // Use the custom walker
                    ]);
                    ?>
                </nav>
            </div>
        </div>
    </header>
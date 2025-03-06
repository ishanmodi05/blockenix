jQuery(document).ready(function($) {
    // Ensure WordPress customize API is available
    if (typeof wp !== 'undefined' && wp.customize) {
        wp.customize.bind('ready', function() {
            wp.customize('menu_bg_color', function(value) {
                value.bind(function(newval) {
                    $('.primary-navigation').css('background-color', newval);
                });
            });

            wp.customize('menu_text_color', function(value) {
                value.bind(function(newval) {
                    $('.menu li a').css('color', newval);
                });
            });

            wp.customize('blockenix_container_type', function(value) {
                value.bind(function(newval) {
                    $('#customize-control-blockenix_custom_width_control').toggle(newval === 'custom-width');
                });
            });
        });
    }

    // Mobile menu toggle functionality
    let $menuToggle = $('#mobile-menu-toggle');
    let $mobileMenu = $('#mobile-menu');

    if ($menuToggle.length && $mobileMenu.length) {
        $menuToggle.on('click', function () {
            $mobileMenu.toggleClass('active');
            $menuToggle.toggleClass('active');
        });
    }
});

document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById("mobile-menu-toggle");
    const navigation = document.querySelector(".primary-navigation");

    menuToggle.addEventListener("click", function () {
        navigation.classList.toggle("active");
        menuToggle.classList.toggle("active");

        // Change button text dynamically
        if (navigation.classList.contains("active")) {
            menuToggle.innerHTML = "✖"; // Close icon
        } else {
            menuToggle.innerHTML = "☰"; // Hamburger icon
        }
    });
});


<?php
class Blockenix_Footer
{
    public function __construct()
    {
        add_action('widgets_init', [$this, 'blnx_register_footer_widgets']);
    }

    // Register footer widget areas
    public function blnx_register_footer_widgets()
    {
        $footer_areas = [
            'footer-1' => __('Footer Column 1', 'blockenix'),
            'footer-2' => __('Footer Column 2', 'blockenix'),
            'footer-3' => __('Footer Column 3', 'blockenix'),
            'footer-4' => __('Footer Column 4', 'blockenix'),
        ];

        foreach ($footer_areas as $id => $name) {
            register_sidebar([
                'name'          => $name,
                'id'            => $id,
                'description'   => __('Add widgets here.', 'blockenix'),
                'before_widget' => '<div class="footer-widget">',
                'after_widget'  => '</div>',
                'before_title'  => '<h4 class="footer-widget-title">',
                'after_title'   => '</h4>',
            ]);
        }
    }
}

// Initialize the footer class
new Blockenix_Footer();

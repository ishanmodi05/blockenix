<?php get_header(); ?>

<main class="content-area">
    <h1><?php esc_html_e('Latest Posts', 'mytheme'); ?></h1>
    <?php
    if (have_posts()) :
        while (have_posts()) : the_post();
            get_template_part('templates/parts/content');
        endwhile;
    else :
        esc_html_e('No posts found', 'mytheme');
    endif;
    ?>
</main>

<?php get_footer(); ?>

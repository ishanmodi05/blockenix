<?php get_header(); ?>

<main class="content-area">
    <div class="<?php echo esc_attr(get_theme_mod('blockenix_container_type', 'container')); ?>">
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
    </div>
</main>

<?php get_footer(); ?>
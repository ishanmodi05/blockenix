<?php get_header(); ?>

<main id="primary" class="site-main">
    <div class="<?php echo esc_attr(get_theme_mod('blockenix_container_type', 'container')); ?>">
        <div class="content-area">
            <?php
            while (have_posts()) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>

                    <div class="entry-content">
                        <?php the_content(); ?>

                        <?php
                        // Pagination for multi-page content
                        wp_link_pages([
                            'before' => '<div class="page-links">' . __('Pages:', 'blockenix'),
                            'after'  => '</div>',
                        ]);
                        ?>
                    </div>
                </article>

                <?php
                // Load comments template if comments are open
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;
                ?>

            <?php endwhile; ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>

<article <?php post_class(); ?>>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="post-meta">
        <span><?php the_date(); ?> | <?php the_author(); ?></span>
    </div>
    <div class="post-excerpt">
        <?php the_excerpt(); ?>
    </div>
</article>

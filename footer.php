<footer class="site-footer">
    <div class="<?php echo esc_attr(get_theme_mod('blockenix_container_type', 'container')); ?>">
        <div class="footer-widgets">
            <div class="footer-column">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <?php dynamic_sidebar('footer-1'); ?>
                <?php endif; ?>
            </div>
            <div class="footer-column">
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <?php dynamic_sidebar('footer-2'); ?>
                <?php endif; ?>
            </div>
            <div class="footer-column">
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <?php dynamic_sidebar('footer-3'); ?>
                <?php endif; ?>
            </div>
            <div class="footer-column">
                <?php if (is_active_sidebar('footer-4')) : ?>
                    <?php dynamic_sidebar('footer-4'); ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        </div>
    </div>
</footer>

</body>

</html>
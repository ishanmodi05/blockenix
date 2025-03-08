<!-- Main Footer Section -->
<footer class="site-footer">
    <!-- Container with dynamic width based on theme customizer setting -->
    <div class="<?php echo esc_attr(get_theme_mod('blockenix_container_type', 'container')); ?>">
        <!-- Footer Widgets Area - Contains 4 columns -->
        <div class="footer-widgets">
            <!-- Footer Column 1 -->
            <div class="footer-column">
                <?php if (is_active_sidebar('footer-1')) : ?>
                    <?php dynamic_sidebar('footer-1'); ?>
                <?php endif; ?>
            </div>
            <!-- Footer Column 2 -->
            <div class="footer-column">
                <?php if (is_active_sidebar('footer-2')) : ?>
                    <?php dynamic_sidebar('footer-2'); ?>
                <?php endif; ?>
            </div>
            <!-- Footer Column 3 -->
            <div class="footer-column">
                <?php if (is_active_sidebar('footer-3')) : ?>
                    <?php dynamic_sidebar('footer-3'); ?>
                <?php endif; ?>
            </div>
            <!-- Footer Column 4 -->
            <div class="footer-column">
                <?php if (is_active_sidebar('footer-4')) : ?>
                    <?php dynamic_sidebar('footer-4'); ?>
                <?php endif; ?>
            </div>
        </div>

        <!-- Copyright Section -->
        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.</p>
        </div>
    </div>
</footer>

<!-- Close HTML body and document -->
</body>
</html>
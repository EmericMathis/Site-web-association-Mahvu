<footer id="colophon" class="site-footer">
    <?php wp_nav_menu([
        'theme_location' => 'footer',
        'container' => false,
        'menu_class' => 'navbar-nav mr-auto'
    ]);

    if (WP_DEBUG) {
        global $template;
        printf($template);
    }; ?>
</footer>
</div>
<?php wp_footer(); ?>
</body>

</html>
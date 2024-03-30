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

<script>
    document.getElementById('theme-toggle').addEventListener('click', function() {
        document.body.classList.toggle('dark-theme');
        if (document.body.classList.contains('dark-theme')) {
            localStorage.setItem('theme', 'dark');
        } else {
            localStorage.setItem('theme', 'light');
        }
    });

    // On page load, check for a saved theme in localStorage and apply it
    document.addEventListener('DOMContentLoaded', function() {
        var savedTheme = localStorage.getItem('theme');
        if (savedTheme) {
            document.body.classList.add(savedTheme);
        }
    });
</script>

</html>
<footer id="colophon" class="site-footer">
    <?php wp_nav_menu([
        'theme_location' => 'footer',
        'container' => false,
        'menu_class' => 'navbar-nav mr-auto',
        'fallback_cb' => false // évite d'afficher les nav si le menu n'est pas défini
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
    // Au chargement de la page, on vérifie si un thème est sauvegardé de suite pour éviter le flash
    let savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        document.body.classList.add(savedTheme);
    }
</script>
<script>
    document.getElementById('theme-toggle-checkbox').addEventListener('click', function() {
        document.body.classList.toggle('dark-theme');
        if (document.body.classList.contains('dark-theme')) {
            localStorage.setItem('theme', 'dark-theme');
        } else {
            localStorage.setItem('theme', 'light-theme');
        }
    });
</script>

</html>
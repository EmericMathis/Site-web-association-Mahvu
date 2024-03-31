</div>
<footer class="btn-primary text-center mt-5">
    <div class="container p-4">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'footer',
            'container' => false,
            'items_wrap' => '<nav class="d-flex flex-column">%3$s</nav>',
            'walker' => new My_Walker_Nav_Menu(),
        ));
        ?>
        <a href="/sitemap_index.xml">Plan du site</a>
    </div>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.1);" aria-hidden="true">
        <span class="strong">M</span>ouvement des <span class="strong">A</span>veugles et des <span class="strong">H</span>andicapés <span class="strong">V</span>isuels <span class="strong">U</span>nis
    </div>
</footer>

<?php wp_footer(); ?>
</body>

<script>
    // Au chargement de la page, on vérifie si un thème est sauvegardé de suite pour éviter le flash
    let savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        document.body.classList.add(savedTheme);
        document.body.classList.add(savedTheme);
        var themeToggleCheckbox = document.getElementById('theme-toggle-checkbox');
        themeToggleCheckbox.checked = savedTheme === 'dark-theme';
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
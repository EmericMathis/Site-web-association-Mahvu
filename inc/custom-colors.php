<?php
// Couleurs par défaut pour les thèmes clair et sombre
$colors = [
    'light' => [
        'primary' => '#3b4bc0',
        'secondary' => '#ffffff',
        'tertiary' => '#df1422',
        'quaternary' => '#0a0000'
    ],
    'dark' => [
        'primary' => '#363636',
        'secondary' => '#0a0000',
        'tertiary' => '#dd3333',
        'quaternary' => '#eeee22'
    ]
];

function mytheme_customize_register($wp_customize)
{
    global $colors;

    foreach ($colors as $theme => $color_set) {
        foreach ($color_set as $color => $default) {
            $wp_customize->add_setting($color . '_color_' . $theme, ['default' => $default, 'sanitize_callback' => 'sanitize_hex_color']);
            $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $color . '_color_' . $theme, ['label' => ucfirst($color) . ' Color (' . ucfirst($theme) . ' Theme)', 'section' => 'colors', 'settings' => $color . '_color_' . $theme]));
        }
    }
}
add_action('customize_register', 'mytheme_customize_register');

function mytheme_customizer_css()
{
    global $colors;

    foreach ($colors as $theme => $color_set) {
        echo '<style type="text/css">:root {';
        foreach ($color_set as $color => $default) {
            $color_value = get_theme_mod($color . '_color_' . $theme, $default);
            echo '--' . $color . '-color-' . $theme . ': ' . $color_value . ';';
        }
        echo '}</style>';
    }
}
add_action('wp_head', 'mytheme_customizer_css');

function mytheme_reset_colors()
{
    if (isset($_GET['reset_colors'])) {
        // Liste des paramètres de couleur
        $colors = ['primary', 'secondary', 'tertiary', 'quaternary'];

        // Réinitialisez chaque couleur pour le thème clair et sombre
        foreach ($colors as $color) {
            remove_theme_mod($color . '_color_light');
            remove_theme_mod($color . '_color_dark');
        }
    }
}
add_action('init', 'mytheme_reset_colors');

function mytheme_add_reset_link($wp_admin_bar)
{
    $wp_admin_bar->add_node([
        'id' => 'reset_colors',
        'title' => 'Réinitialiser les couleurs',
        'href' => add_query_arg('reset_colors', '1')
    ]);
}
add_action('admin_bar_menu', 'mytheme_add_reset_link', 999);

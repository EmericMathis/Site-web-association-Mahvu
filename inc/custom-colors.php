<?php
// Couleurs par défaut pour les thèmes clair et sombre
$colors = [
    'light' => [
        'background' => '#ffffff',
        'nav-background' => '#3b4bc0',
        'nav-hover' => '#2c3f9b',
        'nav-text' => '#ffffff',
        'text' => '#0a0000',
        'highlight' => '#df1422',

    ],
    'dark' => [
        'background' => '#0a0000',
        'nav-background' => '#363636',
        'nav-hover' => '#555555',
        'nav-text' => '#ffffff',
        'text' => '#eeee22',
        'highlight' => '#dd3333',
    ]
];

function mytheme_customize_register($wp_customize)
{
    global $colors;

    foreach ($colors as $theme => $color_set) {
        // Ajoute une section pour chaque thème
        $wp_customize->add_section($theme . '_colors', [
            'title' => ucfirst($theme) . ' Theme Colors',
            'priority' => 30,
        ]);

        foreach ($color_set as $color => $default) {
            $wp_customize->add_setting($color . '_color_' . $theme, ['default' => $default, 'sanitize_callback' => 'sanitize_hex_color']);
            $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, $color . '_color_' . $theme, ['label' => ucfirst($color) . ' Color', 'section' => $theme . '_colors', 'settings' => $color . '_color_' . $theme]));
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

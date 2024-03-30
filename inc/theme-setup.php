<?php

function theme_supports()
{
    // Ajout des fonctionnalités au thème WordPress (image à la une, titre de la page, etc.)
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');

    add_image_size('post-thumbnail', 350, 215, true);
}
add_action('after_setup_theme', 'theme_supports');

function theme_register_assets()
{
    // Ajout des feuilles de style et des scripts
    wp_register_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', []);
    wp_register_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
    wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js', [], false, true);
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', [], false, true);
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');

    wp_enqueue_style('style', get_stylesheet_uri());

    // Ajout de toutes les feuilles de style du dossier css avec une boucle
    $css_files = glob(get_template_directory() . '/css/*.css');
    foreach ($css_files as $file) {
        $file_url = get_template_directory_uri() . '/css/' . basename($file);
        wp_enqueue_style(basename($file), $file_url);
    }
}
add_action('wp_enqueue_scripts', 'theme_register_assets');

function theme_title_separator()
{
    // Changer le séparateur du titre de la page
    return '|';
}
add_filter('document_title_separator', 'theme_title_separator');

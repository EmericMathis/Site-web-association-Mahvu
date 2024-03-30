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
}

function theme_title_separator()
{
    // Changer le séparateur du titre de la page
    return '|';
}

function montheme_menu_class($classes, $item, $args)
{
    // Ajout des classes au menu
    if ($args->theme_location == 'header') {

        $classes[] = 'btn btn-primary btn-square';
    }
    return $classes;
}

function montheme_menu_link_class($attrs)
{
    // Ajout des classes au lien du menu
    $attrs['class'] = 'nav-link text-white';

    return $attrs;
}


add_action('after_setup_theme', 'theme_supports');
add_action('wp_enqueue_scripts', 'theme_register_assets');
add_filter('document_title_separator', 'theme_title_separator');
add_filter('nav_menu_css_class', 'montheme_menu_class', 10, 3); //10 est la priorité du filtre (plus le nombre est bas, plus la priorité est élevée), et le 3 est le nombre d'arguments que la fonction accepte.
add_filter('nav_menu_link_attributes', 'montheme_menu_link_class');

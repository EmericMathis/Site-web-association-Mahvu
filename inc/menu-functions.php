<?php
function theme_menu_class($classes, $item, $args)
{
    // Ajout des classes au menu
    if ($args->theme_location == 'header') {

        $classes[] = 'btn btn-primary btn-square text-primary';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'theme_menu_class', 10, 3);

function add_featured_image_to_menu($item_output, $item, $depth, $args)
{
    // Ajout de l'image à la une dans le menu
    if ($args->theme_location == 'header' && $item->object == 'page') {
        $post = get_post($item->object_id);
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full')[0] ?? null;

        if ($image) {
            $item_output = '<a href="' . $item->url . '">';
            $item_output .= '<img src="' . $image . '" alt="' . $item->title . '">';
            $item_output .= $item->title . '</a>';
        }
    }

    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'add_featured_image_to_menu', 10, 4);

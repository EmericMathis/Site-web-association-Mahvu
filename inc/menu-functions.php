<?php
// Ajoute des classes CSS aux éléments de menu
function theme_menu_class($classes, $item, $args)
{
    if ($args->theme_location == 'header') {
        $classes[] = 'btn btn-primary btn-square text-primary';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'theme_menu_class', 10, 3);

// Crée un menu et l'assigne à l'emplacement 'header'
function theme_setup()
{
    register_nav_menu('header', __('Header Menu', 'theme_text_domain'));

    $menu_name = 'Navigation';
    $menu_exists = wp_get_nav_menu_object($menu_name);

    if (!$menu_exists) {
        $menu_id = wp_create_nav_menu($menu_name);

        $pages = array(
            'Accueil' => 'home_icon',
            'Événements' => 'events_icon',
            'Événements passés' => 'past_events_icon',
            'Historique de l\'association' => 'history_icon',
            'Présentation' => 'presentation_icon',
            'Status' => 'status_icon',
        );

        foreach ($pages as $page_title => $icon_name) {
            $page = get_page_by_path(sanitize_title($page_title), OBJECT, 'page');

            if (!$page) {
                $page_id = wp_insert_post(array(
                    'post_title' => $page_title,
                    'post_status' => 'publish',
                    'post_type' => 'page',
                ));

                if (!is_wp_error($page_id)) {
                    wp_update_nav_menu_item($menu_id, 0, array(
                        'menu-item-title' => $page_title,
                        'menu-item-object-id' => $page_id,
                        'menu-item-object' => 'page',
                        'menu-item-status' => 'publish',
                    ));

                    // Définir la page comme page d'accueil si le titre est 'Accueil'
                    if ($page_title == 'Accueil') {
                        update_option('page_on_front', $page_id);
                        update_option('show_on_front', 'page');
                    }

                    // Définir la page comme page des articles si le titre est 'Événements'
                    if ($page_title == 'Événements') {
                        update_option('page_for_posts', $page_id);
                    }
                }
            } else {
                wp_update_nav_menu_item($menu_id, 0, array(
                    'menu-item-title' => $page_title,
                    'menu-item-object-id' => $page->ID,
                    'menu-item-object' => 'page',
                    'menu-item-status' => 'publish',
                ));
            }
        }

        $locations = get_theme_mod('nav_menu_locations');
        $locations['header'] = $menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}
add_action('after_setup_theme', 'theme_setup');

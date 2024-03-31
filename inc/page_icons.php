<?php

function add_icon_meta_box()
{
    add_meta_box('icon_meta_box', 'Icone', 'display_icon_meta_box', 'page', 'side', 'high');
}
add_action('add_meta_boxes', 'add_icon_meta_box');

function display_icon_meta_box($post)
{
    $icon = get_post_meta($post->ID, '_icon', true);
    echo '<input type="text" name="icon" value="' . esc_attr($icon) . '">';
}

function save_icon_meta_box($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
    if (!current_user_can('edit_post', $post_id)) return;
    if (isset($_POST['icon'])) {
        update_post_meta($post_id, '_icon', sanitize_text_field($_POST['icon']));
    }
}
add_action('save_post', 'save_icon_meta_box');

function add_icon_to_menu_item($title, $item, $args, $depth)
{
    if ($args->theme_location == 'header') {
        $icon = get_post_meta($item->object_id, '_icon', true);
        if (!empty($icon)) {
            $title = "<i class='material-icons menu-icon'>$icon</i> " . $title;
        }
    }
    return $title;
}
add_filter('nav_menu_item_title', 'add_icon_to_menu_item', 10, 4);

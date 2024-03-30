<?php

// Charge les fichiers situés dans le dossier inc, 
// servant à organiser le code en découpant les fonctions en plusieurs fichiers

foreach (glob(get_template_directory() . "/inc/*.php") as $file) {
    require_once $file;
}


function add_custom_meta_boxes()
{
    $fields = [
        'contact_tel' => 'Contact Tel/Fax',
        'contact_email' => 'Courriel',
        'adresse' => 'Adresse',
        'horaires' => 'Horaires', // Ajoutez cette ligne
        'map_html' => 'HTML de la carte Google Maps'
    ];

    foreach ($fields as $id => $title) {
        add_meta_box(
            $id,
            $title,
            'show_custom_meta_box',
            'page',
            'normal',
            'high',
            ['id' => $id]
        );
    }
}

function show_custom_meta_box($post, $metabox)
{
    $field_id = $metabox['args']['id'];
    $field_value = get_post_meta($post->ID, $field_id, true);

    if ($field_id == 'adresse' || $field_id == 'horaires') { // Ajoutez 'horaires' ici
        echo '<textarea name="' . $field_id . '">' . $field_value . '</textarea>';
    } else {
        echo '<input type="text" name="' . $field_id . '" value="' . $field_value . '">';
    }
}

function save_custom_meta_boxes($post_id)
{
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $fields = ['contact_tel', 'contact_email', 'adresse', 'horaires', 'map_html']; // Ajoutez 'horaires' ici

    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, $_POST[$field]);
        }
    }
}

add_action('add_meta_boxes', 'add_custom_meta_boxes');
add_action('save_post', 'save_custom_meta_boxes');


function replace_svg_images($html, $post_id, $post_thumbnail_id, $size, $attr)
{
    $attachment_file = get_attached_file($post_thumbnail_id);
    if (pathinfo($attachment_file, PATHINFO_EXTENSION) == 'svg') {
        $svg_content = file_get_contents($attachment_file);
        $html = $svg_content;
    }
    return $html;
}
add_filter('post_thumbnail_html', 'replace_svg_images', 10, 5);

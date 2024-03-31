<?php

// Charge les fichiers situés dans le dossier inc, 
// servant à organiser le code en découpant les fonctions en plusieurs fichiers

foreach (glob(get_template_directory() . "/inc/*.php") as $file) {
    require_once $file;
}
function remove_default_image_sizes($sizes)
{
    unset($sizes['thumbnail']);    // Supprimer les miniatures
    unset($sizes['medium']);       // Supprimer les images de taille moyenne
    unset($sizes['large']);        // Supprimer les grandes images

    return $sizes;
}
add_filter('intermediate_image_sizes_advanced', 'remove_default_image_sizes');

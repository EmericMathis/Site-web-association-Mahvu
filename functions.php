<?php

// Charge les fichiers situés dans le dossier inc, 
// servant à organiser le code en découpant les fonctions en plusieurs fichiers

foreach (glob(get_template_directory() . "/inc/*.php") as $file) {
    require_once $file;
}
class My_Walker_Nav_Menu extends Walker_Nav_Menu
{
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $output .= sprintf(
            "\n<span class='nav-item'><a href='%s'%s>%s</a></span>\n",
            $item->url,
            ($item->object_id === get_the_ID()) ? ' class="current"' : '',
            $item->title
        );
    }
}

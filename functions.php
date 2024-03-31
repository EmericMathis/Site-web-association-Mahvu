<?php

// Charge les fichiers situés dans le dossier inc, 
// servant à organiser le code en découpant les fonctions en plusieurs fichiers

foreach (glob(get_template_directory() . "/inc/*.php") as $file) {
    require_once $file;
}

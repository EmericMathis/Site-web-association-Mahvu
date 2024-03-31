<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/chemin/vers/votre/favicon.ico" type="image/x-icon" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>
    <div class="container">
        <header class="header">
            <div class="d-flex flex-column justify-content-center align-items-center m-4" style="height: 110px;">
                <a href="<?php echo home_url('/'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo" style="height: 7rem;">
                    <div class="eye">
                        <div class="shut">
                            <span></span>
                        </div>
                        <div class="ball">
                        </div>
                    </div>
                </a>
                <p class="association-name flex-end"><?php bloginfo('name'); ?> - <?php bloginfo('description'); ?></p>
            </div>




            <nav class="w-100">
                <?php wp_nav_menu([
                    'theme_location' => 'header',
                    'container' => false,
                ]); ?>
            </nav>

            <label class="switch" for="theme-toggle-checkbox">
                <input type="checkbox" id="theme-toggle-checkbox">
                <span class="slider"></span>
            </label>

            <h1 class="title text-center pb-3">
                <?php
                $page_id = get_queried_object_id();
                $icon = get_post_meta($page_id, '_icon', true);
                if ($icon) {
                    echo "<i class='material-icons icon-size'>$icon</i>";
                }
                echo "<strong>";
                single_post_title();
                echo "</strong>";
                ?>
            </h1>
        </header>
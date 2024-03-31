<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>
    <div class="container">
        <header class="header">
            <div class="d-flex justify-content-center align-items-center m-4" style="height: 100px;">
                <a href="<?php echo home_url('/'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo" style="max-width: 200px;">
                    <div class="eye">
                        <div class="shut">
                            <span></span>
                        </div>
                        <div class="ball">
                        </div>
                    </div>
                </a>
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

            <h1 class="text-center">
                <?php
                $page_id = get_queried_object_id();
                $icon = get_post_meta($page_id, '_icon', true);
                if ($icon) {
                    echo "<i class='material-icons'>$icon</i>";
                }
                single_post_title();
                ?>
            </h1>
        </header>
        <!--                		SWITCH THEME  								-->
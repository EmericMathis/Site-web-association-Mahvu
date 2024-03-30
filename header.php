<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php wp_body_open(); ?>
    <div class="container">
        <header class="header">
            <div class="d-flex justify-content-center align-items-center mb-4">
                <a href="<?php echo home_url('/'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="img-fluid" style="max-width: 200px;">
                </a>
            </div>

            <nav class="w-100">
                <?php wp_nav_menu([
                    'theme_location' => 'header',
                    'container' => false,
                ]); ?>
            </nav>
        </header>
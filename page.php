<?php

/**
 * Template Name: Custom Page Template
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();
?>

<main id="site-content" role="main">
    <div class="card">

        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post(); ?>
                <div class="card-body p-5 ">
                    <?php get_template_part('template-parts/content', 'page'); ?>
                </div>
        <?php
            }
        }
        ?>

    </div>
</main><!-- #site-content -->

<?php get_footer(); ?>
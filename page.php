<!-- page.php affiche le contenu d'une page -->

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?> <!-- Cette boucle permet de parcourir les articles de la page -->

        <h1><?php the_title(); ?></h1> <!-- Affiche le titre de la page -->

        <?php the_content(); ?> <!-- Affiche le contenu de la page -->

<?php endwhile;
endif; ?>

<?php get_footer(); ?>
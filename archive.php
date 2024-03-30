<!-- archive.php affiche les articles d'une catégorie -->

<?php get_header(); ?>
<h1><?php bloginfo('name'); ?></h1> <!-- Affiche le nom du site -->

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <article class="post">
            <h2><?php the_title(); ?></h2> <!-- Affiche le titre de l'article -->

            <?php the_post_thumbnail(); ?> <!-- l'image à la une de l'article -->

            <p class="post__meta">
                Publié le <?php the_time(get_option('date_format')); ?> <!-- la date de publication de l'article -->
                par <?php the_author(); ?> • <?php comments_number(); ?> <!-- l'auteur de l'article et le nombre de commentaires -->
            </p>

            <?php the_excerpt(); ?> <!-- l'extrait de l'article -->

            <p>
                <a href="<?php the_permalink(); ?>" class="post__link">Lire la suite</a> <!-- lien vers l'article, the_permalink se place dans href car c'est une URL -->
            </p>
        </article>

<?php endwhile;
endif; ?>
<?php get_footer(); ?>
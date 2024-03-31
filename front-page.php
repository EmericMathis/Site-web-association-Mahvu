<!-- front-page.php affiche la page d'accueil -->

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <section class="row no-gutters card-accueil bg-primary rounded p-2">
                        <div class="col-sm-12 col-lg-6 align text-center text-lg-left">
                                <h2>Contact :</h2>
                                <p>Tel/Fax : 04 77 32 66 11<br>
                                        Courriel : mahvu@orange.fr</p>

                                <h2>Horaires d'ouverture :</h2>
                                <p>Lundi : de 14h à 17h <br>
                                        Mardi : de 14h à 17h</p>

                                <h2>Adresse : </h2>
                                <p>27 rue Louis Braille <br>
                                        42000 Saint-Etienne</p>
                        </div>
                        <div class="col-sm-12 col-lg-6 map-container">
                                <div class="map-container">
                                        <iframe class="rounded" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d5598.884849995615!2d4.38862!3d45.44074!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f5aea9e44babef%3A0x46edb5ca60f212f7!2s27%20Rue%20Louis%20Braille%2C%2042000%20Saint-%C3%89tienne%2C%20France!5e0!3m2!1sfr!2sus!4v1710433205517!5m2!1sfr!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                        </div>
                </section>
<?php endwhile;
endif; ?>

<?php
$args = array(
        'posts_per_page' => 1,
);
$query = new WP_Query($args);
if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <div class="card mt-5">
                        <?php if (has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>" style="height: 20rem; object-fit:cover;">
                        <?php endif; ?>
                        <div class="card-body">
                                <h5 class="card-title"><?php the_title(); ?></h5>
                                <p class="card-text">
                                        Publié le <?php the_time(get_option('date_format')); ?>
                                        par <?php the_author(); ?> • <?php comments_number(); ?>
                                </p>
                                <p class="card-text"><?php the_excerpt(); ?></p>
                                <div style="text-align: right;">
                                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Lire la suite</a>
                                </div>
                        </div>
                </div>
<?php endwhile;
endif;
wp_reset_postdata();
?>


<?php get_footer(); ?>
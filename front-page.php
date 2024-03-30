<!-- front-page.php affiche la page d'accueil -->

<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                <section class="row card-accueil">
                        <div class="col-sm-12 col-lg-6 align text-center text-lg-left">
                                <h2>Contact :</h2>
                                <p>Tel/Fax : <?php echo get_post_meta(get_the_ID(), 'contact_tel', true); ?> <br>
                                        Courriel : <?php echo get_post_meta(get_the_ID(), 'contact_email', true); ?></p>

                                <h2>Horaires d'ouverture :</h2>

                                <?php
                                $horaires = get_post_meta(get_the_ID(), 'horaires', true);
                                if (!empty($horaires)) {
                                        echo nl2br($horaires);
                                }
                                ?>
                                <br>
                                <br>
                                <h2>Adresse :</h2>
                                <p><?php echo nl2br(get_post_meta(get_the_ID(), 'adresse', true)); ?></p> <!-- nl2br() permet de conserver les retours à la ligne -->

                        </div>
                        <div class="col-sm-12 col-lg-6 map-container">
                                <?php
                                $map_html = get_post_meta(get_the_ID(), 'map_html', true);
                                if (!empty($map_html)) {
                                        echo $map_html;
                                }
                                ?>
                        </div>
                </section>

<?php endwhile;
endif; ?>

<?php get_footer(); ?>
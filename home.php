<!-- home.php affiche les articles de la page d'accueil -->

<?php get_header(); ?>

<div class="row">
    <?php
    if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <div class="col-12">
                <div class="card mb-4">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>">
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
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
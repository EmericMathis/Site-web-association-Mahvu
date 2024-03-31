<?php
/*
Template Name: Page d'archive
*/
?>

<?php get_header(); ?>

<div class="row">
    <?php
    // Modifier la requête principale pour définir le nombre d'articles par page à 5
    $paged = max(1, get_query_var('paged'));
    $posts_per_page = 8;
    $args = array(
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'post_status' => 'publish',
    );
    $wp_query = new WP_Query($args);

    if ($wp_query->have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>

            <div class="col-md-6">
                <div class="card mb-4">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url(); ?>" class="card-img-top" alt="<?php the_title(); ?>" style="height: 15rem; object-fit:cover;">
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

    <?php endwhile;

        // Ajouter une pagination après la boucle des articles
        $pagination = paginate_links(array(
            'total' => $wp_query->max_num_pages, // Utiliser $wp_query->max_num_pages
            'current' => $paged,
            'type'  => 'array',
            'prev_next' => true,
            'prev_text' => '&laquo;',
            'next_text' => '&raquo;',
        ));

        if (!empty($pagination)) {
            echo '<nav class="w-100"><ul class="pagination justify-content-center">';
            foreach ($pagination as $page_link) {
                $class = (strpos($page_link, 'current') !== false) ? ' active' : '';
                echo '<li class="page-item' . $class . '">' . str_replace('page-numbers', 'page-link', $page_link) . '</li>';
            }
            echo '</ul></nav>';
        }
    endif; ?>
</div>

<?php get_footer(); ?>
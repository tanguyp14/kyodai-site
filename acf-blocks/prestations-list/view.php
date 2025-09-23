<?php
// Get all categories for prestations
$categories = get_terms(array(
    'taxonomy' => 'category', // Utilise 'category' comme vous l'avez configuré
    'hide_empty' => false,
    'object_ids' => get_posts(array(
        'post_type' => 'prestation',
        'posts_per_page' => -1,
        'fields' => 'ids'
    ))
));
?>

<div class="prestations-filter">
    <button data-category="all" class="filter-btn active">Toutes les impressions</button>
    <?php
    if (!is_wp_error($categories) && !empty($categories)):
        // Trier les catégories par ID (du plus récent au plus vieux)
        usort($categories, function ($a, $b) {
            return $a->term_id <=> $b->term_id;
        });
        foreach ($categories as $cat): ?>
            <button data-category="<?php echo esc_attr($cat->slug); ?>" class="filter-btn">
                <?php echo esc_html($cat->name); ?>
            </button>
    <?php endforeach;
    endif;
    ?>
</div>

<div id="prestations-list-container">
    <?php
    // Initial load: show all prestations
    $args = array(
        'post_type' => 'prestation',
        'posts_per_page' => -1,
    );
    $prestations_query = new WP_Query($args);

    if ($prestations_query->have_posts()) :  $index = 0; ?>
        <ul class="prestations-list">
            <?php while ($prestations_query->have_posts()) : $prestations_query->the_post();
                $price = get_post_meta(get_the_ID(), 'prix_prestation', true);
            ?>
                <li class="prestation-item" data-aos="fade-up" data-aos-anchor="top-bottom" data-aos-delay="<?php echo $index ?>">
                    <a class="prestation-link" href="<?php the_permalink(); ?>"></a>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="prestation-image">
                            <?php the_post_thumbnail('medium'); ?>
                        </div>
                    <?php endif; ?>
                    <h3 class="prestation-title"><?php the_title(); ?></h3>
                    <div class="prestation-price">
                        <p><?php echo $price ?></p><span class="chevron-go"></span>
                    </div>
                </li>
            <?php $index = $index + 100;
            endwhile; ?>
        </ul>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p>Aucune prestation trouvée.</p>
    <?php endif; ?>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.filter-btn');

        buttons.forEach(btn => {
            btn.addEventListener('click', function() {
                // Retirer la classe active de tous les boutons
                buttons.forEach(b => b.classList.remove('active'));

                // Ajouter la classe active au bouton cliqué
                this.classList.add('active');

                const category = this.getAttribute('data-category');
                const container = document.getElementById('prestations-list-container');

                // Afficher un loader
                container.innerHTML = '<p class="loading"></p>';

                // Requête AJAX
                fetch('<?php echo admin_url('admin-ajax.php'); ?>?action=filter_prestations&category=' + encodeURIComponent(category))
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Erreur réseau');
                        }
                        return response.text();
                    })
                    .then(html => {
                        container.innerHTML = html;
                        if (typeof AOS !== 'undefined') {
                            AOS.refresh(); // Rafraîchit les éléments existants
                            AOS.init(); // Réinitialise AOS
                        }
                    })

                    .catch(error => {
                        console.error('Erreur:', error);
                        container.innerHTML = '<p class="error">Erreur lors du chargement des prestations.</p>';
                    });
            });
        });
    });
</script>
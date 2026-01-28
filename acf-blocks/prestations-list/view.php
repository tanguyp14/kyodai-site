<?php
// Get ACF fields
$texte = get_field('texte');
$lien_contact = get_field('lien_contact');
$texte_contact = get_field('texte_contact');

// Get all categories for prestations
$categories = get_terms(array(
    'taxonomy' => 'category',
    'hide_empty' => false,
    'object_ids' => get_posts(array(
        'post_type' => 'prestation',
        'posts_per_page' => -1,
        'fields' => 'ids',
    ))
));
?>

<section class="prestations-section">
    <div class="prestations-filter">
        <div class="filter-header">
            <button data-category="all" class="filter-btn-all active">
                <span class="filter-header-text">Toutes les impressions</span>
                <!-- <span class="filter-header-arrow"></span> -->
            </button>
        </div>
        <div class="filter-categories">
            <?php
            if (!is_wp_error($categories) && !empty($categories)):
                // Trier les catégories par le champ ACF "category_order"
                usort($categories, function ($a, $b) {
                    $order_a = get_field('category_order', 'category_' . $a->term_id) ?: 0;
                    $order_b = get_field('category_order', 'category_' . $b->term_id) ?: 0;
                    return $order_a <=> $order_b;
                });
                foreach ($categories as $cat):
                    $icon = get_field('category_icon', 'category_' . $cat->term_id);
            ?>
                    <button data-category="<?php echo esc_attr($cat->slug); ?>" class="filter-btn">
                        <?php if ($icon): ?>
                            <span class="filter-btn-icon">
                                <img src="<?php echo esc_url($icon); ?>" alt="">
                            </span>
                        <?php endif; ?>
                        <span class="filter-btn-text"><?php echo esc_html($cat->name); ?></span>
                    </button>
            <?php endforeach;
            endif;
            ?>
        </div>
    </div>

    <div id="prestations-list-container">
        <?php
        // Initial load: show all prestations
        $args = array(
            'post_type' => 'prestation',
            'posts_per_page' => -1,
            'orderby' => 'rand'
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
    <div class="under_card">
        <div class="texte">
            <p class="infos"><?php echo $texte; ?></p>
            <span class="link blue"><a href="<?php echo $lien_contact; ?>" aria-label="<?php echo $texte_contact; ?>" alt="<?php echo $texte_contact; ?>"><?php echo $texte_contact; ?></a></span>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const allButton = document.querySelector('.filter-btn-all');
        const categoryButtons = document.querySelectorAll('.filter-btn');
        const allButtons = [allButton, ...categoryButtons];

        // Sticky filter avec JavaScript (contourne overflow-x: hidden)
        const filter = document.querySelector('.prestations-filter');
        const section = document.querySelector('.prestations-section');

        if (filter && section) {
            let placeholder = null;
            let filterTop = filter.getBoundingClientRect().top + window.scrollY;
            const filterHeight = filter.offsetHeight;

            // Recalculer la position initiale au resize
            window.addEventListener('resize', function() {
                if (!filter.classList.contains('is-sticky')) {
                    filterTop = filter.getBoundingClientRect().top + window.scrollY;
                }
            });

            function handleSticky() {
                const scrollY = window.scrollY;
                const sectionBottom = section.getBoundingClientRect().bottom + scrollY;

                if (scrollY >= filterTop && scrollY < sectionBottom - filterHeight) {
                    if (!filter.classList.contains('is-sticky')) {
                        filter.classList.add('is-sticky');
                        if (!placeholder) {
                            placeholder = document.createElement('div');
                            placeholder.style.height = filterHeight + 'px';
                            section.insertBefore(placeholder, filter);
                        }
                    }
                } else {
                    if (filter.classList.contains('is-sticky')) {
                        filter.classList.remove('is-sticky');
                        if (placeholder) {
                            placeholder.remove();
                            placeholder = null;
                        }
                        filterTop = filter.getBoundingClientRect().top + window.scrollY;
                    }
                }
            }

            window.addEventListener('scroll', handleSticky, {
                passive: true
            });
        }

        function handleFilter(btn) {
            // Retirer la classe active de tous les boutons
            allButtons.forEach(b => b.classList.remove('active'));

            // Ajouter la classe active au bouton cliqué
            btn.classList.add('active');

            const category = btn.getAttribute('data-category');
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
                        AOS.refresh();
                        AOS.init();
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    container.innerHTML = '<p class="error">Erreur lors du chargement des prestations.</p>';
                });
        }

        if (allButton) {
            allButton.addEventListener('click', function() {
                handleFilter(this);
            });
        }

        categoryButtons.forEach(btn => {
            btn.addEventListener('click', function() {
                handleFilter(this);
            });
        });
    });
</script>
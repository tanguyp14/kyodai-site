<?php
$fields = get_fields();
extract($fields);

$categorie_name = '';
$categories = get_the_terms(get_the_ID(), 'category');
if ($categories && !is_wp_error($categories)) {
    $categorie_name = $categories[0]->name;
}
?>

<section class="tylt_info_prestation">
    <img class="main_devis" src="<?php echo get_template_directory_uri(); ?>/acf-blocks/prestations-infos/assets/img/MAIN + DEVIS.svg" alt="Main devis">
    <a href="/prestation" class="go_back">
        <span class="text_go_back">Retour aux prestations</span>
    </a>
    <div class="title_block">
        <?php if ($categorie_name !== ''): ?>
            <span class="categorie"><?php echo esc_html($categorie_name); ?> :</span>
        <?php endif; ?>
    </div>
    <div class="card">
        <div class="card_content">
            <div class="card_images">
                <div class="tylt_info_prestation_image" data-aos="fade-right">
                    <?php if (!empty($images)): ?>
                        <?php echo wp_get_attachment_image($images[0], 'full'); ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card_text">
                <div>
                    <h1 class="titre"><?php echo esc_html(get_the_title()); ?></h1>
                    <?php if (!empty($sous_titre)): ?>
                        <span class="sous_titre"><?php echo esc_html($sous_titre); ?></span>
                    <?php endif; ?>
                </div>
                <div class="texte"><?php echo $zone_de_texte; ?></div>
                <a alt="Demander un devis" class="button-devis" href="/devis">Demander mon devis</a>
            </div>
        </div>
    </div>

</section>
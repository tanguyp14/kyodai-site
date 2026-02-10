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
                <div class="tylt_info_prestation_images" data-aos="fade-right">
                    <?php foreach ($images as $image_id): ?>
                        <div class="tylt_info_prestation_images_image">
                            <?php echo wp_get_attachment_image($image_id, 'full'); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="arrows">
                    <span class="prev_arrow"> </span>
                    <span class="next_arrow"> </span>
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

    <div class="tylt_lightbox">
        <div class="tylt_lightbox_slick">
            <?php foreach ($images as $image_id): ?>
                <div class="tylt_lightbox_slick_image">
                    <?php echo wp_get_attachment_image($image_id, 'full'); ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="arrows_light">
            <span class="prev_arrow_light"> </span>
            <span class="next_arrow_light"> </span>
        </div>
    </div>
</section>
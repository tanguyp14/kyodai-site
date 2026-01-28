<?php
$fields = get_fields();
extract($fields);
?>

<section class="tylt_info_prestation">
    <a href="/prestation" class="go_back">
        <span class="text_go_back">Retour aux prestations</span>
    </a>
    <div class="title_block">
        <h1><?php echo $titre; ?></h1>
        <?php if ($sous_titre !== ''): ?>
            <span class="sous_titre"><?php echo $sous_titre; ?></span>
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
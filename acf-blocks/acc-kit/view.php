    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section id="kit" class="kit_papier">
        <div class="image_pack" data-aos="<?= wp_is_mobile() ? 'fade-right' : 'right' ?>" data-aos-easing="ease-in-out" data-aos-delay="300">
            <?php if ($image) : ?>
                <?php echo wp_get_attachment_image($image, 'full'); ?>
            <?php endif; ?>
        </div>
        <div class="text_pack">
            <h2><?php echo $titre; ?></h2>
            <p class="sous-titre"><?php echo $sous_titre; ?></p>
            <?php if ($formulaire_ou_lien == 0) : ?>
                    <p class="z-t"><?php echo $zone_de_texte; ?></p>
                    <p class="z-t-t"><?php echo $zone_de_gras; ?></p>
                    <span class="link red"><a href="<?php echo $lien; ?>" alt="Vers la demande de Kit papier" class="cta">Choper mon kit</a></span>
            <?php else : ?>
                <?php echo do_shortcode($shortcode_formulaire); ?>
            <?php endif; ?>
        </div>
    </section>
    <?php
    $fields = get_fields();
    extract($fields);
    $d = 1;
    ?>
    <section class="avis_container">
        <span class="arrow arrow_left"></span>
        <div class="avis">
            <?php foreach ($avis as $avi) : extract($avi); ?>
                <div class="avi" data-id="<?php echo $d; ?>">
                    <span class="icon" style="background-image: url('<?php echo wp_get_attachment_url($icon); ?>');"></span>
                    <span class="etoile"></span>
                    <p class="name"><?php echo $nom; ?></p>
                    <p class="text"><?php echo $zone_de_texte; ?></p>
                    <span class="date"><?php echo $date; ?></span>
                </div>
            <?php $d++;
            endforeach; ?>
        </div>
        <span class="arrow arrow_right"></span>
    </section>
    <section class="under_card">
        <div class="texte">
        <p class="infos"><?php echo $texte; ?></p>
        <span class="link blue"><a href="<?php echo $lien_contact; ?>" aria-label="<?php echo $texte_contact; ?>" alt="<?php echo $texte_contact; ?>"><?php echo $texte_contact; ?></a></span>
        </div>
    </section>
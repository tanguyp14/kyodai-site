    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="formulaire">
        <div class="upper_form">
            <span class="link red"><a href="<?php echo $link ?>" alt="<?php echo $link_text ?>" class="cta"><?php echo $link_text ?></a></span>
        </div>
        <div class="form">
            <h2><?php echo $titre_devis; ?></h2>
            <div class="form_content">
                <?php if ($shortcode_devis) : ?>
                    <?php echo $shortcode_devis; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
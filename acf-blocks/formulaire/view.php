    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="formulaire">
        <span data-aos="fade-left" class="hand after" style="background-image: url('<?php echo wp_get_attachment_url($back_after); ?>')"></span>
        <div data-aos="fade-right" class="form">
            <h2 style="background-color: <?php echo $color_bg; ?>;"><?php echo $titre_devis; ?></h2>
            <div class="form_content">
                <?php if ($shortcode_devis) : ?>
                    <?php echo $shortcode_devis; ?>
                <?php endif; ?>
            </div>
        </div>
        <span data-aos="fade-right"class="hand before" style="background-image: url('<?php echo wp_get_attachment_url($back_before); ?>')"></span>
    </section>
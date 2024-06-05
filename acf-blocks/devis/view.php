    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="devis_page is_full_page_mid">
        <div class="one">
            <?php if ($shortcode_devis) : ?>
                <?php echo $shortcode_devis; ?>
            <?php endif; ?>
        </div>
        <div class="two">
            <?php if ($image) : ?>
                <?php echo wp_get_attachment_image($image, 'full'); ?>
            <?php endif; ?>
        </div>
    </section>
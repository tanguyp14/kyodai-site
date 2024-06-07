    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="pack_presta plw">
        <div class="form_pack">
            <?php if ($shortcode_pack) : ?>
                <?php echo $shortcode_pack; ?>
            <?php endif; ?>
        </div>
        <div class="image_pack">
            <?php if ($image) : ?>
                <?php echo wp_get_attachment_image($image, 'full'); ?>
            <?php endif; ?>
        </div>
    </section>
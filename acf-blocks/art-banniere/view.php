    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="art-banniere" data-aos="fade-down" style="background-image: url('<?php echo wp_get_attachment_url( $background )  ?>');">
        <div class="container-images">
            <?php foreach ($images as $image): extract($image) ?>
                <span data-aos="zoom-out" data-aos-delay="<?php echo $delay; ?>" class="image">
                    <?php echo wp_get_attachment_image($image['id'], 'full'); ?>
                </span>
            <?php endforeach; ?>    
        </div>
    </section>
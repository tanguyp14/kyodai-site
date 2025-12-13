    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="not-acc-banniere" data-aos="fade-down" style="background-image: url('<?php echo wp_get_attachment_url( $background )  ?>');">
        <div class="container-images">
            <span data-aos="zoom-out" data-aos-delay="600"class="left"><?php echo wp_get_attachment_image( $logo_gauche, 'full' )  ?></span>
            <span data-aos="zoom-out" data-aos-delay="300"class="center"><?php echo wp_get_attachment_image( $logo_central, 'full' )  ?></span>
            <span data-aos="zoom-out" data-aos-delay="800"class="right"><?php echo wp_get_attachment_image( $logo_droite, 'full' )  ?></span>
        </div>

    </section>
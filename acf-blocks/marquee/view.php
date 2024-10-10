    <?php
    $fields = get_fields();
    extract($fields);
    $unique_id = uniqid();
    ?>
    <section  id="<?php echo $unique_id; ?>" class="marquee" data-aos="flip-down" data-aos-offset="0" data-aos-delay="300">
        <span class="<?php echo $unique_id; ?> marquee_text" ><?php echo $le_texte; ?></span>
    </section>
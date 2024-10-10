    <?php
    $fields = get_fields();
    extract($fields);
    $t = 3;
    ?>
    <section class="pictos_container">
        <div class="pictos">
            <?php foreach ($pictos as $picto) : extract($picto); ?>
                <div class="picto" data-aos="<?= wp_is_mobile() ? 'fade-right' : 'fade-up' ?>" data-aos-delay="<?= $t ?>00">
                    <span class="icon" style="background-image: url('<?php echo wp_get_attachment_url($image); ?>'); animation-duration: <?= $t ?>s"></span>
                    <span class="text"><?php echo $texte; ?></span>
                </div>

            <?php $t++; endforeach;  ?>
        </div>
    </section>
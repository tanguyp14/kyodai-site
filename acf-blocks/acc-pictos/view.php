    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="pictos_container">
        <div class="pictos">
            <?php foreach ($pictos as $picto) : extract($picto); ?>
                <div class="picto">
                    <span class="icon" style="background-image: url('<?php echo wp_get_attachment_url($image); ?>')"></span>
                    <span class="text"><?php echo $texte; ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
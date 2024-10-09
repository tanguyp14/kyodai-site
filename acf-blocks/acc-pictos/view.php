    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="pictos">
        <?php foreach ($pictos as $picto) : extract($picto); ?>
            <div class="picto">
                <span class="icon" style="background-image: url('<?php echo wp_get_attachment_url($icon); ?>')"></span>
                <h2><?php echo $titre; ?></h2>
                <span class="text"><?php echo $zone_de_texte; ?></span>
            </div>
        <?php endforeach; ?>
    </section>
    <?php
    $fields = get_fields();
    extract($fields);
    $unique_id = uniqid();
    ?>
    <section id="<?php echo $unique_id; ?>" class="marquee" data-speed="<?php echo isset($speed) ? $speed : ''; ?>" style="background-color: <?php echo isset($bg_color) ? $bg_color : ''; ?>;">

        <span class="<?php echo $unique_id; ?> marquee_text">
            <div class="inside">
                <span><?php echo $le_texte; ?></span>
                <?php if (!empty($image)) : echo " <img src='" . wp_get_attachment_url($image) . "'/>";
                endif; ?>
            </div>
        </span>
    </section>
    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="last-real">
        <div class="one">
            <div class="content">
                <h2><?php echo $titre; ?></h2>
                <p><?php echo $zone_de_texte; ?></p>
                <a href="/portfolio" alt="Voir le portfolio" class="btn">Voir le portfolio</a>
            </div>
        </div>
        <div class="two">
            <div class="grid-main">
                <?php foreach ($mise_en_avant as $item) : extract($item) ?>
                    <div class="item">
                        <?php echo wp_get_attachment_image($image, 'full'); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
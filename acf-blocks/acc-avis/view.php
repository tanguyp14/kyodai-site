    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="avis">
    <?php foreach ($avis as $avi) : extract($avi); ?>
        <div class="avi">
            <p class="name"><?php echo $nom; ?></p>
            <p class="text"><?php echo $zone_de_texte; ?></p>
        </div>
        <?php endforeach; ?>
    </section>
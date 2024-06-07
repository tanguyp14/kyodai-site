    <?php
    $fields = get_fields();
    extract($fields);
    $i = 0;
    $y = 0;
    ?>
    <section class="what is_full_page" id="<?php echo formatValue($ancre); ?>">
        <div class="left list-menu">
            <?php
            foreach ($liste_prestation as $item) {
                extract($item); ?>
                <h2 id="<?php echo $i; ?>"><span class="arrow"></span><?php echo $nom_de_la_presta; ?></h2>
                <p class="text"><?php echo $explications; ?></p>
                <?php $i++; ?>
            <?php }
            ?>
        </div>
        <div class="right list-img">
            <?php
            foreach ($liste_prestation as $item) {
                extract($item); ?>
                <div class="img <?php echo $y; ?>"><?php echo wp_get_attachment_image($photo, 'full'); ?></div>
                <?php $y++; ?>

            <?php }
            ?>
        </div>
    </section>
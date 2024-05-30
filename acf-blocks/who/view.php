    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="who is_full_page" id="<?php echo formatValue($ancre); ?>">
        <?php
        foreach ($personnes as $item) {
            extract($item); ?>
            <div class="person">
                <h2><?php echo $titre; ?></h2>
                <h3><?php echo $name; ?></h3><span style="background-image: ../dist/images/<?php echo $icon_svg ?>;"></span>
                <p class="alias"><?php if (!empty($alias)) {
                                        echo $alias;
                                    } ?></p>
                <p class="rs"><a href="https://instagram.com/<?php echo $instagram ?>"><span class="instagram"></span>@<?php echo $instagram; ?></a></p>
                <p class="info"><?php echo $informations; ?></p>
                <?php echo wp_get_attachment_image($photo, 'full'); ?>
            </div>
        <?php }
        ?>
    </section>
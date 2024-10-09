    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="cards_container">
        <div class="cards">
            <?php $delay = 200; ?>
            <?php foreach ($cartes as $card) : extract($card); ?>
                <div class="card" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
                    <span class="add_on" data-aos="zoom-in" data-aos-anchor-placement="top-bottom" data-aos-delay="<?php echo $delay + 200; ?>" style="background-image: url('<?php echo wp_get_attachment_url($add_on); ?>'"></span>
                    <span class="background" style="background-image: url('<?php echo wp_get_attachment_url($background_images); ?>'"></span>
                    <h2><?php echo $titre; ?></h2>
                    <span class="text"><?php echo $zone_de_texte; ?></span>
                </div>
                <?php $delay += 100; ?>

            <?php endforeach; ?>
        </div>
        <section>
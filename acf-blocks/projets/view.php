    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="projets">
        <h1><?php echo $titre; ?></h1>
        <p class="under"><?php echo $zone_de_texte; ?></p>
        <div class="grid">
            <?php foreach ($projets as $item) : extract($item); ?>
                <div class="grid-item">
                    <?php if ($image) : ?>
                        <figure class="image">
                            <?php echo wp_get_attachment_image($image, 'full'); ?>
                            <?php if ($description or $name or $insta) : ?>
                                <div class="description">
                                    <div class="overlay">
                                        <?php if ($name) : ?>
                                            <h2 class="name"><?php echo $name; ?></h2>
                                        <?php endif; ?>
                                        <p><?php echo $description; ?></p>
                                        <?php if ($insta) : ?>
                                            <span class="insta">
                                                <a alt="<?php echo $insta ?>" href="https://instagram.com/<?php echo $insta ?>">@<?php echo $insta; ?></a>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </figure>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="projets">
        <div class="grid">
            <?php foreach ($projets as $item) : extract($item); ?>
                <div class="grid-item">
                    <?php if ($image) : ?>
                        <figure class="image">
                            <?php echo wp_get_attachment_image($image, 'full'); ?>
                            <?php if ($insta) : ?>
                                <span class="insta">
                                    <a alt="<?php echo $insta ?>" href="https://instagram.com/<?php echo $insta ?>">@<?php echo $insta; ?></a>
                                </span>
                            <?php endif; ?>

                            <?php if ($description) : ?>
                                <div class="description">
                                    <?php echo $description; ?>
                                </div>
                            <?php endif; ?>
                        </figure>
                    <?php endif; ?>
                    <?php if ($name) : ?>
                        <p class="name">- <?php echo $name; ?></p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
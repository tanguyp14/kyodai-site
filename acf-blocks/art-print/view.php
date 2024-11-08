    <?php
    $fields = get_fields();
    extract($fields);
    $is_safari = preg_match('/Safari/i', $_SERVER['HTTP_USER_AGENT']) && !preg_match('/Chrome/i', $_SERVER['HTTP_USER_AGENT']);

    ?>
    <section class="art-print">
        <?php if (!wp_is_mobile()) : ?>
            <div class="media-container desk" data-aos="fade-up">
                <dotlottie-player src="<?php echo wp_get_attachment_url($lottie_desk); ?>" background="transparent" speed="1" loop autoplay></dotlottie-player>
            </div>
        <?php endif; ?>

        <?php if (wp_is_mobile()) : ?>
            <?php foreach ($images_lottie as $image) : extract($image) ?>
                <?php if ($link) { ?>
                    <a alt="Lien vers <?php echo $link; ?>" href="<?php echo $link; ?>"> <?php } ?>
                    <div class="media-container mobile" data-aos="fade-up" data-aos-delay="<?php echo $delay ?>">
                        <dotlottie-player src="<?php echo wp_get_attachment_url($lottie); ?>" background="transparent" speed="1" loop autoplay></dotlottie-player>
                    </div>
                    <?php if ($link) { ?>
                    </a> <?php } ?>
        <?php endforeach;
        endif; ?>
    </section>
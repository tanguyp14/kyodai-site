    <?php
    $fields = get_fields();
    extract($fields);
    $is_safari = preg_match('/Safari/i', $_SERVER['HTTP_USER_AGENT']) && !preg_match('/Chrome/i', $_SERVER['HTTP_USER_AGENT']);
    $is_ios = preg_match('/iPhone|iPad/i', $_SERVER['HTTP_USER_AGENT']);

    ?>
    <section class="art-print">
        <?php if (!wp_is_mobile()) : ?>
            <div class="media-container desk" data-aos="fade-up">
                <?php if ($is_safari && $is_ios) : ?>
                    <img src="<?php echo wp_get_attachment_url($image_desk_static); ?>">
                <?php else : ?>
                    <video loop autoplay muted>
                        <source src="<?php echo wp_get_attachment_url($image_desk); ?>" type="video/webm">
                        Your browser does not support the video tag.
                    </video>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if (wp_is_mobile()) : ?>
            <?php foreach ($images_mobile as $i) : extract($i) ?>
                <div class="media-container mobile" data-aos="fade-up" data-aos="<?php echo $delay ?>">
                    <?php if ($is_safari) : ?>
                        <div class="image-safari">
                            <img src="<?php echo wp_get_attachment_url($image_mobile_alt); ?>">
                        </div>
                    <?php else : ?>
                        <video loop autoplay muted>
                            <source src="<?php echo wp_get_attachment_url($image_mobile); ?>" type="video/webm">
                            Your browser does not support the video tag.
                        </video>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
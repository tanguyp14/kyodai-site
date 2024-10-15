    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="art-print">
        <?php if (!wp_is_mobile()) : ?>
            <div class="video-container desk" data-aos="fade-up">
                <video loop autoplay muted>
                    <source src="<?php echo wp_get_attachment_url($image_desk); ?>" type="video/webm">
                    Your browser does not support the video tag.
                </video>
            </div>
        <?php endif; ?>
        <?php if (wp_is_mobile()) : ?>
            <?php foreach ($images_mobile as $image) : extract($image) ?>
                <div class="video-container mobile" data-aos="fade-up">
                    <?php $url = wp_get_attachment_url($image_mobile); ?>
                    <?php $url_alt = wp_get_attachment_url($image_mobile_alt); ?>
                    <video loop autoplay muted>
                        <?php if ($url_alt && strpos($_SERVER['HTTP_USER_AGENT'], 'Safari') !== false && strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome') === false) : ?>    <source src="<?php echo esc_html($url_alt); ?>" type="video/mov">
                            Your browser does not support the video tag.
                        <?php else : ?>
                            <source src="<?php echo esc_html($url); ?>" type="video/webm">
                        <?php endif; ?>
                    </video>

                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </section>
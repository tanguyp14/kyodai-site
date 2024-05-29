    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="hero_video">
        <?php
        if (wp_is_mobile() || (isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false)) {
                // Mobile screen size
                echo '<video class="mobile" muted autoplay loop playsinline src="' . wp_get_attachment_url($video_mobile) . '"></video>';
        } else {
                // Desktop screen size
                echo '<video class="desk" muted autoplay loop playsinline src="' . wp_get_attachment_url($video) . '"></video>';
        }
        ?>

    </section>
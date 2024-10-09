    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="imprimerie">
        <div class="left">
            <h1 data-aos="zoom-in" data-aos-delay="300" ><?php echo $titre_bleu; ?></h1>
            <p data-aos="zoom-in" data-aos-delay="300" ><?php echo $sous_titre_noir; ?></p>
            <h2 data-aos="zoom-in" data-aos-delay="600" ><?php echo $baseline; ?></h2>
        </div>
        <div class="right">
            <span data-aos="fade-in" data-aos-offset="0" data-aos-delay="400" class="left"><?php echo wp_get_attachment_image($pierre, 'full') ?></span>
            <span data-aos="fade-right" data-aos-offset="0" data-aos-delay="300" class="center"><?php echo wp_get_attachment_image($gif,'full') ?></span>
            <span data-aos="fade-in" data-aos-offset="0" data-aos-delay="400" class="right"><?php echo wp_get_attachment_image($pm,'full') ?></span>

        </div>

        <!-- <div class="video-container" data-aos="fade-up" data-aos-delay="1000">
            <video loop autoplay muted>
                <source src="http://localhost:3000/wp-content/themes/kyodai/dist/image/video.webm" type="video/webm">
                Your browser does not support the video tag.
            </video>
        </div> -->
    </section>
    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="imprimerie">
        <div class="left">
            <h1 data-aos="zoom-in" data-aos-delay="300"><?php echo $titre_bleu; ?></h1>
            <p data-aos="zoom-in" data-aos-delay="300"><?php echo $sous_titre_noir; ?></p>
            <h2 data-aos="zoom-in" data-aos-delay="600"><a alt="Page artistes" href="/artistes"><?php echo $baseline; ?></a></h2>
        </div>
        <div class="right">
            <span data-aos="fade-in" data-aos-delay="600" class="left"><?php echo wp_get_attachment_image($pierre, 'full') ?></span>
            <span data-aos="fade-right" data-aos-delay="400" class="center"><?php echo wp_get_attachment_image($gif, 'full') ?></span>
            <span data-aos="fade-in" data-aos-delay="600" class="right"><?php echo wp_get_attachment_image($pm, 'full') ?></span>
        </div>
    </section>
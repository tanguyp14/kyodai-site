    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="presentation is_full_page" data-aos="fade-up" id="<?php echo formatValue($ancre); ?>">
        <div class="left">
            <h1 class="title"><?php echo $titre; ?></h1>
            <p class="text"><?php echo $texte; ?></p>
        </div>
        <div class="right pwl">
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
        </div>
    </section>
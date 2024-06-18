    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="reviews">
        <h2><?php echo $titre; ?></h2>
        <div class="swipper">
            <?php foreach ($liste_des_avis as $avis) : extract($avis) ?>
                <div class="card">
                    <div class="inside">
                        <div class="img" style="background-image: url('<?php echo $le_ptit_picto; ?>');"></div>
                        <div class="text">
                            <h4><?php echo $nom_dartiste; ?></h4>
                            <p><?php echo $lavis_en_question; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
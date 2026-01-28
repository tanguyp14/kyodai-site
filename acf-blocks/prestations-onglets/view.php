<?php
$fields = get_fields();
extract($fields);
?>

<section class="tylt_onglets">
    <h2 class="onglets_titre">Nos options</h2>
    <div class="nom_onglet">
        <?php foreach ($prestation_detail as $index => $presta_de) : extract($presta_de) ?>
            <div class="nom <?php echo $nom_onglet ?>" data-tab="<?php echo $index ?>">
                <?php echo $nom_onglet ?>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="onglet">
        <?php foreach ($prestation_detail as $index => $presta_de) : extract($presta_de) ?>
            <div class="contenu <?php echo $nom_onglet ?>" data-tab="<?php echo $index ?>">
                <?php if ($image != '') : ?>
                    <div class="contenu_image">
                        <?php if ($nom_du_client != '') : ?>
                            <p class="client"><?php echo $nom_du_client; ?></p>
                        <?php endif; ?>
                        <?php echo wp_get_attachment_image($image, 'full'); ?>
                    </div>
                <?php endif; ?>
                <div class="contenu_text">
                    <div class="infos">
                        <?php if ($format != '') : ?>
                            <div class="format">
                                <h3>Format(s) :</h3>
                                <?php echo $format ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($papier != '') : ?>
                            <div class="format">
                                <h3>Papier(s) :</h3>
                                <?php echo $papier ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($finition != '') : ?>
                            <h3>Finition(s) disponible(s) :</h3>
                            <div class="finition">
                                <?php echo $finition ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($prix != '') : ?>
                            <div class="format">
                                <h3 class="prix"><?php echo $prix ?></h3>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($kayou != '') : ?>
                        <div class="kayou">
                            <span class="kayou_man"> </span>
                            <div class="kayou_text">
                                <?php echo $kayou ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>
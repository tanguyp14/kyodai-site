    <?php
    $fields = get_fields();
    extract($fields);
    ?>
    <section class="prise_rdv">
        <h2><?php echo $titre; ?></h2>
        <p><?php echo $texte; ?></p>
        <?php echo $embed; ?>
    </section>
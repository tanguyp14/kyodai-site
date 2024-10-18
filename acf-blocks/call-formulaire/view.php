    <?php
    $footer = get_field('footer', 'option');
    extract($footer);
    ?>
    <section class="call_formulaire">
        <div class="phone">
            <a href="tel:<?php echo $phone; ?>">
                <span class="movable"></span>
                <span class="fix"></span>
            </a>
        </div>
        <div class="mail">
            <a href="mailto:<?php echo $mail; ?>">
                <span class="movable"></span>
                <span class="fix"></span>
            </a>
        </div>
    </section>
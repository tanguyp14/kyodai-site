<?php

/**
 * Primary menu template part
 */
?>

<div class="site-branding">
    <?php the_custom_logo(); ?>
</div><!-- .site-branding -->
<nav id="site-navigation" data-aos="fade-down" data-aos-delay="300" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary', 'kyodai'); ?>">
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'primary_menu',
            'menu_id'        => 'primary-menu',
        )
    );
    ?>
</nav><!-- #site-navigation -->
<?php

/**
 * Primary menu template part
 */
?>

<nav id="site-navigation-desk" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary', 'kyodai'); ?>">
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'primary_menu',
            'menu_id'        => 'primary-menu',
        )
    );
    ?>
    <div class="site-branding">
        <?php the_custom_logo(); ?>
    </div><!-- .site-branding -->
    <div id="right-menu" class="menu">
        <ul>
            <li class="devis"><a class="button red" href="/devis">Demande de devis</a></li>
            <li><a href="/portfolio">Portfolio</a></li>

            <li><a href="/contact">Contact</a></li>
            <li><a href="https://www.instagram.com/kyodaiprint/?hl=fr">
                    <div class="instagram"></div>
                </a></li>
            <li class="fig-container"><a href="/">
                    <div class="fig"></div>
                </a></li>

        </ul>
    </div>
</nav><!-- #site-navigation -->

<nav id="site-navigation-mobile" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary', 'kyodai'); ?>">
    <div class="mobile-menu-button">
        <span></span>
        <span></span>
        <span></span>
    </div>
    <div class="site-branding">
        <?php the_custom_logo(); ?>
    </div><!-- .site-branding -->
    <div class="right-menu" class="menu">
        <ul>
            <li><a href="https://www.instagram.com/kyodaiprint/?hl=fr">
                    <div class="instagram"></div>
                </a></li>
        </ul>
    </div>
    <div class="left-menu">
        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'mobile_menu',
                'menu_id'        => 'mobile-menu',
            )
        );
        ?>
        <span class="fig-container-mobile">
            <a href="/">
                <div class="fig"></div>
            </a>
        </span>
    </div>
</nav><!-- #site-navigation -->
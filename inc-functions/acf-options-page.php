<?php
/**
 * Add ACF options page in admin
 */

if( function_exists( 'acf_add_options_page' ) ) {

acf_add_options_page(array(
    'page_title'    => __( 'Réglages généraux', 'hatsumei' ),
    'menu_title'    => __( 'Réglages généraux', 'hatsumei' ),
    'menu_slug'     => 'theme-general-settings',
    'capability'    => 'edit_posts',
    'redirect'      => false
));
}
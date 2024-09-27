<?php
/**
 * Register Scripts
 */

// Enqueue Scripts
add_action( 'wp_enqueue_scripts', 'kyodai_scripts' );
function kyodai_scripts() {

    // If SCRIPT_DEBUG is enable, load unminified JS, if disabled load minified JS
    if ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) {
        wp_enqueue_script('app-scripts', get_template_directory_uri() . '/dist/js/app.js', array( 'jquery' ), false, false);
    } else {
        wp_enqueue_script('app-scripts', get_template_directory_uri() . '/dist/js/app.min.js', array( 'jquery' ), false, false);
    }

    // Enqueue masonry script
    wp_enqueue_script('masonry-scripts', get_template_directory_uri() . '/dist/vendors/masonry.min.js', array( 'jquery' ), false, true);
    wp_enqueue_script('slick-scripts', get_template_directory_uri() . '/dist/vendors/slick.min.js', array( 'jquery' ), false, true);
	wp_enqueue_script('aos-script', get_template_directory_uri() . '/dist/vendors/aos.js');

}

// Enqueue Block Editor Script
add_action('enqueue_block_editor_assets', 'kyodai_block_enqueues');
function kyodai_block_enqueues() {
    wp_enqueue_script('pix-editor-scripts', get_template_directory_uri() . '/editor.js', array('wp-edit-post', 'wp-blocks', 'wp-dom-ready'), '', true);
}
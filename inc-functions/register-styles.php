<?php

/**
 * Register Styles
 */

// Enqueue Styles
add_action('wp_enqueue_scripts', 'kyodai_styles');
function kyodai_styles()
{
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_enqueue_style('slick-style', get_template_directory_uri() . '/dist/vendors/slick.css');
	wp_enqueue_style('aos-style', get_template_directory_uri() . '/dist/vendors/aos.css');


	// If SCRIPT_DEBUG is enable, load unminified CSS, if disabled load minified CSS
	if (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) {
		wp_enqueue_style('app-styles',  get_template_directory_uri() . '/dist/css/main.css');
	} else {
		wp_enqueue_style('app-styles',  get_template_directory_uri() . '/dist/css/main.min.css');
	}
}

// Enqueue Admin Styles
add_action('admin_enqueue_scripts', 'kyodai_admin_styles');
function kyodai_admin_styles()
{
	wp_enqueue_style('admin-styles', get_template_directory_uri() . '/assets/css/admin.css', false, '1.0.0');
}

// Enqueue Block Editor styles
add_action('enqueue_block_editor_assets', 'kyodai_editor_styles');
function kyodai_editor_styles()
{
	wp_enqueue_style('kyodai-editor-styles', get_template_directory_uri() . '/editor.css', array('wp-edit-blocks'));
}

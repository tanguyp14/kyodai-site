<?php

require_once 'inc-functions/cpt.php';
require_once 'inc-functions/register-menus.php';
require_once 'inc-functions/register-styles.php';
require_once 'inc-functions/register-scripts.php';
require_once 'inc-functions/acf-options-page.php';

/**
 * Essential theme supports
 * */
add_action('after_setup_theme','kyodai_theme_setup');
function kyodai_theme_setup(){
    /** tag-title **/
    add_theme_support( 'title-tag' );

    /** post-thumnails **/
	add_theme_support( 'post-thumbnails' );

	/** editor-styles **/
	add_theme_support( 'editor-styles' );

	/** editor-styles-css **/
	add_editor_style( 'editor.css' );

	/** Load block styles on frontend **/
	add_theme_support( 'wp-block-styles' );

	/** Align wide **/
	add_theme_support( 'align-wide' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}

/**
 * Add custom logo for admin login screen and link to homepage
 */
function kyodai_filter_login_head() {

	if ( has_custom_logo() ) {
		$image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
		?>
		<style type="text/css">
			.login h1 a {
				background-image: url(<?php echo esc_url( $image[0] ); ?>);
				-webkit-background-size: contain;
				background-size: contain;
				height: 80px;
				width: 200px;
			}
		</style>
		<?php
	}
}
add_action( 'login_head', 'kyodai_filter_login_head', 100 );

function kyodai_new_wp_login_url() {
	return home_url();
}
add_filter('login_headerurl', 'kyodai_new_wp_login_url');



/**
 * Format a given value by removing uppercase letters, replacing spaces with dashes, and replacing single quotes with underscores.
 *
 * @param string $value The value to format.
 * @return string The formatted value.
 */
function formatValue($value) {
	$formattedValue = strtolower($value); // Convert to lowercase
	$formattedValue = str_replace(' ', '-', $formattedValue); // Replace spaces with dashes
	$formattedValue = str_replace("'", '_', $formattedValue); // Replace single quotes with underscores

	return $formattedValue;
}
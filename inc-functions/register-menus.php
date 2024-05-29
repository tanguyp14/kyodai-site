<?php
/**
 * Register nav menus locations
 */

 if ( ! function_exists( 'kyodai_register_nav_menu' ) ) {

	function kyodai_register_nav_menu(){
		register_nav_menus( array(
	    	'primary_menu' => __( 'Primary Menu', 'kyodai' ),
	    	'footer_menu'  => __( 'Footer Menu', 'kyodai' ),
	    	'mobile_menu'  => __( 'Mobile Menu', 'kyodai' ),
		) );
	}
	add_action( 'after_setup_theme', 'kyodai_register_nav_menu', 0 );
}
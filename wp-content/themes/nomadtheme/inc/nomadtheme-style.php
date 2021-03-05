<?php

/**
 * Enqueue styles.
 */
function nomadtheme_style() {
	wp_enqueue_style( 'nomadtheme-bootstrap-reboot', get_template_directory_uri() . '/assets/libs/bootstrap-reboot/bootstrap-reboot.min.css');
	
	wp_enqueue_style( 'nomadtheme-fontawesome', get_template_directory_uri() . '/assets/libs/fontawesome/css/fontawesome.min.css');

	wp_enqueue_style( 'nomadtheme-hamburger', get_template_directory_uri() . '/assets/libs/hamburgers/hamburgers.min.css');
	
	wp_enqueue_style( 'nomadtheme-style', get_stylesheet_uri(), array(), _S_VERSION );

	wp_style_add_data( 'nomadtheme-style', 'rtl', 'replace' );

}
add_action( 'wp_enqueue_scripts', 'nomadtheme_style' );
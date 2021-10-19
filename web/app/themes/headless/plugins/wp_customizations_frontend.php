<?php


/* ---------------------------------------------------------------------------
*  Plugin Name: Enqueue scripts and styles
*  Plugin Author: Bombano
*  Author URI: 
*  Description:
*  Source: https://developer.wordpress.org/reference/functions/wp_enqueue_style/
* --------------------------------------------------------------------------- */
function wpdocs_theme_name_scripts() {
	// wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
    wp_enqueue_style( 'style-name', get_template_directory_uri() . '/plugins/css/gravity_form.css', 1000 );
}
add_action( 'wp_enqueue_scripts', 'wpdocs_theme_name_scripts' );


?>
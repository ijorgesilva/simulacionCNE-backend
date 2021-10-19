<?php 

/* ---------------------------------------------------------------------------
*  Plugin Name: Remove continue reading from excerpt
*  Plugin Description: Needed for parsing Excerpt and make it usable/manageable by GraphQL and Gatsby
*  Plugin Author: Bombano
*  Author URI:
*  Description: https://wordpress.stackexchange.com/questions/162109/remove-more-or-text-from-short-post
* --------------------------------------------------------------------------- */
function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

/* ---------------------------------------------------------------------------
*  Plugin Name: Import Custom Post Types for ACF
*  Plugin Author: Bombano
*  Author URI: 
*  Description:
* --------------------------------------------------------------------------- */
// ACF Display Custom Fields
add_filter('acf/settings/remove_wp_meta_box', '__return_false');

// GLOBAL

// TOOLS
$redirects = get_stylesheet_directory().'/plugins/cpt/redirects.php';
if ( file_exists($redirects) ) {
	require_once $redirects;
}

/* ---------------------------------------------------------------------------
*  Plugin Name: Iframe Resizer
*  Plugin Author: Bombano
*  Author URI: 
*  Description:
* --------------------------------------------------------------------------- */
//wp_enqueue_script('iframeResizer',  get_stylesheet_directory_uri() . 'plugins/iframeResizert.js');
function iframe_resizer() {
	wp_register_script('iframe_resizer_handle', get_stylesheet_directory_uri() . '/plugins/cpt/iframeResizer.contentWindow.min.js', array('jquery'), true);
	wp_enqueue_script('iframe_resizer_handle');
}
add_action( 'wp_enqueue_scripts', 'iframe_resizer' );  


?>
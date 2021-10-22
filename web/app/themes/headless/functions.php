<?php

/* ---------------------------------------------------------------------------
*  Plugin Name: Overwrite WP Options
*  Plugin Author: Bombano
*  Author URI: 
*  Description:
* --------------------------------------------------------------------------- */
if (defined('WP_BLOGNAME')) {
    update_option( 'blogname', WP_BLOGNAME );
}
if (defined('WP_BLOGDESCRIPTION')) {
    update_option( 'blogdescription', WP_BLOGDESCRIPTION );
}
if (defined('WP_ADMIN_EMAIL')) {
    update_option( 'admin_email', WP_ADMIN_EMAIL );
}
if (defined('WP_CURRENT_THEME')) {
    update_option( 'current_theme', WP_CURRENT_THEME );
}
if (defined('WP_DEFAULT_TROLE')) {
    update_option('default_role', WP_DEFAULT_TROLE);
}

/* ---------------------------------------------------------------------------
 * Get parent sytlesheet
 * --------------------------------------------------------------------------- */
function mychildtheme_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'mychildtheme_enqueue_styles' ); 

/* ---------------------------------------------------------------------------
*  Plugin Name: Plugins Folder
*  Plugin Author: Bombano
*  Author URI: 
*  Description:
* --------------------------------------------------------------------------- */
$helpers = get_stylesheet_directory().'/plugins/helpers.php';
if ( file_exists($helpers) ) {
    require_once $helpers;
}

$wpsmtp = get_stylesheet_directory().'/plugins/wp_smtp.php';
if ( file_exists($wpsmtp) ) {
    require_once $wpsmtp;
}

$cpt = get_stylesheet_directory().'/plugins/cpt.php';
if ( file_exists($cpt) ) {
    require_once $cpt;
}

$pt = get_stylesheet_directory().'/plugins/pt.php';
if ( file_exists($pt) ) {
    require_once $pt;
}

$acpsettings = get_stylesheet_directory().'/plugins/acp-settings.php';
if ( file_exists($pt) ) {
    require_once $acpsettings;
}

$polylangOptions = get_stylesheet_directory().'/plugins/polylang.php';
if ( file_exists($polylangOptions) ) {
    require_once $polylangOptions;
}

$optionPages = get_stylesheet_directory().'/plugins/options_page.php';
if ( file_exists($optionPages) ) {
    require_once $optionPages;
}

$adminColumnsFolder = get_stylesheet_directory().'/plugins/admin_columns.php';
if ( file_exists($adminColumnsFolder) ) {
    require_once $adminColumnsFolder;
}

$wordpressCustomizationsBackend = get_stylesheet_directory().'/plugins/wp_customizations_backend.php';
if ( file_exists($wordpressCustomizationsBackend) ) {
    require_once $wordpressCustomizationsBackend;
}

$wordpressCustomizationsFrontend = get_stylesheet_directory().'/plugins/wp_customizations_frontend.php';
if ( file_exists($wordpressCustomizationsFrontend) ) {
    require_once $wordpressCustomizationsFrontend;
}

$acfStyles = get_stylesheet_directory().'/plugins/acf_styles_backend.php';
if ( file_exists($acfStyles) ) {
    require_once $acfStyles;
}

$wordpressRemoveAssets = get_stylesheet_directory().'/options/wp_remove_assets.php';
if ( file_exists($wordpressRemoveAssets) ) {
    require_once $wordpressRemoveAssets;
}

/* ---------------------------------------------------------------------------
*  Plugin Name: Force Post Thumbnails
*  Plugin Author: Bombano
*  Author URI:
*  Description: 
* --------------------------------------------------------------------------- */
add_theme_support( 'post-thumbnails' );

/* ---------------------------------------------------------------------------
*  Plugin Name: Rename Image on upload
*  Plugin Author: Bombano
*  Author URI:
*  Description: Protect URL error when working with gatsby. 
*  Source: https://stackoverflow.com/questions/24796391/how-to-rename-image-on-upload-in-wordpress
* --------------------------------------------------------------------------- */
function rename_image($filename) {
    $info = pathinfo($filename);
    $ext  = empty($info['extension']) ? '' : '.' . $info['extension'];
    $name = basename($filename, $ext);
    return "image_".$name."_".date('dmy-his').$ext;
}
add_filter('sanitize_file_name', 'rename_image', 10);

/* ---------------------------------------------------------------------------
*  Plugin Name: Enqueue CSS
*  Plugin Author: Bombano
*  Author URI:
*  Description: 
* --------------------------------------------------------------------------- */
// function add_theme_scripts() {
//   wp_enqueue_style( 'style', '#' ); // URL to External CSS
// }
// add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

/* ---------------------------------------------------------------------------
*  Plugin Name: Remove 32px on HTML tag
*  Plugin Author: Bombano
*  Author URI: https://stackoverflow.com/questions/25491619/how-to-delete-margin-top-32px-important-from-twenty-twelve
*  Description: 
* --------------------------------------------------------------------------- */
function my_function_admin_bar(){ return false; }
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

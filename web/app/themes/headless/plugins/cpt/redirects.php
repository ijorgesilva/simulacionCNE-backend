<?php 
// Register Custom Post Type Redirect
function create_redirect_cpt() {

	$labels = array(
		'name' 					=> _x( 'Redirects', 'Post Type General Name', 'redirect' ),
		'singular_name' 		=> _x( 'Redirect', 'Post Type Singular Name', 'redirect' ),
		'menu_name' 			=> _x( 'Redirects', 'Admin Menu text', 'redirect' ),
		'name_admin_bar' 		=> _x( 'Redirect', 'Add New on Toolbar', 'redirect' ),
		'archives' 				=> __( 'Redirect Archives', 'redirect' ),
		'attributes' 			=> __( 'Redirect Attributes', 'redirect' ),
		'parent_item_colon' 	=> __( 'Parent Redirect:', 'redirect' ),
		'all_items' 			=> __( 'All Redirects', 'redirect' ),
		'add_new_item' 			=> __( 'Add New Redirect', 'redirect' ),
		'add_new' 				=> __( 'Add New', 'redirect' ),
		'new_item' 				=> __( 'New Redirect', 'redirect' ),
		'edit_item' 			=> __( 'Edit Redirect', 'redirect' ),
		'update_item' 			=> __( 'Update Redirect', 'redirect' ),
		'view_item' 			=> __( 'View Redirect', 'redirect' ),
		'view_items' 			=> __( 'View Redirects', 'redirect' ),
		'search_items' 			=> __( 'Search Redirect', 'redirect' ),
		'not_found' 			=> __( 'Not found', 'redirect' ),
		'not_found_in_trash' 	=> __( 'Not found in Trash', 'redirect' ),
		'featured_image' 		=> __( 'Featured Image', 'redirect' ),
		'set_featured_image' 	=> __( 'Set featured image', 'redirect' ),
		'remove_featured_image' => __( 'Remove featured image', 'redirect' ),
		'use_featured_image' 	=> __( 'Use as featured image', 'redirect' ),
		'insert_into_item' 		=> __( 'Insert into Redirect', 'redirect' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Redirect', 'redirect' ),
		'items_list' 			=> __( 'Redirects list', 'redirect' ),
		'items_list_navigation' => __( 'Redirects list navigation', 'redirect' ),
		'filter_items_list' 	=> __( 'Filter Redirects list', 'redirect' ),
	);
	$args = array(
		'label' 				=> __( 'Redirect', 'redirect' ),
		'description' 			=> __( 'URL redirects on client side', 'redirect' ),
		'labels' 				=> $labels,
		'menu_icon' 			=> 'dashicons-randomize',
		'supports' 				=> array('custom-fields'),
		'taxonomies' 			=> array(),
		'public' 				=> false,
		'show_ui' 				=> true,
		'show_in_menu' 			=> true,
		'menu_position' 		=> 80,
		'show_in_admin_bar' 	=> true,
		'show_in_nav_menus' 	=> true,
		'can_export' 			=> true,
		'has_archive' 			=> false,
		'hierarchical' 			=> false,
		'exclude_from_search' 	=> false,
		'show_in_rest' 			=> true,
		'publicly_queryable' 	=> false,
		'capability_type' 		=> 'post',

	    'show_in_graphql' 		=> true,
	    'graphql_single_name' 	=> 'redirect',
	    'graphql_plural_name' 	=> 'redirects',
	);
	register_post_type( 'redirect', $args );

}
add_action( 'init', 'create_redirect_cpt', 0 );

add_filter('title_save_pre','auto_generate_post_title');
function auto_generate_post_title($title) {
   global $post;
   if (isset($post->ID)) {
      if (empty($_POST['post_title']) && 'redirect' == get_post_type($post->ID)){
         $id = get_the_ID(); // get the current post ID number
         $title = 'redirect '.$id.'';} } // add ID number with order strong
   return $title; 
}

?>
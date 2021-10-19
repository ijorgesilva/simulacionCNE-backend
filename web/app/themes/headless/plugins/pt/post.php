<?php

/* 
 * Featured Image Column
 * https://binaryfork.com/featured-image-admin-lists-1569/
 * https://developer.wordpress.org/reference/functions/get_current_screen/
 */

// Insert a new column called "Featured image"
function custom_posts_columns($defaults){
	$defaults['custom_post_thumbs'] = __('Featured image', 'theme_textdomain');
	return $defaults;
}

// Insert the current post thumbnail on each column
function custom_posts_custom_columns($column_name, $id){
	if ( $column_name === 'custom_post_thumbs' ) {
		echo the_post_thumbnail( array( 100, 100 ) );
	}
}
/**
 * Run code on the admin widgets page
 */

add_action( 'current_screen', 'wpdocs_this_screen' );
 
function wpdocs_this_screen() {
    $currentScreen = get_current_screen();
    if( $currentScreen->id === "edit-post" ) {
        add_filter('manage_posts_columns', 'custom_posts_columns', 5);
		add_action('manage_posts_custom_column', 'custom_posts_custom_columns', 5, 2);
		add_filter('manage_posts_columns', 'post_reorder_columns');
    }
}

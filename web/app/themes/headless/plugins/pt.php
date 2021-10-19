<?php

$ptPost = get_stylesheet_directory().'/plugins/pt/post.php';
if ( file_exists($ptPost) ) {
    require_once $ptPost;
}

$ptPage = get_stylesheet_directory().'/plugins/pt/page.php';
if ( file_exists($ptPage) ) {
    require_once $ptPage;
}

/*
 * Add Category Taxonomy to Pages
 */
function add_categories_to_pages() {
	register_taxonomy_for_object_type( 'category', 'page' );
}
add_action( 'init', 'add_categories_to_pages' );
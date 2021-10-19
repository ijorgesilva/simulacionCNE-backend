<?php

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Website Settings',
		'menu_title'	=> 'Settings',
		'menu_slug' 	=> 'website-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'show_in_graphql' => true,
	));
	
}

?>
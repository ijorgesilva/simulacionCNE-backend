<?php

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Configuración del Website',
		'menu_title'	=> 'Configuración',
		'menu_slug' 	=> 'website-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false,
		'show_in_graphql' => true,
	));
	
}

?>
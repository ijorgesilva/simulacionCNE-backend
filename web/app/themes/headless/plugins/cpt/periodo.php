<?php

// Register Custom Post Type Periodo Electoral
function create_periodoelectoral_cpt() {

	$labels = array(
		'name' => _x( 'Periodos Electorales', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Periodo Electoral', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Periodos Electorales', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Periodo Electoral', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Archivos Periodo Electoral', 'textdomain' ),
		'attributes' => __( 'Atributos Periodo Electoral', 'textdomain' ),
		'parent_item_colon' => __( 'Padres Periodo Electoral:', 'textdomain' ),
		'all_items' => __( 'Todas Periodos Electorales', 'textdomain' ),
		'add_new_item' => __( 'Añadir nueva Periodo Electoral', 'textdomain' ),
		'add_new' => __( 'Añadir nueva', 'textdomain' ),
		'new_item' => __( 'Nueva Periodo Electoral', 'textdomain' ),
		'edit_item' => __( 'Editar Periodo Electoral', 'textdomain' ),
		'update_item' => __( 'Actualizar Periodo Electoral', 'textdomain' ),
		'view_item' => __( 'Ver Periodo Electoral', 'textdomain' ),
		'view_items' => __( 'Ver Periodos Electorales', 'textdomain' ),
		'search_items' => __( 'Buscar Periodo Electoral', 'textdomain' ),
		'not_found' => __( 'No se encontraron Periodos Electorales.', 'textdomain' ),
		'not_found_in_trash' => __( 'Ningún Periodo Electoral encontrado en la papelera.', 'textdomain' ),
		'featured_image' => __( 'Imagen destacada', 'textdomain' ),
		'set_featured_image' => __( 'Establecer imagen destacada', 'textdomain' ),
		'remove_featured_image' => __( 'Borrar imagen destacada', 'textdomain' ),
		'use_featured_image' => __( 'Usar como imagen destacada', 'textdomain' ),
		'insert_into_item' => __( 'Insertar en la Periodo Electoral', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Subido a esta Periodo Electoral', 'textdomain' ),
		'items_list' => __( 'Lista de Periodos Electorales', 'textdomain' ),
		'items_list_navigation' => __( 'Navegación por el listado de Periodos Electorales', 'textdomain' ),
		'filter_items_list' => __( 'Lista de Periodos Electorales filtradas', 'textdomain' ),
	);

	$args = array(
		'label' => __( 'Periodo Electoral', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-yes-alt',
		'supports' => array('revisions'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',

		'show_in_graphql' 		=> true,
      	'graphql_single_name' 	=> 'periodo',
      	'graphql_plural_name' 	=> 'periodos',
	);

	register_post_type( 'periodoelectoral', $args );

}
add_action( 'init', 'create_periodoelectoral_cpt', 0 );

?>
<?php

// Register Custom Post Type Posicion
function create_posicion_cpt() {

	$labels = array(
		'name' => _x( 'Posiciones', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Posicion', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Posiciones', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Posicion', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Archivos Posicion', 'textdomain' ),
		'attributes' => __( 'Atributos Posicion', 'textdomain' ),
		'parent_item_colon' => __( 'Padres Posicion:', 'textdomain' ),
		'all_items' => __( 'Todas Posiciones', 'textdomain' ),
		'add_new_item' => __( 'Añadir nueva Posicion', 'textdomain' ),
		'add_new' => __( 'Añadir nueva', 'textdomain' ),
		'new_item' => __( 'Nueva Posicion', 'textdomain' ),
		'edit_item' => __( 'Editar Posicion', 'textdomain' ),
		'update_item' => __( 'Actualizar Posicion', 'textdomain' ),
		'view_item' => __( 'Ver Posicion', 'textdomain' ),
		'view_items' => __( 'Ver Posiciones', 'textdomain' ),
		'search_items' => __( 'Buscar Posicion', 'textdomain' ),
		'not_found' => __( 'No se encontraron Posiciones.', 'textdomain' ),
		'not_found_in_trash' => __( 'Ningún Posicion encontrado en la papelera.', 'textdomain' ),
		'featured_image' => __( 'Imagen destacada', 'textdomain' ),
		'set_featured_image' => __( 'Establecer imagen destacada', 'textdomain' ),
		'remove_featured_image' => __( 'Borrar imagen destacada', 'textdomain' ),
		'use_featured_image' => __( 'Usar como imagen destacada', 'textdomain' ),
		'insert_into_item' => __( 'Insertar en la Posicion', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Subido a esta Posicion', 'textdomain' ),
		'items_list' => __( 'Lista de Posiciones', 'textdomain' ),
		'items_list_navigation' => __( 'Navegación por el listado de Posiciones', 'textdomain' ),
		'filter_items_list' => __( 'Lista de Posiciones filtradas', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Posicion', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-id',
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
      	'graphql_single_name' 	=> 'posicion',
      	'graphql_plural_name' 	=> 'posiciones',
	);
	register_post_type( 'posicion', $args );

}
add_action( 'init', 'create_posicion_cpt', 0 );

?>
<?php

// Register Custom Post Type Candidato
function create_candidato_cpt() {

	$labels = array(
		'name' => _x( 'Candidatos', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Candidato', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Candidatos', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Candidato', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Archivos Candidato', 'textdomain' ),
		'attributes' => __( 'Atributos Candidato', 'textdomain' ),
		'parent_item_colon' => __( 'Padres Candidato:', 'textdomain' ),
		'all_items' => __( 'Todas Candidatos', 'textdomain' ),
		'add_new_item' => __( 'Añadir nueva Candidato', 'textdomain' ),
		'add_new' => __( 'Añadir nueva', 'textdomain' ),
		'new_item' => __( 'Nueva Candidato', 'textdomain' ),
		'edit_item' => __( 'Editar Candidato', 'textdomain' ),
		'update_item' => __( 'Actualizar Candidato', 'textdomain' ),
		'view_item' => __( 'Ver Candidato', 'textdomain' ),
		'view_items' => __( 'Ver Candidatos', 'textdomain' ),
		'search_items' => __( 'Buscar Candidato', 'textdomain' ),
		'not_found' => __( 'No se encontraron Candidatos.', 'textdomain' ),
		'not_found_in_trash' => __( 'Ningún Candidato encontrado en la papelera.', 'textdomain' ),
		'featured_image' => __( 'Imagen destacada', 'textdomain' ),
		'set_featured_image' => __( 'Establecer imagen destacada', 'textdomain' ),
		'remove_featured_image' => __( 'Borrar imagen destacada', 'textdomain' ),
		'use_featured_image' => __( 'Usar como imagen destacada', 'textdomain' ),
		'insert_into_item' => __( 'Insertar en la Candidato', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Subido a esta Candidato', 'textdomain' ),
		'items_list' => __( 'Lista de Candidatos', 'textdomain' ),
		'items_list_navigation' => __( 'Navegación por el listado de Candidatos', 'textdomain' ),
		'filter_items_list' => __( 'Lista de Candidatos filtradas', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Candidato', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-businessman',
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
      	'graphql_single_name' 	=> 'candidato',
      	'graphql_plural_name' 	=> 'candidatos',
	);
	register_post_type( 'candidato', $args );

}
add_action( 'init', 'create_candidato_cpt', 0 );

// Auto-generate title
function candidato_auto_title( $value, $post_id, $field ) {
    if ( get_post_type( $post_id ) == 'candidato' ) {

        $new_title = get_field('candidato_name', $post_id); //candidato_title
        $new_slug = sanitize_title( $new_title );

        wp_update_post( array(
            'ID'            => $post_id,
            'post_title'    => $new_title,
            'post_name'     => $new_slug,
            )
        );
		
    }
    return $value;
} 

add_filter('acf/update_value', 'candidato_auto_title', 10, 3);

?>
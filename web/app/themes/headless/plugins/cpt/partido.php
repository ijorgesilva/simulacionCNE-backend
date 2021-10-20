<?php

// Register Custom Post Type Partido
function create_partido_cpt() {

	$labels = array(
		'name' => _x( 'Partidos', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Partido', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Partidos', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Partido', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Archivos Partido', 'textdomain' ),
		'attributes' => __( 'Atributos Partido', 'textdomain' ),
		'parent_item_colon' => __( 'Padres Partido:', 'textdomain' ),
		'all_items' => __( 'Todas Partidos', 'textdomain' ),
		'add_new_item' => __( 'Añadir nueva Partido', 'textdomain' ),
		'add_new' => __( 'Añadir nueva', 'textdomain' ),
		'new_item' => __( 'Nueva Partido', 'textdomain' ),
		'edit_item' => __( 'Editar Partido', 'textdomain' ),
		'update_item' => __( 'Actualizar Partido', 'textdomain' ),
		'view_item' => __( 'Ver Partido', 'textdomain' ),
		'view_items' => __( 'Ver Partidos', 'textdomain' ),
		'search_items' => __( 'Buscar Partido', 'textdomain' ),
		'not_found' => __( 'No se encontraron Partidos.', 'textdomain' ),
		'not_found_in_trash' => __( 'Ningún Partido encontrado en la papelera.', 'textdomain' ),
		'featured_image' => __( 'Imagen destacada', 'textdomain' ),
		'set_featured_image' => __( 'Establecer imagen destacada', 'textdomain' ),
		'remove_featured_image' => __( 'Borrar imagen destacada', 'textdomain' ),
		'use_featured_image' => __( 'Usar como imagen destacada', 'textdomain' ),
		'insert_into_item' => __( 'Insertar en la Partido', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Subido a esta Partido', 'textdomain' ),
		'items_list' => __( 'Lista de Partidos', 'textdomain' ),
		'items_list_navigation' => __( 'Navegación por el listado de Partidos', 'textdomain' ),
		'filter_items_list' => __( 'Lista de Partidos filtradas', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Partido', 'textdomain' ),
		'description' => __( '', 'textdomain' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-networking',
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
      	'graphql_single_name' 	=> 'partido',
      	'graphql_plural_name' 	=> 'partidos',
	);
	register_post_type( 'partido', $args );

}
add_action( 'init', 'create_partido_cpt', 0 );

// Auto-generate title
function partido_auto_title( $value, $post_id, $field ) {
    if ( get_post_type( $post_id ) == 'partido' ) {

        $new_title = get_field('field_616f4fc9ea808', $post_id); //partido_title
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

add_filter('acf/update_value', 'partido_auto_title', 10, 3);

?>
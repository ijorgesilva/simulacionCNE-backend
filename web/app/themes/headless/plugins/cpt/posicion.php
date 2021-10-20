<?php

// Register Custom Post Type Papeleta
function create_posicion_cpt() {

	$labels = array(
		'name' => _x( 'Papeletas', 'Post Type General Name', 'textdomain' ),
		'singular_name' => _x( 'Papeleta', 'Post Type Singular Name', 'textdomain' ),
		'menu_name' => _x( 'Papeletas', 'Admin Menu text', 'textdomain' ),
		'name_admin_bar' => _x( 'Papeleta', 'Add New on Toolbar', 'textdomain' ),
		'archives' => __( 'Archivos Papeleta', 'textdomain' ),
		'attributes' => __( 'Atributos Papeleta', 'textdomain' ),
		'parent_item_colon' => __( 'Padres Papeleta:', 'textdomain' ),
		'all_items' => __( 'Todas las Papeletas', 'textdomain' ),
		'add_new_item' => __( 'Añadir nueva Papeleta', 'textdomain' ),
		'add_new' => __( 'Añadir nueva', 'textdomain' ),
		'new_item' => __( 'Nueva Papeleta', 'textdomain' ),
		'edit_item' => __( 'Editar Papeleta', 'textdomain' ),
		'update_item' => __( 'Actualizar Papeleta', 'textdomain' ),
		'view_item' => __( 'Ver Papeleta', 'textdomain' ),
		'view_items' => __( 'Ver Papeletas', 'textdomain' ),
		'search_items' => __( 'Buscar Papeleta', 'textdomain' ),
		'not_found' => __( 'No se encontraron Papeletas.', 'textdomain' ),
		'not_found_in_trash' => __( 'Ningún Papeleta encontrado en la papelera.', 'textdomain' ),
		'featured_image' => __( 'Imagen destacada', 'textdomain' ),
		'set_featured_image' => __( 'Establecer imagen destacada', 'textdomain' ),
		'remove_featured_image' => __( 'Borrar imagen destacada', 'textdomain' ),
		'use_featured_image' => __( 'Usar como imagen destacada', 'textdomain' ),
		'insert_into_item' => __( 'Insertar en la Papeleta', 'textdomain' ),
		'uploaded_to_this_item' => __( 'Subido a esta Papeleta', 'textdomain' ),
		'items_list' => __( 'Lista de Papeletas', 'textdomain' ),
		'items_list_navigation' => __( 'Navegación por el listado de Papeletas', 'textdomain' ),
		'filter_items_list' => __( 'Lista de Papeletas filtradas', 'textdomain' ),
	);
	$args = array(
		'label' => __( 'Papeleta', 'textdomain' ),
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

// Auto-generate title
function posicion_auto_title( $value, $post_id, $field ) {
    if ( get_post_type( $post_id ) == 'posicion' ) {

        $new_title = get_field('field_6170263096a20', $post_id); //posicion_title
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

add_filter('acf/update_value', 'posicion_auto_title', 10, 3);

?>
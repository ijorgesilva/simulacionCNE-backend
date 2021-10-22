<?php

/* Generate Partido ID: Relashionship Field */
function papeleta_partido_id( $value, $post_id, $field ) {
    $partidos = get_field('papeleta_partido_partido', $post_id);
    if($partidos) {
      foreach ($partidos as $partido) {
        $partidoId[] = $partido->ID;
      }
      $partidoId = implode(', ', $partidoId);
      return $partidoId;
    }
} 
add_filter('acf/update_value/name=papeleta_partido_id', 'papeleta_partido_id', 10, 3);
 
/* Generate Periodo ID: Relashionship Field */
function papeleta_periodo_id( $value, $post_id, $field ) {
    $periodos = get_field('papeleta_partido_periodo', $post_id);
    if($periodos) {
      foreach ($periodos as $periodo) {
        $periodoId[] = $periodo->ID;
      }
      $periodoId = implode(', ', $periodoId);
      return $periodoId;
    }
} 
add_filter('acf/update_value/name=papeleta_periodo_id', 'papeleta_periodo_id', 10, 3);

/* Generate Periodo Title: Relashionship Field */
function papeleta_periodo_admin_title( $value, $post_id, $field ) {
    $periodos = get_field('papeleta_partido_periodo', $post_id);
    if($periodos) {
      foreach ($periodos as $periodo) {
        $periodoId[] = $periodo->post_title;
      }
      $periodoId = implode(', ', $periodoId);
      return $periodoId;
    }
} 
add_filter('acf/update_value/name=papeleta_periodo_admin_title', 'papeleta_periodo_admin_title', 10, 3);

/* Generate Partido Title: Relashionship Field */
function papeleta_partido_admin_title( $value, $post_id, $field ) {
    $partidos = get_field('papeleta_partido_partido', $post_id);
    if($partidos) {
      foreach ($partidos as $partido) {
        $partidoId[] = $partido->post_title;
      }
      $partidoId = implode(', ', $partidoId);
      return $partidoId;
    }
} 
add_filter('acf/update_value/name=papeleta_partido_admin_title', 'papeleta_partido_admin_title', 10, 3);

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
		'supports' => array('revisions', 'page-attributes'),
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

        $new_title_periodo = get_field('field_61718a3ae8814', $post_id); //papeleta_periodo_admin_title
		$new_title_partido = get_field('field_6171aa3539c6f', $post_id); //papeleta_partido_admin_title

        $new_slug = sanitize_title( $new_title_periodo ) . '-' . sanitize_title( $new_title_partido );
		$new_title = $new_title_periodo . ' | ' . $new_title_partido;

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
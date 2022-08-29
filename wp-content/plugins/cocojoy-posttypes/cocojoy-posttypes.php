<?php

/*
Plugin name: Cocojoy - Artículos
plugin URI:
Description: Añade Post Types al Sitio WEb
Version: 1.0.0
Author: Herberth Iram medina Sánchez
Author Uri: https://twitter.com/HIramMS
Text Domain: cocojoy
*/
if(!defined('ABSPATH')) die();

// Register Custom Post Type
function cocojoy_articulos() {
	$labels = array(
		'name'                  => _x( 'Articulos', 'Post Type General Name', 'cocojoy' ),
		'singular_name'         => _x( 'articulo', 'Post Type Singular Name', 'cocojoy' ),
		'menu_name'             => __( 'Articulos', 'cocojoy' ),
		'name_admin_bar'        => __( 'Articulos', 'cocojoy' ),
		'archives'              => __( 'Archivo de Articulos', 'cocojoy' ),
		'attributes'            => __( 'Atributos de Articulo', 'cocojoy' ),
		'parent_item_colon'     => __( 'Articulo Padre', 'cocojoy' ),
		'all_items'             => __( 'Todos los Articulos', 'cocojoy' ),
		'add_new_item'          => __( 'Agregar Nuevo Articulo', 'cocojoy' ),
		'add_new'               => __( 'Agregar Nuevo Articulo', 'cocojoy' ),
		'new_item'              => __( 'Nuevo Articulo', 'cocojoy' ),
		'edit_item'             => __( 'Editar Articulo', 'cocojoy' ),
		'update_item'           => __( 'Actualizar Articulo', 'cocojoy' ),
		'view_item'             => __( 'Ver Articulo', 'cocojoy' ),
		'view_items'            => __( 'Ver Articulos', 'cocojoy' ),
		'search_items'          => __( 'Buscar Articulo', 'cocojoy' ),
		'not_found'             => __( 'No encontrado', 'cocojoy' ),
		'not_found_in_trash'    => __( 'No encontrado en reciclaje', 'cocojoy' ),
		'featured_image'        => __( 'Imagen Destacada', 'cocojoy' ),
		'set_featured_image'    => __( 'Establecer Imagen Destacada', 'cocojoy' ),
		'remove_featured_image' => __( 'Eliminar Imagen Destacada', 'cocojoy' ),
		'use_featured_image'    => __( 'Usar Imagen Destacada', 'cocojoy' ),
		'insert_into_item'      => __( 'Isertar en el Articulo', 'cocojoy' ),
		'uploaded_to_this_item' => __( 'Actuliazr Articulo', 'cocojoy' ),
		'items_list'            => __( 'Lista de Articulos', 'cocojoy' ),
		'items_list_navigation' => __( 'Lista de Articulos encontrados|', 'cocojoy' ),
		'filter_items_list'     => __( 'Filtrar Lista de Articulos', 'cocojoy' ),
	);
	$args = array(
		'labels'                => $labels,
		'description'           => __( 'Descripción', 'cocojoy' ),
		'public'                => true,
		'publicly_queryable'    => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array('slug' => 'menu-coojoy'),
		'capability_type'       => 'post',
		'has_archive'           => true,
		'hierarchical'          => false,
		'menu_position'         => 6,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array('categoria-menu'),
		'show_in_rest'          => true,
		'rest_base'             => 'articulos-api'
	);
	register_post_type('articulos', $args );
}
add_action( 'init', 'cocojoy_articulos');

// Register Custom Taxonomy
function cocojoy_menu_taxonomia() {

	$labels = array(
		'name'                       => _x( 'Categoria Menu', 'Taxonomy General Name', 'cocojoy' ),
		'singular_name'              => _x( 'Categoria Menu', 'Taxonomy Singular Name', 'cocojoy' ),
		'search_items'               => __( 'Buscar Categoria Menu', 'cocojoy' ),
		'all_items'                  => __( 'Todas Categorias Menu', 'cocojoy' ),
		'parent_item'                => __( 'Categoria Menu Padre', 'cocojoy' ),
		'parent_item_colon'          => __( 'Categoria Menu:', 'cocojoy' ),
		'edit_item'                  => __( 'Editar Categoria Menu', 'cocojoy' ),
		'update_item'                => __( 'Actualizar Categoria Menu', 'cocojoy' ),
		'add_new_item'               => __( 'Agregar Categoria Menu', 'cocojoy' ),
		'new_item_name'              => __( 'Nombre Categoria Menu', 'cocojoy' ),
		'menu_name'                  => __( 'Categoria Menu', 'cocojoy' ),
	);
	$args = array(
		'hierarchical'               => false,
		'labels'                     => $labels,
		'show_ui'                    => true,
		'show_admin_column'          => true,
        'query_var'                  => true,
        'rewrite'                    => array('slug'  =>  'categoria-menu'),
	);
	register_taxonomy( 'categoria-menu', array( 'articulos' ), $args );
}

add_action( 'init', 'cocojoy_menu_taxonomia', 0 );

// AGREGAR CAMPOS A LA RESPUESTA DE LA REST API
function cocojoy_agregar_campos_rest_api(){
	register_rest_field(
		'articulos', 
		'precio',
		array(
			'get_callback'    => 'cocojoy_obtener_precio',
			'update_callback' => null,
			'schema'          => null,
		)
	);

	register_rest_field(
		'articulos', 
		'categoria-menu',
		array(
			'get_callback'    => 'cocojoy_taxonomia_menu',
			'update_callback' => null,
			'schema'          => null,
		)
	);
}
add_action('rest_api_init', 'cocojoy_agregar_campos_rest_api');

function cocojoy_obtener_precio(){
	if(!function_exists('get_field')){
		return;
	}
	if(get_field('precio')){
		return get_field('precio');
	}
	return;
}

function cocojoy_taxonomia_menu(){
	global $post;
	$terms = wp_get_post_terms($post->ID, 'categoria-menu', array('categoria' => 'ids'));
	return $terms;
}
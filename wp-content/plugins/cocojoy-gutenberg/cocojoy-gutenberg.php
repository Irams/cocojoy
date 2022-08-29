<?php 
/*
    Plugin Name: Mascotas Cocojoy Gutenberh blocks
    Plugin URI:
    Description: Agrega bloques de gutenberg nativos
    Version: 1.0.0
    Author: Herberth I.M.S.
    Author URI: https://twitter.com/HIramMS
    Licence: GPL2
    Licence URI: https://www.gnu.org/licenses/gpl-2.0.html
*/
if(!defined('ABSPATH')) exit;

//CATEGORÍAS PERSONALIZADAS
function cocojoy_categoria_personalizada($categories, $post){
    return array_merge(
        $categories,
        array(
            'slug' => 'cocojoy',
            'title' => 'Cocojoy',
            'icon'  => 'pets'
        )
    );
}
add_filter('block_categories', 'cocojoy_categoria_personalizada', 10, 2);

// REGISTRAR BLOQUES, SCRIPTS Y CSS
function cocojoy_registrar_bloques(){
    //Si gutenberg no existe, salir
    if (!function_exists('register_block_type')){
        return;
    }
    //Registrar lo bloques en el editor
    wp_register_script(
        'cocojoy-editor-script', //nombre único
        plugins_url('build/index.js', __FILE__), //Archivo con los bloques
        array('wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'), //dependencias
        filemtime( plugin_dir_path(__FILE__).'build/index.js') //trae la últime version del archivo
    );

    //Estilos para el editor únicamente
    wp_register_style(
        'cocojoy-editor-styles', 
        plugins_url('css/editor.css', __FILE__),
        array('wp-edit-blocks'), 
        filemtime( plugin_dir_path(__FILE__).'css/editor.css')
    );

    //Estilos para los bloques (backend y frontend)
    wp_register_style(
        'cocojoy-frontend-styles',
        plugins_url('css/style.css', __FILE__),
        array(),
        filemtime( plugin_dir_path(__FILE__).'css/style.css')
    );

    //Registrando los bloques (arreglo de bloques)
    $blocks = [
        'cocojoy/boxes'
    ];

    //Recorrer los bloques y agregar los scripts y styles
    foreach($blocks as $block){
        register_block_type($block, array(
            'editor_script' => 'cocojoy-editor-script', //Scrpt principal para el ditor
            'editor_style'  => 'cocojoy-editor-styles', //Estilos para el editor
            'style'         => 'cocojoy-frontend-styles' //Estilos frontend
        ));
    }

}
add_action('init', 'cocojoy_registrar_bloques');
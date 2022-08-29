<?php

function cocojoy_setup(){

    /* GUTENBERG */
    //Soporte a estilos por default de gutenberg en el tema
    add_theme_support('wp-block-styles');
    // Paleta de Colores
    add_theme_support('editor-color-palette', array(
        array(
           'name' => 'Azul',
           'slug' => 'azul',
           'color'=> '#162B4E' 
        ),
        array(
            'name' => 'Naranja',
            'slug' => 'naranja',
            'color'=> '#E3572C' 
         ),
         array(
            'name' => 'Azul Claro',
            'slug' => 'azul-claro',
            'color'=> '#4181E8' 
         ),
         array(
            'name' => 'Gris',
            'slug' => 'gris',
            'color'=> '#514D4C' 
         ),
         array(
            'name' => 'Gris Oscuro',
            'slug' => 'gris-oscuro',
            'color'=> '#2E2E2E' 
         ),
         array(
            'name' => 'Blanco',
            'slug' => 'blanco',
            'color'=> '#FFFFFF' 
         ),
         array(
            'name' => 'Negro',
            'slug' => 'negro',
            'color'=> '#000000' 
         ),
    ));
    //Deshabilitar el custom color
    add_theme_support('disable-custom-color');
    //Imagenes Destacadas
    add_theme_support('post-thumbnails');

    //Tamaños de imagenes
    add_image_size('nosotros', 437, 291, true);
    add_image_size('especialidades', 768, 515, true);
    add_image_size('especialidades_portrait', 435, 526, true);
}
add_action('after_setup_theme', 'cocojoy_setup');
// Css y Js
function cocojoy_styles(){
    // Agregar hojas de estilos
    wp_enqueue_style('normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css', array(), '8.0.1');

    wp_enqueue_style('slicknavcss', 'https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.10/slicknav.min.css', array('normalize'), '1.0.10');

    wp_enqueue_style('googlefonts', 'https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@400;700;900&display=swap', array(), '1.0.0');

    wp_enqueue_style('animacecss', get_template_directory_uri().'/animate.css', array(), '4.1.1');

    wp_enqueue_style('style', get_stylesheet_uri(), array('normalize'), '1.0.0');

    //Scripts
    wp_enqueue_script('slicknavjs', 'https://cdnjs.cloudflare.com/ajax/libs/SlickNav/1.0.10/jquery.slicknav.min.js', array('jquery'), '1.0.10', true);

    wp_enqueue_script('scripts', get_template_directory_uri().'/js/scripts.js', array('jquery'), '1.0.10', true);

}
add_action('wp_enqueue_scripts', 'cocojoy_styles');

/*MENUS*/
function cocojoy_menus(){
    register_nav_menus(array(
        'header-menu'    => 'Header Menu',
        'redes-sociales' => 'Redes Sociales'
    ));
}
add_action('init', 'cocojoy_menus');

// Zona de widgets
function cocojoy_widgets(){
    register_sidebar(array(
        'name' => 'Blog Sidebar',
        'id'   => 'blog_sidebar',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>'
    ));
}
add_action('widgets_init', 'cocojoy_widgets');

// Filtros: nos permite modificar los elementos, antes de que se muestren en pantalla
 function cocojoy_botones_paginador(){
    return 'class="boton boton-secundario"';
 }
 add_filter('next_posts_link_attributes', 'cocojoy_botones_paginador');
 add_filter('previous_posts_link_attributes', 'cocojoy_botones_paginador');

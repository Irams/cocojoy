<!DOCTYPE html>
<html lang="es-mx">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body class="animate__animated animate__fadeIn">
<header class="site-header">
    <div class="contenedor">
        <div class="logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_template_directory_uri() ?>/img/logo_marino.png" alt="">
            </a>
        </div><!---logo-->
        <div class="info-header">
            <div class="redes-sociales">
                <?php 
                $args=array(
                    'theme_location' => 'redes-sociales',
                    'container'      => 'nav',
                    'container_class'=> 'sociales',
                    'link_before'    => '<span class="sr-text">',
                    'link_after'     => '</span>',
                    'menu_icon'      => 'dashicons-products'
                );
                wp_nav_menu($args);
                 ?>
            </div><!---redes-sociales -->
            <div class="direccion">
                <p>
                    Jardineros s/n, Col. Morelos, Alcaldía Venustiano Carranza C.P. 16270
                </p> 
                <p>
                    Teléfono: 55-333-538-60
                </p>
            </div><!--.direccion -->
        </div><!--.info-header -->
    </div>
</header>

<!-- Menu -->
<div class="menu-principal">
    <div class="contenedor">
        <?php
        $args= array(
            'theme_location' => 'header-menu',
            'container' => 'nav',
            'container_class' => 'menu-sitio',
            'container_id' => 'menu'
        );
        wp_nav_menu($args);
        ?>
    </div>
</div>
    

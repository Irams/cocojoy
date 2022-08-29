<footer class="site-footer">
    <?php 
        $args=array(
            'theme_location' => 'redes-sociales',
            'container'      => 'nav',
            'container_class'=> 'footer-nav',
            'after'          => '<span class="separador"> | </span>'
        );
        wp_nav_menu($args);
    ?>

<div class="direccion">
    <p>
        Jardineros s/n, Col. Morelos, Alcaldía Venustiano Carranza C.P. 16270
    </p> 
    <p>
        Teléfono: 55-333-538-60
    </p>
</div><!--.direccion -->
</footer>


<?php wp_footer(); ?>
</body>
</html>
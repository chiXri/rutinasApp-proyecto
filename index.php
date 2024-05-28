<?php
include __DIR__ . "/vistas/inicio.php";
?>


<!-- prueba de conexión para las publicaciones -->
<?php

include_once "servicioPublicaciones.php";

$publicaciones = servicioPublicaciones::obtenerPublicaciones();


?>

<div>

    <h2>Publicaciones</h2>
    <?php
        if(count($publicaciones)>0){
            foreach($publicaciones as $publicacion){
                include "verPublicacion.php";
            }
        }
        else{
            echo "No hay ofertas";
        }
    ?>
</div>
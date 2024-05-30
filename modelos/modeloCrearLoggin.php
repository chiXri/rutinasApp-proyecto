<?php

include "./servicios/servicioCrearPublicaciones.php";

    $usuarioId = $_POST["usuarioId"];
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];
    $fechaHora = $_POST["fechaHora"];

    $crearPublicacion = new SeervicioCrearPublicacion();

    $crearPublicacion->crearPublicacion($usuarioId,$titulo,$descripcion,$fechaHora)
    






?>
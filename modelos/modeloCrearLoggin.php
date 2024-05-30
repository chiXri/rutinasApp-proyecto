<?php

include "./servicios/servicioCrearPublicaciones.php";

    $usuarioIid = $_POST["usuarioId"];
    $titulo = $_POST["nombre"];

    $apellidos = $_POST["apellidos"];
    $edad = $_POST["edad"];
    $email = $_POST["email"];
    $genero = $_POST["genero"];

    $registro = new ServicioRegistro();

    $registro->registroUsuario($nombre, $contrasena, $apellidos, $edad, $email, $genero);





    $fecha = $publicacion->fecha->format("Y-m-d H:i:s");
    
    // Crear la consulta SQL corregida
    $consulta = "INSERT INTO `rutina`(`user_id`, `titulo`, `descripcion`, `fechaHora`)
                 VALUES ('$publicacion->userId', '$publicacion->titulo', '$publicacion->descripcion', '$fecha')";






?>
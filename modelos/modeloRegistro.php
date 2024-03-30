<?php

include "./servicios/servicioRegistro.php";

    $nombre = $_POST["nombre"];
    $contrasena = $_POST["contrasena"];
    $apellidos = $_POST["apellidos"];
    $edad = $_POST["edad"];
    $email = $_POST["email"];
    $genero = $_POST["genero"];

    $registro = new ServicioRegistro();

    $registro->registroUsuario($nombre, $contrasena, $apellidos, $edad, $email, $genero);












?>
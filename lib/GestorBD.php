<?php
 class GestorBD{

    public static function conectar(){

        $config = parse_ini_file(__DIR__ . "/../config/config.ini");

        $conexion= null;
       
        if (!$conexion){
            $conexion = new mysqli($config["host"], $config["user"], $config["pass"], $config["bd"]);
         }
         return $conexion;
    }
 }




?>
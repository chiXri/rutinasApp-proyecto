<?php 

    class SeervicioCrearPublicacion{

        public function crearPublicacion($usuarioIid, $titulo, $descripcion, $fechaHora){
            $errores = array();


            if(isset($_POST["usuarioId"]) && isset($_POST["titulo"]) && isset($_POST["descripcion"]) && isset($_POST["fechaHora"])){
                
            }
                // Crear la consulta SQL corregida
    $consulta = "INSERT INTO `rutina`(`user_id`, `titulo`, `descripcion`, `fechaHora`)
    VALUES ('$publicacion->userId', '$publicacion->titulo', '$publicacion->descripcion', '$fecha')";



        }

    }


?>


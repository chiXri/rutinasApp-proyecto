<?php

include_once __DIR__ . "/../../modelos/servicios/servicioPublicaciones.php";


class Publicacion{

    public int $userId;
    public string $titulo;
    public string $descripcion;
    public DateTime $fecha;

    function __construct(int $userId, string $titulo, string $descripcion, DateTime $fecha){
        $this->userId = $userId;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
    }

    public static function verPublicaciones(){
        $fecha = new DateTime();
        if (isset($_POST["user_id"]) && isset($_POST["titulo"]) && isset($_POST["descripcion"])){
            return new Publicacion((int)$_POST["user_id"], $_POST["titulo"], $_POST["descripcion"],$fecha);
        }
        else {
            return new Publicacion(0,"","",$fecha,"");
        }

        
    }

    public static function crearPublicacion($publicacion) {
        // Formatear la fecha correctamente
        $fecha = $publicacion->fecha->format("Y-m-d H:i:s");
    
        // Crear la consulta SQL corregida
        $consulta = "INSERT INTO `rutina`(`user_id`, `titulo`, `descripcion`, `fechaHora`)
                     VALUES ('$publicacion->userId', '$publicacion->titulo', '$publicacion->descripcion', '$fecha')";
    
        // Ejecutar la consulta y manejar errores
        $resultado = GestorBD::consultaEscritura($consulta);
    
        if (!$resultado) {
            die('Error en la consulta: ' . GestorBD::obtenerError());
        }
    }


    
}
?>
<?php

include_once __DIR__ . "/../../modelos/servicios/servicioPublicaciones.php";


class Publicacion{

    public int $userId;
    public string $titulo;
    public string $descripcion;
    public DateTime $fecha;
    public string $imagen;

    function __construct(int $userId, string $titulo, string $descripcion, DateTime $fecha, string $imagen){
        $this->userId = $userId;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
        $this->imagen = $imagen;
    }

    public static function verPublicaciones(){
        $fecha = new DateTime();
        if (isset($_POST["user_id"]) && isset($_POST["titulo"]) && isset($_POST["descripcion"]) && isset($_POST["imagen"])){
            return new Publicacion((int)$_POST["user_id"], $_POST["titulo"], $_POST["descripcion"],$fecha, $_POST["imagen"]);
        }
        else {
            return new Publicacion(0,"","",$fecha,"");
        }

        
    }

    public static function crearPublicacion(Publicacion $publicacion){

    }


    
}
?>
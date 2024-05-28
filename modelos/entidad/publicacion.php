<?php

class Publicacion{
    public int $rutinaId;
    public int $userId;
    public String $titulo;
    public String $descripcion;
    public DateTime $fecha;
    public String $imagen;

    function __construct(int $rutinaId, int $userId, String $titulo, String $descripcion, DateTime $fecha, String $imagen){
        $this->rutinaId = $rutinaId;
        $this->userId = $userId;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->fecha = $fecha;
        $this->imagen = $imagen;
    }
    
}
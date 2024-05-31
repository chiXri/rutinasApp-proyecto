<?php
class Publicacion {
    private $id;
    private $titulo;
    private $descripcion;
    private $fechaHora;

    public function __construct($id, $titulo, $descripcion, $fechaHora) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->fechaHora = $fechaHora;
    }

    public function getId() {
        return $this->id;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getFechaHora() {
        return $this->fechaHora;
    }

 

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setFechaHora($fechaHora) {
        $this->fechaHora = $fechaHora;
    }
}
?>

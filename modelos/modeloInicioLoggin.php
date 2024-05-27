<?php
// models/Publicacion.php
class Publicacion {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function obtenerTodas() {
        $sql = "SELECT r.titulo, r.descripcion, r.fecha, u.nombre AS nombre_usuario
                FROM rutinas r
                JOIN usuario u ON r.user_id = u.user_id";
        $result = $this->conn->query($sql);

        $publicaciones = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $publicaciones[] = $row;
            }
        }

        return $publicaciones;
    }
}
?>
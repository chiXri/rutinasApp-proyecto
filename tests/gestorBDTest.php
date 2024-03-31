<?php
use PHPUnit\Framework\TestCase;

require_once "../lib/GestorBD.php"; // Asegúrate de incluir la ruta correcta

class GestorBDTest extends TestCase 
{
    // Método de prueba para probar la conexión a la base de datosj
    public function testConexion() {
        $conexion = GestorBD::conectar();
        $this->assertInstanceOf(mysqli::class, $conexion); // Verificar si se devuelve una instancia de mysqli
    }
    
    // Método de prueba para probar la consulta de lectura
    public function testConsultaLectura() {
        $consulta = "SELECT * FROM usuario";
        $resultado = GestorBD::consultaLectura($consulta);
        $this->assertIsArray($resultado); // Verificar si se devuelve un array de resultados
    }
    
    
}
?>

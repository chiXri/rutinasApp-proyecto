<?php
use PHPUnit\Framework\TestCase;

require_once "../modelos/servicios/ServicioRegistro.php"; // Reemplaza 'ruta/a/tu/clase' con la ruta real a tu clase

class RegistroTest extends TestCase 
{
    
    public function testRegistroUsuario() {
        // Crea una instancia de la clase ServicioRegistro
        $servicioRegistro = new ServicioRegistro();
        
        // Define datos de prueba
        $nombre = "Deme";
        $apellidos = "mayorga";
        $edad = 25;
        $email = "deme@ejemplo.com";
        $contrasena = "1234";
        $genero = "Masculino";

        //Conexión a la base de datos

        $conexion = new mysqli("localhost", "root", "", "proyectoifp");
        
        // Ejecuta el método registroUsuario con los datos de prueba
       $resultado= $servicioRegistro->registroUsuario($nombre, $apellidos, $edad, $email, $genero,  $contrasena);
        $resultado->gettype();
       // Verifica si el registro fue exitoso
          $this->assertTrue($resultado);
     
    }
    
}
?>

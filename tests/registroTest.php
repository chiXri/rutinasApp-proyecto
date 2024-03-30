<?php
use PHPUnit\Framework\TestCase;

require_once "../modelos/servicios/ServicioRegistro.php"; // Reemplaza 'ruta/a/tu/clase' con la ruta real a tu clase

class RegistroTest extends TestCase 
{
    
    public function testRegistroUsuario() {
        // Crea una instancia de la clase ServicioRegistro
        $servicioRegistro = new ServicioRegistro();
        
        // Define datos de prueba
        $nombre = "John";
        $apellidos = "Doe";
        $edad = 25;
        $email = "john.doe@example.com";
        $contrasena = "password123";
        $genero = "Masculino";
        
        // Ejecuta el método registroUsuario con los datos de prueba
        $servicioRegistro->registroUsuario($nombre, $contrasena, $apellidos, $edad, $email, $genero);
        
        // Realiza las aserciones pertinentes para verificar el comportamiento esperado
        
        // Por ejemplo, verifica si la redirección ocurre correctamente
        $this->assertStringContainsString("/rutinasApp-proyecto/vistas/login.php", $this->getActualOutput());
        
        // También podrías realizar otras aserciones, como verificar que el usuario se haya insertado correctamente en la base de datos
        
        // Por ejemplo, puedes verificar si el usuario existe en la base de datos
        $conexion = new mysqli("localhost", "root", "", "proyectoifp");
        $result = $conexion->query("SELECT * FROM usuario WHERE email = '$email'");
        $this->assertGreaterThan(0, $result->num_rows); // Verifica si se encontró al menos un usuario con el correo electrónico proporcionado
        
        // Cierra la conexión a la base de datos
        $conexion->close();
    }
    
    // Agrega más métodos de prueba según sea necesario para cubrir otros casos de prueba
}
?>

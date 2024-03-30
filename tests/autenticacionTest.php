<?php
use PHPUnit\Framework\TestCase;

// Incluimos la clase ServicioAutenticacion
require_once '../modelos/servicios/ServicioAutenticacion.php';

class ServicioAutenticacionTest extends TestCase
 {
    
    // Prueba para validar usuario y contraseña válidos
    public function testValidarUsuarioContrasenaExitoso() {
        // Datos de prueba
        $usuario = "jdjdj";
        $contrasena = "32";

        // Ejecutar el método a probar
        $resultado = ServicioAutenticacion::validarUsuarioContrasena($usuario, $contrasena);

        // Verificar si la validación fue exitosa
        $this->assertTrue($resultado);
    }

    // Prueba para validar usuario y contraseña inválidos
    public function testValidarUsuarioContrasenaFallido() {
        // Datos de prueba
        $usuario = "usuario2";
        $contrasena = "password456";

        // Ejecutar el método a probar
        $resultado = ServicioAutenticacion::validarUsuarioContrasena($usuario, $contrasena);

        // Verificar si la validación fue fallida
        $this->assertFalse($resultado);
    }
}
?>

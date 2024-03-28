<?php 
include "../modelos/servicios/servicioAutenticacion.php";

    class Autenticacion{

        const claveUsuario = "usuario";
        const cookieUsuario = "usuario";

        public static function estaAutenticado(){
            return isset($_SESSION[self::claveUsuario]);
        }

        public static function obtenerUsuario(){

            if (self::estaAutenticado()){

                return $_SESSION[self::claveUsuario];
            }
            else{
                return '';
            }
        }

        public static function autenticar($usuario, $contrasena){
            if (servicioAutenticacion::validarUsuarioContrasena($usuario, $contrasena)){
                $_SESSION[self::claveUsuario] = $usuario;

                setcookie(self::cookieUsuario, $usuario);
                return true;
            }
            else{
                return false;
            }
        }

        public static function obtenerCookieUsuario(){

            if (isset($_COOKIE[self::cookieUsuario])){
                return $_COOKIE[self::cookieUsuario];
            }
            else{
                return '';
            }
        }
    }


?>
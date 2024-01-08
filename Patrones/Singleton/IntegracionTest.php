<?php
use PHPUnit\Framework\TestCase;
require("Sesion.php");
require("Conexion.php");
require("Acciones.php");

class IntegracionTest extends TestCase
{
    public function testInsertarUsuarioExitoso()
    {
        $usuario = 'UserTest';
        $contrasena = 'contrasena_prueba';
        $email = 'correo_prueba@example.com';
        $telefono = '123456789';

        $acciones = new Acciones();

        ob_start();
        $acciones->Insertar($usuario, $contrasena, $email, $telefono);
        $output = ob_get_clean();

        $this->assertSame('Insercion Realizada con Exito', $output);
    }

    public function testInsertarUsuarioExistente()
    {
        $usuario = 'usuario_existente';
        $contrasena = 'contrasena_existente';
        $email = 'correo_existente@example.com';
        $telefono = '987654321';

        $acciones = new Acciones();

        ob_start();
        $acciones->Insertar($usuario, $contrasena, $email, $telefono);
        $output = ob_get_clean();

        $this->assertSame('Error de Insercion', $output);
    }
}

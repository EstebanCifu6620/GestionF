<?php

include_once("Acciones.php");

use PHPUnit\Framework\TestCase;

class AccionesTest extends TestCase
{
    public function testInsertarRepetido()
    {
        $acciones = new Acciones();
        $usuario = 'usuario_prueba';
        $contrasena = 'contrasena_prueba';
        $email = 'correo_prueba@example.com';
        $telefono = '123456789';

        ob_start();
        $acciones->Insertar($usuario, $contrasena, $email, $telefono);
        $output = ob_get_clean();

        $this->assertSame('Error de Insercion', $output);
    }

    public function testInsertar()
    {
        $acciones = new Acciones();

        $usuario = 'userPrueba';
        $contrasena = 'contrasena_prueba';
        $email = 'correo_prueba@example.com';
        $telefono = '123456789';

        ob_start();
        $acciones->Insertar($usuario, $contrasena, $email, $telefono);
        $output = ob_get_clean();

        $this->assertSame('Insercion Realizada con Exito', $output);
    }

    public function testInsertaVacio()
    {
        $acciones = new Acciones();

        $usuario = '';
        $contrasena = '';
        $email = '';
        $telefono = '';

        ob_start();
        $acciones->Insertar($usuario, $contrasena, $email, $telefono);
        $output = ob_get_clean();

        $this->assertSame('Error de Insercion', $output);
    }
    public function testInsertarNulo()
    {
        $acciones = new Acciones();

        $usuario = null;
        $contrasena = null;
        $email = null;
        $telefono = null;

        ob_start();
        $acciones->Insertar($usuario, $contrasena, $email, $telefono);
        $output = ob_get_clean();

        $this->assertSame('Error de Insercion', $output);
    }
}

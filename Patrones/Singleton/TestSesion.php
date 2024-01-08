<?php

use PHPUnit\Framework\TestCase;
include_once("Sesion.php");

class TestSesion extends TestCase {

    public function testSetAndGetSesion() {
        // Caso de prueba: Establecer y obtener un valor en la sesión
        $sesion = Sesion::getInstance();
        $sesion->setSesion("usuario", "juan");
        $this->assertEquals("juan", $sesion->getSesion("usuario"));

        // Caso de prueba: Intentar obtener un valor que no existe en la sesión
        $this->assertNull($sesion->getSesion("no_existe"));

        // Caso de prueba: Establecer y obtener otro valor en la sesión
        $sesion->setSesion("rol", "admin");
        $this->assertEquals("admin", $sesion->getSesion("rol"));
    }

    public function testCerrarSesion() {
        // Caso de prueba: Cerrar sesión y verificar que $_SESSION esté vacío
        $sesion = Sesion::getInstance();
        $sesion->setSesion("usuario", "maria");
        $sesion->setSesion("rol", "cliente");

        $sesion->cerrarSesion();
        $this->assertEmpty($_SESSION);
    }

    public function testInicioSesionDatosCorrectos() {
        $sesion = Sesion::getInstance();

        $sesion->setSesion("usuario", "usuario_valido");
        $sesion->setSesion("rol", "cliente");

        $this->assertEquals("usuario_valido", $sesion->getSesion("usuario"));
        $this->assertEquals("cliente", $sesion->getSesion("rol"));
    }

    public function testInicioSesionDatosIncorrectos() {
        $sesion = Sesion::getInstance();

        $sesion->setSesion("usuario", "usuario_invalido");
        $sesion->setSesion("rol", "admin");

        $this->assertNotEquals("usuario_valido", $sesion->getSesion("usuario"));
        $this->assertNotEquals("cliente", $sesion->getSesion("rol"));
    }

    public function testInicioSesionDatosVacios() {
        $sesion = Sesion::getInstance();
    
        $sesion->setSesion("usuario", "");
        $sesion->setSesion("rol", "");
    
        $this->assertEmpty($sesion->getSesion("usuario"));
        $this->assertEmpty($sesion->getSesion("rol"));
    }

    public function testInicioSesionDatosNulos() {
        $sesion = Sesion::getInstance();

        $sesion->setSesion("usuario", null);
        $sesion->setSesion("rol", null);

        $this->assertNull($sesion->getSesion("usuario"));
        $this->assertNull($sesion->getSesion("rol"));
    }
}
?>

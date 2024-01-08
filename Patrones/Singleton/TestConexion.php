<?php
    use PHPUnit\Framework\TestCase;
    require 'Conexion.php'; // Asegúrate de importar la clase que deseas probar

    class TestConexion extends PHPUnit\Framework\TestCase {

        public function testConexionSingleton() {
            $conexion1 = Conexion::getInstance();
            $conexion2 = Conexion::getInstance();
            
            $this->assertSame($conexion1, $conexion2);
        }

        public function testConexionPDO() {
            $conexion = Conexion::getInstance();
            $pdo = $conexion->getConexion();
            
            $this->assertInstanceOf(PDO::class, $pdo);
        }

        public function testConexionExitosa() {
            $conexion = Conexion::getInstance();
            $pdo = $conexion->getConexion();
            
            $this->assertInstanceOf(PDO::class, $pdo);
            
            $this->assertEquals(PDO::ERRMODE_EXCEPTION, $pdo->getAttribute(PDO::ATTR_ERRMODE));
        }

        public function testCerrarSesion() {
            $sesion = Sesion::getInstance();

            $sesion->setSesion("usuario", "maria");
            $sesion->setSesion("rol", "cliente");

            $sesion->cerrarSesion();
            $this->assertEmpty($_SESSION);
        }
    }
?>
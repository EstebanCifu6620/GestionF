<?php
    include_once("../Patrones/Singleton/Conexion.php");
    include_once("Comando.php");
    class CarritoCommand implements Command{
        private $producto;
        private $precio;
        private $foto;
        private $usuario;

        public function __construct($producto, $precio, $foto, $usuario)
        {
            $this->producto = $producto;
            $this->precio = $precio;
            $this->foto = $foto;
            $this->usuario = $usuario;
        }

        public function execute() {
            try {
                // Intenta ejecutar la operación de base de datos
                $conexion = Conexion::getInstance()->getConexion();
                $consulta = "INSERT INTO carrito (Usu_Car, Pro_Car, Pre_Car, Ima_Car) VALUES (?, ?, ?, ?)";
                $resultado = $conexion->prepare($consulta);
                $resultado->execute([$this->usuario, $this->producto, $this->precio, $this->foto]);
            
                // Agregar mensajes de registro
                error_log("Consulta SQL: " . $consulta);
                error_log("Valores: Usuario = " . $this->usuario . ", Producto = " . $this->producto . ", Precio = " . $this->precio . ", Foto = " . $this->foto);
            } catch (PDOException $e) {
                // Maneja la excepción específica de la base de datos
                error_log("Error en la base de datos: " . $e->getMessage());
                throw new Exception("Error al procesar la solicitud en la base de datos.");
            }
            
        }
    }
?>
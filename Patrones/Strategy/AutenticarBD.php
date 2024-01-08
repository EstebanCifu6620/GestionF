<?php

    include("../Patrones/Singleton/Conexion.php");
    include_once("IStrategy.php");
    include("../Patrones/Singleton/Sesion.php");

    class AuthenticateDatabase implements AuthenticationStrategy
    {
        private $conexion;

        public function __construct()
        {
            $this->conexion = Conexion::getInstance()->getConexion();
        }

        public function authenticate($user, $password)
        {
            $consulta = "SELECT * FROM usuarios WHERE BINARY usuario = :usuario";
            $stmt = $this->conexion->prepare($consulta);
            $stmt->bindParam(':usuario', $user);
            $stmt->execute();

            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data) {
                if ($data['clave'] == $password) {
                    Sesion::getInstance()->setSesion("usuario", $data["usuario"]);

                    $_SESSION['rol'] = $data['rol'];
                    $_SESSION['correo'] = $data['email'];
                }else {
                    // Si la contraseña no coincide
                    header("Location: error.php?error=contrasena");
                    exit();
                }
            } else {
                header("Location: error.php?error=usuario");
                exit();
            }
        }
    }

?>
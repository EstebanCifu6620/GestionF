<?php

    include_once("IStrategy.php");
    include_once("../Patrones/Singleton/Sesion.php");

    class Authenticator
    {
        private $authStrategy;

        public function setAuthStrategy(AuthenticationStrategy $authStrategy)
        {
            $this->authStrategy = $authStrategy;
        }

        public function authenticateUser($user, $password) {
            if (!is_string($user) || !is_string($password)) {
                // Manejar el error o rechazar la solicitud
                throw new InvalidArgumentException("Invalid input");
            }
            $this->authStrategy->authenticate($user, $password);
        }
        

        public function closeSession() {
            session_regenerate_id(); // Prevenir secuestro de sesión
            Sesion::getInstance()->cerrarSesion();
            header('Location: ' . htmlspecialchars('Logeo.php', ENT_QUOTES, 'UTF-8'));
            exit(); // Asegúrate de llamar a exit después de una redirección
        }
        
    }

?>
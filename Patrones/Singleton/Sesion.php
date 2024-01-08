<?php

    class Sesion{
        private static $instance;
        private $sesion;

        private function __construct() {
            if (session_status() == PHP_SESSION_NONE) {
                // Configuraciones seguras para cookies de sesión
                session_set_cookie_params([
                    'lifetime' => 0, // La sesión expira al cerrar el navegador
                    'secure' => true, // Solo transmitir cookies de sesión a través de HTTPS
                    'httponly' => true, // Solo accesible a través del protocolo HTTP
                    'samesite' => 'Strict' // Prevención contra ataques CSRF
                ]);
    
                session_start();
                // Regenerar el ID de sesión para prevenir la fijación de sesión
                if (!isset($_SESSION['initiated'])) {
                    session_regenerate_id();
                    $_SESSION['initiated'] = true;
                }
    
                // Control de tiempo de vida de la sesión
                if (isset($_SESSION['last_access']) && (time() - $_SESSION['last_access'] > 1800)) {
                    // La sesión ha estado inactiva durante más de 30 minutos
                    $this->cerrarSesion();
                    throw new Exception("Sesión expirada");
                }
                $_SESSION['last_access'] = time();
            }
            $this->sesion = &$_SESSION;
        }

        public static function getInstance(){
            if(!self::$instance){
                self::$instance = new Sesion;
            }
            return self::$instance;
        }

        public function setSesion($llave, $valor){
            $this -> sesion[$llave] = $valor;
        }

        public function getSesion($llave){
            return $this -> sesion[$llave] ?? null;
        }

        public function cerrarSesion() {
            // Limpiar el array de sesión
            $_SESSION = array();
        
            // Si se está utilizando una cookie de sesión, invalidarla
            if (ini_get("session.use_cookies")) {
                $params = session_get_cookie_params();
                setcookie(session_name(), '', time() - 42000,
                    $params["path"], $params["domain"],
                    $params["secure"], $params["httponly"]
                );
            }
        
            // Finalmente, destruir la sesión
            session_destroy();
        }
    }

?>
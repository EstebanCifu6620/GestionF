<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
abstract class Plantilla
{

    public abstract function crearHeader();
    public abstract function crearMain();
    public abstract function crearFooter();

    public function verificarSesionPaginas()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['usuario'])) {
            header('Location: Logeo.php');
            exit; // Asegúrate de llamar a exit después de una redirección.
        } else {
            $_SESSION['usuario'];
        }
    }

    public function verificarSesionIndex()
    {
        if (session_status() == PHP_SESSION_NONE)
            session_start();

        if (isset($_SESSION['usuario'])) {
            $_SESSION['usuario'];
        } else {
            header('Location: Paginas/Logeo.php');
            die();
        }
    }

    function verificarTipoUsuario($origen, $ruta)
    {
        if (isset($_SESSION['usuario']) && isset($_SESSION['rol'])) {
            // Verificación adicional del rol aquí, si es necesario
            if ($_SESSION['rol'] == 'admin') {
                if ($origen)
                    return;
                header('Location: ' . $ruta . 'Admin.php');
            } else {
                if ($origen)
                    header('Location: ' . $ruta . 'index.php');
            }
        }
    }


    public function crearPagina()
    {
        $this->crearHeader();
        $this->crearMain();
        $this->crearFooter();
    }
}

?>
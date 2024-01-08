<?php

include_once("../Patrones/Singleton/Conexion.php");

class Acciones
{

    public static function MostrarUsuarios()
    {

        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "SELECT * FROM usuarios";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $dato = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $acum = 1;
        $informacion = '';

        foreach ($dato as $respuesta) {
            $usuario = htmlspecialchars($respuesta['usuario'], ENT_QUOTES, 'UTF-8');
            $email = htmlspecialchars($respuesta['email'], ENT_QUOTES, 'UTF-8');
            $telefono = htmlspecialchars($respuesta['telefono'], ENT_QUOTES, 'UTF-8');
            $rol = htmlspecialchars($respuesta['rol'], ENT_QUOTES, 'UTF-8');

            $informacion .= '
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">' . $acum++ . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $usuario . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['clave']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $email . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $telefono . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $rol . '</td>
                        <td class="mdl-data-table__cell">
                            <center>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal editar">
                                    <i class="material-icons">create</i>Editar</button>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red eliminar" >
                                    <i class="material-icons">cancel</i>Eliminar
                                </button>
                            </center>
                        </td>
                    </tr>
                ';
        }
        return $informacion;
    }

    public static function MostrarTestimonios()
    {

        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "SELECT * FROM testimonios";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $dato = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $acum = 1;
        $informacion = '';

        foreach ($dato as $respuesta) {
            $informacion .= '
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Cod_Tes']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Usu_Tes']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Ema_Tet']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Mot_Tes']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Men_Tes']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Hab_Tes']) . '</td>
                        <td class="mdl-data-table__cell">
                            <center>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal editar">
                                    <i class="material-icons">create</i>Editar</button>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red eliminar" >
                                    <i class="material-icons">cancel</i>Eliminar
                                </button>
                            </center>
                        </td>
                    </tr>
                ';
        }
        return $informacion;
    }

    public static function MostrarCompras()
    {

        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "SELECT * FROM compras";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $dato = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $acum = 1;
        $informacion = '';

        foreach ($dato as $respuesta) {
            $codCom = htmlspecialchars($respuesta['Cod_Com'], ENT_QUOTES, 'UTF-8');
            $cliCom = htmlspecialchars($respuesta['Cli_Com'], ENT_QUOTES, 'UTF-8');
            $preSubCom = htmlspecialchars($respuesta['Pre_Sub_Com'], ENT_QUOTES, 'UTF-8');
            $preTotCom = htmlspecialchars($respuesta['Pre_Tot_Com'], ENT_QUOTES, 'UTF-8');
            $proCom = htmlspecialchars($respuesta['Pro_Com'], ENT_QUOTES, 'UTF-8');
            $fecCom = htmlspecialchars($respuesta['Fec_Com'], ENT_QUOTES, 'UTF-8');


            $informacion .= '
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">' . $codCom . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $cliCom . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $preSubCom . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $preTotCom . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $proCom . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $fecCom . '</td>
                        <td class="mdl-data-table__cell">
                            <center>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal editar">
                                    <i class="material-icons">create</i>Editar</button>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red eliminar" >
                                    <i class="material-icons">cancel</i>Eliminar
                                </button>
                            </center>
                        </td>
                    </tr>
                ';
        }
        return $informacion;
    }

    public static function MostrarProductos()
    {

        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "SELECT * FROM productos";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $dato = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $acum = 0;
        $informacion = '';

        foreach ($dato as $respuesta) {
            $informacion .= '
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Cod_Pro']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Nom_Pro']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Mar_Pro']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Gra_Alc_Pro']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['IBU']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Car_1_Pro']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Car_2_Pro']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Car_3_Pro']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Pre_Pro']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Des_Pro']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Ama_Pro']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Cue_Pro']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric"><img class="img-gest" src="../' . htmlspecialchars($respuesta['Rut_Pro']) . '"></img></td>
                        <td class="mdl-data-table__cell">
                            <center>
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-teal editar">
                                    <i class="material-icons">create</i>Editar
                                </button> 
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-red eliminar">
                                    <i class="material-icons">cancel</i>Eliminar
                                </button>
                            </center>
                        </td>
                    </tr>
                ';
        }
        return $informacion;
    }


    public static function Insertar($usuario, $contrasena, $email, $telefono)
    {
        $rol = 'cliente';
        $conexion = Conexion::getInstance()->getConexion();

        // Hash de la contraseña
        //$contrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);

        // Preparar consulta para verificar si el usuario existe
        $consulta = $conexion->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
        $consulta->bindParam(':usuario', $usuario);
        $consulta->execute();

        if ($consulta->fetch()) {
            header("location:../Paginas/error.php");
            exit;
        } else {
            // Preparar consulta para insertar
            $consulta = $conexion->prepare("INSERT INTO usuarios (usuario, clave, email, telefono, rol) VALUES (:usuario, :clave, :email, :telefono, :rol)");
            $consulta->bindParam(':usuario', $usuario);
            $consulta->bindParam(':clave', $contrasena);
            $consulta->bindParam(':email', $email);
            $consulta->bindParam(':telefono', $telefono);
            $consulta->bindParam(':rol', $rol);
            $consulta->execute();
            header("location:../Paginas/Logeo.php");
            exit;
        }
    }

    public static function InsertarUsuario($usuario, $contrasena, $email, $telefono)
    {
        $rol = 'cliente';
        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "INSERT INTO usuarios (usuario, clave, email, telefono, rol) VALUES(?, ?, ?, ?, ?)";
        $resultado = $conexion->prepare($consulta);

        $resultado->execute([$usuario, $contrasena, $email, $telefono, $rol]);
        header("location:../Paginas/Usuarios.php");
    }

    public static function ActualizarUsuario($usuario, $contrasena, $email, $telefono, $rol)
    {
        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "UPDATE usuarios SET clave=?, email=?, telefono=?, rol=? WHERE usuario=?";
        $resultado = $conexion->prepare($consulta);

        $resultado->execute([$contrasena, $email, $telefono, $rol, $usuario]);
        header("location:../Paginas/Usuarios.php");
    }

    public static function EliminarUsuario($usuario)
    {
        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "DELETE FROM usuarios WHERE usuario=?";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute([$usuario]);
        header("location:../Paginas/Usuarios.php");
    }

    public static function InsertarCompra($cliente, $subtotal, $total, $producto)
    {
        $fecha = date('Y-m-d');
        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "INSERT INTO compras (Cli_Com, Pre_Sub_Com, Pre_Tot_Com, Pro_Com, Fec_Com) VALUES(?, ?, ?, ?, ?)";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute([$cliente, $subtotal, $total, $producto, $fecha]);
        header("location:../Paginas/Compras.php");
    }

    public static function ActualizarCompra($usuario, $subtotal, $total, $producto, $codigo)
    {
        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "UPDATE compras SET Cli_Com=?, Pre_Sub_Com=?, Pre_Tot_Com=?, Pro_Com=? WHERE Cod_Com=?";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute([$usuario, $subtotal, $total, $producto, $codigo]);
        header("location:../Paginas/Compras.php");
    }

    public static function EliminarCompra($codigo)
    {
        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "DELETE FROM compras WHERE Cod_Com=?";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute([$codigo]);
        header("location:../Paginas/Compras.php");
    }

    public static function InsertarProductos($producto, $marca, $grado, $ibu, $ingrediente1, $ingrediente2, $ingrediente3, $amargo, $cuerpo, $precio, $descripcion, $imagen)
    { 
        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "INSERT INTO productos (Nom_Pro, Mar_Pro, Gra_Alc_Pro, IBU, Car_1_Pro, Car_2_Pro, Car_3_Pro, Ama_Pro, Cue_Pro, Pre_Pro, Des_Pro, Rut_Pro) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute([$producto, $marca, $grado, $ibu, $ingrediente1, $ingrediente2, $ingrediente3, $amargo, $cuerpo, $precio, $descripcion, $imagen]);
        header("location:../Paginas/Productos.php");
    }

    public static function ActualizarProductos($producto, $marca, $grado, $ibu, $ingrediente1, $ingrediente2, $ingrediente3, $amargo, $cuerpo, $precio, $descripcion, $imagen, $codigo)
    {
        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "UPDATE productos SET Nom_Pro=?, Mar_Pro=?, Gra_Alc_Pro=?, IBU=?, Car_1_Pro=?, Car_2_Pro=?, Car_3_Pro=?, Ama_Pro=?, Cue_Pro=?, Pre_Pro=?, Des_Pro=?, Rut_Pro=? WHERE Cod_Pro=?";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute([$producto, $marca, $grado, $ibu, $ingrediente1, $ingrediente2, $ingrediente3, $amargo, $cuerpo, $precio, $descripcion, $imagen, $codigo]);
        header("location:../Paginas/Productos.php");
    }

    public static function EliminarProductos($codigo)
    {
        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "DELETE FROM productos WHERE Cod_Pro=?";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute([$codigo]);
        header("location:../Paginas/Productos.php");
    }

    public static function InsertarTestimonio($usuario, $email, $motivo, $mensaje, $calificacion)
    {
        $habilitado = "Deshabilitado";

        $conexion = Conexion::getInstance()->getConexion();
        
        $consulta = "INSERT INTO testimonios (Usu_Tes, Ema_Tes, Mot_Tes, Men_Tes, Hab_Tes, Cal_Mot) VALUES(:usuario, :email, :motivo, :mensaje, :habilitado, :calificacion)";
        $resultado = $conexion->prepare($consulta);

        $resultado->bindParam(':usuario', $usuario, PDO::PARAM_STR);
        $resultado->bindParam(':email', $email, PDO::PARAM_STR);
        $resultado->bindParam(':motivo', $motivo, PDO::PARAM_STR);
        $resultado->bindParam(':mensaje', $mensaje, PDO::PARAM_STR);
        $resultado->bindParam(':habilitado', $habilitado, PDO::PARAM_STR);
        $resultado->bindParam(':calificacion', $calificacion, PDO::PARAM_INT);
        
        $resultado->execute();
        header("location:../Paginas/Contacto.php");
    }

}

?>
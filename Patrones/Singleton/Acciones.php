<?php

include_once("Conexion.php");

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
            $informacion .= '
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">' . $acum++ . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['usuario'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['clave'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['email'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['telefono'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['rol'] . '</td>
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
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Cod_Tes'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Usu_Tes'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Ema_Tet'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Mot_Tes'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Men_Tes'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Hab_Tes'] . '</td>
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
            $informacion .= '
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Cod_Com'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Cli_Com'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Pre_Sub_Com'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Pre_Tot_Com'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Pro_Com'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Fec_Com'] . '</td>
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
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Cod_Pro'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Nom_Pro'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Mar_Pro'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Gra_Alc_Pro'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['IBU'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Car_1_Pro'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Car_2_Pro'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Car_3_Pro'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Pre_Pro'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Des_Pro'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Ama_Pro'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . $respuesta['Cue_Pro'] . '</td>
                        <td class="mdl-data-table__cell--non-numeric"><img class="img-gest" src="../' . $respuesta['Rut_Pro'] . '"></img></td>
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
        $consulta = "SELECT * FROM usuarios where usuario = '$usuario'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $dato = $resultado->fetch();

        if ($dato) {
            echo "Error de Insercion";
        } else {
            $consulta = "INSERT INTO usuarios (usuario, clave, email, telefono, rol) VALUES('$usuario','$contrasena', '$email', '$telefono', '$rol')";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            echo "Insercion Realizada con Exito";
        }
    }

    public static function InsertarUsuario($usuario, $contrasena, $email, $telefono)
    {
        $rol = 'cliente';
        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "INSERT INTO usuarios (usuario, clave, email, telefono, rol) VALUES('$usuario','$contrasena', '$email', '$telefono', '$rol')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        header("location:../Paginas/Usuarios.php");
    }

    public static function ActualizarUsuario($usuario, $contrasena, $email, $telefono, $rol)
    {
        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "UPDATE usuarios SET clave='$contrasena', email='$email', telefono='$telefono', rol='$rol' WHERE usuario='$usuario'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        header("location:../Paginas/Usuarios.php");
    }

    public static function EliminarUsuaio($usuario)
    {
        $conexion= Conexion::getInstance()->getConexion();
        $consulta="DELETE FROM usuarios where usuario='$usuario'";
        $resultado=$conexion->prepare($consulta);
        $resultado->execute();
        header("location:../Paginas/Usuarios.php");
    }

    public static function InsertarCompra($cliente, $subtotal, $total, $producto)
    {
        $fecha = date('Y-m-d');
        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "INSERT INTO compras (Cli_Com, Pre_Sub_Com, Pre_Tot_Com, Pro_Com, Fec_Com) VALUES('$cliente', '$subtotal', '$total', '$producto', '$fecha')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        header("location:../Paginas/Compras.php");
    }

    public static function ActualizarCompra($usuario, $subtotal, $total, $producto, $codigo)
    {
        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "UPDATE compras SET Cli_Com='$usuario', Pre_Sub_Com='$subtotal', Pre_Tot_Com='$total', Pro_Com='$producto' WHERE Cod_Com='$codigo'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        header("location:../Paginas/Compras.php");
    }

    public static function EliminarCompra($codigo)
    {
        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "DELETE FROM compras where Cod_Com='$codigo'";
        $resultado = $conexion->prepare($consulta);
        $resultado -> execute();
        header("location:../Paginas/Compras.php");
    }

    public static function InsertarProductos($producto, $marca, $grado, $ibu, $ingrediente1, $ingrediente2, $ingrediente3, $amargo, $cuerpo, $precio, $descripcion, $imagen)
    { 
        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "INSERT INTO productos (Nom_Pro, Mar_Pro, Gra_Alc_Pro, IBU, Car_1_Pro, Car_2_Pro, Car_3_Pro, Ama_Pro, Cue_Pro, Pre_Pro, Des_Pro, Rut_Pro) VALUES('$producto', '$marca', '$grado', '$ibu', '$ingrediente1', '$ingrediente2', '$ingrediente3', '$amargo', '$cuerpo', '$precio', '$descripcion', '$imagen')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        header("location:../Paginas/Productos.php");
    }

    public static function ActualizarProductos($producto, $marca, $grado, $ibu, $ingrediente1, $ingrediente2, $ingrediente3, $amargo, $cuerpo, $precio, $descripcion, $imagen, $codigo)
    {
        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "UPDATE productos SET Nom_Pro='$producto', Mar_Pro='$marca', Gra_Alc_Pro='$grado', IBU='$ibu', Car_1_Pro='$ingrediente1', Car_2_Pro='$ingrediente2', Car_3_Pro='$ingrediente3', Ama_Pro='$amargo', Cue_Pro='$cuerpo', Pre_Pro='$precio', Des_Pro='$descripcion', Rut_Pro='$imagen' WHERE Cod_Pro='$codigo'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        header("location:../Paginas/Productos.php");
    }

    public static function EliminarProductos($codigo)
    {
        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "DELETE FROM productos where Cod_Pro='$codigo'";
        $resultado = $conexion->prepare($consulta);
        $resultado -> execute();
        header("location:../Paginas/Productos.php");
    }

    public static function InsertarTestimonio($usuario, $email, $motivo, $mensaje, $calificacion)
    {
        $habilitado = "Deshabilitado";

        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "INSERT INTO testimonios (Usu_Tes, Ema_Tes, Mot_Tes, Men_Tes, Hab_Tes, Cal_Mot) VALUES('$usuario', '$email', '$motivo', '$mensaje', '$habilitado', '$calificacion')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        header("location:../Paginas/Contacto.php");
    }

}

?>
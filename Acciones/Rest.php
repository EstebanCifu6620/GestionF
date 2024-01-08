<?php
    include_once("AccionesAdmin.php");
    session_start();

    $accion = $_SERVER['REQUEST_METHOD'];
    switch ($accion) {
        case 'POST':
            $opcion = $_POST['opcion'];

            switch ($opcion) {
                case 1:
                    if (isset($_SESSION['csrf_token']) && isset($_POST['csrf_token'])) {
                        
                        if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
                            die("Operación no permitida");
                        
                        }else{
                            $usuario = filter_input(INPUT_POST, 'usuarioI', FILTER_SANITIZE_STRING);
                            $email = filter_input(INPUT_POST, 'emailI', FILTER_VALIDATE_EMAIL);
                            $telefono = filter_input(INPUT_POST, 'telefonoI', FILTER_SANITIZE_STRING);
                            $contrasena = $_POST['claveI'];
                            Acciones::InsertarUsuario($usuario, $contrasena, $email, $telefono);
                        }
                    }
                    break;

                case 2:
                    $usuario = filter_input(INPUT_POST, 'usuario_valor', FILTER_SANITIZE_STRING);
                    $contrasena = filter_input(INPUT_POST, 'claveE', FILTER_SANITIZE_STRING);
                    $email = filter_input(INPUT_POST, 'emailE', FILTER_SANITIZE_STRING);
                    $telefono = filter_input(INPUT_POST, 'telefonoE', FILTER_SANITIZE_STRING);
                    $rol = filter_input(INPUT_POST, 'rolE', FILTER_SANITIZE_STRING);
                    Acciones::ActualizarUsuario($usuario, $contrasena, $email, $telefono, $rol);
                    break;

                case 3:
                    $usuario = filter_input(INPUT_POST, 'usuario_val', FILTER_SANITIZE_STRING);
                    Acciones::EliminarUsuaio($usuario);
                    break;

                case 4:
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
                            die("Operación no permitida");
                        }else{
                            $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
                            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                            $telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_STRING);
                            $contrasena = $_POST['contrasena'];

                            Acciones::Insertar($usuario, $contrasena, $email, $telefono);
                        }
                    }
                    break;
            
                case 5:
                    if (isset($_SESSION['csrf_token']) && isset($_POST['csrf_token'])) {
                        if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
                            die("Operación no permitida");
                        }else{
                            $cliente = filter_input(INPUT_POST, 'clienteI', FILTER_SANITIZE_STRING);
                            $subtotal = filter_input(INPUT_POST, 'subtotalI', FILTER_SANITIZE_STRING);
                            $total = filter_input(INPUT_POST, 'totalI', FILTER_SANITIZE_STRING);
                            $producto = filter_input(INPUT_POST, 'productoI', FILTER_SANITIZE_STRING);
                            Acciones::InsertarCompra($cliente, $subtotal, $total, $producto);
                        }
                    }
                    break;

                case 6:
                    $codigo = filter_input(INPUT_POST, 'codigo_valor', FILTER_SANITIZE_STRING);
                    $usuario = filter_input(INPUT_POST, 'usuarioE', FILTER_SANITIZE_STRING);
                    $subtotal = filter_input(INPUT_POST, 'subtotalE', FILTER_SANITIZE_STRING);
                    $total = filter_input(INPUT_POST, 'totalE', FILTER_SANITIZE_STRING);
                    $producto = filter_input(INPUT_POST, 'productoE', FILTER_SANITIZE_STRING);
                    Acciones::ActualizarCompra($usuario, $subtotal, $total, $producto, $codigo);
                    break;

                case 7:
                    $codigo = filter_input(INPUT_POST, 'codigo_val', FILTER_SANITIZE_STRING);
                    Acciones::EliminarCompra($codigo);
                    break;

                case 8:
                    if (isset($_SESSION['csrf_token']) && isset($_POST['csrf_token'])) {
                        if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
                            die("Operación no permitida");
                        }else{
                            $producto = filter_input(INPUT_POST, 'productoI', FILTER_SANITIZE_STRING);
                            $marca = filter_input(INPUT_POST, 'marcaI', FILTER_SANITIZE_STRING);
                            $grado = filter_input(INPUT_POST, 'gradoI', FILTER_SANITIZE_STRING);
                            $ibu = filter_input(INPUT_POST, 'ibuI', FILTER_SANITIZE_STRING);
                            $ingrediente1 = filter_input(INPUT_POST, 'ingrediente1I', FILTER_SANITIZE_STRING);
                            $ingrediente2 = filter_input(INPUT_POST, 'ingrediente2I', FILTER_SANITIZE_STRING);
                            $ingrediente3 = filter_input(INPUT_POST, 'ingrediente3I', FILTER_SANITIZE_STRING);
                            $precio = filter_input(INPUT_POST, 'precioI', FILTER_SANITIZE_STRING);
                            $descripcion = filter_input(INPUT_POST, 'descripcionI', FILTER_SANITIZE_STRING);
                            $amargo = filter_input(INPUT_POST, 'amargoI', FILTER_SANITIZE_STRING);
                            $cuerpo = filter_input(INPUT_POST, 'cuerpoI', FILTER_SANITIZE_STRING);
                            
                            $ruta = "Recursos/Imagenes/Productos/";
                            $nombreImagen = trim($_FILES['imagenI']['name']);

                            $imagen = $ruta.$nombreImagen;
                            Acciones::InsertarProductos($producto, $marca, $grado, $ibu, $ingrediente1, $ingrediente2, $ingrediente3, $amargo, $cuerpo, $precio, $descripcion, $imagen);
                        }
                    }
                    break;
    
                case 9:
                    $codigo = filter_input(INPUT_POST, 'producto_valor', FILTER_SANITIZE_STRING);
                    $producto = filter_input(INPUT_POST, 'productoE', FILTER_SANITIZE_STRING);
                    $marca = filter_input(INPUT_POST, 'marcaE', FILTER_SANITIZE_STRING);
                    $grado = filter_input(INPUT_POST, 'gradoE', FILTER_SANITIZE_STRING);
                    $ibu = filter_input(INPUT_POST, 'ibuE', FILTER_SANITIZE_STRING);
                    $ingrediente1 = filter_input(INPUT_POST, 'ingrediente1E', FILTER_SANITIZE_STRING);
                    $ingrediente2 = filter_input(INPUT_POST, 'ingrediente2E', FILTER_SANITIZE_STRING);
                    $ingrediente3 = filter_input(INPUT_POST, 'ingrediente3E', FILTER_SANITIZE_STRING);
                    $precio = filter_input(INPUT_POST, 'precioE', FILTER_SANITIZE_STRING);
                    $descripcion = filter_input(INPUT_POST, 'descripcionE', FILTER_SANITIZE_STRING);
                    $amargo = filter_input(INPUT_POST, 'amargoE', FILTER_SANITIZE_STRING);
                    $cuerpo = filter_input(INPUT_POST, 'cuerpoE', FILTER_SANITIZE_STRING);
                
                    // Manejo de imagen
                    $ruta = "Recursos/Imagenes/Productos/";
                    $nombreImagen = filter_input(INPUT_POST, 'imagenE', FILTER_SANITIZE_STRING);

                    $imagen = $ruta.$nombreImagen;
                    Acciones::ActualizarProductos($producto, $marca, $grado, $ibu, $ingrediente1, $ingrediente2, $ingrediente3, $amargo, $cuerpo, $precio, $descripcion, $imagen, $codigo);
                    break;
    
                case 10:
                    $codigo = filter_input(INPUT_POST, 'producto_val', FILTER_SANITIZE_STRING);
                    Acciones::EliminarProductos($codigo);
                    break;     
                    
                case 11:
                    if (isset($_SESSION['csrf_token']) && isset($_POST['csrf_token'])) {
                        
                        if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
                            die("Operación no permitida");
                        
                        }else{

                            $usuario = filter_input(INPUT_POST, 'usuarioI', FILTER_SANITIZE_STRING);
                            $email = filter_input(INPUT_POST, 'emailI', FILTER_SANITIZE_EMAIL);
                            $motivo = filter_input(INPUT_POST, 'motivoI', FILTER_SANITIZE_STRING);
                            $mensaje = filter_input(INPUT_POST, 'mensajeI', FILTER_SANITIZE_STRING);
                            $calificacion = filter_input(INPUT_POST, 'calificacionI', FILTER_SANITIZE_NUMBER_INT);
                            
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                echo "Error: La dirección de email proporcionada no es válida.";
                                exit;
                            }
                        
                            Acciones::insertarTestimonio($usuario, $email, $motivo, $mensaje, $calificacion);
                        }
                    } 
                    break;    

                default:
                    header("location:../Paginas/Usuarios.php");
                    break;
            }
        break;
    }
?>
<?php

    require_once("../Patrones/Singleton/Conexion.php");
    require_once("../Patrones/Command/Carrito.php");
    
    class Acciones{

        public static $total = 0;
        
        public static function Mostrar(){
        
            $conexion = Conexion::getInstance()->getConexion();
            $consulta = "SELECT * FROM productos";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $dato = $resultado->fetchAll(PDO::FETCH_ASSOC);
    
            $informacion = '';
            $nombre = "";
            $precio = 0;
            $imagen = "";
            $usuario = htmlspecialchars($_SESSION["usuario"]); // Escapar para prevenir XSS
    
            foreach ($dato as $respuesta){
                $Mar_Pro = htmlspecialchars($respuesta['Mar_Pro']);
                $Rut_Pro = htmlspecialchars($respuesta['Rut_Pro']);
                $Car_1_Pro = htmlspecialchars($respuesta['Car_1_Pro']);
                $Car_2_Pro = htmlspecialchars($respuesta['Car_2_Pro']);
                $Car_3_Pro = htmlspecialchars($respuesta['Car_3_Pro']);
                $Nom_Pro = htmlspecialchars($respuesta['Nom_Pro']);
                $Ama_Pro = htmlspecialchars($respuesta['Ama_Pro']);
                $Gra_Alc_Pro = htmlspecialchars($respuesta['Gra_Alc_Pro']);
                $Pre_Pro = htmlspecialchars($respuesta['Pre_Pro']);
                $Cod_Pro = htmlspecialchars($respuesta['Cod_Pro']);
                $IBU = htmlspecialchars($respuesta['IBU']);
                $Des_Pro = htmlspecialchars($respuesta['Des_Pro']);

                $informacion.='
                <div class="col-xl-4 col-lg-6 mt-30 beer-container in-all beer-'.$Mar_Pro.'" style="">
                    <div class="cardsStyle pp__item--3 active pt-30 pb-25">
                        <div class="section-heading mr-30 beersFilter headingBeer">
                            <span class="sub-title">'.$Mar_Pro.'</span>
                        </div>
                        <div class="pp__thumbBeers">
                            <img class="beerImages" src="../'.$Rut_Pro.'" alt="">
                        </div>
                        <div class="pp__content">
                            <div class="pp__c-top d-flex align-items-center justify-content-center">
                                <div class="pp__cat">
                                    <span class="beer-properties">'.$Car_1_Pro.' - '.$Car_2_Pro.' - '.$Car_3_Pro.' </span>
                                </div>
                            </div>
                            <h4 class="pp__title">
                                <span class="beer-title">'.$Nom_Pro.'</span>
                            </h4>
                            <div class="pp__price d-flex align-items-center justify-content-center" style="gap: 10px">
                                <div class="d-flex flex-column align-items-center mr-15">
                                    <div class="d-flex justify-content-center" style="height: 40px">
                                        <img class="bitternesImage" src="https://www.cervezaantares.com/assets/images/icons/fullBitterness.svg"/>
                                        <img class="bitternesImage" src="https://www.cervezaantares.com/assets/images/icons/fullBitterness.svg"/>
                                        <img class="bitternesImage" src="https://www.cervezaantares.com/assets/images/icons/fullBitterness.svg"/>
                                        <img class="bitternesImage" src="https://www.cervezaantares.com/assets/images/icons/fullBitterness.svg"/>
                                        <img class="bitternesImage" src="https://www.cervezaantares.com/assets/images/icons/emptyBitterness.svg"/>
                                    </div>
                                    <h6 class="label">'.$Ama_Pro.'</h6>
                                    <span class="qualities">Amargor</span>
                                </div>
                                <div class="d-flex flex-column align-items-center justify-content-between" style="height: 85px">
                                    <h6 class="beer-title" style="font-size: 33px">'.$Gra_Alc_Pro.'</h6>
                                    <span class="qualities">Alcohol</span>
                                </div>
                                <div class="d-flex flex-column align-items-center ml-15">
                                    <div class="bodyAmount">
                                        <img class="bodyImage" src="https://www.cervezaantares.com/assets/images/icons/fullBodyBeer.svg"/>
                                        <img class="bodyImage" src="https://www.cervezaantares.com/assets/images/icons/fullBodyBeer.svg"/>
                                        <img class="bodyImage" src="https://www.cervezaantares.com/assets/images/icons/fullBodyBeer.svg"/>
                                        <img class="bodyImage" src="https://www.cervezaantares.com/assets/images/icons/emptyBodyBeer.svg"/>
                                        <img class="bodyImage" src="https://www.cervezaantares.com/assets/images/icons/emptyBodyBeer.svg"/>
                                    </div>
                                    <h6 class="label">$ '.$Pre_Pro.'</h6>
                                    <span class="qualities">Precio</span>
                                </div>
                            </div>
                        </div>
                        <div class="cardOptions">
                            <div class="imgOptions">
                                <form action="'. $_SERVER['PHP_SELF'] .'" method="POST">
                                    <input type="hidden" name="producto_id" value="'.$Cod_Pro.'">
                                    <button type="submit" name="agregarcarrito" class="botonCarrito">
                                        <img src="https://www.cervezaantares.com/assets/images/icons/shop-cart.svg" style="width: 24px;"/>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal fade" id="beerModal'.$Cod_Pro.'" tabindex="-1" role="dialog" aria-labelledby="beerModalLabel" aria-hidden="true">
                    <div class="modal-dialog modalAlign" role="document" style="max-width: 604px;">
                        <div class="modal-content">
                            <div class="beer-modal-main-container">
                                <div class="fabric-modal-body" style="width: 604px; height: auto; flex-direction: row;">
                                    <div class="modalBeer">
                                        <img src="../'.$Rut_Pro.'" alt="" style="height: 163px;">
                                        <div class="d-flex mt-20">
                                            <div class="d-flex flex-column align-items-center justify-content-between mr-30">
                                                <h6 class="indicatorNumber">'.$IBU.'</h6>
                                                <span class="qualities">IBU</span>
                                            </div>
                                            <div class="d-flex flex-column align-items-center justify-content-between">
                                                <h6 class="indicatorNumber">'.$Gra_Alc_Pro.'</h6>
                                                <span class="qualities">Grados Alcohol</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="beer-modal-description">
                                        <div class="closeContainer">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="section-heading modalType mr-30">
                                            <span class="sub-title">'.$Mar_Pro.'</span>
                                        </div>
                                        <span class="beer-title mt-10" style="color: #151515;">'.$Nom_Pro.'</span>
                                        <p>
                                        '.$Des_Pro.'
                                        </p>
                                        <span class="enjoyBeer">¡Disfrutala en nuestros locales o comprala online!</span>
                                        <div class="d-flex justify-content-start mt-20">
                                            <button class="site-btn letter-btn d-flex justify-content-center" style="width: 113px"><a class="linkOption" href="https://www.vinosyspirits.com/cervezas/linea.html">COMPRAR</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ';
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    if(isset($_POST['producto_id'])){

                        // Sanitizar y validar el input del usuario
                        $producto_id = filter_input(INPUT_POST, 'producto_id', FILTER_SANITIZE_NUMBER_INT);

                        // Usar sentencias preparadas para prevenir inyección SQL
                        $consulta = "SELECT * FROM productos WHERE Cod_Pro = :producto_id";
                        $resultado = $conexion->prepare($consulta);
                        $resultado->bindValue(':producto_id', $producto_id, PDO::PARAM_INT);
                        $resultado->execute();
                        $dato = $resultado->fetch(PDO::FETCH_ASSOC);

                        if ($dato) {
                            $nombre = $dato['Nom_Pro'];
                            $precio = $dato['Pre_Pro'];
                            $imagen = $dato['Rut_Pro'];
                        }
                    }
                }
            }
            if(!empty($nombre)){
                $command = new CarritoCommand($nombre, $precio, $imagen, $usuario);   
                $command->execute();
            }
            return $informacion;
        }

        public static function Carrito(){

            $carrito = new Acciones();
    
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['borrar'])) {
                $id = filter_input(INPUT_POST, 'borrar', FILTER_SANITIZE_NUMBER_INT);
                // Asegúrate de que $id es un número válido
                if ($id !== false && $id > 0) {
                    $carrito->borrarProducto($id);
                }
            }

            $conexion = Conexion::getInstance()->getConexion();
            $usuario = $_SESSION["usuario"];
            // Utiliza consultas preparadas para evitar inyecciones SQL
            $consulta = "SELECT * FROM carrito WHERE Usu_Car = ?";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute([$usuario]);
            $r = $resultado->fetchAll();
            $filas = "";
            
            foreach ($r as $resu) {
                $precio = htmlspecialchars($resu['Pre_Car']);
                $subtotal = ($precio * 6);
                $filas .= '
                    <tr>
                        <td><img src="../' . htmlspecialchars($resu['Ima_Car']) . '"></img></td>
                        <td class="text-white">' . htmlspecialchars($resu['Pro_Car']) . '</td>
                        <td class="text-white">$ ' . htmlspecialchars($resu['Pre_Car']) . '</td>
                        <td class="text-white">6</td>
                        <td class="text-white"> <strong>$ ' . $subtotal . '</strong></td>
                        <td>
                            <form action="'. htmlspecialchars($_SERVER['PHP_SELF']) .'" method="POST">
                                <input type="hidden" name="borrar" value="'. htmlspecialchars($resu['Cod_Car']) .'">
                                <button type="submit" class="botonRemover">
                                    <img src="../Recursos/Imagenes/Logos/x.png" style="width: 24px;"/>
                                </button>
                            </form>
                        </td>
                        <td style="visibility:collapse; display:none;">' . htmlspecialchars($resu['Cod_Car']) . '</td>
                    </tr>';
                self::$total += $subtotal;
            }
            return $filas;
        }

        public static function Pago(){
            $carrito = new Acciones();
        
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['precioTotal'], $_POST['subTotal'], $_POST['csrf_token'])) {
                if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
                    // Manejar la situación cuando el token CSRF no coincide
                    die('Error de validación CSRF.');
                }
        
                $precioTotal = filter_var($_POST['precioTotal'], FILTER_VALIDATE_FLOAT);
                $subTotal = filter_var($_POST['subTotal'], FILTER_VALIDATE_FLOAT);
        
                if ($precioTotal === false || $subTotal === false) {
                    // Manejar el error
                    die('Datos inválidos.');
                }
        
                $carrito->enviar($precioTotal, $subTotal);
            }
        
            $subtotal = self::$total;
            $iva = $subtotal * 0.12;
            $precioTotal = ($subtotal + $iva);
        
            if ($precioTotal == 0) {
                return '<p>No hay productos en el carrito.</p>';
            }

            // Generar un token CSRF
            if (!isset($_SESSION['csrf_token'])) {
                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            }
        
            $pago = '
                <div id="subtotal">
                    <h3>Total en el Carrito: </h3>
                    <table>
                        <tr>
                            <td class="text-primary">Subtotal</td>
                            <td class="text-white">$ ' . htmlspecialchars($subtotal) . '</td>
                        </tr>
                        <tr>
                            <td class="text-primary">IVA</td>
                            <td class="text-white">$ ' . htmlspecialchars($iva) . '</td>
                        </tr>
                        <tr>
                            <td class="text-primary"><strong>Total</strong></td>
                            <td class="text-white"><strong>$ ' . htmlspecialchars($precioTotal) . '</strong></td>
                        </tr>
                    </table>
                    <form action="' . htmlspecialchars($_SERVER['PHP_SELF']) . '" method="POST">
                        <input type="hidden" name="precioTotal" value="' . htmlspecialchars($precioTotal) . '">
                        <input type="hidden" name="subTotal" value="' . htmlspecialchars($subtotal) . '">
                        <input type="hidden" name="csrf_token" value="' . $_SESSION['csrf_token'] . '">
                        <button type="submit" class="btn btn-primary font-weight-bold">Realizar Pedido</button>
                    </form>
                </div>
            ';
        
            return $pago;
        }

        public function borrarProducto($id)
        {
            // Asegúrate de que el ID es un número
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if ($id === false) {
                // Manejar error, ID no válido
                die("ID de producto inválido.");
            }
        
            // Verificar si el usuario está autenticado
            if (!isset($_SESSION["usuario"])) {
                die("Usuario no autenticado.");
            }
        
            $usuario = $_SESSION["usuario"];
            $conexion = Conexion::getInstance()->getConexion();
        
            // Verificar si el producto pertenece al usuario
            $consultaPermiso = "SELECT COUNT(*) FROM carrito WHERE Cod_Car = :id AND Usu_Car = :usuario";
            $resultadoPermiso = $conexion->prepare($consultaPermiso);
            $resultadoPermiso->bindParam(':id', $id, PDO::PARAM_INT);
            $resultadoPermiso->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $resultadoPermiso->execute();
            $permiso = $resultadoPermiso->fetchColumn();
        
            if ($permiso == 0) {
                // El usuario no tiene permiso para borrar este producto
                die("No tienes permiso para realizar esta acción.");
            }
        
            // El usuario tiene permiso, proceder con el borrado
            $consulta3 = "DELETE FROM carrito WHERE Cod_Car = ?";
            $resultado3 = $conexion->prepare($consulta3);
            $resultado3->execute([$id]);
        
            header("Location: ../Paginas/Servicio.php");
            exit();
        }
        
        public static function cantidadProductos()
        {
            // Verificar si el usuario está autenticado
            if (!isset($_SESSION["usuario"])) {
                // Manejar la situación cuando no hay una sesión activa
                die("Usuario no autenticado.");
            }else{

                $usuario = $_SESSION["usuario"];
                $conexion = Conexion::getInstance()->getConexion();

                $consulta = "SELECT COUNT(*) as total FROM carrito WHERE Usu_Car = :usuario";
                $resultado = $conexion->prepare($consulta);
                $resultado->bindParam(':usuario', $usuario, PDO::PARAM_STR);
                $resultado->execute();
                $row = $resultado->fetch(PDO::FETCH_ASSOC);
                $cantidadProductos = $row['total'];
            }

            return $cantidadProductos;
        }


        public function enviar($total, $subtotal){

            // Valida y sanea las entradas
            $total = filter_var($total, FILTER_VALIDATE_FLOAT);
            $subtotal = filter_var($subtotal, FILTER_VALIDATE_FLOAT);
            if ($total === false || $subtotal === false) {
                die("Valores de total o subtotal no válidos.");
            }

            $conexion = Conexion::getInstance()->getConexion();
            $fecha = date('Y-m-d H:i:s');
            if (!isset($_SESSION["usuario"])) {
                die("Usuario no autenticado.");
            }
            $usuario = $_SESSION["usuario"];

            // Obtener los productos del carrito de forma segura
            $consultaCarrito = "SELECT Pro_Car FROM carrito WHERE Usu_Car = :usuario";
            $resultadoCarrito = $conexion->prepare($consultaCarrito);
            $resultadoCarrito->bindParam(':usuario', $usuario, PDO::PARAM_STR);
            $resultadoCarrito->execute();
            $productosCarrito = $resultadoCarrito->fetchAll(PDO::FETCH_ASSOC);

            //Crear un array para almacenar los nombres de los productos
            $productosComprados = [];
            $lista = '';
            foreach ($productosCarrito as $producto) {
                $productosComprados[] = $producto['Pro_Car'];
                $lista .= htmlspecialchars($producto['Pro_Car']) . ', ';
            }

            //Serializar el array en formato JSON
            $productosJSON = json_encode($productosComprados);

            // Insertar de forma segura en la tabla de compras
            $consulta1 = "INSERT INTO compras (Cli_Com, Pre_Tot_Com, Fec_Com, Pre_Sub_Com, Pro_Com) VALUES (:usuario, :total, :fecha, :subtotal, :productos)";
            $resultado1 = $conexion->prepare($consulta1);
            $resultado1->bindParam(':usuario', $usuario);
            $resultado1->bindParam(':total', $total);
            $resultado1->bindParam(':fecha', $fecha);
            $resultado1->bindParam(':subtotal', $subtotal);
            $resultado1->bindParam(':productos', $productosJSON);
            $resultado1->execute();

            //Contactar en otra pestaña mediante Whatsapp con el admin
            $texto = urlencode("Hola Erick López Pillajo, quiero comprar un six pack de ".$lista." el total es $".$total);
            $url = "https://wa.me/593985184705?text=$texto";
            //echo "<script>window.open(`$url`, '_blank');</script>";
            header("Location: $url");
            
            // Eliminar los productos del carrito de forma segura
            $eliminar = "DELETE FROM carrito WHERE Usu_Car = :usuario";
            $resultado2 = $conexion->prepare($eliminar);
            $resultado2->bindParam(':usuario', $usuario);
            $resultado2->execute();
            
            //header("Location: ../Paginas/Servicio.php");
            exit();
            
        }
    }
?>
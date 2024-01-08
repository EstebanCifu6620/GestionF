<?php
include_once("Plantilla.php");
include("../Acciones/AccionesAdmin.php");

class Compras extends Plantilla
{
    public function crearHeader()
    {
        echo '
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-drawer mdl-layout--fixed-header is-small-screen">
            <header class="mdl-layout__header">
                <div class="mdl-layout__header-row">
                    <div class="mdl-layout-spacer"></div>
            
                    <div class="avatar-dropdown" id="icon">
                        <span class="nombre-usuario">'.$_SESSION['usuario'].'</span>
                        <img class="perfil-usuario"src="../Recursos/Imagenes/Logos/user.png">
                    </div>
                    <!-- Account dropdawn-->
                    <ul class="mdl-menu mdl-list mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect mdl-shadow--2dp account-dropdown"
                        for="icon">
                        <li class="mdl-list__item mdl-list__item--two-line">
                            <span class="mdl-list__item-primary-content">
                                <span class="material-icons mdl-list__item-avatar"></span>
                                <span>'.$_SESSION['usuario'].'</span>
                                <span class="mdl-list__item-sub-title">'.$_SESSION['correo'].'</span>
                            </span>
                        </li>
                        <li class="list__item--border-top"></li>
                        <a href="cerrar.php">
                            <li class="mdl-menu__item mdl-list__item">
                                <span class="mdl-list__item-primary-content">
                                    <i class="material-icons mdl-list__item-icon text-color--secondary">exit_to_app</i>
                                    Cerrar Sesión
                                </span>
                            </li>
                        </a>
                    </ul>

                </div>
            </header>

            <div class="mdl-layout__drawer">
                <header>
                    <img class="navlogo" src="../Recursos/Imagenes/Logos/blanco.png">
                </header>
                <div class="scroll__wrapper" id="scroll__wrapper">
                    <div class="scroller" id="scroller">
                        <div class="scroll__container" id="scroll__container">
                            <nav class="mdl-navigation">
                                <a class="mdl-navigation__link" href="../Admin.php">
                                    <i class="material-icons" role="presentation">dashboard</i>
                                    Principal
                                </a>
                                <a class="mdl-navigation__link" href="Cuenta.php">
                                    <i class="material-icons" role="presentation">person</i>
                                    Cuenta
                                </a>
                                <div class="sub-navigation">
                                    <a class="mdl-navigation__link mdl-navigation__link--current" >
                                        <i class="material-icons">pages</i>
                                        Paginas
                                        <i class="material-icons" >keyboard_arrow_down</i>
                                    </a>
                                    <div class="mdl-navigation">
                                        <a class="mdl-navigation__link" href="Usuarios.php">
                                            Usuarios
                                        </a>
                                        <a class="mdl-navigation__link" href="Productos.php">
                                            Productos
                                        </a>
                                        <a class="mdl-navigation__link mdl-navigation__link--current" href="Compras.php">
                                            Compras
                                        </a>
                                    </div>
                                </div>
                                <div class="mdl-layout-spacer"></div>
                                <hr>
                            </nav>
                        </div>
                    </div>
                    <div class="scroller__bar" id="scroller__bar"></div>
                </div>
            </div>
        ';
    }
    public function crearMain()
    {
        echo '
        
            <main class="mdl-layout__content ">
                <br>
                <div class="mdl-grid ui-tables">
                    <div class="mdl-cell mdl-cell--10-col-desktop mdl-cell--10-col-tablet mdl-cell--4-col-phone">
                        <div class="mdl-card mdl-shadow--1dp">
                            <div class="mdl-card__title">
                                <h1 class="mdl-card__title-text">Tabla de Comprass&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
                                <button class="mdl-button button--colored-teal" id="agregar">
                                    <i class="material-icons">add_box</i>
                                    Agregar
                                </button>     
                            </div>
                            <div class="mdl-card__supporting-text no-padding">
                                <table class="mdl-data-table mdl-js-data-table" id="datatable_users">
                                    <thead>
                                        <tr>
                                            <th class="mdl-data-table__select">ID</th>
                                            <th class="mdl-data-table__cell--non-numeric">CLIENTE</th>
                                            <th class="mdl-data-table__cell--non-numeric">SUBTOTAL</th>
                                            <th class="mdl-data-table__cell--non-numeric">TOTAL</th>
                                            <th class="mdl-data-table__cell--non-numeric">PRODUCTOS</th>
                                            <th class="mdl-data-table__cell--non-numeric">FECHA</th>
                                            <th class="mdl-data-table__select">ACCION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        '.Acciones::MostrarCompras().'
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <br><br>
            </main>
        </div>
        ';    
    }
    public function crearFooter()
    {
        $conexion = Conexion::getInstance()->getConexion();

        function cargarProductos($conexion) {
            $htmlOptions = '';
            $query = "SELECT Cod_Pro, Nom_Pro, Pre_Pro FROM productos";
            $stmt = $conexion->prepare($query);
            $stmt->execute();

            while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $htmlOptions .= "<option value='".htmlspecialchars($fila['Nom_Pro'])."' data-precio='".$fila['Pre_Pro']."'>".htmlspecialchars($fila['Nom_Pro'])."</option>";
            }
            return $htmlOptions;
        }
        $productosOptions = cargarProductos($conexion);
        
        function cargarClientes($conexion) {
            $htmlOptions = '';
            $query = "SELECT usuario FROM usuarios";
            $stmt = $conexion->prepare($query);
            $stmt->execute();
        
            while($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $htmlOptions .= "<option value='" . htmlspecialchars($fila['usuario']) . "'>" . htmlspecialchars($fila['usuario']) . "</option>";
            }
            return $htmlOptions;
        }
        $clientesOptions = cargarClientes($conexion);
    
        echo '
            <!-- MODAL -->
            <div class="modal fade" id="modalCrudEliminar" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="modal-register-label">Eliminar Compra</h3>
                            <p class="modal">Edite los datos de la Compra:</p>
                            <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div> 
                        <form id="formBorrar">
                            <div class="modal-body">     
                                <p class="text-white contenido">¿Está seguro de que desea eliminar la Compra?</p>
                                <p class="text-danger"><small>Esta acción no se puede deshacer.</small></p>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-warning" data-bs-dismiss="modal" aria-label="Close" value="Cancelar" id="cancelButton">
                                <input type="submit" class="btn btn-danger" value=" Eliminar Compra ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.min.js"></script>
            <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script>
                $(document).ready(function () {
                    let confirmDelete = false; 

                    $(document).on("click", ".editar", function ()  {
                        fila = $(this).closest("tr");
                        
                        codigo_valor = fila.find("td:eq(0)").text();
                        cliente_valor = fila.find("td:eq(1)").text();
                        subtotal_valor = fila.find("td:eq(2)").text();
                        total_valor = fila.find("td:eq(3)").text();
                        producto_valor = fila.find("td:eq(4)").text();

                        $("#usuarioE").val(cliente_valor);
                        $("#subtotalE").val(subtotal_valor);
                        $("#totalE").val(total_valor);
                        $("#productoE").val(producto_valor);

                        $("#modalCrud").modal("show");
                    });

                    $(document).on("click", ".eliminar", function ()  {
                        fila = $(this).closest("tr");
                        
                        codigo_val= fila.find("td:eq(0)").text();
                        usuario_val= fila.find("td:eq(1)").text();
                        
                        $("#modalCrudEliminar").modal("show");
                        $(".contenido").text("¿Está seguro de que desea eliminar la compra del Usuario: " + usuario_val + "?");
                    
                        confirmDelete = true;
                    });

                    // Manejador de clic en el botón "Cancelar"
                    $(document).on("click", "#cancelButton", function () {
                        confirmDelete = false; // Desactivar la confirmación de eliminación
                    });

                    // Manejador del envío del formulario de eliminación
                    $("#formBorrar").submit(function (e) {
                        if (confirmDelete) {
                            codigo_val;
                            opcion = 7;
                            $.ajax({
                                url: "../Acciones/Rest.php",
                                type: "POST",
                                data: { codigo_val: codigo_val, opcion: opcion },
                                success: function (resultado) {
                                    window.location.href = "../Paginas/Compras.php";
                                }
                            });
                        }
                        $("#modalCrudEliminar").modal("hide"); // Ocultar el modal de eliminación
                        confirmDelete = false; // Restablecer la confirmación de eliminación
                        e.preventDefault(); // Evitar la acción predeterminada del formulario
                    });


                    $("#formEditar").submit(function (e) {
                        e.preventDefault(); 
                        codigo_valor;
                        usuarioE = $("#usuarioE").val();
                        subtotalE = $("#subtotalE").val();
                        totalE = $("#totalE").val();
                        productoE = $("#productoE").val();

                        opcion=6;
                        $.ajax({
                            url: "../Acciones/Rest.php",
                            type: "POST",
                            data: {
                                usuarioE : usuarioE , subtotalE: subtotalE, totalE: totalE, productoE: productoE, codigo_valor: codigo_valor, opcion:opcion
                            },
                            success: function (resultado) {
                                window.location.href = "../Paginas/Compras.php";
                            }
                        });
                    });
                });
            </script>
            
            <div class="modal fade" id="modalCrud" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="modal-register-label">Editar Compra</h3>
                            <p class="modal">Edite los datos de la Compra:</p>
                            <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div> 
                        <div class="modal-body">
                            <form role="form" id="formEditar" class="registration-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-first-name">Usuario: </label>
                                    <input type="text" name="usuarioE"  class="form-first-name form-control" id="usuarioE" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="sr-only" for="form-first-name">SubTotal: </label>
                                    <input type="text" name="subtotalE"  class="form-first-name form-control" id="subtotalE" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="sr-only" for="form-last-name">Total: </label>
                                    <input type="text" name="totalE"  class="form-last-name form-control" id="totalE" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="sr-only" for="form-email">Productos: </label>
                                    <input type="text" name="productoE" class="form-email form-control" id="productoE" required>
                                </div>
                                <br>
                                <div class="modal-footer">
                            <input type="button" class="btn btn-warning" data-bs-dismiss="modal" aria-label="Close" value=" Cancelar ">
                            <input type="submit" class="btn btn-success" value=" Editar Compra ">
                        </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalCrudAgregar" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="modal-register-label">Agregar Compra</h3>
                            <p class="modal">Ingrese los datos de la Compra:</p>
                            <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div> 
                        <div class="modal-body">
                            <form role="form" action="../Acciones/Rest.php" method="post" class="registration-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-first-name">Cliente:</label>
                                    <select name="clienteI" class="form-control" id="cliente" required>
                                        <option value="">Seleccione un cliente...</option>
                                        '.$clientesOptions.'
                                    </select>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="sr-only" for="producto">Producto: </label>
                                    <select name="productoI" class="form-control" id="producto" required onchange="actualizarPrecios()">
                                        <option value="">Seleccione un producto...</option>
                                        '.$productosOptions.'
                                    </select>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="sr-only" for="subtotal">Subtotal: </label>
                                    <input type="number" name="subtotalI" placeholder="Subtotal..." class="form-control" id="subtotal" min="1" step="0.01" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="sr-only" for="total">Total: </label>
                                    <input type="number" name="totalI" placeholder="Total..." class="form-control" id="total" min="1" step="0.01" required>
                                </div>
                                <br>
                                <input type="hidden" name="opcion" value="5">
                                <input type="hidden" name="csrf_token" value="'.$_SESSION['csrf_token'].'">
                                <div class="modal-footer">
                                <input type="button" class="btn btn-warning" data-bs-dismiss="modal" aria-label="Close" value=" Cancelar ">
                                <input type="submit" class="btn btn-success" value=" Agregar Compra ">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function actualizarPrecios() {
                    var selectProducto = document.getElementById("producto");
                    var precioBase = selectProducto.options[selectProducto.selectedIndex].getAttribute("data-precio");
                    var subtotalInput = document.getElementById("subtotal");
                    var totalInput = document.getElementById("total");

                    precioBase = parseFloat(precioBase * 6);
                    var iva = precioBase * 0.12;
                    var precioFinal = precioBase + iva;
                
                    subtotalInput.value = precioBase.toFixed(2);
                    totalInput.value = precioFinal.toFixed(2); // precio base + IVA
                }
            </script>
            <script>
            
                document.getElementById("formAgregarUsuario").addEventListener("submit", function (e) {
                    const usuarioInput = document.getElementById("usuario");
                    const claveInput = document.getElementById("clave");
                    const emailInput = document.getElementById("email");
                    const telefonoInput = document.getElementById("telefono");

                    if (!usuarioInput.value || !claveInput.value || !emailInput.value || !telefonoInput.value) {
                        e.preventDefault();
                        alert("Por favor, complete todos los campos.");
                    }
                });
            </script>
        ';
    }
}
?>

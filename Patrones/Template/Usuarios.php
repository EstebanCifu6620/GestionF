<?php
include_once("Plantilla.php");
include("../Acciones/AccionesAdmin.php");

class Usuarios extends Plantilla
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
                                        Gestión
                                        <i class="material-icons" >keyboard_arrow_down</i>
                                    </a>
                                    <div class="mdl-navigation">
                                        <a class="mdl-navigation__link mdl-navigation__link--current" href="Usuarios.php">
                                            Usuarios
                                        </a>
                                        <a class="mdl-navigation__link" href="Productos.php">
                                            Productos
                                        </a>
                                        <a class="mdl-navigation__link" href="Compras.php">
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
                                <h1 class="mdl-card__title-text">Tabla de Usuarioss&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
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
                                            <th class="mdl-data-table__cell--non-numeric">USUARIO</th>
                                            <th class="mdl-data-table__cell--non-numeric">CLAVE</th>
                                            <th class="mdl-data-table__cell--non-numeric">CORREO</th>
                                            <th class="mdl-data-table__cell--non-numeric">TELEFONO</th>
                                            <th class="mdl-data-table__cell--non-numeric">ROL</th>
                                            <th class="mdl-data-table__select">ACCION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        '.Acciones::MostrarUsuarios().'
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
        echo '
            <!-- MODAL -->
            <div class="modal fade" id="modalCrudEliminar" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="modal-register-label">Eliminar Usuario</h3>
                            <p class="modal">Edite los datos del Usuario:</p>
                            <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div> 
                        <form id="formBorrar">
                            <div class="modal-body">     
                                <p class="text-white contenido">¿Está seguro de que desea eliminar el Usuario?</p>
                                <p class="text-danger"><small>Esta acción no se puede deshacer.</small></p>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-warning" data-bs-dismiss="modal" aria-label="Close" value="Cancelar" id="cancelButton">
                                <input type="submit" class="btn btn-danger" value=" Eliminar Usuario ">
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
                        
                        usuario_valor = fila.find("td:eq(1)").text();
                        clave_valor = fila.find("td:eq(2)").text();
                        email_valor = fila.find("td:eq(3)").text();
                        telefono_valor = fila.find("td:eq(4)").text();
                        rol_valor = fila.find("td:eq(5)").text();


                        $("#claveE").val(clave_valor);
                        $("#emailE").val(email_valor);
                        $("#telefonoE").val(telefono_valor);
                        $("#rolE").val(rol_valor);
                        $("#modalCrud").modal("show");
                    });

                    $(document).on("click", ".eliminar", function ()  {
                        fila = $(this).closest("tr");
                        
                        usuario_val= fila.find("td:eq(1)").text();
                        
                        $("#modalCrudEliminar").modal("show");
                        $(".contenido").text("¿Está seguro de que desea eliminar el Usuario: " + usuario_val + "?");
                        
                        confirmDelete = true;
                    });

                    // Manejador de clic en el botón "Cancelar"
                    $(document).on("click", "#cancelButton", function () {
                        confirmDelete = false; // Desactivar la confirmación de eliminación
                    });

                    /*
                    $("#formBorrar").click(function () {
                        usuario_val;
                        opcion = 3;
                        $.ajax({
                            url: "../Acciones/Rest.php",
                            type: "POST",
                            data: { usuario_val: usuario_val, opcion: opcion },
                            success: function (resultado) {
                                window.location.href = "../Paginas/Usuarios.php";
                            }
                        });
                    });
                    */

                    // Manejador del envío del formulario de eliminación
                    $("#formBorrar").submit(function (e) {
                        if (confirmDelete) {
                            usuario_val;
                            opcion = 3;
                            $.ajax({
                                url: "../Acciones/Rest.php",
                                type: "POST",
                                data: { usuario_val: usuario_val, opcion: opcion },
                                success: function (resultado) {
                                    window.location.href = "../Paginas/Usuarios.php";
                                }
                            });
                        }
                        $("#modalCrudEliminar").modal("hide"); // Ocultar el modal de eliminación
                        confirmDelete = false; // Restablecer la confirmación de eliminación
                        e.preventDefault(); // Evitar la acción predeterminada del formulario
                    });

                    $("#formEditar").submit(function (e) {
                        e.preventDefault(); 
                        usuario_valor;
                        claveE = $("#claveE").val();
                        emailE = $("#emailE").val();
                        telefonoE = $("#telefonoE").val();
                        rolE = $("#rolE").val();

                        opcion=2;
                        $.ajax({
                            url: "../Acciones/Rest.php",
                            type: "POST",
                            data: {
                                claveE : claveE , emailE: emailE, telefonoE: telefonoE, rolE: rolE, usuario_valor: usuario_valor, opcion:opcion
                            },
                            success: function (resultado) {
                                window.location.href = "../Paginas/Usuarios.php";
                            }
                        });
                    });
                });
            </script>
            
            <div class="modal fade" id="modalCrud" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="modal-register-label">Editar Usuario</h3>
                            <p class="modal">Edite los datos del Usuario:</p>
                            <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div> 
                        <div class="modal-body">
                            <form role="form" id="formEditar" class="registration-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-first-name">Clave: </label>
                                    <input type="text" name="claveE"  class="form-first-name form-control" id="claveE" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="sr-only" for="form-last-name">Email: </label>
                                    <input type="email" name="emailE"  class="form-last-name form-control" id="emailE" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="sr-only" for="form-email">Teléfono: </label>
                                    <input type="tel" name="telefonoE" class="form-email form-control" id="telefonoE" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="sr-only" for="form-email">Rol: </label>
                                    <input type="text" name="rolE" class="form-email form-control" id="rolE" required>
                                </div>
                                <br>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-warning" data-bs-dismiss="modal" aria-label="Close" value=" Cancelar ">
                                    <input type="submit" class="btn btn-success" value=" Editar Usuario ">
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
                            <h3 class="modal-title" id="modal-register-label">Agregar Usuario</h3>
                            <p class="modal">Ingrese los datos del Usuario:</p>
                            <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div> 
                        <div class="modal-body">
                            <form role="form" action="../Acciones/Rest.php" method="post" class="registration-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-first-name">Usuario:</label>
                                    <input type="text" name="usuarioI" placeholder="Usuario..." class="form-first-name form-control" id="usuario" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="sr-only" for="form-first-name">Clave: </label>
                                    <input type="text" name="claveI" placeholder="Clave..." class="form-first-name form-control" id="clave" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="sr-only" for="form-last-name">Email: </label>
                                    <input type="email" name="emailI" placeholder="Email..." class="form-last-name form-control" id="email" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="sr-only" for="form-email">Teléfono: </label>
                                    <input type="tel" name="telefonoI" placeholder="Teléfono..." class="form-email form-control" id="telefono" required>
                                    <input type="hidden" name="opcion" value="1">
                                    <input type="hidden" name="csrf_token" value="'.$_SESSION['csrf_token'].'">
                                    </div>
                                <br>


                                <div class="modal-footer">
                                    <input type="button" class="btn btn-warning" data-bs-dismiss="modal" aria-label="Close" value=" Cancelar ">
                                    <input type="submit" class="btn btn-success" value=" Agregar Usuario ">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

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

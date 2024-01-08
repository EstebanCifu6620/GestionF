<?php
include_once("Plantilla.php");
include_once("Patrones/Singleton/Conexion.php");

class Admin extends Plantilla
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
                        <img class="perfil-usuario"src="Recursos/Imagenes/Logos/user.png">
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
                        <a href="Paginas/cerrar.php">
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
                    <img class="navlogo" src="Recursos/Imagenes/Logos/blanco.png">
                </header>
                <div class="scroll__wrapper" id="scroll__wrapper">
                    <div class="scroller" id="scroller">
                        <div class="scroll__container" id="scroll__container">
                            <nav class="mdl-navigation">
                                <a class="mdl-navigation__link mdl-navigation__link--current" href="Admin.php">
                                    <i class="material-icons" role="presentation">dashboard</i>
                                    Principal
                                </a>
                                <a class="mdl-navigation__link" href="Paginas/Cuenta.php">
                                    <i class="material-icons" role="presentation">person</i>
                                    Cuenta
                                </a>
                                <div class="sub-navigation">
                                    <a class="mdl-navigation__link">
                                        <i class="material-icons">pages</i>
                                        Gestión
                                        <i class="material-icons" >keyboard_arrow_down</i>
                                    </a>
                                    <div class="mdl-navigation">
                                        <a class="mdl-navigation__link" href="Paginas/Usuarios.php">
                                            Usuarios
                                        </a>
                                        <a class="mdl-navigation__link" href="Paginas/Productos.php">
                                            Productos
                                        </a>
                                        <a class="mdl-navigation__link" href="Paginas/Compras.php">
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
        $testimonios = $this -> MostrarTestimonios();
        echo '   
            <main class="mdl-layout__content">
                <div class="mdl-grid mdl-grid--no-spacing dashboard">

                    <div class="mdl-grid mdl-cell mdl-cell--9-col-desktop mdl-cell--12-col-tablet mdl-cell--4-col-phone mdl-cell--top">
                        <!-- Pie chart-->
                        <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                            <div class="mdl-card mdl-shadow--2dp pie-chart">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text">Soporte</h2>
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <div class="pie-chart__container">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="result mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone fondo-clima"></div>

                        <!-- Trending widget-->
                        <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--4-col-tablet mdl-cell--2-col-phone">
                            <div class="mdl-card mdl-shadow--2dp trending">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text">Información</h2>
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <ul class="mdl-list">
                                        <li class="mdl-list__item">
                                            <span class="mdl-list__item-primary-content list__item-text"># Usuarios</span>
                                            <span class="mdl-list__item-secondary-content">
                                                <i class="material-icons trending__arrow-up" role="presentation">&#xE5C7</i>
                                            </span>
                                            <span class="mdl-list__item-secondary-content trending__percent"></span>
                                        </li>
                                        <li class="mdl-list__item list__item--border-top">
                                            <span class="mdl-list__item-primary-content list__item-text"># Productos</span>
                                            <span class="mdl-list__item-secondary-content">
                                                <i class="material-icons trending__arrow-up" role="presentation">&#xE5C7</i>
                                            </span>
                                            <span class="mdl-list__item-secondary-content trending__percent"></span>
                                        </li>
                                        <li class="mdl-list__item list__item--border-top">
                                            <span class="mdl-list__item-primary-content list__item-text "># Compras</span>
                                            <span class="mdl-list__item-secondary-content">
                                                <i class="material-icons trending__arrow-up" role="presentation">&#xE5C7</i>
                                            </span>
                                            <span class="mdl-list__item-secondary-content trending__percent"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- ToDo_widget-->
                        <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--6-col-tablet mdl-cell--2-col-phone">
                            <div class="mdl-card mdl-shadow--2dp todo">
                                <div class="mdl-card__title">
                                    <h2 class="mdl-card__title-text">Lista Actividades</h2>
                                </div>
                                <div class="mdl-card__supporting-text">
                                    <ul class="mdl-list">

                                    </ul>
                                </div>
                                <div class="mdl-card__actions">
                                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect">Eliminar Actividad</button>
                                    <button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--fab mdl-shadow--8dp mdl-button--colored ">
                                        <i class="material-icons mdl-js-ripple-effect">add</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mdl-grid ui-tables">
                    <div class="mdl-cell mdl-cell--10-col-desktop mdl-cell--10-col-tablet mdl-cell--4-col-phone">
                        <div class="mdl-card mdl-shadow--1dp">
                            <div class="mdl-card__title">
                                <h1 class="mdl-card__title-text">Tabla de Testimonios&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
                            </div>
                            <div class="mdl-card__supporting-text no-padding">
                                <table class="mdl-data-table mdl-js-data-table" id="datatable_users">
                                    <thead>
                                        <tr>
                                            <th class="mdl-data-table__select">ID</th>
                                            <th class="mdl-data-table__cell--non-numeric">USUARIO</th>
                                            <th class="mdl-data-table__cell--non-numeric">Email</th>
                                            <th class="mdl-data-table__cell--non-numeric">Motivo</th>
                                            <th class="mdl-data-table__cell--non-numeric">Mensaje</th>
                                            <th class="mdl-data-table__cell--non-numeric">CALIFICACION</th>
                                            <th class="mdl-data-table__cell--non-numeric">Habilitado</th>
                                            <th class="mdl-data-table__select">ACCION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        '.$testimonios.'
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
        </div>
        ';   
        
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["opcion"])) {
            $opcion = $_POST["opcion"];
            switch ($opcion) {
                case 1:
                    $habilitado=$_POST['habilitadoE'];
                    $codigo=$_POST['codigo_valor'];

                    $conexion = Conexion::getInstance()->getConexion();
                    $consulta = "UPDATE testimonios SET Hab_Tes='$habilitado' WHERE Cod_Tes='$codigo'";
                    $resultado = $conexion->prepare($consulta);
                    $resultado->execute();
                    header("location:Admin.php");
                    break;
                case 2:            
                
                    $codigo = $_POST['codigo_val'];
                    
                    $conexion = Conexion::getInstance()->getConexion();
                    $consulta = "DELETE FROM testimonios WHERE Cod_Tes = :codigo";
                    $resultado = $conexion->prepare($consulta);
                    $resultado->bindParam(':codigo', $codigo, PDO::PARAM_STR);
                    $resultado->execute();
                    
                    header("Location: Admin.php");
                    
                    break;
            }
        }

    }
    public function crearFooter()
    {
        echo '

        <!-- MODAL -->
            <div class="modal fade" id="modalCrudEliminar" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="modal-register-label">Eliminar Testimonio</h3>
                            <p class="modal">Edite los datos del Testimonio:</p>
                            <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div> 
                        <form id="formBorrar">
                            <div class="modal-body">     
                                <p class="text-white contenido">¿Está seguro de que desea eliminar el Comentario?</p>
                                <p class="text-danger"><small>Esta acción no se puede deshacer.</small></p>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-warning" data-bs-dismiss="modal" aria-label="Close" value="Cancelar" id="cancelButton">
                                <input type="submit" class="btn btn-danger" value=" Eliminar Testimonio ">
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
                    confirmDelete = false; 

                    $(document).on("click", ".editar", function ()  {
                        fila = $(this).closest("tr");
                        
                        codigo_valor = encodeURIComponent(fila.find("td:eq(0)").text());
                        habilitado_valor = encodeURIComponent(fila.find("td:eq(5)").text());
                        
                        $("#habilitadoE").val(habilitado_valor);

                        $("#modalCrud").modal("show");
                    });

                    $(document).on("click", ".eliminar", function ()  {
                        fila = $(this).closest("tr");
                        
                        codigo_val = encodeURIComponent(fila.find("td:eq(0)").text());
                        
                        $("#modalCrudEliminar").modal("show");
                        $(".contenido").text("¿Está seguro de que desea eliminar el Comentario: " + codigo_val + "?");
                        
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
                            opcion = 2;

                            $.ajax({
                                url: "",
                                type: "POST",
                                data: { codigo_val: codigo_val, opcion: opcion},
                                success: function (resultado) {
                                    window.location.href = "Admin.php";
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
                        habilitadoE = $("#habilitadoE").val();

                        opcion=1;
                        $.ajax({
                            url: "",
                            type: "POST",
                            data: {
                                habilitadoE : habilitadoE , codigo_valor: codigo_valor, opcion: opcion
                            },
                            success: function (resultado) {
                                window.location.href = "Admin.php";
                            }
                        });
                    });
                });
            </script>
            
            <div class="modal fade" id="modalCrud" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="modal-register-label">Editar Testimonio</h3>
                            <p class="modal">Edite los datos del Usuario:</p>
                            <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div> 
                        <div class="modal-body">
                            <form role="form" id="formEditar" class="registration-form">
                                <div class="form-group">
                                    <label class="sr-only" for="amargoI">Habilitación Comentario:</label>
                                    <select name="habilitadoE" class="form-control" id="habilitadoE">
                                        <option value="" disabled selected>Selecciona el tipo</option>
                                        <option value="Habilitado">Habilitado</option>
                                        <option value="Deshabilitado">Deshabilitado</option>
                                    </select>
                                </div>
                                <br>
                                <div class="modal-footer">
                                    <input type="button" class="btn btn-warning" data-bs-dismiss="modal" aria-label="Close" value=" Cancelar ">
                                    <input type="submit" class="btn btn-success" value=" Editar Testimonio ">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }

    public function MostrarTestimonios()
    {
        $conexion = Conexion::getInstance()->getConexion();
        $consulta = "SELECT * FROM testimonios";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

        $informacion = '';

        foreach ($datos as $respuesta) {
            $informacion .= '
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Cod_Tes']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Usu_Tes']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Ema_Tes']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Mot_Tes']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Men_Tes']) . '</td>
                        <td class="mdl-data-table__cell--non-numeric">' . htmlspecialchars($respuesta['Cal_Mot']) . '</td>
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

}

?>

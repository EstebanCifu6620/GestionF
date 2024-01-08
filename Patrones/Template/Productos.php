<?php
include_once("Plantilla.php");
include("../Acciones/AccionesAdmin.php");

class Productos extends Plantilla
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
                                        <a class="mdl-navigation__link" href="Usuarios.php">
                                            Usuarios
                                        </a>
                                        <a class="mdl-navigation__link mdl-navigation__link--current" href="Productos.php">
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
                    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                        <div class="mdl-card mdl-shadow--1dp">
                            <div class="mdl-card__title">
                                <h1 class="mdl-card__title-text">Tabla de Productoss&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>
                                    <button class="mdl-button button--colored-teal" id="agregar">
                                        <i class="material-icons">add_box</i>
                                        Agregar
                                    </button> 
                            </div>
                            <div class="mdl-card__supporting-text no-padding">
                                <table class="mdl-data-table mdl-js-data-table" id="datatable_users">
                                    <thead>
                                        <tr>
                                            <th class="mdl-data-table__cell--non-numeric">ID</th>
                                            <th class="mdl-data-table__cell--non-numeric">PRODUCTO</th>
                                            <th class="mdl-data-table__cell--non-numeric">MARCA</th>
                                            <th class="mdl-data-table__cell--non-numeric">G._ALCOHOL</th>
                                            <th class="mdl-data-table__cell--non-numeric">IBU</th>
                                            <th class="mdl-data-table__cell--non-numeric">INGREDIENTE_1</th>
                                            <th class="mdl-data-table__cell--non-numeric">INGREDIENTE_2</th>
                                            <th class="mdl-data-table__cell--non-numeric">INGREDIENTE_3</th>
                                            <th class="mdl-data-table__cell--non-numeric">PRECIO</th>
                                            <th class="mdl-data-table__cell--non-numeric">DESCRIPCIÓN</th>
                                            <th class="mdl-data-table__cell--non-numeric">AMARGO</th>
                                            <th class="mdl-data-table__cell--non-numeric">CUERPO</th>                                            
                                            <th class="mdl-data-table__cell--non-numeric">IMAGEN</th>
                                            <th class="mdl-data-table__select">ACCION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        '.Acciones::MostrarProductos().'
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

        <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.min.js"></script>
        <script type="text/javascript" src="https://www.jeasyui.com/easyui/jquery.easyui.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                let confirmDelete = false; 

                $(document).on("click", ".editar", function ()  {
                    fila = $(this).closest("tr");
                    
                    producto_valor = fila.find("td:eq(0)").text();
                    nombre_valor = fila.find("td:eq(1)").text();
                    marca_valor = fila.find("td:eq(2)").text();
                    grado_valor = fila.find("td:eq(3)").text();
                    ibu_valor = fila.find("td:eq(4)").text();
                    ing1_valor = fila.find("td:eq(5)").text();
                    ing2_valor = fila.find("td:eq(6)").text();
                    ing3_valor = fila.find("td:eq(7)").text();
                    precio_valor = fila.find("td:eq(8)").text();
                    descripcion_valor = fila.find("td:eq(9)").text();
                    amargo_valor = fila.find("td:eq(10)").text();
                    cuerpo_valor = fila.find("td:eq(11)").text();
                    imagen_valor = fila.find("td:eq(12)").text();
                    
                    $("#productoE").val(nombre_valor);
                    $("#marcaE").val(marca_valor);
                    $("#gradoE").val(grado_valor);
                    $("#ibuE").val(ibu_valor);
                    $("#ingrediente1E").val(ing1_valor);
                    $("#ingrediente2E").val(ing2_valor);
                    $("#ingrediente3E").val(ing3_valor);
                    $("#precioE").val(precio_valor);
                    $("#descripcionE").val(descripcion_valor);
                    $("#amargoE").val(amargo_valor);
                    $("#cuerpoE").val(cuerpo_valor);
                    $("#imagenE").val(imagen_valor);

                    $("#modalCrud").modal("show");
                });

                $(document).on("click", ".eliminar", function ()  {
                    fila = $(this).closest("tr");
                    producto_val= fila.find("td:eq(0)").text();
                    
                    $("#modalCrudEliminar").modal("show");
                    $(".contenido").text("¿Está seguro de que desea eliminar el Producto: " + producto_val + "?");
                
                    confirmDelete = true;
                });

                // Manejador de clic en el botón "Cancelar"
                $(document).on("click", "#cancelButton", function () {
                    confirmDelete = false; // Desactivar la confirmación de eliminación
                });


                // Manejador del envío del formulario de eliminación
                $("#formBorrar").submit(function (e) {
                    if (confirmDelete) {
                        producto_val;
                        opcion = 10;
                        $.ajax({
                            url: "../Acciones/Rest.php",
                            type: "POST",
                            data: { producto_val: producto_val, opcion: opcion },
                            success: function (resultado) {
                                window.location.href = "../Paginas/Usuarios.php";
                            }
                        });
                    }
                    $("#modalCrudEliminar").modal("hide"); // Ocultar el modal de eliminación
                    confirmDelete = false; // Restablecer la confirmación de eliminación
                    e.preventDefault(); // Evitar la acción predeterminada del formulario
                });

                $("#imagenE").on("change", function() {
                    // Obtén el primer archivo seleccionado
                    var archivo = $(this)[0].files[0];
                
                    // Verifica si hay un archivo seleccionado
                    if (archivo) {
                        // Obtén el nombre del archivo
                        var nombreArchivo = archivo.name;
                        alert(nombreArchivo);
                    } else {
                        alert("No se ha seleccionado ningún archivo");
                    }
                });
        
                $("#formEditar").submit(function (e) {
                    e.preventDefault(); 

                    var archivo = $(".imagenE")[0].files[0];
                    var nombreArchivo = archivo.name;

                    producto_valor;
                    productoE = $("#productoE").val();
                    marcaE = $("#marcaE").val();
                    gradoE = $("#gradoE").val();
                    ibuE = $("#ibuE").val();
                    ingrediente1E = $("#ingrediente1E").val();
                    ingrediente2E = $("#ingrediente2E").val();
                    ingrediente3E = $("#ingrediente3E").val();
                    precioE = parseFloat($("#precioE").val());
                    descripcionE = $("#descripcionE").val();
                    amargoE = $("#amargoE").val();
                    cuerpoE = $("#cuerpoE").val();
                    imagenE = nombreArchivo;

                    opcion=9;
                    
                    $.ajax({
                        url: "../Acciones/Rest.php",
                        type: "POST",
                        data: {
                            productoE : productoE, marcaE : marcaE, gradoE : gradoE, ibuE : ibuE, ingrediente1E : ingrediente1E, ingrediente2E : ingrediente2E, ingrediente3E : ingrediente3E, precioE: precioE, descripcionE : descripcionE, amargoE : amargoE, cuerpoE : cuerpoE, imagenE : imagenE, producto_valor : producto_valor, opcion:opcion
                        },
                        success: function (resultado) {
                            window.location.href = "../Paginas/Productos.php";
                        }
                    });
                });
            });
        </script>
            <!-- MODAL -->
            <div class="modal fade" id="modalCrudEliminar" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="modal-register-label">Eliminar Producto</h3>
                            <p class="modal">Edite los datos del Producto:</p>
                            <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div> 
                        <form id="formBorrar">
                            <div class="modal-body">     
                                <p class="text-white contenido">¿Está seguro de que desea eliminar el Producto?</p>
                                <p class="text-danger"><small>Esta acción no se puede deshacer.</small></p>
                            </div>
                            <div class="modal-footer">
                                <input type="button" class="btn btn-warning" data-bs-dismiss="modal" aria-label="Close" value="Cancelar" id="cancelButton">
                                <input type="submit" class="btn btn-danger" value=" Eliminar Producto ">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalCrud" tabindex="-1" role="dialog" aria-labelledby="modal-register-label" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="modal-register-label">Editar Producto</h3>
                            <p class="modal">Edite los datos del Producto:</p>
                            <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div> 
                        <div class="modal-body">
                            <form role="form" id="formEditar" class="registration-form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="sr-only" for="form-first-name">Producto: </label>
                                    <input type="text" name="productoE" placeholder="Nombre Producto..." class="form-first-name form-control" id="productoE">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-first-name">Marca: </label>
                                    <input type="text" name="marcaE" placeholder="Marca Producto..." class="form-first-name form-control" id="marcaE">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-last-name">Grado de Alcohol: </label>
                                    <input type="text" name="gradoE" placeholder="Grado Alcohil..." class="form-last-name form-control" id="gradoE">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form">IBU: </label>
                                    <input type="text" name="ibuE" placeholder="IBU..." class="form form-control" id="ibuE">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form">Ingrediente 1: </label>
                                    <input type="text" name="ingrediente1E" placeholder="Ingrediente..." class="form form-control" id="ingrediente1E">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form">Ingrediente 2: </label>
                                    <input type="text" name="ingrediente2E" placeholder="Ingrediente..." class="form form-control" id="ingrediente2E">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form">Ingrediente 3: </label>
                                    <input type="text" name="ingrediente3E" placeholder="Ingrediente..." class="form form-control" id="ingrediente3E">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form">Precio:  </label>
                                    <input type="number" name="precioE" placeholder="Precio..." class="form form-control" id="precioE" min="1" step="0.01">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form">Descripción:  </label>
                                    <input type="text" name="descripcionE" placeholder="Descripción..." class="form form-control" id="descripcionE">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="amargoI">Amargo:</label>
                                    <select name="amargoE" class="form-control" id="amargoE">
                                        <option value="" disabled selected>Selecciona el nivel de amargor</option>
                                        <option value="Bajo">Bajo</option>
                                        <option value="Medio">Medio</option>
                                        <option value="Alto">Alto</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="amargoI">Cuerpo:</label>
                                    <select name="cuerpoE" class="form-control" id="cuerpoE">
                                        <option value="" disabled selected>Selecciona el nivel de Cuerpo</option>
                                        <option value="Bajo">Bajo</option>
                                        <option value="Medio">Medio</option>
                                        <option value="Alto">Alto</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form">Imagen Producto:  </label>
                                    <div class="file-input-container">
                                        <input type="file" name="imagenE" class="imagenE" title="seleccionar fichero" id="importData" accept=".jpg, .jpeg, .png, .jfif, .svg">
                                        <label class="file-upload-btn" for="importData">Subir Archivo</label>
                                        <div class="file-upload-info">No hay archivo seleccionado</div>
                                    </div>
                                </div>
                                <br>

                                <div class="modal-footer">
                                    <input type="button" class="btn btn-warning" data-bs-dismiss="modal" aria-label="Close" value=" Cancelar ">
                                    <input type="submit" class="btn btn-success" value=" Editar Producto ">
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
                            <h3 class="modal-title" id="modal-register-label">Agregar Producto</h3>
                            <p class="modal">Ingrese los datos del Producto:</p>
                            <button type="button" class="btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div> 
                        <div class="modal-body">
                            <form role="form" action="../Acciones/Rest.php" method="post" class="registration-form" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="sr-only" for="form-first-name">Producto: </label>
                                    <input type="text" name="productoI" placeholder="Nombre Producto..." class="form-first-name form-control" id="form-first-name" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-first-name">Marca: </label>
                                    <input type="text" name="marcaI" placeholder="Marca Producto..." class="form-first-name form-control" id="form-first-name" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-last-name">Grado de Alcohol: </label>
                                    <input type="number" name="gradoI" placeholder="Grado Alcohil..." class="form-last-name form-control" id="form-last-name" min="1" max="40" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form">IBU: </label>
                                    <input type="number" name="ibuI" placeholder="IBU..." class="form form-control" id="form" min="1" max="60" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form">Ingrediente 1: </label>
                                    <input type="text" name="ingrediente1I" placeholder="Ingrediente..." class="form form-control" id="form" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form">Ingrediente 2: </label>
                                    <input type="text" name="ingrediente2I" placeholder="Ingrediente..." class="form form-control" id="form" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form">Ingrediente 3: </label>
                                    <input type="text" name="ingrediente3I" placeholder="Ingrediente..." class="form form-control" id="form" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form">Precio:  </label>
                                    <input type="number" name="precioI" placeholder="Precio..." class="form form-control" id="form" min="1" step="0.1" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form">Descripción:  </label>
                                    <input type="text" name="descripcionI" placeholder="Descripción..." class="form form-control" id="form" required>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="amargoI">Amargo:</label>
                                    <select name="amargoI" class="form-control" id="amargoI" required>
                                        <option value="" disabled selected>Selecciona el nivel de amargor</option>
                                        <option value="Bajo">Bajo</option>
                                        <option value="Medio">Medio</option>
                                        <option value="Alto">Alto</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="amargoI">Cuerpo:</label>
                                    <select name="cuerpoI" class="form-control" id="amargoI" required>
                                        <option value="" disabled selected>Selecciona el nivel de Cuerpo</option>
                                        <option value="Bajo">Bajo</option>
                                        <option value="Medio">Medio</option>
                                        <option value="Alto">Alto</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form">Imagen Producto:  </label>
                                    <div class="file-input-container">
                                        <input type="file" name="imagenI" title="seleccionar fichero" id="importData" accept=".jpg, .jpeg, .png, .jfif, .svg">
                                        <label class="file-upload-btn" for="importData">Subir Archivo</label>
                                        <div class="file-upload-info">No hay archivo seleccionado</div>
                                        <input type="hidden" name="opcion" value="8">
                                        <input type="hidden" name="csrf_token" value="'.$_SESSION['csrf_token'].'">
                                    </div>
                                </div>
                                <br>

                                <div class="modal-footer">
                                    <input type="button" class="btn btn-warning" data-bs-dismiss="modal" aria-label="Close" value=" Cancelar ">
                                    <input type="submit" class="btn btn-success" value=" Agregar Producto ">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }
}

?>

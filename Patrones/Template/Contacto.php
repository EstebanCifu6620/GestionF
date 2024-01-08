<?php
include_once("Plantilla.php");
include_once("../Acciones/AccionesProductos.php");

class Contacto extends Plantilla
{
    public function crearHeader()
    {
        $cantidadProductos = Acciones::cantidadProductos();

        echo '
        <div class="contenedor-fluido p-0 nav-bar">
            <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
                <a href="../index.php" class="navbar-brand px-lg-4 m-0">
                    <span class="m-0 display-3 text-uppercase text-white"><img class="navlogo" src="../Recursos/Imagenes/Logos/blanco.png"></span>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto p-4">
                        <a href="../index.php" class="nav-item nav-link text-uppercase">Inicio</a>
                        <a href="Tienda.php" class="nav-item nav-link text-uppercase">Tienda</a>
                        <a href="Nosotros.php" class="nav-item nav-link text-uppercase">Nosotros</a>
                        <a href="Contacto.php" class="nav-item nav-link active text-uppercase">Contacto</a>
                        <a href="Servicio.php" class="nav-item nav-link text-uppercase">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="badge">' . $cantidadProductos . '</span>
                        </a>
                        <a href="cerrar.php" class="nav-item nav-link text-uppercase"><i class="far fa-user"></i></a>
                    </div>
                </div>
            </nav>
        </div>
        ';
    }
    public function crearMain()
    {
        echo '
        <div class="go-top-container">
            <div class="go-top-button">
                <i class="fas fa-chevron-up"></i>
            </div>
        </div>

        <div class="contenedor-fluido page-header-Contact mb-5 position-relative overlay-bottom">
            <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
                <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase titleMain">Contacto</h1>
                <div class="d-inline-flex mb-lg-5">
                    <p class="m-0 text-white"><a class="text-white" href="../index.php">Inicio</a></p>
                    <p class="m-0 text-white px-2">/</p>
                    <p class="m-0 text-white">Contacto</p>
                </div>
            </div>
        </div>


        <div class="container-fluid pt-5">
            <div class="container">
                <div class="section-title">
                    <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Contactanos</h4>
                    <h1 class="display-4 text-primary">Siéntase libre de contactarnos</h1>
                </div>
                <div class="row px-3 pb-2">
                    <div class="col-sm-4 text-center mb-3">
                        <i class="fa fa-2x fa-map-marker-alt mb-3 text-primary"></i>
                        <h4 class="font-weight-bold text-primary" style="letter-spacing: 3px;">Dirección</h4>
                        <p class="text-white">Av. Los Chasquis y Río Payamino</p>
                    </div>
                    <div id="telefono" class="col-sm-4 text-center mb-3" onclick="redirectToWhatsapp()">
                        <i class="fa fa-2x fa-phone-alt mb-3 text-primary"></i>
                        <h4 class="font-weight-bold text-primary" style="letter-spacing: 3px;">Telefono</h4>
                        <p class="text-white">+593 985184705</p>
                    </div>
                    <div class="col-sm-4 text-center mb-3">
                        <i class="far fa-2x fa-envelope mb-3 text-primary"></i>
                        <h4 class="font-weight-bold text-primary" style="letter-spacing: 3px;">Email</h4>
                        <p class="text-white">clopez6341@uta.edu.ec</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <iframe style="width: 100%; height: 443px;" src="https://www.google.com/maps/place/Avenida+Gonzalo+D%C3%A1valos+%26+Avenida+La+Prensa,+Riobamba/@-1.6562941,-78.6597947,1126m/data=!3m2!1e3!4b1!4m6!3m5!1s0x91d307f6222a0d31:0x264957ddcdb51073!8m2!3d-1.6562941!4d-78.6572198!16s%2Fg%2F11ljmmxzqm?hl=es-419&entry=ttu" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>   
                    </div>
                    <div class="col-md-6 pb-5">
                        <div class="contact-form">
                            <div id="success"></div>
                            <form id="contactForm" role="form" action="../Acciones/Rest.php" method="post" class="registration-form">
                                <div class="control-group">
                                    <input name="usuarioI" type="text" class="text-primary form-control bg-transparent p-4" id="usuarioI" placeholder="Nombre..." data-validation-required-message="Ingresa tu Nombre" required />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <select name="calificacionI" id="calificacionI" class="text-primary form-control bg-transparent p-4" placeholder="Calificacion...">
                                        <option value="" disabled selected>Selecciona la Calificación</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                    </select>
                                </div>
                                <div class="control-group">
                                    <input name="emailI" type="email" class="text-primary form-control bg-transparent p-4" id="emailI" placeholder="Email..." data-validation-required-message="Ingresa tu Email" required />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <select name="motivoI" id="motivoI" class="text-primary form-control bg-transparent p-4" placeholder="Motivo...">
                                        <option value="" disabled selected>Selecciona el Motivo</option>
                                        <option value="Testimonio">Testimonio</option>
                                        <option value="Queja">Queja</option>
                                    </select>
                                </div>
                                <div class="control-group">
                                    <textarea name="mensajeI" class="text-primary form-control bg-transparent py-3 px-4" rows="5" id="mensajeI" placeholder="Comentario..." data-validation-required-message="Ingresa tu Mensaje" required></textarea>
                                    <input type="hidden" name="opcion" value="11">
                                    <p class="help-block text-danger"></p>
                                </div>
                                <input type="hidden" name="csrf_token" value="'.$_SESSION['csrf_token'].'">


                                <div class="container-contact">
                                    <button class="btn btn-primary btn-contact text-white font-weight-bold py-3 px-5" type="submit" id="sendMessageButton">Enviar Mensaje</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function redirectToWhatsapp() {
                window.open(`https://wa.me/593985184705`, \'_blank\');
            }
            document.getElementById(\'telefono\').addEventListener(\'mouseover\', function() {
                document.body.style.cursor = \'pointer\';
            });
               
            document.getElementById(\'telefono\').addEventListener(\'mouseout\', function() {
                document.body.style.cursor = \'default\';
            });

            function validarFormulario() {
                let usuario = document.getElementById("usuarioI").value;
                let email = document.getElementById("emailI").value;
                let mensaje = document.getElementById("mensajeI").value;
        
                if(usuario.length < 3 || email.indexOf("@") === -1 || mensaje.length < 5) {
                    alert("Por favor, completa el formulario correctamente.");
                    return false;
                }
                return true;
            }
        
            document.getElementById("contactForm").addEventListener("submit", function(event) {
                if (!validarFormulario()) {
                    event.preventDefault();
                }
            });

        </script>

        ';
                    
    }
    public function crearFooter()
    {
        echo '
        <div class="contenedor-fluido footer text-white mt-5 pt-5 px-0 position-relative overlay-top">
            <div class="row mx-0 pt-5 px-sm-3 px-lg-5 mt-4">
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4 class="text-white text-uppercase mb-4 titleFooter" style="letter-spacing: 3px;">Contactanos</h4>
                    <p><i class="fa fa-map-marker-alt mr-2"></i>Av. Los Chasquis y Río Payamino</p>
                    <p><i class="fa fa-phone-alt mr-2"></i>0985184705</p>
                    <p class="m-0"><i class="fa fa-envelope mr-2"></i>clopez6341@uta.edu.ec</p>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4 class="text-white text-uppercase mb-4 titleFooter" style="letter-spacing: 3px;">Siguenos</h4>
                    <p>Siguenos en nuestras Redes Sociales</p>
                    <div class="d-flex justify-content-start">
                        <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="https://twitter.com/LpRistian"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="https://www.facebook.com/gatito123456789"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-lg btn-outline-light btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-lg btn-outline-light btn-lg-square" href="https://www.instagram.com/chris_idor/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4 class="text-white text-uppercase mb-4 titleFooter" style="letter-spacing: 3px;">Horario Atención</h4>
                    <div>
                        <h6 class="text-white text-uppercase">Lunes - Viernes</h6>
                        <p>8.00 AM - 8.00 PM</p>
                        <h6 class="text-white text-uppercase">Sabados</h6>
                        <p>2.00 PM - 8.00 PM</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                    <h4 class="text-white text-uppercase mb-4 titleFooter" style="letter-spacing: 3px;">Iniciar Sesión</h4>
                    <p></p>
                    <div class="w-100">
                        <div class="input-group">
                            <input type="text" class="form-control border-light" style="padding: 25px;" placeholder="Email...">
                            <div class="input-group-append">
                                <button class="btn btn-primary font-weight-bold px-3">Ingresar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contenedor-fluido text-center text-white border-top mt-4 py-4 px-sm-3 px-md-5" style="border-color: rgba(256, 256, 256, .1) !important;">
                <p class="mb-2 text-white">Copyright &copy; <a class="font-weight-bold" href="#">ChrisLP</a>. Todos los Derechos Reservados.</a></p>
                <p class="m-0 text-white">Diseñado por <a class="font-weight-bold" href="https://htmlcodex.com">ChrisLP</a></p>
            </div>
        </div>
   
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>
        ';
    }
}
?>

<?php
include_once("Plantilla.php");
include_once("../Acciones/AccionesProductos.php");

class Nosotros extends Plantilla
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
                        <a href="Nosotros.php" class="nav-item nav-link active text-uppercase">Nosotros</a>
                        <a href="Contacto.php" class="nav-item nav-link text-uppercase">Contacto</a>
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

        <div class="contenedor-fluido page-header mb-5 position-relative overlay-bottom">
            <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
                <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase titleMain">Nosotros</h1>
                <div class="d-inline-flex mb-lg-5">
                    <p class="m-0 text-white"><a class="text-white" href="">Inicio</a></p>
                    <p class="m-0 text-white px-2">/</p>
                    <p class="m-0 text-white">Nosotros</p>
                </div>
            </div>
        </div>

        <div class="contenedor-fluido py-5">
            <div class="container">
                <div class="section-title">
                    <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Sobre Nosotros</h4>
                    <h1 class="display-4 text-primary">Sirviendo desde 2021</h1>
                </div>
                <div class="row">
                    <div class="col-lg-4 py-0 py-lg-5">
                        <h1 class="mb-3 text-primary">Nuestra Historia</h1>
                        <h5 class="mb-3 text-white">Con una sólida base de conocimientos y experiencia en la elaboración de cerveza, se decide escribir un plan de negocios detallado.</h5>
                        <p class="text-white"> "Cervezas Artesanales INTI" sigue prosperando. La empresa ha expandido su alcance y se enorgullece de su compromiso con la comunidad, la sostenibilidad y la producción de cerveza artesanal de alta calidad. </p>
                    </div>
                    <div class="col-lg-4 py-5 py-lg-0" style="min-height: 500px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100" src="../Recursos/Imagenes/Fondos/Vasos.png" style="object-fit: cover;">
                        </div>
                    </div>
                    <div class="col-lg-4 py-0 py-lg-5">
                        <h1 class="mb-3 text-primary">Nuestra Visión</h1>
                        <p class="text-white">"Ser la cervecera artesanal preferida y reconocida en nuestra comunidad, ofreciendo cervezas únicas y de alta calidad que inspiren a nuestros clientes a apreciar la artesanía cervecera y a compartir momentos inolvidables con amigos y familia."</p>
                        <h5 class="mb-3 text-white"><i class="fa fa-check text-primary mr-3 "></i>Calidad y Variedad</h5>
                        <h5 class="mb-3 text-white"><i class="fa fa-check text-primary mr-3 "></i>Expansión Controlada</h5>
                        <h5 class="mb-3 text-white"><i class="fa fa-check text-primary mr-3 "></i>Reconocimiento Regional</h5>
                    </div>
                </div>
            </div>
        </div>
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

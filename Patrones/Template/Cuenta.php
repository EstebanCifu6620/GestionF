<?php
include_once("Plantilla.php");
include("../Acciones/AccionesAdmin.php");

class Cuenta extends Plantilla
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
                                <a class="mdl-navigation__link mdl-navigation__link--current" href="Cuenta.php">
                                    <i class="material-icons" role="presentation">person</i>
                                    Cuenta
                                </a>
                                <div class="sub-navigation">
                                    <a class="mdl-navigation__link" >
                                        <i class="material-icons">pages</i>
                                        Gestión
                                        <i class="material-icons" >keyboard_arrow_down</i>
                                    </a>
                                    <div class="mdl-navigation">
                                        <a class="mdl-navigation__link" href="Usuarios.php">
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
        
        <main class="app-content mdl-layout__content">
            <div class="row user">
                <div class="col-md-12">
                    <div class="profile">
                    <div class="info"><img class="user-img" src="../Recursos/Imagenes/Logos/erick.jpg">
                        <h4>Erick López Pillajo</h4>
                        <p>Ingeniero en Alimentos / Productor Artesanal</p>
                    </div>
                    <div class="cover-image"></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="tile p-0">
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane active" id="user-timeline">
                        <br>
                            <div class="timeline-post">
                                <div class="post-media"><a href="#"><img src="../Recursos/Imagenes/Logos/erick.jpg"></a>
                                    <div class="content">
                                    <h5><a href="#" class="nombre-contenedor">Erick López</a></h5>
                                    <p class="text-muted"><small>2 Enero 9:30</small></p>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <p>
                                        "La misma cantidad de respeto y atención se debe a todo ser humano, el ser humano no tiene grados"
                                        <br>
                                        "Nuestro objetivo siempre ha sido brindar una experiencia completa en nuestra cervecería, y los elogios por nuestro servicio y ambiente nos inspiran a seguir mejorando y creando momentos memorables para todos los amantes de la cerveza."
                                    </p>
                                </div>
                            </div>

                            <div class="timeline-post">
                                <div class="post-media"><a href="#"><img src="../Recursos/Imagenes/Logos/erick.jpg"></a>
                                    <div class="content">
                                    <h5><a href="#" class="nombre-contenedor">Erick López</a></h5>
                                    <p class="text-muted"><small>5 Julio 12:30</small></p>
                                    </div>
                                </div>
                                <div class="post-content">
                                    <p>
                                        "Nuestro compromiso con la calidad es inquebrantable, y cuando detectamos problemas, trabajamos incansablemente para resolverlos. Agradecemos a aquellos que nos informaron sobre cualquier inconveniente y les garantizamos que estamos tomando medidas para garantizar que no vuelva a ocurrir."
                                    </p>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
                <br><br>
            </div>
        </main>
      <div>
        ';    
    }
    public function crearFooter()
    {
        echo '
        ';
    }
}

?>

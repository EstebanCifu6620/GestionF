<?php
    include_once("Patrones/Template/Plantilla.php");
    include_once("Patrones/Template/Index.php");
    $Pagina = new Index;
    $Pagina -> verificarSesionIndex();
    $Pagina -> verificarTipoUsuario(FALSE,'');
?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cervecería INTI</title>
        
        <link href="Recursos/Imagenes/Logos/blanco.ico" rel="icon">

        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css'>
        
        <!-- Enlace al archivo CSS de LineIcons -->
        <link rel="stylesheet" href="https://cdn.lineicons.com/2.0/LineIcons.css">

        <!-- Owl Carousel JS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/assets/owl.theme.default.min.css">
        
        <!-- Customized Bootstrap Stylesheet -->
        <link href="Recursos/CSS/EstilosGenerales.css" rel="stylesheet">
        <link href="Recursos/CSS/Opciones.css" rel="stylesheet">
        <link href="Recursos/CSS/Carrusel.css" rel="stylesheet">
        <link href="Recursos/CSS/EstilosTienda.css" rel="stylesheet">
    </head>
    <body>
        <?php
            $Pagina -> crearPagina();
        ?>                                               
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="Recursos/JS/Scroll.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js"></script>
		<script>
            $(".testmonial_slider_area").owlCarousel({
                autoplay: true,
                slideSpeed:1000,
                items : 3,
                loop: true,
                nav:true,
                navText:['<span class="carousel-control-prev-icon"></span>','<span class="carousel-control-next-icon"></span>'],
                margin: 30,
                dots: true,
                responsive:{
                    320:{
                        items:1
                    },
                    767:{
                        items:2
                    },
                    600:{
                        items:2
                    },
                    1000:{
                        items:3
                    }
                }
                    
            });
        </script>

    </body>
</html>
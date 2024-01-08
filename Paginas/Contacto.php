<?php
    include_once("../Patrones/Template/config.php");
    include_once("../Patrones/Template/Plantilla.php");
    include_once("../Patrones/Template/Contacto.php");
    $Pagina = new Contacto;
    $Pagina -> verificarSesionPaginas();
    $Pagina -> verificarTipoUsuario(FALSE,'../');
?>
<!DOCTYPE html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contacto</title>
        
        <link href="../Recursos/Imagenes/Logos/blanco.ico" rel="icon">

        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        
        <!-- Customized Bootstrap Stylesheet -->
        <link href="../Recursos/CSS/EstilosGenerales.css" rel="stylesheet">
        <link href="../Recursos/CSS/Opciones.css" rel="stylesheet">
        <link href="../Recursos/CSS/EstilosTienda.css" rel="stylesheet">
    </head>
    </head>
    <body>
        <?php
            $Pagina -> crearPagina();
        ?>     
        <script src="../Recursos/JS/Scroll.js"></script>                                           
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
<?php
    include_once("../Patrones/Strategy/Autenticador.php");
    $authenticator = new Authenticator();
    $authenticator-> closeSession();
?>
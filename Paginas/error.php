<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Recursos/CSS/EstilosLogin.css">
    <title>Error</title>
</head>
<body>
    <div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
		<div class="signup">
			<form  action="Logeo.php">
				<label for="chk" aria-hidden="true">Error<br>Algo ha ido mal</label>
                <?php
                if (isset($_GET['error'])) {
                    $errorMessage = "<center><p style='color: red;'>";
                    if ($_GET['error'] == 'usuario') {
                        $errorMessage .= "Usuario no encontrado.</p></center>";
                    } elseif ($_GET['error'] == 'contrasena') {
                        $errorMessage .= "Contraseña incorrecta.</p></center>";
                    } else {
                        $errorMessage .= "Error desconocido.</p></center>";
                    }
                    echo $errorMessage;
                }
                ?>
				<br>
				<button type="submit" >Volver a intentar</button>
			</form>
		</div>			
	</div>
</body>
</html>

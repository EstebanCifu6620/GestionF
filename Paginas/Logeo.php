<?php
	if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // Genera un nuevo token CSRF
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }

    if (isset($_SESSION['usuario'])) {
        if($_SESSION['rol'] == 'admin'){
            header('Location: ../Admin.php');
            exit;
        } else {
            header('Location: ../index.php');
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="../Recursos/CSS/EstilosLogin.css">

	<script src="../Recursos/JS/Librerias/jquery-1.11.1.min.js"></script>
    <script src="../Recursos/JS/Librerias/jquery-1.11.1.js"></script>
    <script src="../Recursos/JS/Librerias/JqueryLib.js"></script>
	<script src="../Recursos/JS/formulario.js"></script>

	<script>
		function togglePasswordVisibility() {
			var passwordInput = document.getElementById('contrasena');
			var toggleIcon = document.querySelector('.toggle-password');

			if (passwordInput.type === 'password') {
				passwordInput.type = 'text';
				toggleIcon.style.background = 'url(eye-off-icon.png) no-repeat';
			} else {
				passwordInput.type = 'password';
				toggleIcon.style.background = 'url(eye-icon.png) no-repeat';
			}
		}

		function verificarLongitud(event) {
			var input = event.target;
			var maxLongitud = 10;

			// Permitir solo dígitos
			var regex = /[^0-9]/gi;
			input.value = input.value.replace(regex, '');

			// Limitar la longitud
			if (input.value.length > maxLongitud) {
				input.value = input.value.slice(0, maxLongitud);
			}
		}
	</script>
</head>
<body>
    <div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">
		<div class="signup">
			<form  id="register" method="post" action="../Acciones/Rest.php">
				<label for="chk" aria-hidden="true" class="register">REGISTRO</label>
				<input type="text" name="usuario"  id="usuario" placeholder="Usuario" required>
				<input type="email" name="email"  id="email" placeholder="E-Mail" required>
                <input type="tel" name="telefono"  id="telefono" placeholder="Telefono" required oninput="verificarLongitud(event)">
				<div class="password-container">
					<input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" required>
					<input type="password" name="rcontrasena" id="rcontrasena" placeholder="Repita su contraseña" required>
					<span class="toggle-password" onclick="togglePasswordVisibility()"></span>
				</div>
				<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
				<input type="hidden" name="opcion" value="4">
                <center><p id="msgUserExist" style="color:white"></p></center>
				<button type="submit" id="btnRegister">Registrarse</button>
			</form>
		</div>

		<div class="login">
			<form id="login" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<label for="chk" aria-hidden="true">INGRESO</label>
				<input type="text" name="usuario" id="usuario" placeholder="Usuario" required>
				<input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" required>
				<input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
				<center><p id="msgUserInvalid"></p></center>
				<button id="btnLogin" type="submit">Ingresar</button>
			</form>
		</div>
	</div>
	<?php
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Verificar el token CSRF
			if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
				// Manejar el error de token CSRF no válido
				exit('Error de seguridad: token CSRF inválido.');
			}else{
			
				// Validar y sanitizar entradas
				$username = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
				$password = $_POST['contrasena']; // La contraseña no se sanitiza aquí
		
				// ... tus includes ...
				include_once("../Patrones/Strategy/AutenticarBD.php");
				include_once("../Patrones/Strategy/Autenticador.php");
				include_once("../Patrones/Strategy/IStrategy.php");
		
				$authenticator = new Authenticator;
				$authenticateDB = new AuthenticateDatabase;
		
				$authenticator->setAuthStrategy($authenticateDB);
				$authenticatorUser = $authenticator->authenticateUser($username, $password);
		
				echo "<meta http-equiv='refresh' content='0'>";
			}
		}
  	?>
</body>
</html>
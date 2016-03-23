<?php 
	/*require_once 'config/funciones_bd.php';
	$db = new funciones_BD();
	session_start();*/
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>LearnSigns</title>
	<link rel="icon" type="image/png" href="img/icono.png" />
	<link rel="stylesheet" href="css/estilos.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<script src="js/jquery.js"></script>
	<script src="js/menu_usuario.js"></script>
</head>
<body>
	<div id="contenedor">
		<div class="form_acceso">
			<img src="img/logo.png" alt="">
			<br>
			<section>
				<form action="autentificar2.php" method="POST">
					<label for="">Correo electronico:</label>
					<input type="email"  name="usu" required>
					<label for="">Contraseña:</label>
					<input type="password"  name="pass" required>
					<button type="submit">INGRESAR</button>
				</form>
			</section>
			<br>
			<div class="inf_form">
				<a href="registro.php">
					<span class="icon-alerta1"></span> 
					No tengo una cuenta
				</a>
			</div>
		</div>
	</div>
	<?php include 'mensajes/mensajes.php'; ?>
</body>
</html>
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
</head>
<body>
	<div id="contenedor">
		<div class="form_acceso">
			<img src="img/logo.png" alt="">
			<br>
			<h2>Registrar cuenta</h2>
			<br>

			<div class="form_gestion">
				<form action="alumno_registrar.php" method="POST" enctype="multipart/form-data">
					<div class="frm_izquierda">
						<label for="">Nombre:</label>
						<input type="text" name="Nombre">
						<label for="">Apellidos:</label>
						<input type="text" name="Apellidos">						
						<label for="">Fecha de nacimiento:</label>
						<input type="date" name="FechaNacimiento">
						<label for="">Sexo:</label>
						<div class="estadoitem">
						<input type="radio" name="radio_sexo" value="Masculino" checked><p>Masculino</p>
						</div>
						<div class="estadoitem">
						<input type="radio" name="radio_sexo" value="Femenino"><p>Femenino</p>
						</div>
						

					</div>
					<div class="frm_derecha">
						<label for="">Correo electronico:</label>
						<input type="email" name="Email">
						<label for="">Constraseña:</label>
						<input type="Password" name="Pass1">
						<label for="">Repetir constraseña:</label>
						<input type="Password" name="Pass2">
					</div>

					<div class="botones">
						<button class="b_guardar">Registrar</button>
					</div>
				</form>

			</div>

		</div>
	</div>
</body>
</html>
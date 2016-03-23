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
	<link rel="icon" type="image/png" href="../img/icono.png" />
	<link rel="stylesheet" href="../css/estilos.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<script src="../js/jquery.js"></script>
</head>
<body>
	<div id="contenedor2">
		<?php include 'menu.php'; ?>
		<div class="cont_ctrl_gestion">
			<div class="ctrl_gestion">
				<section>
					<h1>Gestion de pagina web</h1>
					<p></p>
				</section>
				<section>
					
				</section>
			</div>
		</div>
		<div class="cont_registros">
			<section>
				<h2>Modulos web</h2>
			</section>
			<section>
				<a href="gestion_web_logo.php" class="reg_item reg_lista">
					<b>Logo</b>
					<p>5 preguntas</p>
				</a>
				<a href="gestion_titulo.php" class="reg_item reg_lista">
					<b>Titulo</b>
					<p>5 preguntas</p>
				</a>
				<a href="gestion_redes_sociales.php" class="reg_item reg_lista">
					<b>Redes Sociales</b>
					<p>5 preguntas</p>
				</a>
				<a href="gestion_articulo.php" class="reg_item reg_lista">
					<b>Articulo</b>
					<p>5 preguntas</p>
				</a>
				<a href="gestion_general.php" class="reg_item reg_lista">
					<b>General</b>
					<p>5 preguntas</p>
				</a>
				<a href="gestion_auspicio.php" class="reg_item reg_lista">
					<b>Auspicios</b>
					<p>5 preguntas</p>
				</a>
				<a href="gestion_mensaje.php" class="reg_item reg_lista">
					<b>Mensaje</b>
					<p>5 preguntas</p>
				</a>
				<a href="gestion_pie.php" class="reg_item reg_lista">
					<b>Pie de pagina</b>
					<p>5 preguntas</p>
				</a>
			</section>
		</div>
		
	</div>
	<?php include '../mensajes/mensajes.php'; ?>
</body>
</html>
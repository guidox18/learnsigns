
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
<?php 

		$action = "action/pass_actualizar.php";
		$titulo = "Actualizar Contraseña";		

?>

		<div class="form_gestion">
			<section>
				<h2><?php echo $titulo ?></h2>
			</section>
			<form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
				<div class="frm_izquierda">					
					<label for="">Contraseña actual:</label>
					<input type="password" name="pass1" required>
					<label for="">Nueva contraseña:</label>
					<input type="password" name="pass2" required>

				</div>
				<div class="frm_derecha">
					<label for="">Repetir nueva contraseña:</label>
					<input type="password" name="pass3" required>
				</div>

				<div class="botones">
					<button type="submit" class="b_modificar">Modificar</button>				
				</div>
			</form>
		</div>		
	</div>
</body>
</html>

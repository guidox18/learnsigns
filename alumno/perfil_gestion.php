
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

		$action = "action/alumno_actualizar.php";
		$titulo = "Gestionar Perfil";	
		$idx = $_SESSION['usu_id'];
		if($db->DetallarAlumno($idx ))
		{	
			$result = $db->DetallarAlumno($idx );
			while($r = mysql_fetch_assoc($result)) {
			 	//valores
				$nombrex = $r["Nombre"];
				$apellidosx = $r["Apellidos"]; 
				$fechax = $r["FechaNacimiento"];
				$emailx = $r["CorreoElectronico"];
				$sexox = $r["Sexo"];
			}
				}else{
					echo "Error :c";
				}	

?>

		<div class="form_gestion">
			<section>
				<h2><?php echo $titulo ?></h2>
			</section>
			<form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
				<div class="frm_izquierda">
						<label for="">Nombre:</label>
						<input type="text" name="Nombre" value="<?php echo $nombrex;?>">
						<label for="">Apellidos:</label>
						<input type="text" name="Apellidos" value="<?php echo $apellidosx;?>">						
						<label for="">Fecha de nacimiento:</label>
						<input type="date" name="FechaNacimiento" value="<?php echo $fechax;?>">
						
						

					</div>
					<div class="frm_derecha">
						<label for="">Correo electronico:</label>
						<input type="email" name="Email" value="<?php echo $emailx;?>">
						<label for="">Sexo:</label>
						<div class="estadoitem">
							<input type="radio" name="radio_sexo" value="Masculino" <?php if ($sexox=="Masculino") {echo "checked";}?>><p>Masculino</p>
						</div>
						<div class="estadoitem">
							<input type="radio" name="radio_sexo" value="Femenino" <?php if ($sexox=="Femenino") {echo "checked";}?> ><p>Femenino</p>
						</div>
					</div>

					<div class="botones">
						<button type="submit" class="b_modificar">Modificar</button>
					</div>
			</form>
		</div>		
	</div>
</body>
</html>

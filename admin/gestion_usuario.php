
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
$gestion = $_GET["gestion"];
switch ($gestion) {
	case "agregar":
		$action = "action/usuario_agregar.php";
		$titulo = "Registrar Administrador";
		//valores
		$idx="";
		$dnix="";
		$nombrex="";
		$apellidosx="";
		$emailx="";
		$direccionx="";
		$telefonox="";
		$celularx="";
		$sexox ="";
		$estadox="";
	break;
	case "actualizar":
		$action = "action/usuario_actualizar.php";
		$titulo = "Actualizar Administrador";
		$idx = $_GET["idx"];
		if($db->DetallarAdministrador($idx ))
		{	
			$result = $db->DetallarAdministrador($idx );
			while($r = mysql_fetch_assoc($result)) {
			 	//valores
				$dnix = $r["Dni"];
				$nombrex = $r["Nombre"];
				$apellidosx = $r["Apellidos"]; 
				$emailx = $r["CorreoElectronico"];
				$direccionx = $r["Direccion"];
				$telefonox = $r["Telefono"];
				$celularx = $r["Celular"];
				$sexox = $r["Sexo"];
				$estadox = $r["Estado"];
			}
				}else{
					echo "Error :c";
				}
	break;
} 
?>

		<div class="form_gestion">
			<section>
				<h2><?php echo $titulo ?></h2>
			</section>
			<form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
				<div class="frm_izquierda">
					<input type="hidden" name="idx"  value="<?php echo $idx;?>">
					<label for="">DNI:</label>
					<input type="number" name="Dni" min="11111111" max="99999999" title="DNI 8 digitos"  value="<?php echo $dnix ;?>" required>
					<label for="">Nombre:</label>
					<input type="text" name="Nombre" value="<?php echo $nombrex ;?>"required>
					<label for="">Apellidos:</label>
					<input type="text"  name="Apellidos" value="<?php echo $apellidosx ;?>" required>
					<label for="">Correo electronico:</label>
					<input type="email"  name="Email" value="<?php echo $emailx ;?>"required>
					<label for="">Direccion:</label>
					<input type="text" name="Direccion" value="<?php echo $direccionx ;?>" required>
				</div>
				<div class="frm_derecha">
					<label for="">Telefono:</label>
					<input type="text" name="Telefono" value="<?php echo $telefonox ;?>">
					<label for="">Celular:</label>
					<input type="text"  name="Celular" value="<?php echo $celularx ;?>">
					<label for="">Sexo:</label>
						<div class="estadoitem">
							<input type="radio" name="radio_sexo" value="Masculino" <?php if ($gestion=="agregar" or $sexox=="Masculino") {echo "checked";}?>><p>Masculino</p>
						</div>
						<div class="estadoitem">
							<input type="radio" name="radio_sexo" value="Femenino" <?php if ($sexox=="Femenino") {echo "checked";}?> ><p>Femenino</p>
						</div>
					<label for="">Estado:</label>
						<div class="estadoitem">
							<input type="radio" name="radio_estado" value="Activo" <?php if ($gestion=="agregar" or $estadox=="Activo") {echo "checked";}?>><p>Activo</p>
						</div>
						<div class="estadoitem">
							<input type="radio" name="radio_estado" value="Inactivo" <?php if ($estadox=="Inactivo") {echo "checked";}?>><p>Inactivo</p>
						</div>
					
				</div>

				<div class="botones">
					<?php if ($gestion == "agregar") {
					?>
						<button type="submit" class="b_guardar">Registrar</button>
					<?
					}else{?>
						<button type="submit" class="b_modificar">Modificar</button>
					<?php } ?>						
				</div>
			</form>
		</div>		
	</div>
</body>
</html>

<!--
<select class="form-control" name="class" id="tipo">
                        <option value="event-info">Informacion</option>
                        <option value="event-success">Exito</option>
                        <option value="event-important">Importantante</option>
                        <option value="event-warning">Advertencia</option>
                        <option value="event-special">Especial</option>
                    </select>
-->
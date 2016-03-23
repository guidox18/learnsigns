
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
		$action = "action/modulo_agregar.php";
		$titulo = "Registrar Modulo";
		//valores
		$idx="";
		$nombrex="";
		$posicionx="";
		$estadox="";

	break;
	case "actualizar":
		$action = "action/modulo_actualizar.php";
		$titulo = "Actualizar Modulo";
		$idx = $_GET["idx"];
		if($db->DetallarModulo($idx ))
		{	
			$result = $db->DetallarModulo($idx );
			while($r = mysql_fetch_assoc($result)) {
			 	//valores
				$nombrex = $r["Nombre"];
				$posicionx = $r["Posicion"]; 
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
					
					<label for="">Nombre:</label>
					<input type="text" name="Nombre" value="<?php echo $nombrex ;?>"required>
					<label for="">Posicion:</label>
					<input type="number" name="Posicion" min="11111111" max="99999999" title="Número de posicion"  value="<?php echo $posicionx ;?>" required>

				</div>
				<div class="frm_derecha">
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

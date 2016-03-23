
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
		$action = "action/redsocial_agregar.php";
		$titulo = "Registrar Red Social";
		//valores
		$idx="";
		$tipox="";
		$urlx="";
		$estadox="";
	break;
	case "actualizar":
		$action = "action/redsocial_actualizar.php";
		$titulo = "Actualizar Red Social";
		$idx = $_GET["idx"];
		if($db->DetallarRedSocial($idx ))
		{	
			$result = $db->DetallarRedSocial($idx );
			while($r = mysql_fetch_assoc($result)) {
			 	//valores
				$tipox = $r["Tipo"];
				$urlx = $r["Url"];
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
					<label for="">Tipo:</label>
					<select class="form-control" name="Tipo" id="tipo">
                    	<option value="1" <?php if ($tipox=="Facebook") {echo "selected";}?> >Facebook</option>
                    	<option value="2" <?php if ($tipox=="Twitter") {echo "selected";}?> >Twitter</option>
                    	<option value="3" <?php if ($tipox=="Google+") {echo "selected";}?> >Google+</option>
                    	<option value="4" <?php if ($tipox=="otro") {echo "selected";}?> >otro</option>
						
                    </select>
					<label for="">URL:</label>
					<input type="text" name="Url" value="<?php echo $urlx ;?>"required>
					
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
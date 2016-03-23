
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
$action = "action/general_actualizar.php";
if($db->DetallarWeb()){	
	$result = $db->DetallarWeb();
			while($r = mysql_fetch_assoc($result)) {
			 	//valores
				$general1= $r["GeneralTitulo"];
				$general2= $r["SubGeneralTitulo"];
			}
				}else{
					echo "Error :c";
				}
	

?>

		<div class="form_gestion">
			<section>
				<h2>Gestionar General</h2>
			</section>
			<form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
				<div class="frm_izquierda">
					<label for="">Titulo:</label>
					<input type="text" name="General1" value="<?php echo $general1 ;?>"required>
				</div>
				<div class="frm_derecha">
					<label for="">Detalle:</label>
					<textarea name="General2"  ><?php echo $general2 ;?></textarea>
				</div>

				<div class="botones">
					<button type="submit" class="b_modificar">Modificar</button>				
				</div>
			</form>
		</div>		
	</div>
</body>
</html>

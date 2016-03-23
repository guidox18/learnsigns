
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
$action = "action/pie_actualizar.php";
if($db->DetallarWeb()){	
	$result = $db->DetallarWeb();
			while($r = mysql_fetch_assoc($result)) {
			 	//valores
				$pie= $r["Pie"];
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
					<label for="">Pie:</label>
					<input type="text" name="Pie" value="<?php echo $pie ;?>"required>
				</div>

				<div class="botones">
					<button type="submit" class="b_modificar">Modificar</button>				
				</div>
			</form>
		</div>		
	</div>
</body>
</html>

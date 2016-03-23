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
		//$idx = $_GET["idx"]; 
		$notax = $_GET["notax"];

		if ($notax>13) {
			$color = "c_verde";
			$mensajex="Felicidades pasaste la evaluación";
		}
		elseif ($notax>10 and $notax<14 ) {
			$color =  "c_amarillo";
			$mensajex="Esfuersate un poco mas :)";
		}
		elseif ($notax<11) {
			$color =  "c_rojo";
			$mensajex="No te preocupes sigue esforzandote :)";
		}
		?>

		<div class="cont_resultado">
			<p class="<?php echo $color?>"><?php echo $mensajex; ?></p>
			<section><b><?php echo $notax ;?></b></section>
			<section>
				<img src="../img/feliz1.gif" alt="">
			</section>
			<section><a class="boton_continuar" href="curso_alumno.php">Aceptar</a></section>
		</div>


			
	</div>
</body>
</html>
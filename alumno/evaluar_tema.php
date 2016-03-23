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
<?php 
$idx = $_GET["idx"];

if($db->DetallarTema($idx )){	
$result = $db->DetallarTema($idx );
while($r = mysql_fetch_assoc($result)) {
 	//valores
	$nombrex= $r["Nombre"];
}
	}else{
		echo "Error :c";
	}
?>



<form action="action/evaluar.php" method="POST" enctype="multipart/form-data">

		<div class="cont_ctrl_gestion">
			<div class="ctrl_gestion">
				<section>
					<h1><?php echo $nombrex ?></h1>
					<p>Evaluación</p>
				</section>
				<section>
					<button type="submit" class="b_evaluar">Evaluar</button>
					<input type="hidden" name="idx"  value="<?php echo $idx;?>">
				</section>
			</div>
		</div>
		<div class="cont_registros">
			<section>
				<h2>Preguntas</h2>
			</section>
			<section>
				<?php 
				if($db->ListarPreguntasPorTema($idx)){	
					$result = $db->ListarPreguntasPorTema($idx);
					while($r = mysql_fetch_assoc($result)) {
				?>
					<div class="reg_pregunta_evaluar">
						<h3><?php echo $r["Pregunta"];?></h3>
						<section>
							<div class="preg_imagen">
								<img src="../img/pregunta/<?php echo $r["Imagen"];?>" alt="">
							</div>
							<div class="preg_alternativas">
								<p>
									<input type="radio" name="radio_r_<?php echo $r["IdPregunta"];?>" value="Alternativa 1" checked> a) <?php echo $r["Alternativa1"];?>

									
								</p>
								<p>
									<input type="radio" name="radio_r_<?php echo $r["IdPregunta"];?>" value="Alternativa 2" > b) <?php echo $r["Alternativa2"];?>
								</p>
								<p>
									<input type="radio" name="radio_r_<?php echo $r["IdPregunta"];?>" value="Alternativa 3" > c) <?php echo $r["Alternativa3"];?>
								</p>
							</div>
						</section>
						
					</div>
				<?php
					}
				}else{
					echo "No hay preguntas";
				}
				?>
			</section>
		</div>



</form>


			
	</div>
</body>
</html>
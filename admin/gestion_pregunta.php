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
if($db->DetallarTema($idx ))
		{	
			$result = $db->DetallarTema($idx );
			while($r = mysql_fetch_assoc($result)) {
			 	//valores
				$idmodulox= $r["IdModulo"];
				$modulox= $r["Modulo"];
				$nombrex= $r["Nombre"];
				$urlvideox= $r["UrlVideo"];
				$descripcionx= $r["Descripcion"];
				$estadox= $r["Estado"];
			}
				}else{
					echo "Error :c";
				}
?>
		<div class="cont_ctrl_gestion">
			<div class="ctrl_gestion">
				<section>
					<h1><?php echo $nombrex; ?></h1>
					<p><?php echo $modulox; ?></p>
				</section>
				<section>
					<a class="optionx" href="gestion_pregunta_respuesta.php?gestion=agregar&idtema=<?php echo $idx; ?>">
						<span  class="op_usuarios icon-items icon-usu"></span>
						<label>Pregunta</label>
					</a>
				</section>
			</div>
		</div>
		<div class="cont_registros">
			<section>
				<h2>
					<?php  
					if($db->CantPreguntas($idx)){	
						$result_3 = $db->CantPreguntas($idx);
						while($r_3 = mysql_fetch_assoc($result_3)){
							echo $r_3["cantidad"]." ";
						}
					}
					?>
					Preguntas</h2>
			</section>
			<section>
				<?php 
				if($db->ListarPreguntasPorTema($idx)){	
					$result = $db->ListarPreguntasPorTema($idx);
					while($r = mysql_fetch_assoc($result)) {
						//valores
						$nombrex = $r["IdTema"];
						$posicionx = $r["Pregunta"]; 
						$estadox = $r["Imagen"];
				?>
					<a href="gestion_pregunta_respuesta.php?gestion=actualizar&idx=<?php echo  $r["IdPregunta"]?>" class="reg_preguntas">
						<div class="item_pregunta"><p><?php echo $r["Pregunta"];?></p></div>
						<div class="item_respuesta"><p>Rpt. <?php echo $r["Respuesta"];?></p></div>
					</a>
				<?php
					}
				}else{
					echo "No hay preguntas";
				}
				?>
			</section>
		</div>
			
	</div>
	<?php include '../mensajes/mensajes.php'; ?>
</body>
</html>
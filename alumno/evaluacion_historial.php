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
$idx = $_SESSION['usu_id'];

?>
		<div class="cont_ctrl_gestion">
			<div class="ctrl_gestion">
				<section>
					<h1>Evaluaciones</h1>
					<p>
						<span class="icon-items icon-bookmark c_verde_mark"></span>Aprobado
						<span class="icon-items icon-bookmark c_amarillo_mark"></span>Regular 
						<span class="icon-items icon-bookmark c_rojo_mark"></span>Desaprobado 
					</p>
				</section>
				<section>
					
				</section>
			</div>
		</div>
		<div class="cont_registros">
			<section>
				<h2>Historial</h2>
			</section>
			<section>
				<?php 
				if($db->ListarEvaluacionesAlumno($idx)){	
					$result = $db->ListarEvaluacionesAlumno($idx);
					while($r = mysql_fetch_assoc($result)) {
						if ($r["Nota"]>13) {
							$color = "c_verde";
						}
						elseif ($r["Nota"]>10 and $r["Nota"]<14 ) {
							$color =  "c_amarillo";
						}
						elseif ($r["Nota"]<11) {
							$color =  "c_rojo";
						}
				?>
					<div class="reg_evaluacion">
						<div class="izquierda">
							<p><?php echo $r["Tema"];?></p>
							<span><?php echo $r["Modulo"]." - ".$r["Fecha"];?></span>
						</div>
						<div class="derecha"><p class="<?php echo $color;?>"><?php echo $r["Nota"];?></p></div>
						
					</div>
				<?php
					}
				}else{
					echo "No hay preguntas";
				}
				?>
			</section>
		</div>
			
	</div>
</body>
</html>
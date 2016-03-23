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
		<div class="cont_ctrl_gestion">
			<div class="ctrl_gestion">
				<section>
					<h1>TEMAS</h1>
					<p></p>
				</section>
				<section>
					
				</section>
			</div>
		</div>
		<div class="cont_registros">
			<?php 
				if($db->ListarModulos()){	
					$result_1 = $db->ListarModulos();
					while($r_1 = mysql_fetch_assoc($result_1)){
				?>
					<section>
						<h2><?php  echo $r_1["Nombre"]; ?></h2>
					</section>
					<section>
						<?php 
						$idx_modulo = $r_1["IdModulo"];
						if($db->ListarTemasPorModulo($idx_modulo)){	
							$result_2 = $db->ListarTemasPorModulo($idx_modulo);
							while($r_2 = mysql_fetch_assoc($result_2)){

						?>
							<a class="reg_evaluacion" href="curso_tema.php?idx=<?php echo  $r_2["IdTema"]?>">
								<div class="izquierda">
									<p><?php  echo $r_2["Nombre"];?></p>		
									<span><?php  echo $r_2["Modulo"];?></span>		
								</div>
								<div class="derecha">									
									<?php
									$notamayor="";
									if($db->ValidarEvaluacionNota($_SESSION['usu_id'],$r_2["IdTema"])){	
										$result_3 = $db->ValidarEvaluacionNota($_SESSION['usu_id'],$r_2["IdTema"]);
										while($r_3 = mysql_fetch_assoc($result_3)){
											if ($r_3["Nota"]>13) {
												$color = "c_verde";
											}
											elseif ($r_3["Nota"]>10 and $r["Nota"]<14 ) {
												$color =  "c_amarillo";
											}
											elseif ($r_3["Nota"]<11) {
												$color =  "c_rojo";
											}
											$notamayor=$r_3["Nota"];
										}
									}else{
										$color = "";
									}
									?>
									<p class="<?php echo $color;?>">
										<?php echo $notamayor; ?>
									</p>
								</div>
							</a>	

								
						<?php   
							}
						}else{
							echo "No hay cursos";
							}
						?>
					</section>		
				<?php   
					}
				}else{
					echo "No hay cursos";
					}
			?>
		</div>
		
	</div>
</body>
</html>
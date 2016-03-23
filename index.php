<?php 
	require_once 'config/funciones_bd.php';
	date_default_timezone_set("America/Bogota");
	$db = new funciones_BD();
	if($db->DetallarWeb()){	
	$result = $db->DetallarWeb();
			while($r = mysql_fetch_assoc($result)) {
			 	//valores
			 	$logo= $r["UrlLogo"];
				$titulo= $r["Titulo"];
				$subtitulo= $r["Subtitulo"];
				$general1= $r["GeneralTitulo"];
				$general2= $r["SubGeneralTitulo"];
				$mensaje1= $r["Mensaje"];
				$mensaje2= $r["SubMensaje"];
				$pie= $r["Pie"];
			}
				}else{
					echo "Error :c";
				}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>LearnSigns</title>
	<link rel="icon" type="image/png" href="img/icono.png" />
	<link rel="stylesheet" href="css/estilos.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<script src="js/jquery.js"></script>
	<script src="js/pallarax.js"></script>
</head>
<body>
	<div id="contenedor">
		<nav class="nav_c1">
			<a href=""><img id="logo" src="img/logo/<?php echo $logo; ?>" alt=""></a>

			<a class="btn_ingresar" href="acceso.php">Ingresar</a>

			<?php 
				if($db->ListarRedesSociales()){	
					$result = $db->ListarRedesSociales();
					while($r = mysql_fetch_assoc($result)){
						if ($r["Estado"]=="Activo") {
						
				?>
					<a href="<?php echo  $r["Url"]?>"><span class="redes_sociales <?php 
								if ($r["Tipo"]=="Facebook"){echo "icon-facebook";}
								if($r["Tipo"]=="Twitter"){echo "icon-twitter";}
								if($r["Tipo"]=="Google+"){echo "icon-google";}
								if($r["Tipo"]=="otro"){echo "icon-mundo1";}
								?>"></span>
					</a>			
				<?php   }
					}
				}
				?>
		</nav>
		<div id="banner">
			<div class="titulo">
				<section>
					<h1><?php echo $titulo; ?></h1>
					<p><?php echo $subtitulo; ?></p>
					<a class="btn_registrar" href="registro.php">Registrate</a>
				</section>
			</div>
		</div>
		<div class="articulos">
			<?php 
				if($db->ListarArticulos()){	
					$result = $db->ListarArticulos();
					while($r = mysql_fetch_assoc($result)){
				?>
					<article>
						<img src="img/articulo/<?php  echo $r["urlFoto"]?>" alt="">
						<h3><?php  echo $r["Titulo"]?></h3>
						<p><?php  echo $r["Descripcion"]?></p>
					</article>			
				<?php   
					}
				}else{
					echo "No hay registros";
					}
				?>
		</div>
		<div class="informacion">
			<section>
				<img src="img/learnsigns_logo-2.png" alt="">
				<div class="info">
					<h2><?php echo $general1; ?></h2>
					<p><?php echo $general2; ?></p>
				</div>
			</section>
		</div>
		<div class="auspicio">
			<h2>Ellos confían en LearnSigns</h2>
			<section>
				<?php 
				if($db->ListarAuspiciosActivos()){	
					$result_aus = $db->ListarAuspiciosActivos();
					while($r_aus  = mysql_fetch_assoc($result_aus)){
				?>
					<article>
						<img src="img/auspicio/<?php echo $r_aus["UrlFoto"]?>" alt="">
					</article>			
				<?php   
					}
				}else{

					}
				?>
			</section>
		</div>
		<div class="mensaje">
			<section>
				<div class="m_derecha">
					<h3><?php echo $mensaje1; ?></h3>
					<p><?php echo $mensaje2; ?></p>
				</div>
				<div class="m_izquierda">
					<a class="btn_registrar" href="registro.php">Registrate</a>
				</div>
			</section>
		</div>
		<div class="pie">
			<?php echo $pie; ?>
		</div>
	</div>
</body>
</html>
<?php 
	/*require_once 'config/funciones_bd.php';
	$db = new funciones_BD();
	session_start();*/

	$idx = $_GET["idx"];

	function id_youtube($url) {
	    $patron = '%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x';
	    $array = preg_match($patron, $url, $parte);
	    if (false !== $array) {
	        return $parte[1];
	    }
	    return false;
	}

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
	<script>
		$(document).ready(function() {
		   // Esta primera parte crea un loader no es necesaria
		    $().ajaxStart(function() {
		        $('#loading').show();
		        $('#result').hide();
		    }).ajaxStop(function() {
		        $('#loading').hide();
		        $('#result').fadeIn('slow');
		    });
		    //cargando ....
            $(window).load(function() {
                $('.fondowhite').hide();
            });
		   // Interceptamos el evento submit
		    $('#form, #fat, #fo3').submit(function() {
		  // Enviamos el formulario usando AJAX
		        $.ajax({
		            type: 'POST',
		            url: $(this).attr('action'),
		            data: $(this).serialize(),
		            // Mostramos un mensaje con la respuesta de PHP
		            success: function(data) {
		                $('.lista_comentarios').html(data);
		                document.fo3.reset(); 
		            }
		        })        
		        return false;
		    }); 

		})
	</script>
</head>
<body>
	<div id="contenedor2">
		<?php include 'menu.php'; ?>
		<div id="cont_tema">
			<section>
				<?php 
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
				<h1><?php echo $nombrex;?></h1>
				<p><?php echo $modulox;?></p>
				
				<iframe id="video_tema" width="100%" height="390" src="https://www.youtube.com/embed/<?php echo id_youtube($urlvideox); ?>?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
				<div class="info_tema">
					<h4>Descripción:</h4>
					<p><?php echo $descripcionx;?></p>
				</div>
				
				<?php 
				if($db->ValidarEvaluacionDisponible($idx))
				{	
					$result2 = $db->ValidarEvaluacionDisponible($idx);
					while($r2 = mysql_fetch_assoc($result2)) {
					 	//valores
						$validarx= $r2["Validar"];
					}
				}else{
						echo "Error :c";
				}

				if ($validarx!=0) {
				?>
					<div class="controles_tema">
						<a class="btn_evaluar" href="evaluar_tema.php?idx=<?php echo $idx;?>">Realizar evaluación</a>
					</div>
				<?php
				}
				?>
				
			</section>
			<section>
				<h2>Comentarios</h2>
				<div class="cont_comentarios">
					<form id="fo3" name="fo3" action="action/comentario.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="idalumno"  value="<?php echo $_SESSION['usu_id'];?>">
						<input type="hidden" name="idtema"  value="<?php echo $idx ;?>">

						<textarea name="comentario"  ></textarea>
						<button type="submit" class="btn_comentar">Comentar</button>
					</form>
					<div class="lista_comentarios">
						<?php 
						if($db->ListarComentarios($idx)){	
							$result = $db->ListarComentarios($idx);
							while($r = mysql_fetch_assoc($result)){
						?>				
							<div class="reg_comentario">
								<b><?php  echo $r["Nombre"]." ".$r["Apellidos"]; ?></b>
								<p><?php  echo $r["Comentario"]; ?></p>
								<span><?php  echo $r["Fecha"]; ?></span>
							</div>
						<?php   
							}
						}else{
							echo "";
							}
						?>
						
					</div>
				</div>
			</section>
		</div>
		
	</div>
</body>
</html>
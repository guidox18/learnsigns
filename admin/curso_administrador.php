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
		                $('.cont_registros').html(data);
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
		<div class="cont_ctrl_gestion">
			<div class="ctrl_gestion">
				<section>
					<h1>Gestion Curso</h1>
					<p>Modulos y Temas</p>
				</section>
				<section>
					<a class="optionx" href="gestion_modulo.php?gestion=agregar">
						<span  class="op_usuarios icon-items icon-modulo"></span>
						<label>Modulo</label>
					</a>
					<a class="optionx" href="gestion_tema.php?gestion=agregar">
						<span  class="op_usuarios icon-items icon-tema"></span>
						<label>Tema</label>
					</a>
					<a class="optionx" href="reporte.php?tipo=listatemas1">
						<span  class="op_usuarios icon-items icon-imprimir"></span>
						<label>Reporte</label>
					</a>
				</section>
			</div>
			<div class="buscar">
					  <form id="form" name="fo3" action="buscar.php" method="POST" >
				      <input type="text" name="texto" id="search" placeholder="Buscar temas..." />
				      <input type="hidden" name="tipobuscar" value="tema1"/>
				     </form>
			</div>
		</div>
		<div class="cont_registros">
			<?php 
				if($db->ListarModulos()){	
					$result_1 = $db->ListarModulos();
					while($r_1 = mysql_fetch_assoc($result_1)){
				?>
					<section>
						<h2><?php  echo $r_1["Nombre"]; ?> <a class="btn_editar_01" href="gestion_modulo.php?gestion=actualizar&idx=<?php echo  $r_1["IdModulo"]?>">Editar</a></h2>
					</section>
					<section>
						<?php 
						$idx_modulo = $r_1["IdModulo"];
						if($db->ListarTemasPorModulo($idx_modulo)){	
							$result_2 = $db->ListarTemasPorModulo($idx_modulo);
							while($r_2 = mysql_fetch_assoc($result_2)){
						?>
							<a class="reg_item" href="gestion_tema.php?gestion=actualizar&idx=<?php echo  $r_2["IdTema"]?>">
								<b><?php  echo $r_2["Nombre"]; ?></b>		
								<p><?php  echo $r_2["Modulo"]; ?></p>		
								<p><span class="icon-items <?php if ($r_2["Estado"]=="Activo"){echo "icon-visto1";}else{echo "icon-bloqueo";}?>"></span><?php  echo $r_2["Estado"]; ?></p>
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
	<?php include '../mensajes/mensajes.php'; ?>
</body>
</html>
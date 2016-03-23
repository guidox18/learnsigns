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
		                $('#registros').html(data);
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
					<h1>Gestion Usuarios</h1>
					<p>administradores</p>
				</section>
				<section>
					<a class="optionx" href="gestion_usuario.php?gestion=agregar">
						<span  class="op_usuarios icon-items icon-usumas"></span>
						<label>Usuario</label>
					</a>
					<a class="optionx" href="reporte.php?tipo=listaadministradores">
						<span  class="op_usuarios icon-items icon-imprimir"></span>
						<label>Reporte</label>
					</a>
					<a class="optionx" href="reporte.php?tipo=listaalumnos">
						<span  class="op_usuarios icon-items icon-imprimir"></span>
						<label>Alumnos</label>
					</a>
				</section>
			</div>
			<div class="buscar">
				<form id="form" name="fo3" action="buscar.php" method="POST" >
				    <input type="text" name="texto" id="search" placeholder="Buscar..." />
				    <input type="hidden" name="tipobuscar" value="usuario"/>
				</form>
			</div>
		</div>
		<div class="cont_registros">
			<section id="registros">
				<?php 
				if($db->ListarAdministradores()){	
					$result = $db->ListarAdministradores();
					while($r = mysql_fetch_assoc($result)){
				?>
					<a class="reg_item" href="gestion_usuario.php?gestion=actualizar&idx=<?php echo  $r["IdAdministrador"]?>">
						<b><?php  echo $r["Nombre"]." ".$r["Apellidos"];?> </b>
						<p><?php  echo $r["CorreoElectronico"]; ?></p>
						<p><span class="icon-items <?php if ($r["Estado"]=="Activo"){echo "icon-visto1";}else{echo "icon-bloqueo";}?>"></span><?php  echo $r["Estado"]; ?></p>
						
					</a>				
				<?php   
					}
				}else{
					echo "No hay registros";
					}
				?>
			</section>
			
		</div>
		
	</div>
	<?php include '../mensajes/mensajes.php'; ?>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>LearnSigns</title>
	<link rel="icon" type="image/png" href="../img/icono.png" />
	<link rel="stylesheet" href="../css/estilos.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<script src="../js/jquery.js"></script>
	<script type="text/javascript" language="javascript">
	$(window).load(function(){

	 $(function() {
	  $('#foto').change(function(e) {
	      addImage(e); 
	     });

	     function addImage(e){
	      var file = e.target.files[0],
	      imageType = /image.*/;
	    
	      if (!file.type.match(imageType))
	       return;
	  
	      var reader = new FileReader();
	      reader.onload = fileOnload;
	      reader.readAsDataURL(file);
	     }
	  
	     function fileOnload(e) {
	      var result=e.target.result;
	      $('#imgSalida').attr("src",result);
	     }
	    });
	  });
	</script>
</head>
<body>
	<div id="contenedor2">
		<?php include 'menu.php'; ?>
<?php 
$gestion = $_GET["gestion"];
switch ($gestion) {
	case "agregar":
		$action = "action/articulo_agregar.php";
		$titulo = "Registrar Articulo";
		//valores
		$idx="";
		$titulox="";
		$descripcionx="";
		$imagenx="";
		$estadox="";

	break;
	case "actualizar":
		$action = "action/articulo_actualizar.php";
		$titulo = "Actualizar Articulo";
		$idx = $_GET["idx"];

		if($db->DetallarArticulo($idx ))
		{	
			$result = $db->DetallarArticulo($idx );
			while($r = mysql_fetch_assoc($result)) {
			 	//valores
				$titulox = $r["Titulo"];
				$descripcionx = $r["Descripcion"]; 
				$imagenx = $r["urlFoto"];
				$estadox = $r["Estado"];
			}
				}else{
					echo "Error :c";
				}
	break;
} 
?>

		<div class="form_gestion">
			<section>
				<h2><?php echo $titulo ?></h2>
			</section>
			<form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
				<div class="frm_izquierda">
					<input type="hidden" name="idx"  value="<?php echo $idx;?>">
					<input type="hidden" name="fotox"  value="<?php echo $imagenx;?>">

					<label for="">Titulo:</label>
					<input type="text" name="Titulo" value="<?php echo $titulox ;?>"required>
					<label for="">Descripción:</label>
					<textarea name="Descripcion"  ><?php echo $descripcionx ;?></textarea>
					<label for="">Estado:</label>
					<div class="estadoitem">
						<input type="radio" name="radio_estado" value="Activo" <?php if ($gestion=="agregar" or $estadox=="Activo") {echo "checked";}?>><p>Activo</p>
					</div>
					<div class="estadoitem">
						<input type="radio" name="radio_estado" value="Inactivo" <?php if ($estadox=="Inactivo") {echo "checked";}?>><p>Inactivo</p>
					</div>
					

				</div>

				<div class="frm_derecha">
					<label for="">Imagen:</label>
					<input name="foto" id="foto" accept="image/*" type="file">
					<div class="img_form">
						<img  id="imgSalida" src="
						<?php if ($gestion=="agregar") {echo "../img/error_2.jpg";}else{echo "../img/articulo/"."$imagenx";}?>
						" 
						alt="">
					</div>
					
					
				</div>

				<div class="botones">
					<?php if ($gestion == "agregar") {
					?>
						<button type="submit" class="b_guardar">Registrar</button>
					<?
					}else{?>
						<button type="submit"  name="modificar" class="b_modificar" value="modificar">Modificar</button>
						<button  type="submit" name="borrar" class="b_descartar" value ="borrar">Descartar</button>
					<?php } ?>						
				</div>
			</form>
		</div>		
	</div>
</body>
</html>


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
		$action = "action/pregunta_agregar.php";
		$titulo = "Registrar Pregunta";
		//valores
		$idx="";
		$idtemax=$_GET["idtema"];;

		$preguntax="";
		$imagenx="";
		$alt1x="";
		$alt2x="";
		$alt3x="";
		$respuestax="";

	break;
	case "actualizar":
		$action = "action/pregunta_actualizar.php";
		$titulo = "Actualizar Pregunta";
		$idx = $_GET["idx"];

		if($db->DetallarPregunta($idx ))
		{	
			$result = $db->DetallarPregunta($idx );
			while($r = mysql_fetch_assoc($result)) {
			 	//valores
			 	$idtemax = $r["IdTema"];
				$preguntax = $r["Pregunta"];
				$imagenx = $r["Imagen"]; 
				$alt1x = $r["Alternativa1"];
				$alt2x = $r["Alternativa2"];
				$alt3x = $r["Alternativa3"];
				$respuestax = $r["Respuesta"]; 
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
					<input type="hidden" name="idtema"  value="<?php echo $idtemax;?>">
					<input type="hidden" name="idx"  value="<?php echo $idx;?>">
					<input type="hidden" name="fotox"  value="<?php echo $imagenx;?>">

					<label for="">Pregunta:</label>
					<input type="text" name="Pregunta" value="<?php echo $preguntax ;?>"required>
					<label for="">Alternativa 1:</label>
					<input type="text" name="Alternativa1" value="<?php echo $alt1x ;?>"required>
					<label for="">Alternativa 2:</label>
					<input type="text" name="Alternativa2" value="<?php echo $alt2x ;?>"required>
					<label for="">Alternativa 3:</label>
					<input type="text" name="Alternativa3" value="<?php echo $alt3x ;?>"required>

					

				</div>

				<div class="frm_derecha">
					<label for="">Imagen:</label>
					<input name="foto" id="foto" accept="image/*" type="file">
					<div class="img_form">
						<img  id="imgSalida" src="
						<?php if ($gestion=="agregar") {echo "../img/error_2.jpg";}else{echo "../img/pregunta/"."$imagenx";}?>
						" 
						alt="">
					</div>
					
					<label for="">Respuesta:</label>
					<select class="form-control" name="Respuesta" id="respuesta">
                    	<option value="Alternativa 1" <?php if ($gestion=="agregar" or $respuestax=="Alternativa 1") {echo "selected";}?> >Alternativa 1</option>
						<option value="Alternativa 2" <?php if ($respuestax=="Alternativa 2") {echo "selected";}?> >Alternativa 2</option>	
						<option value="Alternativa 3" <?php if ($respuestax=="Alternativa 3") {echo "selected";}?>>Alternativa 3</option>						
                    </select>
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

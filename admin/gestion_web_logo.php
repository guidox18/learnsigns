
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
$action = "action/logo_actualizar.php";
if($db->DetallarWeb()){	
	$result = $db->DetallarWeb();
			while($r = mysql_fetch_assoc($result)) {
			 	//valores
				$logo= $r["UrlLogo"];
			}
				}else{
					echo "Error :c";
				}
	

?>

		<div class="form_gestion">
			<section>
				<h2>Gestionar Titulo</h2>
			</section>
			<form action="<?php echo $action; ?>" method="POST" enctype="multipart/form-data">
				<div class="frm_izquierda">
					<input type="hidden" name="fotox"  value="<?php echo $logo;?>">
					<label for="">Seleccione un logo:</label>
					<input name="foto" id="foto"  accept="image/*" type="file">
					<div class="img_form">
						<img id="imgSalida"  src="<?php echo '../img/logo/'.$logo ?>" 
						alt="">
					</div>
				</div>
				

				<div class="botones">
					<button type="submit" class="b_modificar">Modificar</button>				
				</div>
			</form>
		</div>		
	</div>
</body>
</html>

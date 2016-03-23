<?php 
session_start(); 

$fotox = $_POST["fotox"];

	if ($_FILES['foto']['name']!="") {
		$nombreguardar = "logo.png";
		$ruta1=$_FILES['foto']['tmp_name'];
		$destino1="../../img/logo/logo.png";


		if(!copy($ruta1,$destino1)){
			echo "error al copiar el archivo";
		}else{
			echo "archivo subido con exito";
		}
	}else{
		$nombreguardar = $fotox;
		echo "<br> no hay foto";
	}


require_once '../../config/funciones_bd.php';
$db = new funciones_BD();
    if($db->ActualizarLogo($nombreguardar))
	{	
		//echo "ACTUALIZADO======\n";
		header("location: ../web.php?mensaje=2");
	}else{
		//echo "ERROR============\n";
		header("location: ../web.php?mensaje=4");
	}

?>
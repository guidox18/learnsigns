<?php 
require_once '../../config/funciones_bd.php';
date_default_timezone_set("America/Bogota");
$db = new funciones_BD();
session_start();


$fotox = $_POST["fotox"];

$titulox = $_POST["Titulo"];
$descripcionx = $_POST['Descripcion'];
$estadox = $_POST["radio_estado"];




if($db->CantArticulos()){	
	$result_3 = $db->CantArticulos();
	while($r_3 = mysql_fetch_assoc($result_3)){
			$cant= $r_3["cantidad"];
			$idx=1+$cant;
		}
	}
					

	if ($_FILES['foto']['name']!="") {
		$nombreguardar = "articulo_".$idx.".jpg";
		$ruta1=$_FILES['foto']['tmp_name'];
		$destino1="../../img/articulo/articulo_".$idx.".jpg";

		/*echo "nombreguardar: ".$nombreguardar;
		echo "<br>ruta1: ".$ruta1;
		echo "<br>destino: ".$destino1;*/

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
    if($db->AgregarArticulo($titulox,$descripcionx,$nombreguardar,$estadox))
	{	
		//echo "AGREGADO======\n";
		header("location: ../gestion_articulo.php?mensaje=1");
	}else{
		//echo "ERROR============\n";
		header("location: ../gestion_articulo.php?mensaje=4");
	}

?>
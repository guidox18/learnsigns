<?php 
require_once '../../config/funciones_bd.php';
$db = new funciones_BD();
session_start(); 

$idx = $_POST["idx"];
$fotox = $_POST["fotox"];

$titulox = $_POST["Titulo"];
$descripcionx = $_POST['Descripcion'];
$estadox = $_POST["radio_estado"];

if ($_POST["modificar"]) {
//----------

	if ($_FILES['foto']['name']!="") {
		$nombreguardar = "articulo_".$idx.".jpg";
		$ruta1=$_FILES['foto']['tmp_name'];
		$destino1="../../img/articulo/articulo_".$idx.".jpg";

		echo "nombreguardar: ".$nombreguardar;
		echo "<br>ruta1: ".$ruta1;
		echo "<br>destino: ".$destino1;

		if(!copy($ruta1,$destino1)){
			echo "error al copiar el archivo";
		}else{
			echo "archivo subido con exito";
		}
	}else{
		$nombreguardar = $fotox;
		echo "<br> no hay foto";
	}

    if($db->ActualizarArticulo($idx,$titulox,$descripcionx,$nombreguardar,$estadox))
	{	
		//echo "ACTUALIZADO======\n";
		header("location: ../gestion_articulo.php?mensaje=2");
	}else{
		//echo "ERROR============\n";
		header("location: ../gestion_articulo.phpmensaje=4");
	}
//----------
}
if ($_POST["borrar"]) {
	 if($db->EliminarArticulo($idx))
	{	
		//echo "ELIMINADO======\n";
		header("location: ../gestion_articulo.php?mensaje=3");
	}else{
		//echo "ERROR============\n";
		header("location: ../gestion_articulo.php?mensaje=4");
	}
}


?>
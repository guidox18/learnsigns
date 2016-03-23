<?php 
require_once '../../config/funciones_bd.php';
$db = new funciones_BD();
session_start(); 
$idtemax = $_POST["idtema"];
$idx = $_POST["idx"];
$fotox = $_POST["fotox"];

$preguntax = $_POST["Pregunta"];
$alt1x = $_POST['Alternativa1'];
$alt2x = $_POST["Alternativa2"];
$alt3x = $_POST["Alternativa3"];
$respuestax = $_POST["Respuesta"]; 

if ($_POST["modificar"]) {
//----------

	if ($_FILES['foto']['name']!="") {
		$nombreguardar = "pregunta_".$idtemax."_".$idx.".jpg";
		$ruta1=$_FILES['foto']['tmp_name'];
		$destino1="../../img/pregunta/pregunta_".$idtemax."_".$idx.".jpg";

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

    if($db->ActualizarPregunta($idx,$preguntax,$nombreguardar,$alt1x,$alt2x,$alt3x,$respuestax))
	{	
		//echo "ACTUALIZADO======\n";
		header("location: ../gestion_pregunta.php?idx=".$idtemax."&mensaje=2");
	}else{
		//echo "ERROR============\n";
		header("location: ../gestion_pregunta.php?idx=".$idtemax."&mensaje=4");
	}
//----------
}
if ($_POST["borrar"]) {
	 if($db->EliminarPregunta($idx))
	{	
		//echo "ELIMINADO======\n";
		header("location: ../gestion_pregunta.php?idx=".$idtemax."&mensaje=3");
	}else{
		//echo "ERROR============\n";
		header("location: ../gestion_pregunta.php?idx=".$idtemax."&mensaje=4");
	}
}


?>
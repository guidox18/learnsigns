<?php 
require_once '../../config/funciones_bd.php';
date_default_timezone_set("America/Bogota");
$db = new funciones_BD();
session_start();


$idtemax = $_POST["idtema"];
$fotox = $_POST["fotox"];
$preguntax = $_POST["Pregunta"];
$alt1x = $_POST['Alternativa1'];
$alt2x = $_POST["Alternativa2"];
$alt3x = $_POST["Alternativa3"];
$respuestax = $_POST["Respuesta"]; 





if($db->CantPreguntas($idtemax)){	
	$result_3 = $db->CantPreguntas($idtemax);
	while($r_3 = mysql_fetch_assoc($result_3)){
			$idx= $r_3["cantidad"];
		}
	}
					

	if ($_FILES['foto']['name']!="") {
		$nombreguardar = "pregunta_".$idtemax."_".$idx.".jpg";
		$ruta1=$_FILES['foto']['tmp_name'];
		$destino1="../../img/pregunta/pregunta_".$idtemax."_".$idx.".jpg";

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
    if($db->AgregarPregunta($idtemax,$preguntax,$nombreguardar,$alt1x,$alt2x,$alt3x,$respuestax))
	{	
		//echo "AGREGADO======\n";
		header("location: ../gestion_pregunta.php?idx=".$idtemax."&mensaje=1");
	}else{
		//echo "ERROR============\n";
		header("location: ../gestion_pregunta.php?idx=".$idtemax."&mensaje=4");
	}

?>
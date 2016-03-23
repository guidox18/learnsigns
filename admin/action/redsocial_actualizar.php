<?php 
session_start();

$idx= $_POST["idx"];
$tipox= $_POST["Tipo"];
$urlx= $_POST["Url"];
$estadox = $_POST["radio_estado"];
	
require_once '../../config/funciones_bd.php';
$db = new funciones_BD();
    if($db->ActualizarRedSocial($idx,$tipox,$urlx,$estadox))
	{	
		//echo "Actualizado";
		header("location: ../gestion_redes_sociales.php?mensaje=2");
	}else{
		echo "Error";
		header("location: ../gestion_redes_sociales.php?mensaje=4");
	}

?>
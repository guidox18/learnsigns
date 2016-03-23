<?php 
session_start();

$tipox= $_POST["Tipo"];
$urlx= $_POST["Url"];
$estadox = $_POST["radio_estado"];
	
require_once '../../config/funciones_bd.php';
$db = new funciones_BD();
    if($db->AgregarRedSocial($tipox,$urlx,$estadox))
	{	
		//echo "Agregado";
		header("location: ../gestion_redes_sociales.php?mensaje=1");
	}else{
		//echo "Error";
		header("location: ../gestion_redes_sociales.php?mensaje=4");
	}

?>
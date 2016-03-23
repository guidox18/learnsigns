<?php 
session_start(); 

$nombrex = $_POST["Nombre"];
$posicionx = $_POST["Posicion"];
$estadox = $_POST["radio_estado"];


require_once '../../config/funciones_bd.php';
$db = new funciones_BD();
    if($db->AgregarModulo($nombrex,$posicionx,$estadox))
	{	
		//echo "AGREGADO======\n";
		header("location: ../curso_administrador.php?mensaje=1");
	}else{
		//echo "ERROR============\n";
		header("location: ../curso_administrador.php?mensaje=4");
	}

?>
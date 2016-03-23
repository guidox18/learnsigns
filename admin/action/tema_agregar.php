<?php 
session_start(); 

$idmodulox=$_POST["Modulo"];
$nombrex = $_POST["Nombre"];
$urlvideox = $_POST["Urlvideo"];
$descripcionx = $_POST["Descripcion"];;
$estadox = $_POST["radio_estado"];


require_once '../../config/funciones_bd.php';
$db = new funciones_BD();
    if($db->AgregarTema($idmodulox,$nombrex,$urlvideox,$descripcionx,$estadox))
	{	
		//echo "AGREGADO======\n";
		header("location: ../curso_administrador.php?mensaje=1");
	}else{
		//echo "ERROR============\n";
		header("location: ../curso_administrador.php?mensaje=4");
	}

?>
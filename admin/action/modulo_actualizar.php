<?php 
session_start(); 
$idx = $_POST["idx"];

$nombrex = $_POST["Nombre"];
$posicionx = $_POST["Posicion"];
$estadox = $_POST["radio_estado"];


require_once '../../config/funciones_bd.php';
$db = new funciones_BD();
    if($db->ActualizarModulo($idx,$nombrex,$posicionx,$estadox))
	{	
		//echo "ACTUALIZADO======\n";
		//$IdUsuario,$IP, $Tipo, $Tabla, $IdRegistro
		//$db->Auditoria($_SESSION['usu_id'],$_SESSION['IP'],'3','USUARIO',$idx);
		header("location: ../curso_administrador.php?mensaje=2");
	}else{
		//echo "ERROR============\n";
		header("location: ../curso_administrador.php?mensaje=4");
	}

?>
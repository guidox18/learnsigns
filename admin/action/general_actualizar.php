<?php 
session_start(); 

$general1=$_POST["General1"];
$general2 = $_POST["General2"];



require_once '../../config/funciones_bd.php';
$db = new funciones_BD();
    if($db->ActualizarGeneral($general1,$general2))
	{	
		//echo "ACTUALIZADO======\n";
		//$IdUsuario,$IP, $Tipo, $Tabla, $IdRegistro
		//$db->Auditoria($_SESSION['usu_id'],$_SESSION['IP'],'3','USUARIO',$idx);
		header("location: ../web.php");
	}else{
		echo "ERROR============\n";
		header("location: ../web.php");
	}

?>
<?php 
session_start(); 

$pie=$_POST["Pie"];



require_once '../../config/funciones_bd.php';
$db = new funciones_BD();
    if($db->ActualizarPie($pie))
	{	
		//echo "ACTUALIZADO======\n";
		//$IdUsuario,$IP, $Tipo, $Tabla, $IdRegistro
		//$db->Auditoria($_SESSION['usu_id'],$_SESSION['IP'],'3','USUARIO',$idx);
		header("location: ../web.php?mensaje=2");
	}else{
		//echo "ERROR============\n";
		header("location: ../web.php?mensaje=4");
	}

?>
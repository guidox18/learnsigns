<?php 
session_start(); 

$mesanje1=$_POST["Mensaje1"];
$mesanje2 = $_POST["Mensaje2"];



require_once '../../config/funciones_bd.php';
$db = new funciones_BD();
    if($db->ActualizarMensaje($mesanje1,$mesanje2))
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
<?php 
session_start(); 
$idx = $_POST["idx"];

$idmodulox=$_POST["Modulo"];
$nombrex = $_POST["Nombre"];
$urlvideox = $_POST["Urlvideo"];
$descripcionx = $_POST["Descripcion"];;
$estadox = $_POST["radio_estado"];



require_once '../../config/funciones_bd.php';
$db = new funciones_BD();
    if($db->ActualizarTema($idx,$idmodulox,$nombrex,$urlvideox,$descripcionx,$estadox))
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
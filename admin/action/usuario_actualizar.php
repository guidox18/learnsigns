<?php 
session_start(); 
$idx = $_POST["idx"];

$dnix = $_POST["Dni"];
$nombrex = $_POST["Nombre"];
$apellidosx = $_POST["Apellidos"]; 
$emailx = $_POST["Email"];
$direccionx = $_POST["Direccion"];
$telefonox = $_POST["Telefono"];
$celularx = $_POST["Celular"];
$sexox = $_POST["radio_sexo"];
$estadox = $_POST["radio_estado"];


require_once '../../config/funciones_bd.php';
$db = new funciones_BD();
    if($db->ActualizarAdministrador($idx,$dnix,$nombrex,$apellidosx,$emailx,$direccionx,$telefonox,$celularx,$sexox,$estadox))
	{	
		//echo "ACTUALIZADO======\n";
		//$IdUsuario,$IP, $Tipo, $Tabla, $IdRegistro
		//$db->Auditoria($_SESSION['usu_id'],$_SESSION['IP'],'3','USUARIO',$idx);
		header("location: ../usuarios.php?mensaje=2");
	}else{
		//echo "ERROR============\n";
		header("location: ../usuarios.php?mensaje=4");
	}

?>
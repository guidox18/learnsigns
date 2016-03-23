<?php 
session_start();
require_once '../../config/funciones_bd.php';
$db = new funciones_BD();

$dnix = $_POST["Dni"];
$nombrex = $_POST["Nombre"];
$apellidosx = $_POST["Apellidos"]; 
$emailx = $_POST["Email"];
$direccionx = $_POST["Direccion"];
$telefonox = $_POST["Telefono"];
$celularx = $_POST["Celular"];
$sexox = $_POST["radio_sexo"];
$estadox = $_POST["radio_estado"];
$passx = SHA1($_POST['Dni']);


if($db->ValidarEmailAdmin($emailx)){	
	$resultx = $db->ValidarEmailAdmin($emailx );
	while($rz = mysql_fetch_assoc($resultx)) {
	$validarx = $rz["Validar"];
	if ($validarx=='0') {
		if($db->AgregarUsuario($dnix,$nombrex,$apellidosx,$emailx,$direccionx,$telefonox,$celularx,$sexox,$estadox,$passx))
		{	
			//echo "Agregado";
			header("location: ../usuarios.php?mensaje=1");
		}else{
			//echo "Error";
			header("location: ../usuarios.php?mensaje=4");
		}
	}
	else{
		echo "El Email ya esta registrado";
	}


	}
}else{
	echo "Error :c";
}


	



    

?>
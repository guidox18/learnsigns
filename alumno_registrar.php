<?php 
session_start();
require_once 'config/funciones_bd.php';
$db = new funciones_BD();

$nombrex = $_POST["Nombre"];
$apellidosx = $_POST["Apellidos"]; 
$emailx = $_POST["Email"];
$fechax = $_POST["FechaNacimiento"];
$sexox = $_POST["radio_sexo"];
$estadox = 'Activo';
$passx1 = $_POST['Pass1'];
$passx2 = $_POST['Pass2'];

if($db->ValidarEmailAlumno($emailx)){	
	$resultx = $db->ValidarEmailAlumno($emailx );
	while($rz = mysql_fetch_assoc($resultx)) {
	$validarx = $rz["Validar"];
	if ($validarx=='0') {
		echo "Email Valido <br>";
		//header("location: acceso.php");
		if ($passx1==$passx2) {
				$passx = SHA1($_POST['Pass1']);
				    if($db->RegistrarAlumno($nombrex,$apellidosx,$emailx,$fechax,$sexox,$estadox,$passx))
					{	
						echo "Agregado";
						//header("location: acceso.php");
					}else{
						echo "Error";
						//header("location: acceso.php");
					}
				}
				else{
					echo "La contraseña no coincide";
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
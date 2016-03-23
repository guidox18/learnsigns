<?php 
session_start(); 
$idx = $_SESSION['usu_id'];
$clave_actual = SHA1($_POST['pass1']);
$clave_new = SHA1($_POST['pass2']);
$clave_new_2 = SHA1($_POST['pass3']);

require_once '../../config/funciones_bd.php';
$db = new funciones_BD();

if ($clave_new==$clave_new_2) {
	if($db->DetallarPassAlumno($idx)){	
	$result = $db->DetallarPassAlumno($idx);
		while($r = mysql_fetch_assoc($result)) {
			$pass = $r["Pass"];
		}
		//Validar si $clave_actual es igual a $pass
		if ($clave_actual==$pass) {
			echo "<br>Password correcto";
			if($db->ActualizarPassAlumno($idx,$clave_new))
			{	
				//echo "<br>ACTUALIZADO======\n";
				//$IdUsuario,$IP, $Tipo, $Tabla, $IdRegistro
				//$db->Auditoria($_SESSION['usu_id'],$_SESSION['IP'],'3','USUARIO',$idx);
				header("location: ../curso_alumno.php");
			}else{
				//echo "<br>ERROR============\n";
				header("location: ../curso_alumno.php");
			}
		}else{
			echo "<br>Password Incorrecto";
		}
	}else{
		echo "<br>Error :c";
	}

}else{
	echo "La contraseña no coincide";
}



//$idx,$nivelx,$dnix,$nombrex,$apellidosx,$emailx,$direccionx,$celularx,$telefonox,$nombreguardar,$estadox
    /*if($db->ActualizarPropietario($idx,$pass))
	{	
		echo "<br>ACTUALIZADO======\n";
		//header("location: ../../../gestion.php?tabla=perfil&gestion=actualizar");
	}else{
		echo "<br>ERROR============\n";
		//header("location: ../../../gestion.php?tabla=perfil&gestion=actualizar");
	}*/

?>
<?php 
//include 'config/config.php';

$usu = $_POST['usu'];
$pass = SHA1($_POST['pass']);

require_once 'config/funciones_bd.php';
$db = new funciones_BD();

	if($db->AutentificarAdmin($usu,$pass)){
		 session_start(); 
		$result = ($db->AutentificarAdmin($usu,$pass));
		//echo "Estado: OK";
		$_SESSION['estado_session'] = "ok";	

		  while($r = mysql_fetch_assoc($result)) {
		  	$_SESSION['usu_id'] = $r["IdAdministrador"]; 
		  	$_SESSION['usu_nivel'] = $r["Administrador"]; 
			$_SESSION['usu_nombre'] = $r["Nombre"]/*." ".$r["Apellidos"]*/;
		  }
		//AUDITORIA ACCESO
			//$_SESSION['IP']=$_SERVER['REMOTE_ADDR'];
			//$db->AuditoriaAcceso($_SESSION['usu_id'],$_SESSION['IP']);

			//$IdUsuario,$IP, $Tipo, $Tabla, $IdRegistro
			//$db->Auditoria($_SESSION['usu_id'],$_SESSION['IP'],'1','USUARIO',$_SESSION['usu_id']);
			//echo "okay";

		header("location: admin/curso_administrador.php");
	}
	else
	{
		//echo "Estado: NO pudo logearse";
		header("Location: admin.php?mensaje=5");
	}
 ?>
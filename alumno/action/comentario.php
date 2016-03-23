<?php 
session_start(); 

$idalumnox=$_POST["idalumno"];
$idtemax = $_POST["idtema"];
$comentariox = $_POST["comentario"];
$fechax = date('Y-n-j');

require_once '../../config/funciones_bd.php';
$db = new funciones_BD();
    if($db->AgregarComentario($idalumnox,$idtemax,$comentariox,$fechax))
	{	
		if($db->ListarComentarios($idtemax)){	
			$result = $db->ListarComentarios($idtemax);
			while($r = mysql_fetch_assoc($result)){
?>				
			<div class="reg_comentario">
				<b><?php  echo $r["Nombre"]." ".$r["Apellidos"]; ?></b>
				<p><?php  echo $r["Comentario"]; ?></p>
				<span><?php  echo $r["Fecha"]; ?></span>
			</div>
<?php   
			}
		}else{
			echo "";
			}
	}else{
		echo "error :C";
	}

?>
<?php 
session_start();
require_once '../../config/funciones_bd.php';
$db = new funciones_BD();
$idx=$_SESSION['usu_id'];
$nombrex = $_POST["Nombre"];
$apellidosx = $_POST["Apellidos"]; 
$emailx = $_POST["Email"];
$fechax = $_POST["FechaNacimiento"];
$sexox = $_POST["radio_sexo"];

if($db->ActualizarAlumno($idx,$nombrex,$apellidosx,$emailx,$fechax,$sexox))
					{	
						//echo "Actualizado";
						header("location: ../curso_alumno.php");
					}else{
						//echo "Error";
						header("location: ../curso_alumno.php");
					}






?>
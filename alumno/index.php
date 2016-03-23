<?php 
session_start();

if (!isset($_SESSION['estado_session'])) {
  header("location: ../admin.php");
} else{
  header("location: curso_alumno.php");
}
 ?>
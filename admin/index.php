<?php 
session_start();

if (!isset($_SESSION['estado_session'])) {
  header("location: ../admin.php");
} else{
  header("location: web.php");
}
 ?>
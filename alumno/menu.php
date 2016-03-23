<?php 
require_once '../config/funciones_bd.php';
date_default_timezone_set("America/Bogota");
$db = new funciones_BD();
session_start();

if (!isset($_SESSION['estado_session'])) {
  header("location: ../acceso.php");
} 
 ?>
<script src="../js/menu_usuario.js"></script>
<nav class="nav_c2">
   <a id="responsive-clic" class="responsive_menu" href="#"><span class="icon-items icon-menu"></span></a>
	<a href=""><img id="logo" src="../img/logo01.png" alt=""></a>
   <div class="responsive_items">
	  <a class="nav_item" href="curso_alumno.php" >Curso</a>	
	  <a class="nav_item" href="evaluacion_historial.php" >Evaluaciones</a>	
   </div>

	<ul class="user">
      <a id="usuario-clic" href="#">
            <p><?echo $_SESSION['usu_nombre'];?><span class="icon-items icon-flecha1"></span></p>

      </a>
      <ul class="sub-items">        
            <li><a href="perfil_gestion.php"><span class="icon-items icon-usu"></span>Perfil</a></li>
            <li><a href="password_gestion.php?idx=<?php echo $_SESSION['usu_id'];?>"><span class="icon-items icon-llave"></span>Cambiar contraseña</a></li>
            <li><a href="destruir.php"><span class="icon-items icon-exit"></span>Salir</a></li> 

      </ul>
   </ul>
</nav>
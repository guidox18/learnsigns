<?php 
$tipogbuscar=$_POST["tipobuscar"];
$texto=$_POST["texto"];

require_once '../config/funciones_bd.php';
$db = new funciones_BD();

if ($tipogbuscar=="usuario") {
	if($db->BuscarAdministrador($texto)){	
	$result = $db->BuscarAdministrador($texto);
		while($r = mysql_fetch_assoc($result)) {
?>
		<a class="reg_item" href="gestion_usuario.php?gestion=actualizar&idx=<?php echo  $r["IdAdministrador"]?>">
			<b><?php  echo $r["Nombre"]." ".$r["Apellidos"];?></b>
			<p><?php  echo $r["CorreoElectronico"]; ?></p>
			<p><span class="icon-items <?php if ($r["Estado"]=="Activo"){echo "icon-visto1";}else{echo "icon-bloqueo";}?>"></span><?php  echo $r["Estado"]; ?></p>	
		</a>			
<?php   
		}
	}else{
		echo "No se encontraron registros";
	}				
}
elseif ($tipogbuscar=="propietario") {
	if($db->BuscarPropietario($texto)){	
	$result = $db->BuscarPropietario($texto);
		while($r = mysql_fetch_assoc($result)){
 ?>
 		<a class="registro" href="propietario_detalle.php?idx=<?php echo $r["IdPropietario"]; ?>">
			<section>
				<img src="img/usu.png">
			</section>
			<section>
				<ul>
					<li><b><?php  echo $r["Propietario"]; ?></b></li>
					<li><span class="icon-items icon-dni"></span><?php  echo $r["DNI"]; ?></li>
					<li><span class="icon-items icon-usu"></span><?php  echo $r["Email"]; ?></li>
				</ul>
			</section>
		</a>								
<?php   
		}
	}else{
		echo "No se encontraron registros";
	}	
}			
elseif ($tipogbuscar=="tema1") {
	echo "<section>";
	if($db->BuscarTema($texto)){	
	$result = $db->BuscarTema($texto);
		while($r = mysql_fetch_assoc($result)){
 ?>
 		<a class="reg_item" href="gestion_tema.php?gestion=actualizar&idx=<?php echo  $r["IdTema"]?>">
								<b><?php  echo $r["Nombre"]; ?></b>		
								<p><?php  echo $r["Modulo"]; ?></p>		
								<p><span class="icon-items <?php if ($r["Estado"]=="Activo"){echo "icon-visto1";}else{echo "icon-bloqueo";}?>"></span><?php  echo $r["Estado"]; ?></p>
		</a>								
<?php   
		}
	}else{
		echo "No se encontraron registros";
	}
	echo "</section>";	
}	
elseif ($tipogbuscar=="tema2") {
	echo "<section>";
	if($db->BuscarTema($texto)){	
	$result = $db->BuscarTema($texto);
		while($r = mysql_fetch_assoc($result)){
 ?>
		<a class="reg_item" href="gestion_pregunta.php?idx=<?php echo  $r["IdTema"]?>">
			<b><?php  echo $r["Nombre"]; ?></b>		
			<p>
				<?php  
				if($db->CantPreguntas($r["IdTema"])){	
					$result_3 = $db->CantPreguntas($r["IdTema"]);
					while($r_3 = mysql_fetch_assoc($result_3)){
						echo $r_3["cantidad"]." preguntas";
					}
				}
				?>
			</p>		
			<p><span class="icon-items <?php if ($r["Estado"]=="Activo"){echo "icon-visto1";}else{echo "icon-bloqueo";}?>"></span><?php  echo $r["Estado"]; ?></p>
		</a>	

<?php   
		}
	}else{
		echo "No se encontraron registros";
	}
	echo "</section>";	
}	
if ($tipogbuscar=="redsocial") {
	if($db->BuscarRedSocial($texto)){	
	$result = $db->BuscarRedSocial($texto);
		while($r = mysql_fetch_assoc($result)) {
?>
		<a class="reg_item" href="gestion_redes_sociales_item.php?gestion=actualizar&idx=<?php echo  $r["IdRedSocial"]?>">
			<b>
				<span class="icon-items 
					<?php 
					if ($r["Tipo"]=="Facebook"){echo "icon-facebook";}
					if($r["Tipo"]=="Twitter"){echo "icon-twitter";}
					if($r["Tipo"]=="Google+"){echo "icon-google";}
					if($r["Tipo"]=="otro"){echo "icon-mundo1";}
					?>">
				</span>
				<?php  echo $r["Tipo"]?> 
			</b>
			<p><span class="icon-items <?php if ($r["Estado"]=="Activo"){echo "icon-visto1";}else{echo "icon-bloqueo";}?>"></span><?php  echo $r["Estado"]; ?></p>
		</a>		
<?php   
		}
	}else{
		echo "No se encontraron registros";
	}				
}
if ($tipogbuscar=="articulo") {
	if($db->BuscarArticulo($texto)){	
	$result = $db->BuscarArticulo($texto);
		while($r = mysql_fetch_assoc($result)) {
?>
		<a class="reg_item" href="gestion_articulo_registro.php?gestion=actualizar&idx=<?php echo  $r["IdArticulo"]?>">
			<b>
				<?php  echo $r["Titulo"]?> 
			</b>
			<p><span class="icon-items <?php if ($r["Estado"]=="Activo"){echo "icon-visto1";}else{echo "icon-bloqueo";}?>"></span><?php  echo $r["Estado"]; ?></p>
			
		</a>		
<?php   
		}
	}else{
		echo "No se encontraron registros";
	}				
}
if ($tipogbuscar=="auspicio") {
	if($db->BuscarAuspicio($texto)){	
	$result = $db->BuscarAuspicio($texto);
		while($r = mysql_fetch_assoc($result)) {
?>
		<a class="reg_item" href="gestion_auspicio_registro.php?gestion=actualizar&idx=<?php echo  $r["IdAuspicio"]?>">
			<b>
				<?php  echo $r["Nombre"]?> 
			</b>
			<p><span class="icon-items <?php if ($r["Estado"]=="Activo"){echo "icon-visto1";}else{echo "icon-bloqueo";}?>"></span><?php  echo $r["Estado"]; ?></p>
			
		</a>		
<?php   
		}
	}else{
		echo "No se encontraron registros";
	}				
}
?>



<?php  
$mensaje_x ="";
$submensaje_x="";
$icono_x="";
$color_mensaje_x ="";

if (isset($_GET["mensaje"])) {
    $tipomensaje_x =$_GET["mensaje"];
      switch ($tipomensaje_x) {
        case "1": //Guardado correctamente
            $mensaje_x = "Guardado correctamente.";
            $submensaje_x = "El registro se ha guardado con éxito.";
            $icono_x = "icon-carita1";
            $color_mensaje_x ="mensaje_exito";
            break;
        case "2":
            $mensaje_x = "Actualizado correctamente.";
            $submensaje_x = "El registro se ha actualizado con éxito.";
            $icono_x = "icon-carita1";
            $color_mensaje_x ="mensaje_exito";
            break;  
        case "3":
            $mensaje_x = "Descartado correctamente.";
            $submensaje_x = "El eliminado se ha registrado con éxito.";
            $icono_x = "icon-carita1";
            $color_mensaje_x ="mensaje_exito";
            break;  

        case "4":
            $mensaje_x = "Ocurrió un problema.";
            $submensaje_x = "Descuide no es su culpa intentelo de nuevo.";
            $icono_x = "icon-carita4";
            $color_mensaje_x ="mensaje_error";
            break;  

        case "5":
            $mensaje_x = "Datos incorrectos";
            $submensaje_x = "Intentelo de nuevo.";
            $icono_x = "icon-carita4";
            $color_mensaje_x ="mensaje_error";
            break;  

        default:
            $mensaje_x =":(";
            $submensaje_x = "Descuide no es su culpa intentelo de nuevo.";
            $icono_x = "icon-carita4";
            $color_mensaje_x ="mensaje_error";
        }
?>
    <div class="mensaje_gestion <?php echo $color_mensaje_x; ?>">
        <section>
            <span class="icon-items <?php echo $icono_x; ?>"></span>
        </section>
        <section>
            <div class="btn_cerrar">
                <a class="clic_cerrar_mensaje" href="#">
                    <span class="icon-items icon-cerrar"></span>
                </a>
            </div>  
            <h2><?php echo $mensaje_x; ?></h2>
            <p><?php echo $submensaje_x; ?></p>
        </section>
    </div>
<?php
} 

?>



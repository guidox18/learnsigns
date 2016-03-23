<?php 
require_once('../libs/ezpdf/class.ezpdf.php');
date_default_timezone_set("America/Bogota"); 
$tituloreporte="";
$subtituloreporte="";
$pdf =& new Cezpdf('a4');
//$pdf->selectFont('../libs/ezpdf/fonts/courier.afm');
$pdf->selectFont('../libs/ezpdf/fonts/Helvetica.afm');
$pdf->ezSetCmMargins(1,1,1.5,1.5);

$conexion = mysql_connect("localhost", "root", "123456");
mysql_select_db("bdLearnSign", $conexion);


//FILTRAR
switch ($_GET["tipo"]) {
    case "listaadministradores":
        $queEmp = "SELECT * FROM ADMINISTRADOR";
        $resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
        $totEmp = mysql_num_rows($resEmp);

        $ixx = 0;
        while($datatmp = mysql_fetch_assoc($resEmp)) {
            $ixx = $ixx+1;
            $data[] = array_merge($datatmp, array('num'=>$ixx));
        }
        $titles = array(
                        'num'=>'<b>Num</b>',
                        'Dni'=>'<b>DNI</b>',
                        'Nombre'=>'<b>Nombre</b>',
                        'Apellidos'=>'<b>Apellidos</b>',
                        'Direccion'=>'<b>Direccion</b>',
                        'Telefono'=>'<b>Telefono</b>',
                        'Estado'=>'<b>Estado</b>'
                    );
        $tituloreporte="ADMINISTRADORES";
        $subtituloreporte="Reporte";
        break;
    case "listaalumnos":
        $queEmp = "SELECT * FROM ALUMNO";
        $resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
        $totEmp = mysql_num_rows($resEmp);

        $ixx = 0;
        while($datatmp = mysql_fetch_assoc($resEmp)) {
            $ixx = $ixx+1;
            $data[] = array_merge($datatmp, array('num'=>$ixx));
        }
        $titles = array(
                        'num'=>'<b>Num</b>',
                        'Nombre'=>'<b>Nombre</b>',
                        'Apellidos'=>'<b>Apellidos</b>',
                        'CorreoElectronico'=>'<b>Email</b>',
                        'Sexo'=>'<b>Sexo</b>'
                    );
        $tituloreporte ="ALUMNOS";
        $subtituloreporte ="Reporte";  
        break;  
    case "listatemas1":
        $queEmp = "SELECT  
            t.IdTema
            ,t.IdModulo
            ,m.Nombre Modulo
            ,t.Nombre
            ,t.UrlVideo
            ,t.Descripcion
            ,t.Estado
            FROM TEMA t
            INNER JOIN MODULO m ON m.IdModulo = t.IdModulo
            ORDER BY t.IdTema ASC";
        $resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
        $totEmp = mysql_num_rows($resEmp);

        $ixx = 0;
        while($datatmp = mysql_fetch_assoc($resEmp)) {
            $ixx = $ixx+1;
            $data[] = array_merge($datatmp, array('num'=>$ixx));
        }
        $titles = array(
                        'num'=>'<b>Num</b>',
                        'Modulo'=>'<b>Modulo</b>',
                        'Nombre'=>'<b>Tema</b>',
                        'Descripcion'=>'<b>Descripcion</b>',
                        'Estado'=>'<b>Estado</b>'
                    );
        $tituloreporte ="TEMAS";
        $subtituloreporte ="Reporte";  
        break;  

    case "listaredes":
        $queEmp = "SELECT  
            *
            FROM REDSOCIAL
            ORDER BY IdRedSocial ASC";
        $resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
        $totEmp = mysql_num_rows($resEmp);

        $ixx = 0;
        while($datatmp = mysql_fetch_assoc($resEmp)) {
            $ixx = $ixx+1;
            $data[] = array_merge($datatmp, array('num'=>$ixx));
        }
        $titles = array(
                        'num'=>'<b>Num</b>',
                        'Tipo'=>'<b>Tipo</b>',
                        'Url'=>'<b>URL</b>',
                        'Estado'=>'<b>Estado</b>'
                    );
        $tituloreporte ="REDES SOCIALES";
        $subtituloreporte ="Reporte";  
        break;  
    case "listararticulos":
        $queEmp = "SELECT  
            *
            FROM ARTICULO
            ORDER BY IdArticulo ASC";
        $resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
        $totEmp = mysql_num_rows($resEmp);

        $ixx = 0;
        while($datatmp = mysql_fetch_assoc($resEmp)) {
            $ixx = $ixx+1;
            $data[] = array_merge($datatmp, array('num'=>$ixx));
        }
        $titles = array(
                        'num'=>'<b>Num</b>',
                        'Titulo'=>'<b>Titulo</b>',
                        'Descripcion'=>'<b>Descripcion</b>',
                        'Estado'=>'<b>Estado</b>'
                    );
        $tituloreporte ="ARTICULOS";
        $subtituloreporte ="Reporte";  
        break;  
    case "listararauspicio":
        $queEmp = "SELECT  
            *
            FROM AUSPICIO
            ORDER BY IdAuspicio ASC";
        $resEmp = mysql_query($queEmp, $conexion) or die(mysql_error());
        $totEmp = mysql_num_rows($resEmp);

        $ixx = 0;
        while($datatmp = mysql_fetch_assoc($resEmp)) {
            $ixx = $ixx+1;
            $data[] = array_merge($datatmp, array('num'=>$ixx));
        }
        $titles = array(
                        'num'=>'<b>Num</b>',
                        'Nombre'=>'<b>Nombre</b>',
                        'Estado'=>'<b>Estado</b>'
                    );
        $tituloreporte ="AUSPICIOS";
        $subtituloreporte ="Reporte";  
        break; 

}

$options = array(
                'shadeCol'=>array(0.9,0.9,0.9),
                'xOrientation'=>'center',
                'width'=>500
            );
$txttit = "<b>$tituloreporte</b>\n";
$txttit.= "$subtituloreporte \n";

 

$pdf->ezText($txttit, 12);
$pdf->ezTable($data, $titles, '', $options);
$pdf->ezText("\n\n\n", 10);
$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);
$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezStream();

?>



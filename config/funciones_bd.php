<?php
//header('Content-Type: text/html; UTF-8');
class funciones_BD {
    private $db;
    // constructor
    function __construct() {
        require_once 'connectbd.php';
        // connecting to database
        $this->db = new DB_Connect();
        $this->db->connect();
    }
    // destructor
    function __destruct() {
    }

//VALIDAR NOTAS (muestra la mayor nota del alumno)
 public function ValidarEvaluacionNota($idx,$idtemax) {
        $result = mysql_query("SELECT * FROM EVALUACION 
        WHERE IdAlumno = '$idx' AND  IdTema = '$idtemax'
        ORDER BY Nota DESC limit 1");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }


//AGREGAR EVALUACION
    public function RegistrarEvaluacion($idalumnox,$idtemax,$fechax,$notax) {
        $result = mysql_query("INSERT INTO EVALUACION( 
                IdAlumno
                ,IdTema 
                ,Fecha
                ,Nota ) 
            VALUES(
                '$idalumnox'
                ,'$idtemax'
                ,'$fechax'
                ,'$notax'
                )");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
/*VALIDAR Evaluacion*/
 public function ValidarEvaluacion($idx) {
        $result = mysql_query("SELECT  COUNT(*) as Validar FROM EVALUACION 
            WHERE IdTema = '$idx'");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
/*VALIDAR si hay preguntas para la Evaluacion*/
 public function ValidarEvaluacionDisponible($idx) {
        $result = mysql_query("SELECT  COUNT(*) as Validar FROM PREGUNTA 
            WHERE IdTema = '$idx'");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
//LISTAR EVALUACIONES
    public function ListarEvaluacionesAlumno($idx) {
        $result = mysql_query("SELECT  
            e.IdEvaluacion
            ,e.IdAlumno
            ,e.IdTema
            ,t.Nombre Tema
            ,m.Nombre Modulo
            ,e.Fecha
            ,e.Nota
            FROM EVALUACION e
            INNER JOIN TEMA t ON t.IdTema = e.IdTema
            INNER JOIN MODULO m ON m.IdModulo = t.IdTema
            WHERE e.IdAlumno = '$idx'
            ORDER BY e.IdEvaluacion DESC");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }  
/*VALIDAR EMAIL ALUMNO*/
 public function ValidarEmailAlumno($emailx) {
        $result = mysql_query("SELECT  COUNT(*) as Validar FROM ALUMNO 
            WHERE CorreoElectronico = '$emailx'");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }


//AGREGAR ALUMNO
    public function RegistrarAlumno($nombrex,$apellidosx,$emailx,$fechax,$sexox,$estadox,$passx) {
        $result = mysql_query("INSERT INTO ALUMNO( 
                Nombre
                ,Apellidos 
                ,CorreoElectronico
                ,FechaNacimiento 
                ,Sexo 
                ,Estado
                ,Pass) 
            VALUES(
                '$nombrex'
                ,'$apellidosx'
                ,'$emailx'
                ,'$fechax'
                ,'$sexox'
                ,'$estadox'
                ,'$passx'
                )");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
//ACTUALIZAR ALUMNO
    public function ActualizarAlumno($idx,$nombrex,$apellidosx,$emailx,$fechax,$sexox) {
        $result = mysql_query("UPDATE ALUMNO SET 
            Nombre = '$nombrex'
            ,Apellidos= '$apellidosx'
            ,CorreoElectronico= '$emailx'
            ,FechaNacimiento= '$fechax'
            ,Sexo= '$sexox'
            WHERE IdAlumno = '$idx'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
/*DETALLAR  ALUMNO*/
    public function DetallarAlumno($idx) {
        $result = mysql_query("SELECT  * FROM ALUMNO WHERE IdAlumno= '$idx'");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
  
/*CAMBIAR PASS ALUMNO*/
 public function ActualizarPassAlumno($idx,$pass) {
        $result = mysql_query("UPDATE ALUMNO SET 
            Pass = '$pass'            
            WHERE IdAlumno = '$idx'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
/*DETALLAR PASS ALUMNO*/
    public function DetallarPassAlumno($idx) {
        $result = mysql_query("SELECT  Pass FROM ALUMNO WHERE IdAlumno= '$idx'");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

/*COMENTARIOS*/
//LISTAR COMENTARIOS
    public function ListarComentarios($idx) {
        $result = mysql_query("SELECT  
            c.IdComentario
            ,c.IdAlumno
            ,a.Nombre
            ,a.Apellidos
            ,c.IdTema
            ,c.Comentario
            ,c.Fecha
            FROM COMENTARIO c
            INNER JOIN ALUMNO a ON c.IdAlumno = a.IdAlumno
            WHERE c.IdTema = '$idx'
            ORDER BY c.IdComentario DESC");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
//AGREGAR COMEENTARIO
    public function AgregarComentario($idalumnox,$idtemax,$comentariox,$fechax) {
        $result = mysql_query("INSERT INTO COMENTARIO( 
                IdAlumno
                ,IdTema 
                ,Comentario 
                ,Fecha) 
            VALUES(
                '$idalumnox'
                ,'$idtemax'
                ,'$comentariox'
                ,'$fechax'
                )");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

/*LOGIN ALUMNO*/
    public function AutentificarAlumno($usu,$pass) {
        $result = mysql_query("SELECT 
        *
        FROM  ALUMNO 
        WHERE CorreoElectronico = '$usu' AND Pass  = '$pass' AND Estado='Activo'");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }


/*LOGIN*/
    public function AutentificarAdmin($usu,$pass) {
        $result = mysql_query("SELECT 
        a.IdAdministrador
        ,a.Dni
        ,a.Nombre
        ,a.Apellidos
        ,a.CorreoElectronico
        ,a.Direccion
        ,a.Telefono
        ,a.Celular
        ,a.Sexo
        ,a.Estado
        ,a.Pass
        FROM  ADMINISTRADOR a
        WHERE a.CorreoElectronico = '$usu' AND a.Pass  = '$pass' AND a.Estado='Activo'");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

/*VALIDAR EMAIL ADMIN*/
 public function ValidarEmailAdmin($emailx) {
        $result = mysql_query("SELECT  COUNT(*) as Validar FROM ADMINISTRADOR 
            WHERE CorreoElectronico = '$emailx'");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
/*CAMBIAR PASS ADMINISTRADOR*/
 public function ActualizarPass($idx,$pass) {
        $result = mysql_query("UPDATE ADMINISTRADOR SET 
            Pass = '$pass'            
            WHERE IdAdministrador = '$idx'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
/*DETALLAR PASS*/
    public function DetallarPass($idx) {
        $result = mysql_query("SELECT  Pass FROM ADMINISTRADOR WHERE IdAdministrador= '$idx'");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

/*LISTAR ADMINISTRADORES*/
    public function ListarAdministradores() {
        $result = mysql_query("SELECT  * FROM ADMINISTRADOR ORDER BY IdAdministrador ASC");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
/*DETALLAR ADMINISTRADOR*/
    public function DetallarAdministrador($idx) {
        $result = mysql_query("SELECT  * FROM ADMINISTRADOR WHERE IdAdministrador = '$idx'");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
//AGREGAR ADMINISTRADOR
    public function AgregarUsuario($dnix,$nombrex,$apellidosx,$emailx,$direccionx,$telefonox,$celularx,$sexox,$estadox,$passx) {
        $result = mysql_query("INSERT INTO ADMINISTRADOR( 
                Dni
                ,Nombre
                ,Apellidos 
                ,CorreoElectronico
                ,Direccion 
                ,Telefono 
                ,Celular 
                ,Sexo 
                ,Estado
                ,Pass) 
            VALUES(
                '$dnix' 
                ,'$nombrex'
                ,'$apellidosx'
                ,'$emailx'
                ,'$direccionx'
                ,'$telefonox' 
                ,'$celularx'
                ,'$sexox'
                ,'$estadox'
                ,'$passx'
                )");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }



//ACTUALIZAR ADMINISTRADOR
    public function ActualizarAdministrador($idx,$dnix,$nombrex,$apellidosx,$emailx,$direccionx,$telefonox,$celularx,$sexox,$estadox) {
        $result = mysql_query("UPDATE ADMINISTRADOR SET 
            Dni = '$dnix'
            ,Nombre = '$nombrex'
            ,Apellidos= '$apellidosx'
            ,CorreoElectronico= '$emailx'
            ,Direccion= '$direccionx'
            ,Telefono= '$telefonox'
            ,Celular= '$celularx'
            ,Sexo= '$sexox'
            ,Estado= '$estadox'
            WHERE IdAdministrador = '$idx'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
//BUSCAR ADMINISTRADOR
    public function BuscarAdministrador($texto) {
        $result = mysql_query("SELECT *  from ADMINISTRADOR WHERE Nombre like '%$texto%' or Apellidos like '%$texto%'");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

//MODULOS
//AGREGAR MODULO
    public function AgregarModulo($nombrex,$posicionx,$estadox) {
        $result = mysql_query("INSERT INTO MODULO( 
                Nombre
                ,Posicion 
                ,Estado) 
            VALUES(
                '$nombrex'
                ,'$posicionx'
                ,'$estadox'
                )");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
//ACTUALIZAR MODULO
    public function ActualizarModulo($idx,$nombrex,$posicionx,$estadox) {
        $result = mysql_query("UPDATE MODULO SET 
            Nombre = '$nombrex'
            ,Posicion= '$posicionx'
            ,Estado= '$estadox'
            WHERE IdModulo = '$idx'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
/*LISTAR MODULOS*/
    public function ListarModulos() {
        $result = mysql_query("SELECT  * FROM MODULO ORDER BY Posicion ASC");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
//DETALLAR MODULO 
    public function DetallarModulo($idx) {
        $result = mysql_query("SELECT  * FROM MODULO WHERE IdModulo= '$idx' ORDER BY Posicion ASC");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
//Cantidad de temas por modulo
    public function CantTemas($idx) {
        $result = mysql_query("SELECT COUNT(*) AS cantidad FROM TEMA WHERE IdModulo= '$idx'");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }



//TEMAS
//DETALLAR TEMA 
    //BUSCAR TEMA
    public function BuscarTema($texto) {
        $result = mysql_query("SELECT  
            t.IdTema
            ,t.IdModulo
            ,m.Nombre Modulo
            ,t.Nombre
            ,t.UrlVideo
            ,t.Descripcion
            ,t.Estado
            FROM TEMA t
            INNER JOIN MODULO m ON m.IdModulo = t.IdModulo
            WHERE t.Nombre like '%$texto%';");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    public function DetallarTema($idx) {
        $result = mysql_query("SELECT  
            t.IdTema
            ,t.IdModulo
            ,m.Nombre Modulo
            ,t.Nombre
            ,t.UrlVideo
            ,t.Descripcion
            ,t.Estado
            FROM TEMA t
            INNER JOIN MODULO m ON m.IdModulo = t.IdModulo
            WHERE t.IdTema = '$idx';");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
/*LISTAR TEMAS*/
    public function ListarTemas() {
        $result = mysql_query("SELECT  
            t.IdTema
            ,t.IdModulo
            ,m.Nombre Modulo
            ,t.Nombre
            ,t.UrlVideo
            ,t.Descripcion
            ,t.Estado
            FROM TEMA t
            INNER JOIN MODULO m ON m.IdModulo = t.IdModulo
            ORDER BY t.IdTema ASC");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }


/*LISTAR TEMAS POR MODULOS*/
    public function ListarTemasPorModulo($idx) {
        $result = mysql_query("SELECT  
            t.IdTema
            ,t.IdModulo
            ,m.Nombre Modulo
            ,t.Nombre
            ,t.UrlVideo
            ,t.Descripcion
            ,t.Estado
            FROM TEMA t
            INNER JOIN MODULO m ON m.IdModulo = t.IdModulo
            WHERE m.IdModulo = '$idx'
            ORDER BY t.IdTema ASC");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
       
        }
    }
//AGREGAR TEMA
    public function AgregarTema($idmodulox,$nombrex,$urlvideox,$descripcionx,$estadox) {
        $result = mysql_query("INSERT INTO TEMA( 
                IdModulo
                ,Nombre
                ,UrlVideo 
                ,Descripcion 
                ,Estado) 
            VALUES(
                '$idmodulox'
                ,'$nombrex'
                ,'$urlvideox'
                ,'$descripcionx'
                ,'$estadox'
                )");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
//ACTUALIZAR TEMA
    public function ActualizarTema($idx,$idmodulox,$nombrex,$urlvideox,$descripcionx,$estadox){
        $result = mysql_query("UPDATE TEMA SET 
            IdModulo = '$idmodulox'
            ,Nombre = '$nombrex'
            ,UrlVideo= '$urlvideox'
            ,Descripcion= '$descripcionx'
            ,Estado= '$estadox'
            WHERE IdTema = '$idx'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }



//PREGUNTAS
//ELIMINAR PREGUNTA
    public function EliminarPregunta($idx){
        $result = mysql_query("DELETE FROM PREGUNTA where IdPregunta =$idx");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

//ACTUALIZAR PREGUNTA
    public function ActualizarPregunta($idx,$preguntax,$imagenx,$alt1x,$alt2x,$alt3x,$respuestax){
        $result = mysql_query("UPDATE PREGUNTA SET 
            pregunta = '$preguntax'
            ,Imagen= '$imagenx'
            ,Alternativa1= '$alt1x'
            ,Alternativa2= '$alt2x'
            ,Alternativa3= '$alt3x'
            ,Respuesta= '$respuestax'
            WHERE IdPregunta = '$idx'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
//AGREGAR PREGUNTA
    public function AgregarPregunta($idtemax,$preguntax,$imagenx,$alt1x,$alt2x,$alt3x,$respuestax) {
        $result = mysql_query("INSERT INTO PREGUNTA( 
                IdTema
                ,Pregunta
                ,Imagen 
                ,Alternativa1
                ,Alternativa2
                ,Alternativa3 
                ,Respuesta) 
            VALUES(
                '$idtemax'
                ,'$preguntax'
                ,'$imagenx'
                ,'$alt1x'
                ,'$alt2x'
                ,'$alt3x'
                ,'$respuestax'
                )");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
//DETALLAR PREGUNTA 
    public function DetallarPregunta($idx) {
        $result = mysql_query("SELECT * FROM PREGUNTA WHERE IdPregunta = '$idx' ORDER BY IdPregunta ASC");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
//LISTAR PREGUNTAS
    public function ListarPreguntasPorTema($idx) {
        $result = mysql_query("SELECT  * FROM PREGUNTA 
            WHERE IdTema = '$idx'
            ORDER BY IdTema ASC");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
//Cantidad de preguntas por tema
    public function CantPreguntas($idx) {
        $result = mysql_query("SELECT COUNT(*) AS cantidad FROM PREGUNTA WHERE IdTema= '$idx'");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

//EVALUACION
//LISTAR EVALUACION
    public function ListarEvaluaciones($idx) {
        $result = mysql_query("SELECT  * FROM EVALUACION 
            WHERE IdTema = '$idx'
            ORDER BY IdEvaluacion ASC");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }


//WEB
//DETALLAR Titulo 
    public function DetallarWeb() {
        $result = mysql_query("SELECT * FROM WEB WHERE IdWeb = '1'");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
//ACTUALIZAR TITULO
    public function ActualizarTitulo($titulox,$subtitulox){
        $result = mysql_query("UPDATE WEB SET 
            Titulo = '$titulox'
            ,Subtitulo = '$subtitulox'
            WHERE IdWeb = '1'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
//ACTUALIZAR GENERAL
    public function ActualizarGeneral($general1,$general2){
        $result = mysql_query("UPDATE WEB SET 
            GeneralTitulo = '$general1'
            ,SubGeneralTitulo = '$general2'
            WHERE IdWeb = '1'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
//ACTUALIZAR MENSAJE
    public function ActualizarMensaje($mensaje1,$mensaje2){
        $result = mysql_query("UPDATE WEB SET 
            Mensaje = '$mensaje1'
            ,SubMensaje = '$mensaje2'
            WHERE IdWeb = '1'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
//ACTUALIZAR PIE
    public function ActualizarPie($pie){
        $result = mysql_query("UPDATE WEB SET 
            Pie = '$pie'
            WHERE IdWeb = '1'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

//ACTUALIZAR LOGO
    public function ActualizarLogo($logo){
        $result = mysql_query("UPDATE WEB SET 
            UrlLogo = '$logo'
            WHERE IdWeb = '1'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }




//RED SOCIAL
//BUSCAR REDES SOCIALES
    public function BuscarRedSocial($texto) {
        $result = mysql_query("SELECT * from REDSOCIAL WHERE Tipo like '%$texto%'");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

//LISTAR REDES SOCIALES
    public function ListarRedesSociales() {
        $result = mysql_query("SELECT  * FROM REDSOCIAL");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
//DETALLAR REDES SOCIALES 
    public function DetallarRedSocial($idx) {
        $result = mysql_query("SELECT  * FROM REDSOCIAL WHERE IdRedSocial = '$idx'");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
//ACTUALIZAR RED SOCIAL
    public function ActualizarRedSocial($idx,$tipox,$urlx,$estadox){
        $result = mysql_query("UPDATE REDSOCIAL SET 
            Tipo = '$tipox'
            ,Url = '$urlx'
            ,Estado = '$estadox'
            WHERE IdRedSocial = '$idx'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

//AGREGAR RED SOCIAL
    public function AgregarRedSocial($tipox,$urlx,$estadox) {
        $result = mysql_query("INSERT INTO REDSOCIAL( 
                Tipo
                ,Url
                ,Estado) 
            VALUES(
                '$tipox'
                ,'$urlx'
                ,'$estadox'
                )");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

//ARTICULOS
//BUSCAR ARTICULO
    public function BuscarArticulo($texto) {
        $result = mysql_query("SELECT * from ARTICULO WHERE Titulo like '%$texto%'");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
//LISTAR ARTICULOS
    public function ListarArticulos() {
        $result = mysql_query("SELECT  * FROM ARTICULO 
            ORDER BY IdArticulo ASC");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
//DETALLAR ARTICULO
    public function DetallarArticulo($idx) {
        $result = mysql_query("SELECT  * FROM ARTICULO 
            WHERE IdArticulo = '$idx';");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }


//ACTUALIZAR ARTICULO
    public function ActualizarArticulo($idx,$titulox,$descripcionx,$fotox,$estadox){
        $result = mysql_query("UPDATE ARTICULO SET 
            Titulo = '$titulox'
            ,Descripcion = '$descripcionx'
            ,urlFoto = '$fotox'
            ,Estado = '$estadox'
            WHERE IdArticulo = '$idx'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

//AGREGAR ARTICULO
    public function AgregarArticulo($titulox,$descripcionx,$fotox,$estadox) {
        $result = mysql_query("INSERT INTO ARTICULO( 
                Titulo
                ,Descripcion
                ,urlFoto
                ,Estado) 
            VALUES(
                '$titulox'
                ,'$descripcionx'
                ,'$fotox'
                ,'$estadox'
                )");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
//CANTIDAD ARTICULOS 
 public function CantArticulos() {
        $result = mysql_query("SELECT COUNT(*) AS cantidad FROM ARTICULO");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
//ELIMINAR ARTICULO
    public function EliminarArticulo($idx){
        $result = mysql_query("DELETE FROM ARTICULO where IdArticulo =$idx");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

//AUSPICIO
//BUSCAR AUSPICIO
    public function BuscarAuspicio($texto) {
        $result = mysql_query("SELECT * from AUSPICIO WHERE Nombre like '%$texto%'");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
//LISTAR AUSPICIOS
    public function ListarAuspicios() {
        $result = mysql_query("SELECT  * FROM AUSPICIO 
            ORDER BY IdAuspicio ASC");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
//LISTAR AUSPICIOS ACTIVOS
    public function ListarAuspiciosActivos() {
        $result = mysql_query("SELECT  * FROM AUSPICIO 
            WHERE Estado='Activo'
            ORDER BY IdAuspicio ASC");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
//DETALLAR AUSPICIOS
    public function DetallarAuspicio($idx) {
        $result = mysql_query("SELECT  * FROM AUSPICIO 
            WHERE IdAuspicio = '$idx';");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
//ACTUALIZAR ARTICULO
    public function ActualizarAuspicio($idx,$nombrex,$fotox,$estadox){
        $result = mysql_query("UPDATE AUSPICIO SET 
            Nombre = '$nombrex'
            ,UrlFoto = '$fotox'
            ,Estado = '$estadox'
            WHERE IdAuspicio = '$idx'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

//AGREGAR ARTICULO
    public function AgregarAuspicio($nombrex,$fotox,$estadox) {
        $result = mysql_query("INSERT INTO AUSPICIO( 
                Nombre
                ,UrlFoto
                ,Estado) 
            VALUES(
                '$nombrex'                
                ,'$fotox'
                ,'$estadox'
                )");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
//CANTIDAD ARTICULOS 
 public function CantAuspicios() {
        $result = mysql_query("SELECT COUNT(*) AS cantidad FROM AUSPICIO");
        $num_rows = mysql_num_rows($result); 
        if ($num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
//ELIMINAR ARTICULO
    public function EliminarAuspicio($idx){
        $result = mysql_query("DELETE FROM AUSPICIO where IdAuspicio =$idx");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }



}
?>






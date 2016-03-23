<?php 
session_start(); 
require_once '../../config/funciones_bd.php';
$db = new funciones_BD();

$idalumnox = $_SESSION['usu_id'];
$idx=$_POST["idx"]; //id del Tema
$fechax = date('Y-n-j');

	if($db->CantPreguntas($idx)){	
		$result_3 = $db->CantPreguntas($idx);
		while($r_3 = mysql_fetch_assoc($result_3)){
			$num_preguntas = $r_3["cantidad"];
		}
	}

$respuestas[$num_preguntas]="";
$i=0;
$correctas=0;
$nota=0;

	if($db->ListarPreguntasPorTema($idx)){	
		$result = $db->ListarPreguntasPorTema($idx);
			while($r = mysql_fetch_assoc($result)) {
				$idPregunta = $r['IdPregunta'];
				$respuestas[$i]=$_POST["radio_r_".$idPregunta];
				//calculos 
				$solucion = $r['Respuesta'];
				if ($respuestas[$i]==$solucion) {
					$correctas++;
				}
				echo $respuestas[$i]." = ".$solucion ."<br>";
				$i++;
			}
		}
	else{
					echo "No hay preguntas";
	}
	/*
for ($i=0; $i < $num_preguntas ; $i++) { 
	echo $respuestas[$i]."<br>";
}*/
//CALCULO DE NOTA: 
$valor1 = 20/$num_preguntas;
$nota = $correctas * $valor1;

/*echo "valor por pregunta: ".$valor1;
echo "<br>Correctas: ".$correctas;
echo "<br>Nota: ".$nota;*/

//GUARDAR EVALUACION
    if($db->RegistrarEvaluacion($idalumnox,$idx,$fechax,$nota))
	{	
		//echo "AGREGADO======\n";
		header("location: ../resultado_evaluacion.php?notax=".$nota);
	}else{
		//echo "ERROR============\n";
		header("location: ../resultado_evaluacion.php?notax=".$nota);
	}


?>
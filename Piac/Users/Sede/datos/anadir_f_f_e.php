<?php

require_once'../../../src/consultas.php';
$consultas=new consultas();


if (!empty($_POST['sede']) &&  
		is_array($_POST['Equipo']) &&   isset($_POST['Equipo']) &&
		is_array($_POST['Cantidad_equipos']) &&  isset($_POST['Cantidad_equipos']) &&
		is_array($_POST['Horas_dia_i']) &&  isset($_POST['Horas_dia_i']) &&
		is_array( $_POST['Dias_uso_i']) && isset( $_POST['Dias_uso_i']) &&
		is_array( $_POST['fecha_funcion']) && isset( $_POST['fecha_funcion'])) {



	$sede=base64_decode($_POST['sede']);
	$cant=2;
	 
 	if ($cant!=0) {
 		
 		$codigos= array();
 		$codigo;
 		$lubricantes=0;
 		for ($i=0; $i < count($_POST['Equipo']) ; $i++) {
 			

 			$Equipo=$_POST['Equipo'][$i];
 			$Cantidad_equipos=$_POST['Cantidad_equipos'][$i];
			$Horas_dia_i=$_POST['Horas_dia_i'][$i];
			$Dias_uso_i=$_POST['Dias_uso_i'][$i];
			$Fecha_funcion=$_POST["fecha_funcion"][$i];
			if (isset($_POST['refrigerante'][$i]) ) {
				if(($_POST['refrigerante'])[$i]=="on")
				{		
					if ($_POST['Tipo_refrigerante'][$i]=='select') {
						echo '<div style="color:white; 
									text-align:center;
	 								width:82%; 
									margin-left:5%; 
	 								background:#ff9b9b; 
	 								font-size:1.5vw; 
	 								padding:1vw;"> '.$Nombre_maquina.' error en el refrigerante</div>';
	 								$ok=false;
	 								break;

					}
					else{
							$refrigerante=$_POST['Tipo_refrigerante'][$i];
						}		
				}
				else
				{
					$refrigerante="0";
				
				}
			}
			else
				{
					$refrigerante="0";
				
				}
			if (isset($_POST['lubricante'])) {
				if ($_POST['lubricante'][$i]=="on") {
					$lubricantes=1;
				}
				else
				{
					$lubricantes=0;
				}
			}
			else{
				$lubricantes=0;
			}

			
 			$resp=$consultas->max_fuentes_fijas_electricas();
 			while ($f=mysqli_fetch_array($resp)) {
 				$codigo=$f[0];
 				

  			}
  			$codigo++;
  			$codigos[]=$codigo;
 		 $consultas->Insert_fuentes_fijas_electricas($codigo,$sede,$Equipo, $Cantidad_equipos, $Horas_dia_i,$Dias_uso_i,$refrigerante,$lubricantes,$Fecha_funcion);


 		}
 		for ($i=0; $i <count($codigos) ; $i++) { 
 			$res=$consultas->consultar_fuente_fija_electrico_codigo($codigos[$i]);
 			if ($fila=mysqli_fetch_array($res)) {
 				if ($fila[0]>0) {
 					$ok=true;	
 				}
 				else
 				{
 					$ok=false;
 					break;
 				}
 				
 			}

 		}
 		if ($ok) {
 			echo '<div style="color:white; 
	text-align:center;
	 width:82%; 
	 margin-left:5%; 
	 background:#B6CF41; 
	 font-size:1.5vw; 
	 padding:1vw;">Se agrego al sistema</div>';
 		}
 		else{
 			echo '<div style="color:white; 
	text-align:center;
	 width:82%; 
	 margin-left:5%; 
	 background:#ff9b9b; 
	 font-size:1.5vw; 
	 padding:1vw;"> ¡Error! no se guardaron los datos en la fuente fija electrica</div>';
 		}

 	}
 	else
 	{
 		
 	}
 	
}
else{
	echo '<div style="color:white; 
	text-align:center;
	 width:82%; 
	 margin-left:5%; 
	 background:#ff9b9b; 
	 font-size:1.5vw; 
	 padding:1vw;"> ¡Error! no se guardaron los datos</div>';
}

?>
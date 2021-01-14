<?php
require_once'../../../src/consultas.php';
$consultas=new consultas();

if (!empty($_POST['cant']) && 
	!empty($_POST['sede']) &&  
		is_array($_POST['Nombre_maquina']) &&  
		is_array($_POST['Cantidad_maquina']) &&  
		is_array($_POST['Tipo']) &&  
		is_array($_POST['Combustible'])&&
		is_array($_POST['horas_dia']) &&
		is_array($_POST['dias_semana']) &&
		is_array($_POST['fecha_funcion']))  {

	$sede=base64_decode($_POST['sede']);
	$cant=$_POST['cant'];


	

	

 	if ($cant!=0) {
 		$codigos= array();
 		$codigo;
 		for ($i=0; $i < count($_POST['Nombre_maquina']) ; $i++) {
 			
 				
 			$Nombre_maquina=$_POST['Nombre_maquina'][$i];
			$Cantidad_maquina=$_POST['Cantidad_maquina'][$i];
			$Tipo=$_POST['Tipo'][$i];
			$Combustible=$_POST['Combustible'][$i];
			$horas_dia=$_POST['horas_dia'][$i];
			$dias_semana=$_POST['dias_semana'][$i];
			$fecha_funcion=$_POST['fecha_funcion'][$i];
			if ($fecha_funcion==null) {
				$ok=false;
				break;
			}
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
			else{
				$refrigerante="0";
				
			}if (isset($_POST['lubricante'])) {
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

 			$resp=$consultas->max_fuentes_fijas();
 			while ($f=mysqli_fetch_array($resp)) {
 				$codigo=$f[0];
 				$codigos[]=$f[0];

  			}
  			$codigo++;
 		 $consultas->Insert_fuentes_fijas($codigo,$sede,$Nombre_maquina, $Cantidad_maquina, $Combustible,$horas_dia,$dias_semana,$refrigerante,$lubricantes,$fecha_funcion,date('y')."-".date('m')."-".date('d'));


 		}
 		for ($i=0; $i <count($codigos) ; $i++) { 
 			
 			$res=$consultas->consultar_fuente_fija_codigo($codigos[$i]);
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
	 		padding:1vw;"> ¡Error! no se guardaron los datos</div>';
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
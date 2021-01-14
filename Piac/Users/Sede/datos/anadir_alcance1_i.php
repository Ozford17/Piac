<?php

require_once'../../../src/consultas.php';
$consultas=new consultas();

if (!empty($_POST['sede']) &&  
		is_array($_POST['Tipo_i']) &&  
		is_array($_POST['Cantidad_i']) &&  
		is_array($_POST['Potencia']) &&  
		is_array($_POST['Horas_dia_i']) &&  
		is_array($_POST['Dias_uso_i']) ) {

	$sede=base64_decode($_POST['sede']);
	$cant=count($_POST['Tipo_i']);
 	if ($cant!=0) {
 		$codigos= array();
 		$codigo;
 		$ok=false;
 		for ($i=0; $i < count($_POST['Tipo_i']) ; $i++) {
 			

 			$Tipo_i=$_POST['Tipo_i'][$i];
 			$Cantidad_i=$_POST['Cantidad_i'][$i];
			$Potencia=$_POST['Potencia'][$i];
			$Horas_dia_i=$_POST['Horas_dia_i'][$i];
 			$Dias_uso_i=$_POST['Dias_uso_i'][$i];
			
			
 			$resp=$consultas-> max_fuentes_iluminarias();
 			while ($f=mysqli_fetch_array($resp)) {
 				$codigo=$f[0];
 			}
  			$codigo++;
  			$codigos[]=$codigo;
 		 $consultas->Insert_fuentes_iluminarias($codigo,$sede,$Tipo_i, $Cantidad_i, $Potencia, $Horas_dia_i,$Dias_uso_i);
 		}
 		for ($i=0; $i <count($codigos) ; $i++) { 
 			$res=$consultas->consultar_fuente_iluminarias($codigos[$i]);
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
	 padding:1vw;"> ¡Error! no se guardaron los datos en las luminarias</div>';
 		}

 	}
 	else
 	{
 		echo '<div style="color:white; 
	text-align:center;
	 width:82%; 
	 margin-left:5%; 
	 background:#ff9b9b; 
	 font-size:1.5vw; 
	 padding:1vw;"> ¡Error! no se guardaron los datos en las luminarias<br>Campos vacios.</div>';
 		
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


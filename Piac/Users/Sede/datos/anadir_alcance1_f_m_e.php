<?php

require_once'../../../src/consultas.php';
$consultas=new consultas();

if (
	!empty($_POST['sede']) &&  
		is_array($_POST['Placa']) &&  
		is_array($_POST['Potencia']) &&  
		is_array($_POST['horas_carga']) &&  
		is_array($_POST['Dias']) &&
		is_array($_POST['fecha_funcion'])) {

	$sede=base64_decode($_POST['sede']);
	$cant=count($_POST['Placa']);
	$ok="false";
	$bandera="false";
	
	if (isset($_POST['extintor'])) {
 		for ($a=0; $a < count($_POST['extintor']) ; $a++) { 
 			
 			if($_POST['extintor'][$a] =='seleccione') {
 				
 				$bandera="true";
 				$ok="null";
 				break;
 			}
 		}
 	}
 	
 	if ( $ok!="null" && $bandera=="false" ) {
 		$codigos= array();
 		$codigo;
 		$exis=false;
 		
 		for ($i=0; $i < count($_POST['Placa']) ; $i++) {
 			

 			$Placa=$_POST['Placa'][$i];
 			$Potencia=$_POST['Potencia'][$i];
			$horas_carga=$_POST['horas_carga'][$i];
			$Fecha_funcion=$_POST['fecha_funcion'][$i];
			$Dias=$_POST['Dias'][$i];
			$extintor=$_POST['extintor'][$i];
			$peso=$_POST['peso'][$i];
			if(isset($_POST['refrigerante'])){
				if($_POST['refrigerante'][$i]=="on"){
					$refrigerante=$_POST['Tipo_refrigerante'][$i];
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


			/******* Metodo para saber si existe una placa registrada en fuentes moviles pero con combustible interno ********/
			$re=$consultas->consultar_fuente_moviles_hibrido_placa($Placa);
			if ($fi=mysqli_fetch_array($re)) {
				if ($fi[0] > 0) {
					$exis=true;
					
				}
			}
			/*-----------------------------------*/
			

			if (!$exis) {
				$resp=$consultas->max_fuentes_moviles_electricas();
 				if ($f=mysqli_fetch_array($resp)) {
 					$codigo=$f[0];
  				}
  				$codigo++;
  				$codigos[]=$codigo;
 				$consultas->Insert_fuentes_moviles_electricas($codigo,$sede,$Placa, $Potencia, $horas_carga, $Dias,$refrigerante,$Fecha_funcion);
 				/*------------------------ Se agrega dependiendo del extintor------------------- */
 				if ($extintor=="0") {
 					$consultas->Insert_fuentes_moviles_extintor_elec($codigo,"1001",$peso,date('y')."-".date('m')."-".date('d'));	
 		 			$consultas->Insert_fuentes_moviles_extintor_elec($codigo,"1002",$peso,date('y')."-".date('m')."-".date('d'));
 				}
 				else if( $extintor == "null")
 				{

 				}
 				else{
 					$consultas->Insert_fuentes_moviles_extintor_elec($codigo,$extintor,$peso,date('y')."-".date('m')."-".date('d'));	
 		 	
 				}

 				/*------------------ VERIFICAR SI SE AGREGARON LOS AUTOS A VEHICULOS ELECTRICOS ----------------------------*/
 				for ($i=0; $i <count($codigos) ; $i++) { 
 					$res=$consultas->consultar_fuente_movil_electrico_codigo($codigos[$i]);
 					if ($fila=mysqli_fetch_array($res)) {
 						if ($fila>0) {
 							$ok=true;	
 						}
 						else
 						{
 							$ok=false;
 							break;
 						}
 					}
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
 		
 	 if ($exis){
 			echo '<div style="color:white; 
	              text-align:center;
	              width:82%; 
	              margin-left:5%; 
	              background:#ff9b9b; 
	              font-size:1.5vw; 
	              padding:1vw;"> ¡Error! no se guardaron los datos en fuentes moviles electricos<br>El vehiculo fue registrado como tipo de <b>	Combustion Interna</b>.</div>';
 		}

 	}
 	else if ($ok == "null") {
 			echo '<div style="color:white; 
	               text-align:center;
	               width:82%; 
	               margin-left:5%; 
	               background:#ff9b9b; 
	               font-size:1.5vw; 
	               padding:1vw;"> ¡Error! Dato  no valido en extintor.</div>';
 		}
 	else
 	{
 		echo '<div style="color:white; 
	          text-align:center;
	           width:82%; 
	           margin-left:5%; 
	           background:#ff9b9b; 
	           font-size:1.5vw; 
	           padding:1vw;"> ¡Error! no se guardaron los datos en fuentes moviles electtricos<br> Datos no ingresados</div>';
 	}
 	
}
else{
	echo '<div style="color:white; 
	text-align:center;
	 width:82%; 
	 margin-left:5%; 
	 background:#ff9b9b; 
	 font-size:1.5vw; 
	 padding:1vw;"> ¡Error! no se guardaron los datos en fuentes moviles electrico</div>';
}

?>


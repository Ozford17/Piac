<?php
require_once'../../../src/consultas.php';
$consultas=new consultas();

if (
	!empty($_POST['sede']) &&  
		is_array($_POST['Vehiculo']) &&  
		is_array($_POST['Placa']) &&  
		is_array($_POST['Tipo']) &&  
		is_array($_POST['Combustible']) &&
		is_array($_POST['fecha_funcion']) ) {

	$sede=base64_decode($_POST['sede']);
	$cant=2;
	$bandera=false;

	
 	if ($cant!=0) {
 		$codigos= array();
 		$codigo;
 		if ( isset($_POST['extintor'])) {
 			for ($a=0; $a < count($_POST['extintor']) ; $a++) { 
 				if ($_POST['extintor'][$a] =='seleccione') {
 					$bandera=true;
 					$ok=null;
 					break;
 				}
 			}
 		}
 		if(!$bandera){
 			$count_extintor=0;
 		for ($i=0; $i < count($_POST['Vehiculo']) ; $i++) {
 			$Vehiculo=$_POST['Vehiculo'][$i];
			$Placa=$_POST['Placa'][$i];
			$Tipo=$_POST['Tipo'][$i];
			$Combustible=$_POST['Combustible'][$i];
			$Fecha_funcion=$_POST['fecha_funcion'][$i];
			if ($Tipo=="1") {
				$extintor=$_POST['extintor'][$count_extintor];
				$peso_extintor=$_POST['peso'][$count_extintor];
				//echo $extintor."<br>";
				//echo $peso_extintor."<br>";
				$count_extintor++;
			}
			else
			{
				$extintor="null";
			}
			if (isset($_POST['refrigerante']) && is_array($_POST['refrigerante'])) {
				if ($_POST['refrigerante'][$i]=="on") {
					$refrigerante=$_POST['Tipo_refrigerante'][$i];
				}
				else
				{
					$refrigerante="0";
				}
			}
			else{
				$refrigerante="0";
			}
			
			
 			$resp=$consultas->max_fuentes_moviles();
 			while ($f=mysqli_fetch_array($resp)) {
 				$codigo=$f[0];
  			}
  			$codigo++;
  			$codigos[]=$codigo;
 		 $consultas->Insert_fuentes_moviles($codigo,$sede,$Vehiculo, $Tipo, $Placa, $Combustible,$refrigerante,$Fecha_funcion);
 		 if ($extintor=="0") {
 		 	$consultas->Insert_fuentes_moviles_extintor($codigo,"1001",$peso_extintor,date('y')."-".date('m')."-".date('d'));	
 		 	$consultas->Insert_fuentes_moviles_extintor($codigo,"1002",$peso_extintor,date('y')."-".date('m')."-".date('d'));
 		 }
 		 if ($extintor=="null") {
 		 	 		 }
 		 else
 		 {
 		 	$consultas->Insert_fuentes_moviles_extintor($codigo,$extintor,$peso_extintor,date('y')."-".date('m')."-".date('d'));
 		 }
 		 

 		}
 		for ($i=0; $i <count($codigos) ; $i++) { 
 			$res=$consultas->consultar_fuente_moviles_codigo($codigos[$i]);
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
 	else if ($ok==null) {
 			echo '<div style="color:white; 
	              text-align:center;
	               width:82%; 
	               margin-left:5%; 
	               background:#ff9b9b; 
	               font-size:1.5vw; 
	               padding:1vw;"> ¡Error! extintor nullo</div>';
 		}
 	else{
 			echo '<div style="color:white; 
	              text-align:center;
	               width:82%; 
	               margin-left:5%; 
	               background:#ff9b9b; 
	               font-size:1.5vw; 
	               padding:1vw;"> ¡Error! no se guardaron los datos ups</div>';
 		}
 	if ($bandera) {
 		echo '<div style="color:white; 
	              text-align:center;
	               width:82%; 
	               margin-left:5%; 
	               background:#ff9b9b; 
	               font-size:1.5vw; 
	               padding:1vw;"> ¡Error! Problema, dato no valido en extintores</div>';
 	}

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

<?php 
	function mostrar_datos($s,$fecha,$data){
		require_once'../../../src/consultas.php';
		$consultas= new consultas();
		$mensaje=array();
		

		if ($data=="Alcance1") {
				$mes= array();
				$mes= array();
				$dato= "";
				$resp=$consultas->consultar_grafica_co2_alcance1(base64_decode($s),$fecha);
				while ($fila=mysqli_fetch_array($resp)) {
						$mes[]=$fila[0];
						$datos[]=number_format($fila[1]/1000, 2, '.', '');
				}
				for ($i=1; $i <=12 ; $i++) { 
					$bandera=false;
					for ($a=0; $a <count($mes) ; $a++) { 
						if ($i==$mes[$a]) {
							$dato=$dato.$datos[$a];
							$bandera=true;
							break;
						}
					}
					if (!$bandera) {
						$dato=$dato."0";
					}
					if ($i!=12) {
						$dato=$dato.",";
					}
					
				}
				$mensaje[]=$mes;
				$mensaje[]=$dato;
				echo $dato;				
			}
			else if ($data=="Alcance2") {
				$calcance1 = 0;
				$mes= array();
				$datos=  array();
				$dato="";
				$resp=$consultas->consultar_grafica_co2_alcance2(base64_decode($s),$fecha);
				while ($fila=mysqli_fetch_array($resp)) {
						$mes[]=$fila[0];
						$datos[]=number_format($fila[1]/1000, 2, '.', '');
				}
				for ($i=1; $i <=12 ; $i++) { 
					$bandera=false;
							for ($a=0; $a <count($mes) ; $a++) { 
								if ($i==$mes[$a]) {
									$dato=$dato.$datos[$a];
									$bandera=true;
									break;
								}
							}
							
							
							if (!$bandera) {
								$dato=$dato."0";
							}
							if ($i!=12) {
								$dato=$dato.",";
							}

				}
				$mensaje[]=$mes;
				$mensaje[]=$dato;
				echo $dato;
			}
			else if($data=="label_"){
				$vehiculos="";
				$resp=$consultas->consultar_grafica_co2_automovil(base64_decode($s),$fecha);
				$cont=0;
				while($fila=mysqli_fetch_array($resp))
				{
					$cont++;
					if ($cont==1) {
						$vehiculos="'".$fila[0]." (Ton CO2/Gal)'";	
					}
					else
					{
						$vehiculos=$vehiculos.",'".$fila[0]." (Ton CO2/Gal)'";
					}
					
				}
				$mensaje[]=$vehiculos;
				echo json_encode($mensaje);
			}
			else if($data=="Moviles"){
				$total_co_moviles= "";
				$resp=$consultas->consultar_grafica_co2_automovil(base64_decode($s),$fecha);
				$cont=0;
				while($fila=mysqli_fetch_array($resp))
				{
					$cont++;
					if ($cont==1) {
						$total_co_moviles="".$fila[2]."";	
					}
					else
					{
						$total_co_moviles=$total_co_moviles.",".number_format($fila[2]/1000,2,'.','')."";
					}
					
				}
				$mensaje=$total_co_moviles;
				echo json_encode($mensaje);
			}
	}
 ?>

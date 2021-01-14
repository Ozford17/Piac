<?php
if ( is_array($_POST['codigo']) && is_array($_POST['observacion'])) {
	
	$codigo=$_POST['codigo'];
	$cant=0;
	$estado=0;
	$observacion=$_POST['observacion'];
	require_once'../../../src/consultas.php';
	$consultas=new consultas();
	for ($i=0; $i <count($codigo) ; $i++) { 
		
		$res=$consultas->consultar_fuente_moviles_placa_c($codigo[$i]);
		if ($fila=mysqli_fetch_array($res)) {
			
			$placa=$fila[4];
			$obser=$fila[8];
			$obse=$obser."/-/ ".date("Y")."-".date("m")."-".date("d")."// ".$observacion[$i];
			$estado=1;	
			if($fila[3]=="2"){
				echo " <script>alert('Se este auto es hibrido, se eliminara el auto de la tabla de autos electricos ')</script>";
				$resp = $consultas->consultar_fuente_movil_electrico_placa($placa);
				if ($f=mysqli_fetch_array($resp)) {
					$codigo_electrico=$f[0];
				}
				$consultas-> update_estado_fuente_moviles_electricos($codigo_electrico,$estado,$obse);


			}		
		}
		
		$consultas->update_estado_fuente_moviles($codigo[$i],$estado,$obse);
		echo "Se elimino $placa <br>";


	}
}
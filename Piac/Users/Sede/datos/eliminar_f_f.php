<?php
if (is_array($_POST['cantidad']) && is_array($_POST['codigo'])) {
	$cantidad=$_POST['cantidad'];
	$codigo=$_POST['codigo'];
	$cant=0;
	$estado=0;
	$observacion=$_POST['observacion'];
	require_once'../../../src/consultas.php';
	$consultas=new consultas();
	for ($i=0; $i <count($cantidad) ; $i++) { 
		
		$res=$consultas->consultar_fuente_fijas_codigo($codigo[$i]);
		while ($fila=mysqli_fetch_array($res)) {
			if ($fila[0]==$codigo[$i]) {
				
					$obser=$fila[7];
					
					$cant=$fila[3]-$cantidad[$i];
					$obse=$obser." ".date("Y")."-".date("m")."-".date("d")." ".$cant." ".$observacion[$i];
					if ($cant==0) {
						$estado=1;
					}
			}
		}
		$consultas->update_estado_fuente_fijas($codigo[$i],$cant,$estado,$obse);
		echo "Se eliminaron las maquinas seleccionadas";


	}
}
?>
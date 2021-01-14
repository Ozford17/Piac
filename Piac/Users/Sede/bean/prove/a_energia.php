<?php 

	if (isset($_POST['sede']) && !empty($_POST['sede']) && isset($_POST['Cantidad_luz']) && !empty($_POST['Cantidad_luz'])) {
		
		require_once'.././../../../src/consultas.php';
		$consultas= new consultas();

		$sede= $_POST['sede'];
		$cantidad_energia=$_POST['Cantidad_luz'];
		
		$factor_emision=0.2096;
		$cantidad=$cantidad_energia*$factor_emision;
		$fecha=date('y')."-".date('m')."-".date('d');

		$resp= $consultas->max_huella_energia();
		if($fila= mysqli_fetch_array($resp)){
			$codigo= $fila[0];
		}
		$codigo++;

		$consultas->insertar_huella_energia($codigo,$sede,$factor_emision,$cantidad_energia,$cantidad,$fecha,$fecha);
		echo '<script> alert("Se cargaron todos los datos de huella de carbono alcance 2"); window.location="../carbono.php?s='.base64_encode($sede).'";</script>';






	}
 ?>
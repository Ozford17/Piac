<?php
$respuesta=array();
$respuesta['success']=true;
if (isset($_POST['s'])) {
	$s=$_POST['s'];
	require_once'../src/consultas.php';
	$consultas= new consultas();
	$sede=$_POST['sede'];
	if ($s=="prov") {
		$respuesta['para']=$s;
		$res=$consultas->Listar_proveedores($sede);
		while ($fila=mysqli_fetch_array($res)) {
			$respuesta['lista'][]=$fila;
		}
		echo json_encode($respuesta);
	}
	else
	{
		$respuesta['para']=$s;
		$residuo=$_POST['residuo'];
		$material=$_POST['material'];
		$proveedor=$_POST['proveedor'];
		$kilo=$_POST['kilo'];
		$descripcion=$_POST['descripcion'];
		$observacion=$_POST['observacion'];
		$cantidad=$_POST['cantidad'];
		$certificado="null";
		
		$fecha=date('d')."/".date('m')."/".date('Y');

		$res=$consultas->max_solidos();
		if ($fila=mysqli_fetch_array($res)) {
			$codigo=$fila[0];
		}
		$codigo++;

		$consultas->insertar_solidos($codigo,$residuo,$material,$cantidad,$descripcion,$observacion,$proveedor,$certificado,$kilo,$sede,$fecha);
		$respuesta['mensaje']="Agregado";

		echo json_encode($respuesta);


	}

}
?>
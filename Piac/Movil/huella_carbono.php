<?php
$respuesta=array();
if (isset($_POST['para'])) {
	
	require_once'../src/consultas.php';
	$consultas= new consultas();

	
	$respuesta['success']=true;
	$para=$_POST['para'];
	$respuesta['para']=$para;

	if ($para=="Tipo") {
		$alcance=$_POST['alcance'];
		
		$res=$consultas->Listado_subtipos($alcance);
		while($fila=mysqli_fetch_array($res))
		{
			$respuesta['lista'][]=$fila;
		}
		echo json_encode($respuesta);
	}
	else if ($para=="Elementos") {
		$tipo=$_POST['tipo'];

		$res=$consultas->Listado_elementos($tipo);
		while($fila=mysqli_fetch_array($res)){
			$respuesta['lista'][]=$fila;
		}
		echo json_encode($respuesta);
	}
	else if ($para=="fuente") {
		
		$res=$consultas->Listado_fuente();
		while ($fila=mysqli_fetch_array($res)) {
			$respuesta['lista'][]=$fila;
		}
		echo json_encode($respuesta);
	}
	else if($para=="sed"){
		$sede=$_POST['sede'];
		$codigo_empresa=0;
		$res=$consultas->BuscarEmpresa_sede($sede);
		if ($fila=mysqli_fetch_array($res)) {
			$codigo_empresa=$fila[0];
		}
		$res=$consultas->BuscarSedeEmpresa($codigo_empresa);
		while ($fila=mysqli_fetch_array($res)) {
			$respuesta['lista'][]=$fila;
		}
		echo json_encode($respuesta);
	}
	else if($para=="ingresar") {
		$respuesta['para']=$para;
		$codigo=0;
		$sede=$_POST['sede'];
		$elemento=$_POST['elemento'];
		$fuente=$_POST['fuente'];
		$cantidad=$_POST['cantidad'];
		$fecha=$_POST['fecha'];
		$total=$_POST['total'];
		$totañ=number_format($total,3,'.','');

		$res=$consultas->contar_huella();
		if ($fila=mysqli_fetch_array($res)) {
			$codigo=$fila[0];
		}
		$codigo++;
		
		$res=$consultas->insertar_huella($codigo,$sede,$elemento,$fuente,$cantidad,$fecha,$totañ);
		if ($res==null) {
			$respuesta['error']=false;
			$respuesta['mensaje']="Se agrego";

		}
		else
		{
			$respuesta['error']=true;
			$respuesta['mensaje']=$res;
		}
		echo json_encode($respuesta);
	}
	
}
else
{
	$respuesta['error']=true;
	echo json_encode($respuesta);
}
?>
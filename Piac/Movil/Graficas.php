<?php 
$respuesta=array();
$respuesta['success']=true;
if (isset($_POST['color'])) {
	require_once "../src/consultas.php";
	$consultas=new consultas();
	$color=$_POST['color'];
	$sede=$_POST['sede'];
	if ($color=="Azul") {
		$resp=$consultas->BuscarEmpresa_sede($sede);
		if ($fila=mysqli_fetch_array($resp)) {
			$codigo_empresa=$fila[0];
		}
		$resp=$consultas->Grafica_residuo_solidos_2019($color, $codigo_empresa);
		while ($f= mysqli_fetch_array($resp)) {
			$respuesta['error']=false;
			$respuesta['lista'][]=$f;
		}
		echo json_encode($respuesta);
	}
	else
	{
		$respuesta['error']=true;
		$respuesta['mensaje']="No entra";
		echo json_encode($respuesta);
	}
}
else
{
	$respuesta['error']=true;
	$respuesta['mensaje']="No se envio";
	echo json_encode($respuesta);
}
?>
<?php
$respuesta=array();
$respuesta['success']=true;
if (isset($_POST['envio'])) {
	require_once'../src/consultas.php';
	$consultas= new consultas;
	

	$envio=$_POST['envio'];
	if ($envio=="solido") {
		$sede=$_POST['sede'];
		$resp=$consultas->consultar_solidos($sede);
		while ($fila=mysqli_fetch_array($resp)) {
			$respuesta['lista'][]=$fila;
			$respuesta['error']=false;
		}
	
	}
	else if ($envio="huella") {
		$sede=$_POST['sede'];
		$resp=$consultas->consultar_huella_carbono($sede);
		while ($f= mysqli_fetch_array($resp)) {
			$respuesta['error']=false;
			$respuesta['lista'][]=$f;
		}
	}
	else
	{
		$respuesta['error']=true;
		$respuesta['mensaje']="Formulario equivocado";
	}
	
	echo json_encode($respuesta);
}
else
{
	$respuesta['error']=true;
	$respuesta['mensaje']="No entro";
	echo json_encode($respuesta);
}
?>
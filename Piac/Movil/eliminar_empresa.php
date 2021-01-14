<?php
$respuesta=array();
if (isset($_POST['s'])) {
	require_once'../src/consultas.php';
	$consultas= new consultas();
	$respuesta['success']=true;
	$s=$_POST['s'];
	if ($s=="buscar") {
		$nombre=$_POST['nombre'];
		$respuesta['para']=$s;
		$resp=$consultas->Consultar_empresa_por_nombre($nombre);
		if ($resp==null) {
			$respuesta['error']=true;
			$respuesta['mensaje']="El usuario no existe";
			echo json_encode($respuesta);
		}
		else {
			if ($fila=mysqli_fetch_array($resp)) {
				$respuesta['error']=false;
				$respuesta['lista'][]=$fila;
				echo json_encode($respuesta);
			}
		}
		

	}
	else if ($s=="elim") {
		$respuesta['para']=$s;
		$nombre=$_POST['nombre'];
		$consultas->Eliminar_empresa($nombre);
		$respuesta['error']=false;
		$respuesta['mensaje']="Eliminado";
		echo json_encode($respuesta);
	}
}
else
{
	$respuesta['success']=true;
	$respuesta['error']=true;
	$respuesta['mensaje']="No se envio la s";
	echo json_encode($respuesta);
}

?>
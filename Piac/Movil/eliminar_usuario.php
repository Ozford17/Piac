<?php
$respuesta=array();
if (isset($_POST['s'])) {
	require_once'../src/consultas.php';
	$consultas= new consultas();
	$respuesta['success']=true;
	$s=$_POST['s'];
	if ($s=="buscar") {
		$correo=$_POST['correo'];
		$respuesta['para']=$s;
		$resp=$consultas->BuscarUsuario_correo($correo);
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
		$correo=$_POST['correo'];
		$consultas->Eliminar_usuario($correo);
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
<?php

require_once "../src/consultas.php";
$consulta = new consultas();  
$nombre=$_POST['nombre_usuario'];
$contraseña=$_POST['contraseña'];
$_SESSION['tipo']=0;
$response=array();
$res=$consulta->verificarUsuario($nombre,$contraseña);
while ($fila=mysqli_fetch_array($res)) {
	if ($nombre==$fila[2] && $contraseña==$fila[3]) {

		$response["success"]=true;
		$response['codigo']=$fila[0];
		$response['nombre']=$fila[1];
		$response['correo']=$fila[2];
		$response['tipo']=$fila[4];
		$response['sede']=$fila[5];

	}
	else
	{
		$response["success"]=false;
	}
	echo json_encode($response);



?>
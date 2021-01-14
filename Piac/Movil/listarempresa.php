<?php

require_once'../src/consultas.php';
$consultar= new consultas();
$salida=array();
$salida["success"]=false;
$salida["fallo"]=false;
$salida["lista"]=null;
$respuesta=$consultar->BuscarEmpresa();
while ($fila=mysqli_fetch_array($respuesta)) {
	if ($fila==null) {
		$salida["success"]=true;
		$salida["fallo"]=true;
	}
	else
	{
		$salida["success"]=true;
		$salida["lista"][]=$fila;
	}
}

echo json_encode($salida);



 ?>
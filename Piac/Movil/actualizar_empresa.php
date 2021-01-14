<?php
$respuesta=array();
$respuesta['success']=true;
if ($_POST['para']) {
	require_once'../src/consultas.php';
	$consultas= new consultas();
	$para=$_POST['para'];
	if ($para=="buscar") {
		$nombre=$_POST['nombre'];
		$resp=$consultas->Consultar_empresa_por_nombre($nombre);
		if ($fila=mysqli_fetch_array($resp)) {
			if ($fila==null) {
				$respuesta['existe']=false;	
			}
			else{
				$respuesta['existe']=true;
				$respuesta['datos'][]=$fila;
			}
		}

	}
	else if ($para=="actualizar") {
		$codigo=$_POST['codigo'];
		$nombre=$_POST["nombre"];
		$correo=$_POST["correo"];
		$nit=$_POST["nit"];
		$ciudad=$_POST["ciudad"];
		$telefono=$_POST["telefono"];
		$representante=$_POST["representante"];

		$consultas->ActualizarEmpresa($codigo, $nit, $nombre,$representante, $ciudad, $telefono, $correo);
		$respuesta['error']=false;

	}
	else{
		$respuesta['error']=true;
		$respuesta['mensaje']="No entro";
	}

	;
}else{
		$respuesta['error']=true;
		$respuesta['mensaje']="No se envio el para";
}
echo json_encode($respuesta);
?>
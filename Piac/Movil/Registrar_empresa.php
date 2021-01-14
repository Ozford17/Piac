<?php

require_once'../src/consultas.php';
$con=new consultas();

$request=array();
$codigo=0;
$nombre=$_POST["nombre"];
$correo=$_POST["correo"];
$nit=$_POST["nit"];
$ciudad=$_POST["ciduad"];
$telefono=$_POST["telefono"];
$representante=$_POST["representante"];
 	$bandera=0;
 	$resp=$con->Consultar_empresa_nombre();
 	while($fila=mysqli_fetch_array($resp)) {
 			if ($fila[2]==$nit) {
 				$request['success']=true;
 				$request['error']=true;
 				$request['mensaje']="ya hay un usaurio con ese correo";	
 				$bandera++;

 			
 		}
 	}
 	if ($bandera==0) {
			$resultado=$con->Consultar_max_empresa();
			if($fila=mysqli_fetch_array($resultado))
			{
				$codigo=$fila[0];
			}
			$codigo++;
 			$con->agregar_empresa($codigo,$nit,$nombre,$representante,$ciudad,$telefono,$correo);
 			$request['error']=false;
			$request["success"]=true;
		}
 	echo json_encode($request);

?>
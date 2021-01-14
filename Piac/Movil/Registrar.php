<?php

require_once'../src/consultas.php';
$con=new consultas();

$request=array();
$codigo=0;
$nombre=$_POST["nombre"];
$correo=$_POST["correo"];
$contraseña=$_POST["contrasena"];
$tipo=$_POST["tipo"];
$sede=$_POST["sede"];

 	
 	$resp=$con->BuscarUsuario_correo($correo);
 	if($fila=mysqli_fetch_array($resp)) {
 			$request['success']=true;
 			$request['error']=true;
 			$request['mensaje']="ya hay un usaurio con ese correo";	
 		}
 	else
 		{

 			
			$resultado=$con->Maximo_cod_usu();
			if($fila=mysqli_fetch_array($resultado))
			{
				$codigo=$fila[0];
			}
			$codigo++;
 			$con->Insert_usuario($codigo,$nombre,$correo,$contraseña,$tipo,$sede);
 			$request['error']=false;
			$request["success"]=true;
		}
 	echo json_encode($request);
?>
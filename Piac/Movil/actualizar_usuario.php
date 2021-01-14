<?php
$respuesta=array();
if(isset($_POST['s']))
{
	require_once'../src/consultas.php';
	$consultas= new consultas();

	$respuesta['success']=true;
	$correo=$_POST['correo'];
	
	$s=$_POST['s'];

	if ($s=="Buscar") {		
		$respuesta['para']="buscar";
		$resp=$consultas->BuscarUsuario_correo($correo);
		if ($resp!=null) {
			while($fila=mysqli_fetch_array($resp))
			{	
				
				$respuesta['error']=false;
				$respuesta['lista'][]=$fila;
				echo json_encode($respuesta);
			}
		}
		else
		{

			$respuesta['error']=true;
			$respuesta['mensaje']=$resp;
			echo json_encode($respuesta);
		}
		
		
	}
	else if ($s=="actua") {
		$respuesta['para']="actua";
		$nombre=$_POST['nombre'];
		$contraseña=$_POST['contra'];
		$tipo=$_POST['tipo'];
		$correo=$_POST['correo'];
		$resp=$consultas->Actualizar_usuario($correo,$nombre, $contraseña, $tipo);
		if ($resp!=false) {
			$respuesta['error']=false;
			$respuesta['mensaje']="Actualizado";
		}
		else
		{
			$respuesta['error']=true;
			$respuesta['mensaje']=$resp;
		}
		echo json_encode($respuesta);
	}
}
else
{
	
	$respuesta['success']=true;
	$respuesta['error']=true;
	$respuesta['mensaje']="no se envio la s";
	echo json_encode($respuesta);
}

?>
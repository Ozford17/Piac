<?php
header("Content-type: text/html; charset=utf8");
if ($_POST['nombre_usuario'] && $_POST['contraseña'])
{
	SESSION_START();
	require_once "../src/consultas.php";
	$consulta = new consultas();  
	$nombre=$_POST['nombre_usuario'];
	$contraseña=hash("sha256", $_POST['contraseña']);
	//$contraseña=$_POST['contraseña'];
	$_SESSION['tipo']=0;
	$res=$consulta->verificarUsuario($nombre,$contraseña);
	while ($fila=mysqli_fetch_array($res)) {
		if ($nombre==$fila[2] && $contraseña==$fila[3]) {
			$_SESSION['codigo']=$fila[0];
			$_SESSION['nombre']=$fila[1];
			$_SESSION['correo']=$fila[2];
			$_SESSION['tipo']=$fila[4];
			$_SESSION['sede']=$fila[5];
			$resp=$consulta->BuscarEmpresa_sede($fila[5]);
			if ($f=mysqli_fetch_array($resp)) {
				$_SESSION['empresa']=$f[0];
			}

		}
		else
		{
			
			$_SESSION['tipo']=0;
		}
	}
	if ($_SESSION['tipo']==0) {
		$mesaje["error"]="true";
		$mensaje["direc"]="index.php?Error";
		$mensaje['mensaje']="Datos de usuario incorrectos";
	}else if ($_SESSION['tipo']==1) {
		$mesaje["error"]="false";
		$mensaje["direc"]="Users/Admin/";
	}else if ($_SESSION['tipo']==2) {
		$mesaje["error"]="false";
		$mensaje["direc"]="Users/Empresa/home.php";
	}else if ($_SESSION['tipo']==3) {
		$mesaje["error"]="false";
		$mensaje["direc"]="Users/Sede/home.php";
	}
}	
else{
	$mensaje["error"]="true";
	$mensaje["direc"]="../index.php?Error";
	$mensaje["mensaje"]="No se enviaron los parametros";
}

$deco= json_encode($mensaje);
echo base64_encode(($deco));


?>
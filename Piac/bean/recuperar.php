<?php
require_once'../src/consultas.php';
$consulta=new consultas();
$nombre=$_POST['usu'];


$res=$consulta->recuperar_usuario($nombre);
while ($fila=mysqli_fetch_array($res)) {
	if ($nombre==$fila[2] ) {

		mail($nombre,"Recuperacion de contraseña","Su contraseña es:".$fila[3]);
		header('Location:../recuperar.php?ok=1');

	}
	else
	{
		//header('Location:../recuperar.php?ok=0');		
	}
}
?>
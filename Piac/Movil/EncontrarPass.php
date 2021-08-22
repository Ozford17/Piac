<?php

require "ConexionPr.php";

$email=$_POST['correo'];

$sqlinsert="SELECT `contraseña` FROM `usuario` WHERE `correo`='".$email."'";
$result=mysqli_query($Conexion,$sqlinsert);

if ($f=mysqli_fetch_array($result)) {
	if (mail($email, "Recuperacion de contraseña del portal PIAC", "Esta es su contraseña".$f[0],"soporte@ecoblue.co")) {
		echo ("Se a enviado en correo satisfactoriamente ...");
	}else {
		echo ("No se a podido enviar el correo...");
	}
}else{
	echo ("No se a podido realizar la consulta sql...");
}

?>
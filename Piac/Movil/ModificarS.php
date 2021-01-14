<?php

require_once"../src/Conexion.php";
$consultar= new conexionBD();

$Codigo= $_POST['Codigo'];
$Nombre= $_POST['Nombre'];
$Ciudad= $_POST['Ciudad'];
$Direccion= $_POST['Direccion'];
$Telefono= $_POST['Telefono'];
$Representante= $_POST['Representante'];
$Correo= $_POST['Correo'];
$Empresa= $_POST['Empresa'];


$Consulta="UPDATE Sede SET Codigo = ".$Codigo.", Nombre = '".$Nombre."', Ciudad = '".$Ciudad."', Direccion = '".$Direccion."', Telefono = '".$Telefono."', Representante = '".$Representante."', Correo = '".$Correo."', Empresa = ".$Empresa." WHERE Codigo = ".$Codigo."";
$consultar->consultar($Consulta);

?>
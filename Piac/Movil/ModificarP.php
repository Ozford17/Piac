<?php

require_once"../src/Conexion.php";
$consultar= new conexionBD();

$Codigo= $_POST['Codigo'];
$Nit= $_POST['Nit'];
$Nombre= $_POST['Nombre'];
$Direccion= $_POST['Direccion'];
$Area= $_POST['Area'];
$Sede= $_POST['Sede'];

mail("m.martinez@ecoblue.co","asjdajds","$Codigo,$Nit,$Nombre,$Direccion,$Area,$Sede");

$Consulta="UPDATE Proveedores set Codigo = ".$Codigo.", Nit = '".$Nit."', Nombre = '".$Nombre."', Direccion = '".$Direccion."', Area_residuos = '".$Area."', Sede = ".$Sede." WHERE Codigo = ".$Codigo."";
$consultar->consultar($Consulta);

?>
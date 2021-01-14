<?php

require_once"../src/Conexion.php";
$consultar= new conexionBD();

$Codigo= $_POST['Codigo'];

$Consulta="DELETE FROM Proveedores WHERE Codigo = ".$Codigo."";
$consultar->consultar($Consulta);

?>
<?php

require_once"../src/Conexion.php";
$consultar= new conexionBD();

$Codigo= $_POST['Codigo'];

$Consulta="DELETE FROM Sede WHERE Codigo = ".$Codigo."";
$consultar->consultar($Consulta);

?>
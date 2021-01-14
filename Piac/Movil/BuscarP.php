<?php

include 'ConexionPr.php';

$Codigo = $_GET['Codigo'];

$Consulta = "SELECT * FROM Proveedores WHERE Codigo = '$Codigo'";
$Resultado = $Conexion -> query($Consulta);

while ($fila = $Resultado -> fetch_array()) {
	$Proveedores[] = array_map('utf8_encode', $fila);
}

echo json_encode($Proveedores);
$Resultado -> close();
?>
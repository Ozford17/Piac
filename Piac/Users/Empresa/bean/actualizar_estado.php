<?php 
if (isset($_POST['estado']) && isset($_POST['codigo'])&& isset($_POST['servicio'])) {
	

$estado=$_POST['estado'];
$codigo=$_POST['codigo'];
$servicio=$_POST['servicio'];

require_once '../../../src/consultas.php';
$consultas= new consultas();
$consultas->ActualizarSedeEmpresa_servicio($codigo, $servicio, $estado);
echo "Actualizado";
}
else
{
	Echo "nne";
}




 ?>
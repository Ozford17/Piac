<?php
$repuesta=array();
require_once'../src/consultas.php';
$consultas= new consultas();
$respuesta['success']=true;
$resp=$consultas->BuscarSede_empresa();
while ($fila=mysqli_fetch_array($resp)) {
 	
 	$respuesta['lista'][]=$fila;
 } 
 echo json_encode($respuesta);
	

?>

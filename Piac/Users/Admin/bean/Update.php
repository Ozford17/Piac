<?php
require_once"../../../src/consultas.php";
$consultas=new consultas();

$codigo=$_POST['codigo'];
$nombre=$_POST['Nombre'];
$ciudad=$_POST['Ciudad'];
$direccion=$_POST['Dirección'];
$telefono=$_POST['Telefono'];
$representante=$_POST['Representante'];


echo $codigo."<br>";
echo $nombre."<br>";
echo $ciudad."<br>";
echo $direccion."<br>";
echo $telefono."<br>";
echo $representante."<br>";
$consultas->ActualizarSedeEmpresa($codigo, $nombre, $ciudad,$direccion, $telefono, $representante );

?>
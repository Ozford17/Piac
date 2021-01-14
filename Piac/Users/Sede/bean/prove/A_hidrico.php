<?php
require_once'../../../../src/consultas.php';
$consultas= new consultas();
$azul=$_POST['azul'];
$gris=$_POST['gris'];
$verde=$_POST['verde'];
$sede=$_POST['sede'];
$fecha=date('Y')."-".date('m')."-".date('d');
$mes=date('m');

echo $azul."<br>";
echo $gris."<br>";
echo $verde."<br>";
echo $sede."<br>";
echo $fecha."<br>";
echo $mes."<br>";

$resp=$consultas->contar_huella_hidrica();
if ($f=mysqli_fetch_array($resp)) {
	$codigo=$f[0];
}
$codigo++;
$consultas->insertar_hidrico($codigo,$fecha,$mes,$azul,$verde,$gris,$sede);
$sede=base64_encode($sede);
header('location:../hidirico.php?ok=1&s='.$sede);



?>
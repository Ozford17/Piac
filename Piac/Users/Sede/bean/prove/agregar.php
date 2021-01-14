<?php
require_once"../../../../src/consultas.php";
$consultas= new consultas();
$nombre=$_POST['nombre'];
$nit=$_POST['nit'];
$direccion=$_POST['direccion'];
$area=$_POST['area'];
$ciudad=$_POST['ciudad'];
$sede=$_POST['sede'];
$codigo=0;

echo $nombre."<br>";
echo $nit."<br>";
echo $direccion."<br>";
echo $area."<br>";
echo $ciudad."<br>";
echo $sede."<br>";

$respuesta=$consultas->consultar_exi_proveedor($nit,$area);
while ($f=mysqli_fetch_array($respuesta)) {
	if ($f[0]>0) {
		$s=base64_encode($sede);
		header("Location: ../solido.php?ok=0&s=".$s);
	}
	else

	{
		$resp=$consultas->Consultar_max_proveedor();
if($fila=mysqli_fetch_array($resp))
{
	$codigo=$fila[0];
}
$codigo++;
$consultas->agregar_proveedor($codigo,$nit,$nombre,$direccion,$area,$sede);

$s=base64_encode($sede);
header('Location: ../solido.php?ok=1&s='.$s);
	}
}


?>
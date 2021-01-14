<?php  
require_once"../../../src/consultas.php";
$consultas = new consultas();

$empresa=$_POST['empresa'];
$nombre=$_POST['nombre'];
$ciudad=$_POST['ciudad'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$representante=$_POST['representante'];
$correo=$_POST['correo'];
$coordenadas=$_POST['coordenadas'];
$codigo=0;

$res=$consultas->Consultar_max_sede();
if($fila=mysqli_fetch_array($res))
{
	$codigo=$fila[0];
}
$codigo=$codigo+1;
$consultas->agregar_sede($codigo,$nombre,$ciudad,$direccion,$telefono,$representante,$correo,$empresa,$coordenadas);
echo '<div style="color:white; 
	               text-align:center;
	               width:82%; 
	               margin-left:5%; 
	               background:#B6CF41; 
	               font-size:1.5vw; 
	               padding:1vw;"> Inserción completada</div>';
?>
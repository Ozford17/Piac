<?php  
require_once"../../../src/consultas.php";
$consultas=new consultas();

$nit=$_POST['nit'];
$nombre=$_POST['nombre'];
$representante=$_POST['representante'];
$ciiu=$_POST['ciiu'];
$telefono=$_POST['telefono'];
$correo=$_POST['correo'];
$codigo=0;
$respuesta=$consultas->Consultar_max_empresa();
if($fila=mysqli_fetch_array($respuesta)){
	$codigo=$fila[0];
}
$codigo=$codigo+1;
$consultas->agregar_empresa($codigo,$nit,$nombre,$representante,$telefono,$correo,$ciiu);
$resp=$consultas->BuscarEmpresa_codigo($codigo);
if ($fila=mysqli_fetch_array($resp)>1) {
	echo '<div style="color:white; 
	               text-align:center;
	               width:82%; 
	               margin-left:5%; 
	               background:#B6CF41; 
	               font-size:1.5vw; 
	               padding:1vw;"> Inserción completada</div>';
}
else{
	echo '<div style="color:white; 
	              text-align:center;
	              width:82%; 
	              margin-left:5%; 
	              background:#ff9b9b; 
	              font-size:1.5vw; 
	              padding:1vw;"> ¡Error! no se guardo la empresa.</div>';
}

?>
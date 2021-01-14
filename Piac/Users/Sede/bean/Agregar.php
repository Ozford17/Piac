<?php
require_once'../../../src/consultas.php';
$consultas= new consultas();
$carpeta="../../documents/solido/";

$fecha=$_POST['mes_ano']."-01";
$residuo=$_POST['Reciduos'];
$material=$_POST['Material'];
$proveedor=$_POST['provee'];
$cantidad=$_POST['cantidad'];
$kilo=$_POST['Kilo'];
$descripcion=$_POST['descripcion'];
$observacion=$_POST['observacion'];
$sede=$_POST['sede'];
$certificado=$_FILES['certificado_residuo']['name'];
$ma="";
$resp=$consultas->max_solidos();
while ($f=mysqli_fetch_array($resp)) {
	$codigo=$f[0];
}
$codigo++;
echo $fecha."<br>";
echo $residuo."<br>";
echo $material."<br>";
if ($residuo==1) {
	$ma="Reciclable";

}else if ($residuo==2) {
	$ma="Peligoroso";
}
else if ($residuo==3) {
	$ma="Escombros";

}else if ($residuo==4) {
	$ma="Raes";
}
if ($residuo==5) {
	$ma="Especiales";

}else if ($material==6) {
	$ma="Ordinarios";
}
echo $ma."<br>";
echo $proveedor."<br>";
echo $cantidad."<br>";
echo $kilo."<br>";
echo $descripcion."<br>";
echo $observacion."<br>";
echo $sede."<br>";
echo $certificado."<br>";

if (!strpos($certificado, "pdf"))  
{ 
   	echo "La extensión de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .pdf<br></li></td></tr></table>"; 
}else{ 
   	if (move_uploaded_file($_FILES['certificado_residuo']['tmp_name'], $carpeta.$codigo."-".$certificado)){ 
      	echo "El archivo ha sido cargado correctamente.";
      	$consultas->insertar_solidos($codigo,$ma,$material,$cantidad,$descripcion,$observacion,$proveedor,$codigo."-".$certificado,$kilo,$sede,$fecha);
   	}else{ 
      	$mensaje= "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
      	$sede=base64_encode($sede);

      	header('Location:solido.php?s='.$sede."&err=".base64_encode($mensaje));
   	} 
   	$sede=base64_encode($sede);
	header('Location:solido.php?s='.$sede."&ok=3");
}

?>
<?php
require_once"../../../../src/consultas.php";
$consultas= new consultas();
$carpeta="../../../documents/prove/";


//datos del arhivo 
$nombre_archivo_camara = $_FILES['camara_comercio']['name']; 
$tipo_archivo_camara = $_FILES['camara_comercio']['type']; 
$tamano_archivo_camara = $_FILES['camara_comercio']['size']; 

$nombre_archivo_rut = $_FILES['Rut']['name']; 
$tipo_archivo_rut = $_FILES['Rut']['type']; 
$tamano_archivo_rut = $_FILES['Rut']['size']; 

$nombre_archivo_cedula = $_FILES['cedula']['name']; 
$tipo_archivo_cedula = $_FILES['cedula']['type']; 
$tamano_archivo_cedula = $_FILES['cedula']['size']; 

$nombre_archivo_permisos = $_FILES['permisos']['name']; 
$tipo_archivo_permisos = $_FILES['permisos']['type']; 
$tamano_archivo_permisos = $_FILES['permisos']['size']; 

$nombre_archivo_certificado = $_FILES['certificado']['name']; 
$tipo_archivo_certificado = $_FILES['certificado']['type']; 
$tamano_archivo_certificado = $_FILES['certificado']['size']; 
//$id=$utilidades->test_input($_POST['id_bitacora']);

$id=$_POST['id'];
$s=$_POST['s'];

echo $nombre_archivo_camara."<br>";
echo $tipo_archivo_camara."<br>";
echo $tamano_archivo_camara."<br>";

echo $nombre_archivo_rut."<br>";
echo $tipo_archivo_rut."<br>";
echo $tamano_archivo_rut."<br>";

echo $nombre_archivo_cedula."<br>";
echo $tipo_archivo_cedula."<br>";
echo $tamano_archivo_cedula."<br>";

echo $nombre_archivo_permisos."<br>";
echo $tipo_archivo_permisos."<br>";
echo $tamano_archivo_permisos."<br>";

echo $nombre_archivo_certificado."<br>";
echo $tipo_archivo_certificado."<br>";
echo $tamano_archivo_certificado."<br>";

//compruebo si las características del archivo son las que deseo 
if (!strpos($tipo_archivo_camara, "pdf")|| 
	!strpos($tipo_archivo_rut, "pdf")||
	!strpos($tipo_archivo_cedula, "pdf")||
	!strpos($tipo_archivo_permisos, "pdf")||
	!strpos($tipo_archivo_certificado, "pdf") 
   )  { 
   	echo "La extensión de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos .pdf<br></li></td></tr></table>"; 
}else{ 
   	if (move_uploaded_file($_FILES['camara_comercio']['tmp_name'], $carpeta.$id."-".$nombre_archivo_camara)){ 
      	echo "El archivo ha sido cargado correctamente.";
      	$consultas->agregar_documentacion_proveedor("Camara_comercio",$id."-".$nombre_archivo_camara, $id); 
   	}else{ 
      	$mensaje= "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
   	} 
   	if (move_uploaded_file($_FILES['Rut']['tmp_name'], $carpeta.$id."-".$nombre_archivo_rut)){ 
      	echo "El archivo ha sido cargado correctamente.";
      	$consultas->agregar_documentacion_proveedor("Rut",$id."-".$nombre_archivo_rut, $id);
   	}else{ 
      	$mensaje= "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
   	} 
   	
   	 if (move_uploaded_file($_FILES['cedula']['tmp_name'], $carpeta.$id."-".$nombre_archivo_cedula)){ 
      	echo "El archivo ha sido cargado correctamente.";
      	$consultas->agregar_documentacion_proveedor("Cedula_representante",$id."-".$nombre_archivo_cedula, $id);
   	}
   	else{ 
      	$mensaje= "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
   	} 
   	
   	if (move_uploaded_file($_FILES['permisos']['tmp_name'], $carpeta.$id."-".$nombre_archivo_permisos)){ 
      	echo "El archivo ha sido cargado correctamente.";
      	$consultas->agregar_documentacion_proveedor("Permisos",$id."-".$nombre_archivo_permisos, $id);	
   	}else{ 
      	
      	$mensaje= "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
   	} 
   	if (move_uploaded_file($_FILES['certificado']['tmp_name'], $carpeta.$id."-".$nombre_archivo_certificado)){ 
      	echo "El archivo ha sido cargado correctamente.";
      	$consultas->agregar_documentacion_proveedor("Certificaciones",$id."-".$nombre_archivo_certificado, $id);
   	}
   	else{ 
      	$mensaje= "Ocurrió algún error al subir el fichero. No pudo guardarse."; 
      	$mensaje=base64_encode($mensaje);
      	$sede=base64_encode($sede);
      	header('Location:../solido.php?s='.base64_encode($s).'&err='.$mensaje);
      	exit();
   	} 
   		$sede=base64_encode($sede);
      	header('Location:../solido.php?s='.base64_encode($s).'&ok=2');
      	exit();



} 
?>
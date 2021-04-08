<?php
$mensaje=array();
if(isset($_POST['Codigo']) && isset($_POST['Nombre']) && isset($_POST['Correo'])  &&  isset($_POST['Contrasena']))
{
    require_once '../../../src/consultas.php';
    $consultas= new consultas();
    $codigo=base64_decode($_POST['Codigo']);
    $nombre=$_POST['Nombre'];
    $Correo=$_POST['Correo'];
    $Contra=hash("sha256", $_POST['Contrasena']);
    
    $consultas->Actualizar_datos_usuario($Correo,$nombre,$Contra);
    $mensaje["success"]="true";
    
    
}else 
{
    $mensaje["success"]="false";
    $mensaje["mensaje"]="Datos erroneos";
}
echo json_encode($mensaje);
?>


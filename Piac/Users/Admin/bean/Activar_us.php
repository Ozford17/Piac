<?php
$mensaje=array();
if(isset($_POST['Codigo']) && !empty($_POST['Codigo']))
{
    require_once '../../../src/consultas.php';
    $consultas= new consultas();
    
    $codigo=$_POST['Codigo'];
    $consultas->block_desblock_usu($codigo,0);
    $mensaje['success']="true";

}else{
    $mensaje['success']="false";
    $mensaje['mensaje']="Error en los datos de envio";
}
echo json_encode($mensaje);
?>
<?php
if(isset($_POST['codigo']))
{
    $codigo=base64_decode($_POST['codigo']);
    
    require_once '../../../src/consultas.php';
    $consultas= new consultas();
    $valor=1;
    $consultas->block_desblock_usu($codigo,$valor);
    $mensaje["success"]="true";

}
else 
{
    $mensaje["success"]="true";
    $mensaje["mensaje"]="No se enviaron datos";
}
echo json_encode($mensaje);

?>
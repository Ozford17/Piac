<?php
$mensaje= array();
if( isset($_POST['Sede']) && isset($_POST['nombre']) && isset($_POST['correo']) && isset($_POST['constrasena']) && isset($_POST['tipo']))
{
    echo $Sede=$_POST['Sede'];
    echo $nombre=$_POST['nombre'];
    echo $correo=$_POST['correo'];
    echo $constrasena=$_POST['constrasena'];
    echo $tipo=$_POST['tipo'];

    require_once '../../../src/consultas.php';
    $consultas= new consultas();
    
    $codigo=0;
    $resp=$consultas->Maximo_cod_usu();
    if($fil=mysqli_fetch_array($resp))
    {
        $codigo=$fila[0]+1;
    }
    $consultas->Insert_usuario($codigo,$nombre,$correo,$constrasena,$tipo,$Sede );
    $resp=$consultas->BuscarUsuario_codigo($codigo);
    if(mysqli_num_fields($resp)>0)
    {
        $mensaje['success']="true";
        
    }else
    {
        $mensaje['success']="false";
        $mensaje["mensaje"]="Error en la creación";   
    }
}
else
{
    $mensaje['success']="false";
    $mensaje["mensaje"]="Error en los datos";   
}
echo json_encode($mensaje);
?>
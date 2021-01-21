<?php

if(isset($_POST["codigo"]) && !is_null($_POST["codigo"]))
{
    if($_POST["codigo"] == 0)
    {
        $mensaje["success"] == 1;
    }
    else
    {
        $codigo=$_POST["codigo"];
        require_once '../../../src/consultas.php';
        $consultas= new consultas();
        $actua="Estado=1";
        $consultas->ActualizarDatosSedeEmpresa($codigo,$actua);
        $res=$consultas->consultar_sede_codigo($codigo);
        if(mysqli_num_rows($res) > 0 )
        {
            $fila=mysqli_fetch_assoc($res);
            if($fila["Estado"] == 1)
            {
                $mensaje["success"]=0;
            }
            else{
                $mensaje["success"]= 1;
                $mensaje["mensaje"]="Hubo algun error y no se pudo eliminar";
            }
        }
        else{
            $mensaje["success"]= 1;
            $mensaje["mensaje"]="Hubo algun error y no se pudo encontrar";
        }
    }
}else{
    $mensaje["success"]= 1;
    $mensaje["mensaje"]="No hay datos";
}
echo json_encode($mensaje);
?>
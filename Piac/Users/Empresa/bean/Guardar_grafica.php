<?php
/* saveFile.php */
//Obtener variable POST e desemcriptarla
$mensaje=array();
if( isset($_POST['img']) && isset($_POST['nombre']) &&  !is_null($_POST['img']) && !is_null($_POST['nombre']))
{
    
    $nombre=$_POST['nombre'];
    $img = $_POST['img'];
    
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    echo $img;
    $data = base64_decode($img);

    $im = imagecreatefromstring($data);  //convertir text a imagen
    if ($im !== false) {
        imagejpeg($im, '../img/'.$nombre.'.jpg'); //guardar a server 
        imagedestroy($im); //liberar memoria  
        $mensaje["success"]=true;
    }else {
        $mensaje["success"]=false;
        $mensaje["mensaje"]= 'Un error ocurrio al convertir la imagen.';    
    }
}
else{
    $mensaje["mensaje"]= 'Datos erroneos';    
}
echo json_encode($mensaje);
?>
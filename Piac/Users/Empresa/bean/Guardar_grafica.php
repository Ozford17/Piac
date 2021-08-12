<?php
/* saveFile.php */
//Obtener variable POST e desemcriptarla
$mensaje=array();
if( isset($_POST['img']) && isset($_POST['nombre']) &&  !is_null($_POST['img']) && !is_null($_POST['nombre']))
{
    
    
    $nombre=$_POST['nombre'];
    $img = $_POST['img'];
    $percent = 50;
    
    $img = str_replace('data:image/png;base64,', '', $img);
    $img = str_replace(' ', '+', $img);
    
    $data = base64_decode($img);
    $im = imagecreatefromstring($data);  //convertir text a imagen
    
    
    if ($im !== false) {
        $Nombre_fichero=$nombre.'.png';
        imagepng($im, '../img/'.$Nombre_fichero); //guardar a server 
        list($width, $height) = getimagesize("../img/".$Nombre_fichero);
        $newwidth = $width * $percent;
        $newheight = $height * $percent;
        // Load
        $thumb = imagecreatetruecolor($newwidth, $newheight);
        imagecopyresized($thumb, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
        imagedestroy($im); //liberar memoria 
        imagepng($thumb, '../img/'.$Nombre_fichero); //guardar a server 
        imagedestroy($thumb); //liberar memoria 
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
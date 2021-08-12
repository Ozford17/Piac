<?php
    require './../../src/vendor/autoload.php';
    use Dompdf\Dompdf;
    
    
    
    $pdf= new DOMPDF();
    ob_start();
    include "./bean/informe.php";
    $html=ob_get_clean();
    $pdf->set_paper("letter","portrait");
    $pdf->load_html(($html));
    $pdf->render();
    if($pdf->stream("descarga_reporte.pdf"))
    {
        echo "se Genero";
    }
    else
    {
        echo "no se genero";
    }


?>
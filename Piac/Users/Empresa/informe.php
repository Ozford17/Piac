<?php
    require './../../src/vendor/autoload.php';
    use Dompdf\Dompdf;
    
    $html=file_get_contents('./Informeyestaisticas.php');
    $pdf= new DOMPDF();
    $pdf->set_paper("letter","portrait");
    $pdf->load_html(utf8_decode($html));
    $pdf->render();
    $pdf->stream("descarga_reporte.pdf");


?>
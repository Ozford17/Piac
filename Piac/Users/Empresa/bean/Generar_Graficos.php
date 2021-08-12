<?php
$bandera=0;
session_start();
if(isset($_POST["Datos"]))  
{
    $Datos=$_POST["Datos"];
    echo "Ya llego POST";
    $bandera++;
}
else if(isset($_GET["Datos"]))
{
    //var_dump($_GET["Datos"]);
    $_SESSION["Datos"]=$_GET["Datos"];
    $Datos=array();
    $Datos=json_decode($_GET["Datos"],true);
    if(json_last_error())
    {
        echo json_last_error_msg();    
    }
    
    
    
    
    
    $bandera++;
}
else if(file_get_contents('php://input')){
    $Datos=file_get_contents('php://input');
    var_dump($Datos);
    echo "Ya llego curl";
    $bandera++;
}
else
{
    echo "No se genero ";
}

if($bandera!=0)
{

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descarga de informe</title>
    <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script src='../../../src/js/jquery-3.4.1.min.js'></script>
    <script>
        
        $(window).on("load",function(e){
           window.close();
        });

        <?php
            if($Datos["tipo"]=="mensual" || $Datos["tipo"]=="anual" )
            {
                
                ?>
                
                google.charts.load('current', {'packages':['corechart','table']});  
                google.charts.setOnLoadCallback(Huella_general);
                google.charts.setOnLoadCallback(Huella_empresa_sede);
                google.charts.setOnLoadCallback(Alcances);
                google.charts.setOnLoadCallback(Alcance1);
                google.charts.setOnLoadCallback(Alcance2);
                google.charts.setOnLoadCallback(Gases);
                
                function Huella_general(){
                    let campo=$("#HG");
                    var diseño1=document.createElement("div");
                    diseño1.setAttribute("id","torta");
                    diseño1.setAttribute("style","background: white; height: 20vw;width: 100%;  visibility: hidden;" );
                    
                    campo.append(diseño1);
                    
                    console.log(google.visualization);
                    var data = google.visualization.arrayToDataTable([
                              ['Tipo', 'Cantidad material'],
                              <?php
                                
                                
                                foreach ($Datos["Huella_general"] as $fila) {
                                      echo "['".$fila[0]."',".number_format($fila[1], 2, '.', '')."],";
                                }
                              ?>
                    ]);
                                                var options = {
                      title: 'Huella de Carbono  <?php echo $Datos["Cara"]." ".$Datos["tipo"] ?>',
                     is3D: true,
                     legend:{
                         position:"labeled"
                     }
                    };
                    var chart = new google.visualization.PieChart(document.getElementById('HG'));
                    chart.draw(data, options);
                    let image=document.createElement("img");
                    image.setAttribute("id","imagen");
                    image.setAttribute("src",chart.getImageURI());
                    campo.append(image);
                    var dataUrl = chart.getImageURI();
                    
                    $.ajax({
        		        url: './Guardar_grafica.php',         
        		        type: 'POST', 
						dataType:"html",  
						data:{ img: dataUrl, nombre: "Huella-general" }              
        		        
        		    }); 
                }
                <?php if($Datos["Cara"]!="Sede")
                {?>
                    function Huella_empresa_sede(){
                        let campo1=$("#HES");
                        var diseño2=document.createElement("div");
                        diseño2.setAttribute("id","Column");
                        diseño2.setAttribute("style","background: white; height: 20vw;width: 100%; margin-top: 20px;;" );
                        campo1.append(diseño2);
                        console.log(google.visualization);
                        var data = google.visualization.arrayToDataTable([

                            ['Empresa', 'Cantidad Co2'],
                            <?php
                                if(isset($Datos["Huella_empresa_sede"]))
                                {
                                    foreach ($Datos["Huella_empresa_sede"]as $fila)
                                    {
                                    echo "['".$fila[1]."',".number_format($fila[2], 2, '.', '')."],";
                                    }
                                }
                                  ?>
                        ]);
                                                var options = {
                        title: 'Huella de Carbono por sedes <?php echo $Datos["Cara"]." ".$Datos["tipo"] ?>'
                        };
                        var chart1 = new google.visualization.ColumnChart(document.getElementById('HES'));
                        chart1.draw(data, options);
                        let image=document.createElement("img");
                        image.setAttribute("id","imagen");
                        image.setAttribute("src",chart1.getImageURI());
                        campo1.append(image);
                        var dataUrl = chart1.getImageURI();	
                        $.ajax({
            		        url: './Guardar_grafica.php',         
            		        type: 'POST', 
    						dataType:"html",  
						    data:{ img: dataUrl, nombre: "Huella-sede" }              
        		       
        		        }); 
                    }
                <?php }?>

                function Alcances(){
                    let campo5=$("#AL");
                    var diseño4=document.createElement("div");
                    
                    diseño4.setAttribute("id","Column");
                    diseño4.setAttribute("style","background: white; height: 20vw;width: 100%; margin-top: 20px;;" );
                    campo5.append(diseño4);
                    console.log(google.visualization);
                    var data = google.visualization.arrayToDataTable([
                              ['Alcance', 'Huella Carbono'],
                              <?php
                                $alcance1=0;
                                $alcance2=0;            
                                    foreach($Datos["Alcance1"] as $fila)
                                    {
                                        $alcance1= $alcance1+number_format($fila[1], 2, '.', '');
                                    }                        
                                    echo "['Alcance 1',".$alcance1."], ";
                                    foreach($Datos["Alcance2"] as $fila)
                                    {
                                        $alcance2= $alcance2+number_format($fila[1], 2, '.', '');
                                    }                                
                                    echo "['Alcance 2',".$alcance2."] ";
                              ?>
                    ]);
                                                var options = {
                      title: 'Discriminación por alcances.  <?php echo $Datos["Cara"]." ".$Datos["tipo"] ?>'
                    };
                    var chart5 = new google.visualization.BarChart(document.getElementById('AL'));
                    chart5.draw(data, options);
                    let image=document.createElement("img");
                    image.setAttribute("id","imagen");
                    image.setAttribute("src",chart5.getImageURI());
                    campo5.append(image);
                    var dataUrl = chart5.getImageURI();	
                    $.ajax({
        		        url: './Guardar_grafica.php',         
        		        type: 'POST', 
						dataType:"html",  
						data:{ img: dataUrl, nombre: "Huella-Alcances" }             
        		       
        		    });
                }

                function Alcance1(){
                    let campo2=$("#A1");
                    var diseño3=document.createElement("div");
                    diseño3.setAttribute("id","Column");
                    diseño3.setAttribute("style","background: white; height: 20vw;width: 100%; margin-top: 20px;;" );
                    campo2.append(diseño3);
                    console.log(google.visualization);
                    var data = google.visualization.arrayToDataTable([
                              ['Año', 'Huella Carbono'],
                              <?php
                                
                                    foreach($Datos["Alcance1"] as $fila)
                                    {
                                        echo "['".$fila[0]."',".number_format($fila[1], 2, '.', '')."],";
                                    }                                
                              ?>
                    ]);
                                                var options = {
                      title: 'Alcance 1  <?php echo $Datos["Cara"]." ".$Datos["tipo"] ?>'
                    };
                    var chart2 = new google.visualization.BarChart(document.getElementById('A1'));
                    chart2.draw(data, options);
                    let image=document.createElement("img");
                    image.setAttribute("id","imagen");
                    image.setAttribute("src",chart2.getImageURI());
                    campo2.append(image);
                    var dataUrl = chart2.getImageURI();	
                    $.ajax({
        		        url: './Guardar_grafica.php',         
        		        type: 'POST', 
						dataType:"html",  
						data:{ img: dataUrl, nombre: "Huella-Alcance-1" }             
        		       
        		    }); 
                }

                function Alcance2(){
                    let campo3=$("#A2");
                    var diseño4=document.createElement("div");
                    diseño4.setAttribute("id","Column");
                    diseño4.setAttribute("style","background: white; height: 20vw;width: 100%; margin-top: 20px;;" );
                    campo3.append(diseño4);
                    console.log(google.visualization);
                    var data = google.visualization.arrayToDataTable([
                              ['Año', 'Huella Carbono'],
                              <?php

                                foreach ($Datos["Alcance2"] as $fila) {
                                      echo "['".$fila[0]."',".number_format($fila[1], 2, '.', '')."],";
                                }
                              ?>
                    ]);
                                                var options = {
                      title: 'Alcance 2  <?php echo $Datos["Cara"]." ".$Datos["tipo"] ?>'
                    };
                    var chart3 = new google.visualization.BarChart(document.getElementById('A2'));
                    chart3.draw(data, options);
                    let image=document.createElement("img");
                    image.setAttribute("id","imagen");
                    image.setAttribute("src",chart3.getImageURI());
                    campo3.append(image);
                    var dataUrl = chart3.getImageURI();	
                    $.ajax({
        		        url: './Guardar_grafica.php',         
        		        type: 'POST', 
						dataType:"html",  
						data:{ img: dataUrl, nombre: "Huella-Alcance-2" }           
        		       
        		    }); 
                }
                function Gases(){
                    let campo4=$("#Gases");
                    var diseño5=document.createElement("div");
                    diseño5.setAttribute("id","Column");
                    diseño5.setAttribute("style","background: white; height: 20vw;width: 100%; margin-top: 20px;;" );
                    campo4.append(diseño5);
                    
                    var data = google.visualization.arrayToDataTable([
                        ['Año', 'CO2','N2O','CH4'],
                        <?php
                            function ADAÑ($año = 0, $List = array())
                            {
                                  $bandera=0;
                                  for($i=0; $i<count($List);$i++)
                                  {
                                      if($List[$i]==$año)
                                      {
                                          $bandera++;
                                          break;
                                      }
                                  }
                                  if($bandera==0)
                                  {
                                      $List[]=$año;
                                  }
                                  
                                  return $List;
                            }
                              
                            function Llenar_datos($mensaje = "" , $Años = array(), $Lista = array() )
                            {
                                
                                for($i=0; $i < count($Años); $i++)
                                {
                                    $mensaje= $mensaje."['".$Años[$i]."'";
                                    for ($a=0; $a < count($Lista) ; $a++) { 
                                        
                                        if($Años[$i] == $Lista[$a][0])
                                        {
                                            $mensaje=$mensaje.",".number_format($Lista[$a][1], 2, '.', '');
                                        }    

                                    }
                                    $mensaje= $mensaje."],";
                                    
                                   
                                    
                                }
                                return $mensaje;
                            }

                            $Años=array();
                            $Data= array();
                            foreach ($Datos["Otros"]["Dioxido_carbono"] as $fila1) {
                                $Data[]=$fila1;
                                $Años=ADAÑ($fila1[0], $Años);
                                
                            } 
                            foreach ($Datos["Otros"]["Oxido_Nitroso"] as $fila) {
                                $Data[]=$fila;
                                $Años=ADAÑ($fila[0], $Años);
                                  
                            }                              
                            foreach ($Datos["Otros"]["Metano"] as $fila2) {
                                $Data[]=$fila2;
                                $Años=ADAÑ($fila2[0], $Años);
                              
                            }
                            
                            $mensaje="";
                            if ($Data) {
                                  $mensaje=Llenar_datos($mensaje,$Años,$Data);
                            }
                            echo $mensaje;
                              
                        ?>
                    ]);
                    var options = {
                        title: 'Gases de efecto invernadero   <?php echo $Datos["Cara"]." ".$Datos["tipo"] ?>',
                        legend: { position: 'top', maxLines: 3 },
                        bar: { groupWidth: '75%' },
                        isStacked: true
                    };
                    var chart4 = new google.visualization.BarChart(document.getElementById('Gases'));
                    chart4.draw(data, options);
                    let image=document.createElement("img");
                    image.setAttribute("id","imagen");
                    image.setAttribute("src",chart4.getImageURI());
                    campo4.append(image);
                    var dataUrl = chart4.getImageURI();	
                    $.ajax({
        		        url: './Guardar_grafica.php',         
        		        type: 'POST', 
						dataType:"html",  
						data:{ img: dataUrl, nombre: "Huella-Gases" }             
        		        
        		    }); 
                }

                <?php
            }
            else
            {
                $mensaje['success']=false;
                $mensaje['mensaje']="Datos faltantes 1";
            }
            ?>
    </script>
</head>
<body>
    
    <div id="HG" style="width: 70%; border:black solid 1px; "></div>
    <div id="HES" style="width: 70%;  "></div>
    <div id="AL" style="width: 70%;  "></div>
    <div id="A1" style="width: 70%;  "></div>
    <div id="A2" style="width: 70%;  "></div>
    <div id="Gases" style="width: 70%;  "></div>

</body>
</html>
<?php

}
else{
    echo "No se genero ";
}
?>
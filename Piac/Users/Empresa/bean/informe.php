<?php
    session_start();
    date_default_timezone_set('America/Bogota');
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    require_once '../../src/consultas.php';
    
    $consultas= new consultas();
    $bandera_hi=0;
    function Convertir_imagen($path)
    {
        // Extensión de la imagen
        $type = pathinfo($path, PATHINFO_EXTENSION);

        // Cargando la imagen
        $data = file_get_contents($path);

        // Decodificando la imagen en base64
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        return $base64;
    }
    $datos=array();
    $datos=json_decode($_SESSION["Datos"],true);
    //var_dump($datos);
    $dat=$datos["Huella_general"];
    if($datos["Cara"]=="Sede")
    {
        $sede=base64_decode($datos["Sede"]);
    }
    if($datos["tipo"]=="mensual")
    {
        $años=$datos["Año"];
        
    }
    else{
        $años="";
        for ($i=0; $i <count($dat) ; $i++) 
        { 
            if($i==0)
            {
                $años=$años." ".$dat[$i]["año"];    
            }
            else
            {
                $años=$años.", ".$dat[$i]["año"];
            }
        
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de huella de carbono</title>
    <style>
        <strong i="7">@page</strong> { margin: 100px 25px; }
        p{
            text-align: justify;
        }

        footer { 
            position: fixed; 
            bottom: -60px; 
            left: 0px; 
            right: 0px; 
            background-color: lightblue; 
            width:100%;
            height: 50px; 
        }
        footer img{
            
            width:15%;
            height:25px;
            margin-top:5px;
            margin-left:80%;
        }
        #Indice a{
            text-decoration:none;
            color:black;
        }
        #Indice ul
        {
            list-style:none;
            
        }
        thead:before, thead:after { display: none; } tbody:before, tbody:after { display: none; } 
        table {
            text-align:center;
            width:100%;
            border-collapse : collapse;
            border:black solid 1px;
            table-layout: fixed;
            
        }
        table thead{
            background:#82cdff;
            height:20px;
            

        }
        table thead tr th{
            padding-top:10px;
            padding-bottom:10px;
        }
        table tbody tr td{
            padding-left:10px;
            padding-right:10px;
        }
        #descrip{
            margin-top:10px;
            font-weight:bold;
        }
        img{
            width:100%;
        }
        #title
        {
            text-align:center;
        }
        
       
        
    </style>
</head>
<body>
    <header></header>
    <main>
    <h3 align="center">REPORTE CÁLCULO DE HUELLA DE CARBONO CORPORATIVA</h3>
    <h1 style="margin-top:40%" align="center"><?php if($datos["Cara"]=="anual"){ echo $_SESSION['empresa_n'];}else{echo base64_decode($datos["Sede_n"]);}?></h1>
    <?php
        if($datos['tipo']=="mensual")
        {
            echo '<h3 style="margin-top:40%" align="center">Informe realizado para el periodo comprendido para el año '.$años.'</h3>';
        }
        else{
            echo '<h3 style="margin-top:40%" align="center">Informe realizado para el periodo comprendido para los años '.$años.'</h3>';
        }
    ?>
    
    <h3 align="center"><?=$meses[date('n')-1]." del ".date("Y")?></h3>
    
    
    
        <section id="Indice">
            <h3 id="title">Índice</h3>
            <ul>
                <li><a href="#intro">Introducción.</a></li>
                <li><a href="#huella">Huella de carbono corporativa.</a></li>
                <ul>
                    <li><a href="#Aca1">Alcance 1.</a></li>
                    <ul>
                        <li><a href="#F-f">Fuentes fijas.</a></li>
                        <li><a href="#f-m">Fuentes moviles.</a></li>
                    </ul>
                    <li><a href="#Aca2">Alcance 2.</a></li>
                </ul>
                <li><a href="#Res">Resultados.</a></li>
                <li><a href="#Conclu">Conclusiones.</a></li>
                <li><a href="#Biblio">Bibliografia.</a></li>
            </ul>
        </section>
        <section id="Indice">
            <h3 id="title">Índice de tablas</h3>
            <ul>
                <li><a href="#t1">Tabla 1. Principios para el reporte de Gases de Efecto Invernadero GEI</a></li>
                <li><a href="#t2">Tabla 2. Maquinaria que usa combustibles fósiles</a></li>
                <li><a href="#t3">Tabla 3. Extintores reportados en las instalaciones	</a></li>
                <li><a href="#t4">Tabla 4. Lubricantes totales usados por las fuentes fijas</a></li>
                <li><a href="#t5">Tabla 5. Vehículos pertenecientes a la empresa</a></li>
                <li><a href="#t6">Tabla 6. Extintores reportados para las fuentes móviles</a></li>
                <li><a href="#t7">Tabla 7. Maquinaria que hace uso de energía eléctrica</a></li>
                <li><a href="#t8">Tabla 8. Reporte de luminarias de la empresa</a></li>
                <li><a href="#t9">Tabla 9. Demostración de cantidades de huella de carbono.</a></li>
                <li><a href="#t10">Tabla 10. Emisiones discriminadas por alcances (1 y 2).</a></li>
                <li><a href="#t11">Tabla 11. Discriminación de los GEI en la huella de carbono</a></li>
                
            </ul>
        </section>
        <section id="Indice">
            <h3 id="title">Índice de gráficos</h3>
            <ul>
                <li><a href="#g1"> Gráfico 1. Huella de carbono corporativa de la empresa <?=$_SESSION['empresa_n']?>.</a></li>
                <li><a href="#g2"> Gráfico 2. Emisiones discriminadas por alcances (1 y 2).</a></li>
                <li><a href="#g3"> Gráfico 3. Emisiones Alcance 1 Emisiones directas.</a></li>
                <li><a href="#g4"> Gráfico 4. Alcance 2 Emisiones indirectas.	</a></li>
                <li><a href="#g5"> Gráfico 5. Discriminación de los GEI en la huella de carbono.	</a></li>
            </ul>
        </section>
        <section id="Indice">
            <h3 id="title">Índice figuras </h3>
            <ul>
            <li> <a href="#F1"> Figura 1 Representación esquemática de la huella de carbono</a></li> 
            </ul> 
        </section>
        
        <section name="intro" id="intro">
            <h4 id="title" >Introducción</h4>
            <p>El calentamiento global es una realidad de afectación mundial, el incremento sustancial y progresivo de gases de efecto invernadero en la atmósfera terrestre está generando un cambio en la temperatura del planeta, afectando drásticamente los ecosistemas y el clima; esta situación ha llevado a la búsqueda de acuerdos entre países y el diseño de estrategias para combatir y mitigar sus efectos. En el año 2001, en París se llevó a cabo la Cumbre Mundial de Cambio Climático - COP 21 en la cual se reunieron 197 países con el firme propósito de encontrar alternativas para reducir el impacto de las acciones antrópicas sobre el medio ambiente, puntualmente relacionadas con el efecto invernadero; en dicha cumbre Colombia suscribió ante las naciones asistentes el compromiso de reducir en un 20% las emisiones de gases de efecto invernadero GEI proyectadas a 2030, como parte del aporte a la mitigación del Cambio Climático a nivel mundial, el cual fue aprobado mediante la Ley 1844 de 2017.</p>
            <p>Otra de las estrategias que propone alianzas estratégicas para analizar y atacar las crecientes problemáticas mundiales es la La Agenda 2030, como acuerdo ético y programático para hacerle frente a los desafíos de la sociedad actual, con 17 Objetivos para el Desarrollo Sostenible, apuntando hacia el número 13: Acción por el clima, donde se busca adoptar medidas urgentes para combatir el Cambio Climático y sus efectos.</p>
            <p>Teniendo en cuenta lo anterior, cada vez el sector industrial manifiesta de forma más activa su interés en contribuir con la minimización de los impactos ambientales, adoptando prácticas sostenibles en su cadena productiva, tendiendo hacia el consumo responsable en toda su cadena de valor, cumpliendo con la normatividad ambiental vigente y las acciones voluntarias encaminadas a la minimización de emisiones de gases de efecto invernadero GEI, e implementación de planes y programas para el uso eficiente de los recursos (agua, energía, consumibles) y la disposición consciente y adecuada de los residuos generados, lo cual se refleja no solo en beneficios ambientales, también en disminución de costos económicos para las empresas.</p>
            <p>EcoBlue SAS, desarrolló la plataforma Piac, para facilitar a las empresas el reporte y gestión de la información para la realización del inventario de Gases de Efecto invernadero, en los alcances uno y dos para el sector industrial, como herramienta tecnológica que permite la toma de decisiones con el fin de minimizar el impacto ambiental, la implementación de estrategias de reducción de emisiones, aportando así a la mitigación del cambio climático</p>

        </section>
        <section name="huella">
            <h4 id="title">Huella de Carbono Corporativa</h4>
            <p>La huella de carbono corporativa es un inventario de los Gases de Efecto Invernadero GEI emitidos a la atmósfera, debido a la actividad productiva y ejercicio de la empresa.</p>
            <p>Los Gases de Efecto Invernadero GEI estás presentes en la atmósfera desde hace millones de años, lo que genera el calentamiento global es el aumento en la concentración de los mismos, sobrepasando los niveles, lo cual genera consecuencias climáticas y fenómenos atmosféricos a gran escala.</p>
            <p>
                Los gases de efecto invernadero más relevantes son:
                <ul>
                    <li>CO2: Dióxido de Carbono</li>
                    <li>CH4: Metano</li>
                    <li>N2O: Óxido Nitroso</li>
                </ul>
            </p>
            <p>
                De origen antrópico:
                <ul>
                    <li>CFC: Hidrofluorocarbonos</li>
                    <li>HFC: Perfluorocarbonos</li>
                    <li>SF6: Hexafluoruro de Azufre</li>

                </ul>
            </p>
            <p>
                Un representante de la empresa debe encargarse de cargar de forma puntual, responsable y exacta la información solicitada por la plataforma Piac, para realizar el inventario, teniendo en cuenta que, se deben seguir los siguientes principios, de acuerdo con el GHG protocol, como se muestra en la tabla 1.
            </p><br><br>
                <span id="descrip">Tabla 1 Principios para el reporte de Gases de Efecto Invernadero GEI</span>
                <div name="t1">
                    <table>
                        <thead>
                            <tr>
                                <th style="width:30%;">Principio</th>
                                <th style="width:70%;">Definición</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><b>Relevancia</b></td>
                                <td style="width:70%; Word-break:break-all; Word-wrap:break-Word;"><p>Asegura que el inventario de GEI refleje de manera apropiada las emisiones de una empresa y que sea un elemento objetivo en la toma de decisiones tanto en los usuarios internos como externos a la empresa.</p></td>
                            </tr>
                            <tr>
                                <td><b>Integridad</b></td>
                                <td><p>Conlleva a hacer la contabilidad y el reporte de manera íntegra, abarcando todas las fuentes de emisión de GEI y las actividades incluidas en el límite del inventario. Se debe reportar y justificar cualquier excepción a este principio general .</p></td>
                            </tr>
                            <tr>
                                <td><b>Consistencia</b></td>
                                <td><p>Utiliza metodologías consistentes que permitan comparaciones significativas de las emisiones a lo largo del tiempo. Documenta de manera transparente cualquier cambio en los datos, en el límite del inventario, en los métodos de cálculo o en cualquier otro factor relevante en una serie de tiempo.</p></td>
                            </tr>
                            <tr>
                                <td><b>Transparencia</b></td>
                                <td><p>Atiende a todas las cuestiones significativas o relevantes de manera objetiva y coherente, basada en un seguimiento de auditoría transparente. Revela todos los supuestos de importancia y hace referencias apropiadas a las metodologías de contabilidad y cálculo, al igual que a las fuentes de información utilizadas.</p></td>
                            </tr>
                            <tr>
                                <td><b>Precisión</b></td>
                                <td><p>Asegura que la cuantificación de las emisiones de GEI no observe errores sistemáticos o desviaciones con respecto a las emisiones reales, hasta donde pueda ser evaluado, y de tal manera que la incertidumbre sea reducida en lo posible. Es necesario adquirir una precisión suficiente que permita a los usuarios tomar decisiones con una confianza razonable con respecto a la integridad de la información reportada.</p></td>
                            </tr>
                        </tbody>
                    </table>
                    <span>Fuente: GHG protocol</span>
                    <p>
                        Las fuentes de emisión de GEI son categorizadas dentro de los límites de la empresa, siendo de dos tipos: <br> <br>
                        <b>Emisiones directas:</b> Emitidas desde fuentes que son controladas o propiedad de la organización. <br> <br>
                        <b>Emisiones indirectas:</b> Consecuencia de las actividades de la organización, pero son emitidas desde fuentes que no son controladas o no son propiedad de la organización 
                    </p>
                        <p>Teniendo en cuenta su clasificación se consideran los siguientes alcances:</p>
                        <span id="descrip">Figura 1 Representación esquemática de la huella de carbono</span>
                        <img src="<?=Convertir_imagen("../../images/Representacion huella carbono.png")?>" alt="Representacion huella carbono">
                        <span>Fuente: GHG Protocol, 2004.</span>
                    

                </div>
            <section name="Aca1">
                <H4>Alcance 1.</H4>
                <p>Proviene del consumo de combustibles de origen fósil, son emisiones directas, que pueden ser controladas o y/o son propiedad de la empresa. A su vez, se categorizan las fuentes así:</p>
                <section name="F-f">    
                    <h4>Fuentes fijas</h4>
                    <p>Proveniente de equipos estacionarios o fijos, como calderas, hornos, quemadores, turbinas, calentadores, incineradores, motores, flameadores, entre otros que se encuentren en las instalaciones de la empresa. (WBCSD & WRI, 2004).</p>
                    <p>En cuanto al consumo de combustibles, se cuenta con maquinaria que hace uso de combustibles fósiles, la misma se relaciona en la tabla 2.</p>
                    <span id="descrip" >Tabla 2 Maquinaria que usa combustibles fósiles</span>
                    <table align="center" name="t2">
                        <thead>
                            <tr>
                                <th>Máquina</th>
                                <th>Cantidad</th>
                                <th>Tipo <br>Combustible</th>
                                <th>Funcionamiento <br>al dia(h)</th>
                                <th>Dias uso <br>semanal (cant)</th>
                                <th>Puesta en <br>funcionamiento (fecha)</th>
                                <th>Sede</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($datos["Cara"]=="Sede")/*************** Tipo de informe por sede ***************/
                            {
                                
                                if($datos["tipo"]=="mensual")
                                {
                                    
                                    $resp=$consultas->consultar_fuente_fijas_sede_año($sede,$años);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {
                                        echo "
                                        <tr>
                                            <td>".$fila['Fuente']."</td>
                                            <td>".$fila['Cantidad']."</td>
                                            <td>".$fila['combustible']."</td>
                                            <td>".$fila['horas_dias']."</td>
                                            <td>".$fila['dias_semana']."</td>
                                            <td>".$fila['fecha_i_funcion']."</td>
                                            <td>".$fila['sede']."</td>         
                                        </tr>
                                        ";
                                    }
                                }
                                else{
                                    $resp=$consultas->fuentes_fijas_consulta($sede);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {
                                        echo "
                                        <tr>
                                            <td>".$fila['Fuente']."</td>
                                            <td>".$fila['Cantidad']."</td>
                                            <td>".$fila['combustible']."</td>
                                            <td>".$fila['horas_dias']."</td>
                                            <td>".$fila['dias_semana']."</td>
                                            <td>".$fila['fecha_i_funcion']."</td>
                                            <td>".$fila['sede_n']."</td>        
                                        </tr>
                                        ";
                                    }
                                }    

                            }
                            else if($datos["Cara"]=="General")/*************** Tipo de informe General ***************/
                            {
                                if($datos["tipo"]=="mensual")
                                {
                                    $resp=$consultas->consultar_fuente_fijas_empresa_año($_SESSION['empresa'],$años);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {
                                        echo "
                                        <tr>
                                            <td>".$fila['Fuente']."</td>
                                            <td>".$fila['Cantidad']."</td>
                                            <td>".$fila['combustible']."</td>
                                            <td>".$fila['horas_dias']."</td>
                                            <td>".$fila['dias_semana']."</td>
                                            <td>".$fila['fecha_i_funcion']."</td>
                                            <td>".$fila['sede']."</td>         
                                        </tr>
                                        ";
                                    }
                                }
                                else{
                                    $resp=$consultas->consultar_fuente_fijas_empresa($_SESSION['empresa']);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {
                                        echo "
                                        <tr>
                                            <td>".$fila['Fuente']."</td>
                                            <td>".$fila['Cantidad']."</td>
                                            <td>".$fila['combustible']."</td>
                                            <td>".$fila['horas_dias']."</td>
                                            <td>".$fila['dias_semana']."</td>
                                            <td>".$fila['fecha_i_funcion']."</td>
                                            <td>".$fila['sede']."</td>        
                                        </tr>
                                        ";
                                    }
                                }
                            }
                            ?>
                            
                        </tbody>
                    </table>
                    <span>Fuente: Plataforma Piac, 2019</span>
                    <p>Dentro del inventario de GEI, se tiene en cuenta los extintores de CO2 y R123/HCFC 123, la empresa reportó los siguientes extintores ubicados en la planta física:</p>
                    <span class="descrip" >Tabla 3 Extintores reportados en las instalaciones</span>
                    <table align="center" name="t3">
                        <thead>
                            <tr>
                                <th>Tipo de Extintor</th>
                                <th>Cantidad</th>
                                <th>Sede</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($datos["Cara"]=="Sede")/*************** Tipo de informe por sede ***************/
                            {
                                if($datos["tipo"]=="mensual")
                                {
                                    $resp=$consultas->fuentes__total_extintores_sede_año($sede,$años);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {
                                        echo "
                                        <tr>
                                        <td>".$fila['Nombre']."</td>
                                        <td>".$fila['cantidad']."</td>
                                        <td>".$fila['sede']."</td>       
                                        </tr>
                                        ";
                                    }
                                }
                                else{
                                    $resp=$consultas->fuentes__total_extintores_sede($sede);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {
                                        echo "
                                        <tr>
                                            <td>".$fila['Nombre']."</td>
                                            <td>".$fila['cantidad']."</td>
                                            <td>".$fila['Sede']."</td>
                                        </tr>        
                                        ";

                                    }
                                }
                            }
                            else if($datos["Cara"]=="General")/*************** Tipo de informe por empresa ***************/
                            {
                                if($datos["tipo"]=="mensual")
                                {
                                    $resp=$consultas->fuentes__total_extintores_empresa_año($_SESSION['empresa'],$años);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {
                                        echo "
                                        <tr>
                                        <td>".$fila['Nombre']."</td>
                                        <td>".$fila['cantidad']."</td>
                                        <td>".$fila['sede']."</td>       
                                        </tr>
                                        ";
                                    }
                                }
                                else{
                                    $resp=$consultas->fuentes__total_extintores_empresa($_SESSION['empresa']);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {
                                        echo "
                                        <tr>
                                            <td>".$fila['Nombre']."</td>
                                            <td>".$fila['cantidad']."</td>
                                            <td>".$fila['sede']."</td>
                                        </tr>        
                                        ";

                                    }
                                }
                            }
                            ?>
                            
                        </tbody>
                    </table>
                    <span>Fuente: Plataforma Piac, 2019</span>
                    <p>Adicionalmente, la empresa reporta el uso de grasas y aceites lubricantes totales para las fuentes fijas, relacionados en la tabla 4.</p>
                    <span class="descrip">Tabla 4 Lubricantes totales usados por las fuentes fijas</span>
                    <table align="center" name="t4">
                        <thead>
                            <tr>
                                <th>Tipo Lubricante</th>
                                <th>Cantidad</th>
                                <th>Unidad</th>
                                <th>Sede</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($datos["Cara"]=="Sede")/*************** Tipo de informe por sede ***************/
                            {
                                if($datos["tipo"]=="mensual")
                                {
                                    $resp=$consultas->listado_refigerante_fuentes_fijas_sede_año($sede,$años);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {
                                        echo "
                                        <tr>
                                            <td>".$fila['nombre']."</td>
                                            <td>".$fila['cantidad']."</td>
                                            <td>".$fila['unidades']."</td>
                                            <td>".$fila['sede']."</td>     
                                        </tr>
                                        ";
                                    }
                                }
                                else
                                {
                                    $resp=$consultas->listado_refigerante_fuentes_fijas_sede($sede);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {
                                        echo "
                                        <tr>
                                            <td>".$fila['nombre']."</td>
                                            <td>".$fila['cantidad']."</td>
                                            <td>".$fila['unidades']."</td>
                                            <td>".$fila['sede']."</td>
                                        </tr>        
                                        ";  
                                    }
                                }
                            }
                            else if($datos["Cara"]=="General")/*************** Tipo de informe general ***************/
                            {
                                if($datos["tipo"]=="mensual")
                                {
                                    $resp=$consultas->listado_refigerante_fuentes_fijas_empresa_año($_SESSION['empresa'],$años);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {
                                        echo "
                                        <tr>
                                            <td>".$fila['nombre']."</td>
                                            <td>".$fila['cantidad']."</td>
                                            <td>".$fila['unidades']."</td>
                                            <td>".$fila['sede']."</td>     
                                        </tr>
                                        ";
                                    }
                                }
                                else
                                {
                                    $resp=$consultas->listado_refigerante_fuentes_fijas_empresa($_SESSION['empresa']);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {
                                        echo "
                                        <tr>
                                            <td>".$fila['nombre']."</td>
                                            <td>".$fila['cantidad']."</td>
                                            <td>".$fila['unidades']."</td>
                                            <td>".$fila['sede']."</td>
                                        </tr>        
                                        ";  
                                    }
                                }
                            }
                            ?>
                            
                        </tbody>
                    </table>
                    <span>Fuente: Plataforma Piac, 2019</span>                    
                </section>
                <section name="F-m">
                    <h4>Fuentes moviles</h4>
                    <p> Provienen de medios de transporte como automóviles, camiones, autobuses, trenes, aviones, buques, barcos, barcazas, embarcaciones, entre otros.</p>
                    <p>La empresa cuenta con varios vehículos los cuales son relacionados en la tabla 5.</p>
                    <span class="descrip">Tabla 5 Vehículos pertenecientes a la empresa</span>
                    <table align="center" name="t5">
                        <thead>
                            <tr>
                                <th>Placa</th>
                                <th>Tipo vehiculo</th>
                                <th>Combustible</th>
                                <th>Puesta <br> Funcionamiento (Fecha)</th>
                                <th>Sede</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($datos["Cara"]=="Sede")/*************** Tipo de informe por sede ***************/
                            {
                                if($datos['tipo']=="mensual")
                                {
                                    $resp=$consultas->consultar_fuente_movil_sede_año($sede,$años);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {
                                        if($fila['Tipo']==1)
                                        {
                                            echo "
                                            <tr><td>".$fila['Placa']."</td>
                                                <td> Combustión</td>
                                                <td>".$fila['combustible']."</td>
                                                <td>".$fila['Fecha']."</td>
                                                <td>".$fila['sede']."</td>

                                            </tr>        
                                            ";
                                        }   
                                        else{
                                            $bandera_hi++;
                                        }
                                    }
                                }
                                else
                                {
                                    $resp=$consultas->consultar_fuente_movil_sede($sede);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {
                                        if($fila['Tipo']==1)
                                        {
                                            echo "
                                            <tr><td>".$fila['Placa']."</td>
                                                <td> Combustión</td>
                                                <td>".$fila['combustible']."</td>
                                                <td>".$fila['Fecha']."</td>
                                                <td>".$fila['sede']."</td>
                                            </tr>        
                                            ";
                                        }
                                        else{
                                            $bandera_hi++;
                                        }
                                    }
                                }
                            }
                            else if($datos["Cara"]=="General")/*************** Tipo de informe General ***************/
                            {
                                if($datos['tipo']=="mensual")
                                {
                                    $resp=$consultas->consultar_fuente_movil_empresa_año($_SESSION['empresa'],$años);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {
                                        if($fila['Tipo']==1)
                                        {
                                            echo "
                                            <tr><td>".$fila['Placa']."</td>
                                                <td> Combustión</td>
                                                <td>".$fila['combustible']."</td>
                                                <td>".$fila['Fecha']."</td>
                                                <td>".$fila['sede']."</td>

                                            </tr>        
                                            ";
                                        }   
                                        else{
                                            $bandera_hi++;
                                        }
                                    }
                                }
                                else
                                {
                                    $resp=$consultas->consultar_fuente_movil_empresa($_SESSION['empresa']);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {
                                        if($fila['Tipo']==1)
                                        {
                                            echo "
                                            <tr><td>".$fila['Placa']."</td>
                                                <td> Combustión</td>
                                                <td>".$fila['combustible']."</td>
                                                <td>".$fila['Fecha']."</td>
                                                <td>".$fila['sede']."</td>
                                            </tr>        
                                            ";
                                        }
                                        else{
                                            $bandera_hi++;
                                        }
                                    }
                                }
                            }
                            ?>
                            
                        </tbody>
                    </table>
                    <p>La empresa cuenta con los siguientes vehiculos electricos</p>

                    <span class="descrip">Tabla 5 Vehículos pertenecientes a la empresa</span>
                    <table align="center" name="t5">
                        <thead>
                            <tr>
                                <th>Placa</th>
                                <th>Potencia</th>
                                <th>Horas de carga</th>
                                <th>Dias de uso</th>
                                <th>Puesta en funcionamiento</th>
                                <th>Sede</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                            if($datos["Cara"]=="Sede")/*************** Tipo de informe por sede ***************/
                            {
                                if($datos['tipo']=="mensual")
                                {
                                    $resp=$consultas->consultar_fuente_movil_electricas_sede_año($sede,$años);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {

                                            echo "
                                            <tr>
                                            <td>".$fila['Placa']."</td>
                                            <td>".$fila['Potencia']."</td>
                                            <td>".$fila['Horas_carga']."</td>
                                            <td>".$fila['dias_uso']."</td>
                                            <td>".$fila['Fecha']."</td>
                                            <td>".$fila['sede']."</td>

                                            </tr>        
                                            ";

                                    }
                                }
                                else
                                    {
                                    $resp=$consultas->consultar_fuente_movil_electricas_sede($sede);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {
                                        echo "
                                        <tr>
                                            <td>".$fila['Placa']."</td>
                                            <td>".$fila['Potencia']."</td>
                                            <td>".$fila['Horas_carga']."</td>
                                            <td>".$fila['dias_uso']."</td>
                                            <td>".$fila['Fecha']."</td>
                                            <td>".$fila['sede']."</td>
                                        </tr>        
                                        ";
                                    }
                                }
                            }
                            else if($datos["Cara"]=="General")/*************** Tipo de informe General ***************/
                            {
                                if($datos['tipo']=="mensual")
                                {
                                    $resp=$consultas->consultar_fuente_movil_electricas_empresa_año($_SESSION['empresa'],$años);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {

                                            echo "
                                            <tr>
                                            <td>".$fila['Placa']."</td>
                                            <td>".$fila['Potencia']."</td>
                                            <td>".$fila['Horas_carga']."</td>
                                            <td>".$fila['dias_uso']."</td>
                                            <td>".$fila['Fecha']."</td>
                                            <td>".$fila['sede']."</td>

                                            </tr>        
                                            ";

                                    }
                                }
                                else
                                    {
                                    $resp=$consultas->consultar_fuente_movil_electricas_empresa($_SESSION['empresa']);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {
                                        echo "
                                        <tr>
                                            <td>".$fila['Placa']."</td>
                                            <td>".$fila['Potencia']."</td>
                                            <td>".$fila['Horas_carga']."</td>
                                            <td>".$fila['dias_uso']."</td>
                                            <td>".$fila['Fecha']."</td>
                                            <td>".$fila['sede']."</td>
                                        </tr>        
                                        ";
                                    }
                                }
                            }
                            ?>
                            
                        </tbody>
                    </table>
                    <span>Fuente: Plataforma Piac, 2019</span>
                    <?php
                        if($bandera_hi==0)
                        {
                            echo "<h5>La empresa no cuenta con vehiculos hibridos</h5>";
                        }
                        else
                        {
                            ?>
                            <p>La empresa cuenta con los siguientes vehiculos hibridos. <br>**Las propiedades de la parte electrica del vehiculo podran ser observados en la anterior tabla.**</p>
                                <table align="center">
                                    <thead>
                                        <tr>
                                            <th>Placa</th>
                                            <th>Tipo</th>
                                            <th>Combustible</th>
                                            <th>Puesta Funcionamiento</th>
                                            <th>Sede</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    

                            <?php
                            if($datos["Cara"]=="Sede")/*************** Tipo de informe por sede ***************/
                            {
                                if($datos['tipo']=="mensual")
                                {
                                    $resp=$consultas->consultar_fuente_movil_sede_año($sede,$años);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {

                                            echo "
                                            <tr>
                                                <td>".$fila['Placa']."</td>
                                                <td>Hibrido</td>
                                                <td>".$fila['combustible']."</td>
                                                <td>".$fila['Fecha']."</td>
                                                <td>".$fila['sede']."</td>
                                            </tr>        
                                            ";

                                    }
                                }
                                else
                                {
                                    $resp=$consultas->consultar_fuente_movil_sede($sede);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {
                                       if($fila['Tipo']==2)
                                       {    
                                           echo "
                                           <tr><td>".$fila['Placa']."</td>
                                               <td>Hibrido</td>
                                               <td>".$fila['combustible']."</td>
                                               <td>".$fila['Fecha']."</td>
                                               <td>".$fila['sede']."</td>
                                           </tr>        
                                           ";
                                       }
                                    }
                                }
                            }
                            else if($datos["Cara"]=="General")/*************** Tipo de informe General ***************/
                            {
                                if($datos['tipo']=="mensual")
                                {
                                    $resp=$consultas->consultar_fuente_movil_empresa_año($_SESSION['empresa'],$años);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {

                                            echo "
                                            <tr>
                                                <td>".$fila['Placa']."</td>
                                                <td>Hibrido</td>
                                                <td>".$fila['combustible']."</td>
                                                <td>".$fila['Fecha']."</td>
                                                <td>".$fila['sede']."</td>
                                            </tr>        
                                            ";

                                    }
                                }
                                else
                                {
                                    $resp=$consultas->consultar_fuente_movil_empresa($_SESSION['empresa']);
                                    while($fila=mysqli_fetch_assoc($resp))
                                    {
                                       if($fila['Tipo']==2)
                                       {    
                                           echo "
                                           <tr><td>".$fila['Placa']."</td>
                                               <td>Hibrido</td>
                                               <td>".$fila['combustible']."</td>
                                               <td>".$fila['Fecha']."</td>
                                               <td>".$fila['sede']."</td>
                                           </tr>        
                                           ";
                                       }
                                    }
                                }
                            }
                            ?>
                            </tbody>
                            </table>
                            <span>Fuente: Plataforma Piac, 2019</span>
                            <?php
                        }
                        
                       ?> 
                    <p>Dentro del inventario de GEI, se tiene encuentra los extintores de CO2 y R123/HCFC 123, la empresa reportó los siguientes extintores para las fuentes móviles:</p>
                    <span class="descrip">Tabla 6. Extintores reportados para las fuentes móviles</span>
                    <table align="center" name="t6">
                        <thead>
                            <tr>
                                <th>Extintor</th>
                                <th>Peso</th>
                                
                                <th>Placa</th>
                                <th>Sede</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($datos["Cara"]=="Sede")/*************** Tipo de informe por sede ***************/
                            {
                                $resp=$consultas->Listado_extintores_moviles_sede($sede);
                                while($fila=mysqli_fetch_assoc($resp))
                                {
                                    echo "
                                    <tr>
                                        <td>".$fila['Nombre']."</td>
                                        <td>".$fila['Peso']."</td>
                                        
                                        <td>".$fila['Placa']."</td>
                                        <td>".$fila['sede']."</td>
                                    </tr>
                                    ";
                                }
                            }
                            else if($datos["Cara"]=="General")/*************** Tipo de informe General ***************/
                            {
                                $resp=$consultas->Listado_extintores_moviles_empresa($_SESSION['empresa']);
                                while($fila=mysqli_fetch_assoc($resp))
                                {
                                    echo "
                                    <tr>
                                        <td>".$fila['Nombre']."</td>
                                        <td>".$fila['Peso']."</td>
                                        
                                        <td>".$fila['Placa']."</td>
                                        <td>".$fila['sede']."</td>
                                    </tr>
                                    ";
                                }
                            }
                            ?>
                        </tbody>
                        
                    </table>
                    <span>Fuente: Plataforma Piac, 2019</span>       
                </section>
            </section>
            <section name="Aca2">
                <h3>Alcance 2</h3>
                <p>Son aquellas emisiones indirectas de GEI asociadas al consumo de energía eléctrica. La contabilización de estas emisiones permite a las empresas establecer planes de acción para la mitigación y disminución de sus emisiones mediante medidas de eficiencia energética y estrategias de ahorro y uso eficiente de energía.</p>
                <p>En la empresa <?=$_SESSION['empresa_n']?> el alcance 2 o consumo de energía se da principalmente por las siguientes maquinas:</p>
                <span class="descrip">Tabla 7 Maquinaria que hace uso de energía eléctrica</span>
                <table align="center" name="t7">
                    <thead>
                        <tr>
                            <th>Máquina</th>
                            <th>Cantidad</th>
                            <th>Refrigerante</th>
                            <th>Funcionamiento <br> al día (h)</th>
                            <th>Dias uso <br> semanal (cantidad)</th>
                            <th>Sede</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($datos["Cara"]=="Sede")/*************** Tipo de informe por sede ***************/
                        {   
                            if($datos["tipo"]=="mensual")
                            {
                                $resp=$consultas->consultar_fuente_fijas_electricas_sede_año($sede,$años);
                                while($fila=mysqli_fetch_assoc($resp))
                                {
                                    echo " 
                                        <tr>
                                            <td>".$fila['Nombre']."</td>
                                            <td>".$fila['Cantidad']."</td>
                                            <td>".$fila['refrigerante']."</td>
                                            <td>".$fila['Horas']."</td>
                                            <td>".$fila['Dias']."</td>
                                            <td>".$fila['sede']."</td>

                                        </tr>
                                    ";
                                }
                            }else
                            {
                                    $resp=$consultas->consultar_fuente_fijas_electricas_sede($sede);
                                while($fila=mysqli_fetch_assoc($resp))
                                {
                                    echo " 
                                        <tr>
                                            <td>".$fila['Nombre']."</td>
                                            <td>".$fila['Cantidad']."</td>
                                            <td>".$fila['refrigerante']."</td>
                                            <td>".$fila['Horas']."</td>
                                            <td>".$fila['Dias']."</td>
                                            <td>".$fila['sede']."</td>
                                        </tr>
                                    ";
                                }
                            }
                        }
                        else if($datos["Cara"]=="General")/*************** Tipo de informe por sede ***************/
                        {
                            if($datos["tipo"]=="mensual")
                            {
                                $resp=$consultas->consultar_fuente_fijas_electricas_empresa_año($_SESSION['empresa'],$años);
                                while($fila=mysqli_fetch_assoc($resp))
                                {
                                    echo " 
                                        <tr>
                                            <td>".$fila['Nombre']."</td>
                                            <td>".$fila['Cantidad']."</td>
                                            <td>".$fila['refrigerante']."</td>
                                            <td>".$fila['Horas']."</td>
                                            <td>".$fila['Dias']."</td>
                                            <td>".$fila['sede']."</td>

                                        </tr>
                                    ";
                                }
                            }else
                            {
                                    $resp=$consultas->consultar_fuente_fijas_electricas_empresa($_SESSION['empresa']);
                                while($fila=mysqli_fetch_assoc($resp))
                                {
                                    echo " 
                                        <tr>
                                            <td>".$fila['Nombre']."</td>
                                            <td>".$fila['Cantidad']."</td>
                                            <td>".$fila['refrigerante']."</td>
                                            <td>".$fila['Horas']."</td>
                                            <td>".$fila['Dias']."</td>
                                            <td>".$fila['sede']."</td>
                                        </tr>
                                    ";
                                }
                            }
                        }
                        ?>
                    </tbody>
                    
                </table>
                <span>Fuente: Plataforma Piac, 2019</span> 
                <p>En cuanto a las luminarias, en la tabla 9 se relacionan las características de las mismas.</p>
                <span class="descrip">Tabla 8 Reporte de luminarias de la empresa</span>
                <table align="center" name="t8" >
                    <thead >
                        <tr>
                            <th>Tipo Luminaria</th>
                            <th>Cantidad</th>
                            <th>Potencia (Watts)</th>
                            <th>Sede</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if($datos["Cara"]=="Sede")/*************** Tipo de informe por sede ***************/
                        {
                            $resp=$consultas->consultar_fuente_luminaria_empresa($sede);
                            while($fila=mysqli_fetch_assoc($resp))
                            {
                                echo "
                                    <tr>
                                    <td>".$fila['Tipo_luminaria']."</td>
                                    <td>".$fila['cantidad']."</td>
                                    <td>".$fila['Potencia']."</td>
                                    <td>".$fila['Nombre']."</td>
                                        
                                    </tr>
                                ";
                            }
                        }
                        else if($datos["Cara"]=="General")/*************** Tipo de informe General ***************/
                        {                        
                            $resp=$consultas->consultar_fuente_luminaria_empresa($_SESSION['empresa']);
                            while($fila=mysqli_fetch_assoc($resp))
                            {
                                echo "
                                    <tr>
                                    <td>".$fila['Tipo_luminaria']."</td>
                                    <td>".$fila['cantidad']."</td>
                                    <td>".$fila['Potencia']."</td>
                                    <td>".$fila['Nombre']."</td>
                                        
                                    </tr>
                                ";
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <span>Fuente: Plataforma Piac, 2019</span>  
            </section>
        </section>
        <section name="Res">
            <h3 id="title">Resultados</h3>
            <p>Tomando como base la información cargada por la empresa <?=$_SESSION['empresa_n']?> a la plataforma Piac, se obtienen los siguientes resultados:</p>
            <span class="descrip">Gráfico 1 Huella de carbono corporativa de la empresa <?=$_SESSION['empresa_n']?></span><br>
            <img src="<?php echo Convertir_imagen("img/Huella-general.png")?>" alt="">
            <span>Fuente: Plataforma Piac</span>
            <span class="descrip">Tabla 9. Demostración de cantidades de la huella <?=$_SESSION['empresa_n']?></span><br>
            <table name="t9">
                <thead>
                    <tr>
                        <?php if($datos["tipo"]=="mensual"){echo "<th>Año</th>";}else{echo "<th>Mes</th>";}?>
                        <th>Cantidad huella</th>
                        <th>Porcentaje</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                        $suma=0;
                        $porcent=0;
                        for($i=0;$i<count($datos["Huella_general"]);$i++)
                        {
                            
                            $suma=$suma+number_format($datos["Huella_general"][$i][1], 2, '.', '');

                        }
                        $mayor=0;
                        $año;
                        for($i=0;$i<count($datos["Huella_general"]);$i++)
                        {
                            $porcent=number_format((number_format($datos["Huella_general"][$i][1], 2, '.', '')*100)/$suma, 2, '.', '');
                            if($porcent>$mayor)
                            {
                                $mayor=$porcent;
                                $año=$datos["Huella_general"][$i][0];
                            }
                            
                            
                            echo "<tr>";
                            $d=$datos["Huella_general"][$i][0];
                             if($datos["tipo"]=="mensual"){echo "<td>".$meses[$d-1]."</td>";}else{echo "<td>".$datos["Huella_general"][$i][0]."</td>";};
                             echo "                               
                                <td>".number_format($datos["Huella_general"][$i][1], 2, '.', '')."</td>
                                <td>".$porcent."</td>
                            </tr>";
                        }
                        ?>
                </tbody>
            </table>
            
            <p>Se puede evidenciar que el <?php if($datos['tipo']=="mensual"){echo "mes";}else{echo "año";}?> en el que se emitio mas CO2 al ambiente fue en el <?php if($datos['tipo']=="mensual"){echo "mes";}else{echo "año";}?> <?php if($datos['tipo']=="mensual"){echo $meses[$año];}else{echo $año;}?> con un porcentaje de <?=$mayor?>, correspondiente al consumo de (energía o combustible según sea el caso). .</p>
            <p>Al discriminar los alcances correspondientes, en el gráfico 2, se evidencia el porcentaje de participación de dicho alcance en las emisiones de GEI.</p>
            
            <span class="descrip">Gráfico 2 Emisiones discriminadas por alcances (1 y 2).</span><br>
            <img src="<?php echo Convertir_imagen("img/Huella-Alcances.png")?>" alt="">
            <span>Fuente: Plataforma Piac</span><br>
            <span class="descrip">Tabla 10 Emisiones discriminadas por alcances (1 y 2).</span><br>
            <table name="t10">
                <thead>
                    <tr>
                    <th>Alcance</th>
                    <th>Total Huella</th>
                    <th>Porcentaje</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        $alcance1=0;
                        $alcance2=0;
                        $suma=0;            
                            foreach($datos["Alcance1"] as $fila)
                            {
                                $alcance1= $alcance1+number_format($fila[1], 2, '.', '');
                            }                        
                            
                            foreach($datos["Alcance2"] as $fila)
                            {
                                $alcance2= $alcance2+number_format($fila[1], 2, '.', '');
                            }
                            $suma=($alcance1+$alcance2);
                            $porcent=($alcance1*100)/$suma;
                            echo "<tr><td>Alcance 1</td><td>".$alcance1."</td><td>".number_format($porcent, 2, '.', '')."</td></tr> ";                                
                            $porcent=($alcance2*100)/$suma;
                            echo "<tr><td>Alcance 2</td><td>".$alcance2."</td><td>".number_format($porcent, 2, '.', '')."</td></tr> ";
                            $porcent=($alcance1*100)/$suma;
                    ?>
                    </tr>
                </tbody>
            </table>
            <span>Fuente: Plataforma Piac</span><br>
            <span class="descrip">Gráfico 3  Alcance 1 Emisiones directas</span> <br>   
            <img src="<?php echo Convertir_imagen("img/Huella-Alcance-1.png")?>" alt="">
            <span>Fuente: Plataforma Piac</span><br>
            <p>En la empresa el alcance 1 representa el   <?=number_format($porcent, 5, '.', '')?>% del total de la huella de carbono, aquí se incluyen los vehículos relacionados, la maquinaria, extintores y lubricantes.</p>
            <p>El combustible principal usado es el /la (gasolina, ACPM, gas) fundamental para el funcionamiento de (máquinas y/o parque automotor</p>
            <p>Dentro de las estrategias de reducción de emisiones, se sugiere en cuanto a los vehículos automotores, la capacitación a los conductores en buenas prácticas de conducción, mantener los vehículos en óptimas condiciones de mantenimiento y el control de kilometrajes frente al consumo para analizar los desplazamientos y el consumo de combustible, mitigando así el impacto ambiental por combustión.</p>
            <p>Para la maquinaria, es posible implementar buenas prácticas operativas, que son aquellas que no necesariamente tienen costo económico para la empresa, relacionadas con el uso eficiente de la maquinaria, minimizando así su aporte al inventario de GEI.</p>
            <span class="descrip">Gráfico 4  Alcance 2 Emisiones indirectas</span> <br>   
            <img src="<?php echo Convertir_imagen("img/Huella-Alcance-2.png")?>" alt="">
            <span>Fuente: Plataforma Piac</span>
            <?php $porcent=($alcance2*100)/$suma;?>
            <p>El alcance 2, representa el <?=number_format($porcent, 5, '.', '')?>% del total de las emisiones del GEI del inventario, lo cual puede reducirse implementando un plan eficiente de ahorro de energía, con indicadores reales que permitan establecer metas de reducción que favorecen a la empresa y contribuyen a la mitigación del cambio climático.</p>
            <p>Teniendo en cuenta los gases de efecto invernadero GEI contabilizados en el inventario, en la gráfica 5, se muestra el porcentaje de representación de los principales GEI reportados</p>
            <span class="descrip">Gráfico 5 Discriminación de los GEI en la huella de carbono</span><br>
            <img src="<?php echo Convertir_imagen("img/Huella-Gases.png")?>" alt="">
            <span>Fuente: Plataforma Piac</span>
            <span class="descrip">Tabla11. Discriminación de los GEI en la huella de carbono.</span><br>
            <table name="t11">
                <thead>
                    <tr>
                        <?php if($datos["tipo"]=="mensual"){echo "<th>Mes</th>";} else {echo "<th>Año</th>";}?>
                        <th>CO2</th>
                        <th>N2O</th>
                        <th>CH4</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            $totales=array();
            $c=0;
            $n=0;
            $h=0;
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
              
            function Llenar_datos($mensaje = "" , $Años = array(), $Lista = array(), $datos = array(), $meses = array() )
            {
                $c=0;
                $n=0;
                $h=0;
                for($i=0; $i < count($Años); $i++)
                {
                    $b=0;
                    if($datos['tipo']=="mensual"){
                        $mensaje= $mensaje."<tr><td>".$meses[$Años[$i]-1]."</td>";
                    }
                    else{
                        $mensaje= $mensaje."<tr><td>".$Años[$i]."</td>";
                    }
                    
                    for ($a=0; $a < count($Lista) ; $a++) { 
                        
                        if($Años[$i] == $Lista[$a][0])
                        {

                            $totales[$b]=number_format($Lista[$a][1], 2, '.', '');
                            $mensaje=$mensaje."<td>".number_format($Lista[$a][1], 2, '.', '')."</td>";
                            $b++;
                        }    

                    }
                    $c=$totales[0]+$c;
                    $n=$totales[1]+$n;
                    $h=$totales[2]+$h;
                   
                    $mensaje= $mensaje."</tr>";
                    
                   
                    
                }
                $mensaje.="<tr><td>Total</td><td>$c</td><td>$n</td><td>$h</td></tr>";

                $total_suma=$c+$n+$h;
                $por["c"]=number_format($c*100/$total_suma, 4, '.', '');
                $por["n"]=number_format($n*100/$total_suma, 4, '.', '');
                $por["h"]=number_format($h*100/$total_suma, 4, '.', '');

                $resp["mensaje"]=$mensaje;
                $resp["por"]=$por;
                return $resp;
            }

            $Años=array();
            $Data= array();
            foreach ($datos["Otros"]["Dioxido_carbono"] as $fila1) {
                $Data[]=$fila1;
                $Años=ADAÑ($fila1[0], $Años);
                
            } 
            foreach ($datos["Otros"]["Oxido_Nitroso"] as $fila) {
                $Data[]=$fila;
                $Años=ADAÑ($fila[0], $Años);
                  
            }                              
            foreach ($datos["Otros"]["Metano"] as $fila2) {
                $Data[]=$fila2;
                $Años=ADAÑ($fila2[0], $Años);
              
            }
            $mensaje="";
            $mensa=array();
            if ($Data) {
                  $mensa=Llenar_datos($mensaje,$Años,$Data,$datos,$meses);
                  echo $mensa["mensaje"];
                
            }
            
            ?>
            </tbody>
            </table>
            <p>Analizando la información, el CO2, es el principal gas de efecto invernadero emitido a la atmósfera, representando el  <?=$mensa["por"]["c"] ?>% del total del inventario, seguido por el   CH4 y el  N2O, con una representación del <?=$mensa["por"]["h"] ?>% y el <?=$mensa["por"]["n"] ?>% respectivamente.</p>
        </section>
        <section name="Conclu">
            <h3 id="title">Conclusiones</h3>
            <ul>
                <li>El registro de la información completa y veráz en la plataforma Piac, permite llevar a cabo un inventario de GEI con altos niveles de confiablidad y precisión</li>
                <li>El inventario de Gases de Efecto Invernadero es una herramienta ideal para toma de decisiones, que refleja consumos de combustible y energía (según el alcance), buscando la implementación de estrategias para optimización de los recursos.</li>
                <?php
                    if($alcance1>$alcance2)
                    {
                        echo "<li>El alcance 1 es el más representativo del inventario total de Gases de Efecto Invernadero, lo cual ofrece la oportunidad a la empresa de diseñar planes encaminados a la minimización de consumos, buscando la eficiencia en cada uno de los procesos con el menor impacto.</li>
                        <li>El alcance 2 tiene un impacto inferior, pero no por esto menos importante, en el mismo es posible encontrar estrategias para ser más eficientes, reduciendo consumos para minimizar la huella de carbono total.</li>";
                    }
                    else{
                        echo "<li>El alcance 2 es el más representativo del inventario total de Gases de Efecto Invernadero, lo cual ofrece la oportunidad a la empresa de diseñar planes encaminados a la minimización de consumos, buscando la eficiencia en cada uno de los procesos con el menor impacto.</li>
                        <li>El alcance 1 tiene un impacto inferior, pero no por esto menos importante, en el mismo es posible encontrar estrategias para ser más eficientes, reduciendo consumos para minimizar la huella de carbono total.</li>";
                    }
                ?>
                
                <li>Para reducir el consumo de combustible proveniente de fuentes fósiles, como opción de mejora podría implementarse un plan de monitoreo y seguimiento a los kilómetros recorridos y el consumo de combustible por vehículo.</li>
                <li>El sustituir la totalidad de las luminarias a tecnologías más eficientes garantiza una reducción en consumo de energía, impactando directamente en el alcance dos del inventario.</li>
                <li>Los lubricantes tienen un impacto mínimo en el reporte, se sugiere tener un control más preciso de las cantidades usadas.</li>
                <li>Este reporte brinda las bases necesarias para hacer análisis financieros y retornos de inversión para planes, programas y proyectos de mitigación y compensación de emisiones de Gases de efecto Invernadero</li>
            </ul>
        </section>
        <section name="Biblio">
        <h3 id="title">Bibliografia</h3>
            <p>Ministerio de Ambiente. (2013). Acciones Nacionalmente Apropiadas de Mitigación (NAMAS). Bogotá D.C.</p>
            <p>IDEAM; PNUD;MADS;DNP; Cancillería. (2017). Tercera comunicación Nacional de Colombia a la Convención marco de las Naciones Unidad sobre Cambio Climático(CMNUCC). Bogotá, Colombia: PuntoAparte.</p>
            <p>IPCC. (2007). Cambio Climático 2007. Informe de Síntesis. Cuarto Informe. Ginebra., Suiza: PNUMA.</p>
            <p>IPCC. (2014). Cambio Climático 2014: Informe de Síntesis. Contribución de los grupos de trabajo I,II y III al quinto Informe de Evaluación del Grupo Intergubernamental de Expertos sobre el cambio climático. Suiza.</p>
            <p>IPPC. (1996). Directrices para los inventarios nacionales de gases de efecto invernadero.</p>
            <p>MADS. (2017). Política Nacional de Cambio Climático. Bogotá: Puntoaparte.</p>
            <p>MADS. (2018). Consideraciones de Cambio Climático para el Ordenamiento Territorial (Recurso digital ed.). Bogotá, Colombia: Puntoaparte Bookvertisin. Retrieved Octubre 2019</p>
            <p>WBCSD, & WRI. (2004). The Greenhouse Gas Protocol. A Corporate and Reporting Standar. </p>
        </section>
        
    </main>
    <footer><img src="<?=Convertir_imagen("../../images/Logo_letra.png")?>" alt=""></footer>











    
</body>
</html>
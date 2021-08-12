<?php


    $mensaje= array();
    $Datos=array();
    if( isset($_POST['Empresa']) && isset($_POST['tipo_informe']) && isset($_POST['periodo'])&&
        !is_null($_POST['Empresa']) && !is_null($_POST['tipo_informe']) && !is_null($_POST['periodo']) &&
        $_POST['Empresa']!="0" && $_POST['tipo_informe']!="S" && $_POST['periodo']!="S")
    {
        require_once '../../../src/consultas.php';
        $consultas= new consultas();

        $tipo_informe=$_POST['tipo_informe'];
        $empresa=$_POST['Empresa'];
        

        if($tipo_informe=="G")    /**** Informes generales */
        {
            $bandera=0;
            $periodo=$_POST['periodo'];
            if($periodo=="a")
            {
                $Datos["Cara"]="General";
                $Datos["tipo"]="anual";
                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_GEI_empresa_general($empresa);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Datos["Huella_general"]=$arrdatos;

                $arrdatos= array();
                $resp=$consultas->Consultar_huella_carbono_sedes_empresa_general($empresa);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Datos["Huella_empresa_sede"]=$arrdatos;

                

                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_co2_alcance1_empresa_general($empresa);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Datos["Alcance1"]=$arrdatos;

                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_co2_alcance2_empresa_general($empresa);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Datos["Alcance2"]=$arrdatos;

                $Gases=array();
                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_N2O_empresa_general($empresa);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Gases["Oxido_Nitroso"]=$arrdatos;

                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_CO2_empresa_general($empresa);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Gases["Dioxido_carbono"]=$arrdatos;

                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_CH4_empresa_general($empresa);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Gases["Metano"]=$arrdatos;
                
                $Datos["Otros"]=$Gases;
                $bandera++;
            }
            else if($periodo=="m" && isset($_POST['mes']) && !is_null($_POST['mes']) && $_POST['mes']!="S" )
            {
                $Año=$_POST['mes'];
                $Datos["Año"]=$Año;
                $Datos["Cara"]="General";
                $Datos["tipo"]="mensual";
                $arrdatos=array();
                $resp=$consultas->Consultar_grafica_GEI_empresa_año($empresa,$Año);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Datos["Huella_general"]=$arrdatos;

                $arrdatos= array();
                $resp=$consultas->Consultar_huella_carbono_sedes_empresa_año($empresa,$Año);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Datos["Huella_empresa_sede"]=$arrdatos;

                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_co2_alcance1_empresa_año($empresa,$Año);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Datos["Alcance1"]=$arrdatos;

                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_co2_alcance2_empresa_año($empresa,$Año);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Datos["Alcance2"]=$arrdatos;

                $Gases=array();
                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_N2O_empresa_año($empresa,$Año);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Gases["Oxido_Nitroso"]=$arrdatos;

                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_CO2_empresa_año($empresa,$Año);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Gases["Dioxido_carbono"]=$arrdatos;

                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_CH4_empresa_año($empresa,$Año);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Gases["Metano"]=$arrdatos;
                $Datos["Otros"]=$Gases;
                $bandera++;
            }
            else 
            {
                $mensaje['success']=false;
                $mensaje['mensaje']="Datos faltantes";
            }

            if($bandera!=0)
            {
                
                $mensaje["datos"]=$Datos;
               
            }            
            
        }
        else
        {
            $sede=$_POST['sede'];
            $Datos["Cara"]="Sede";
            $resp=$consultas->consultar_sede_codigo($sede);
            if($fila=mysqli_fetch_assoc($resp))
            {
                $Datos["Sede"]=base64_encode($fila["Codigo"]);
                $Datos["Sede_n"]=base64_encode($fila["Nombre"]);
            }
            
            $bandera=0;
            $periodo=$_POST['periodo'];
            if($periodo=="a")
            {
                
                $Datos["tipo"]="anual";
                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_GEI_empresa_sede($sede);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Datos["Huella_general"]=$arrdatos;

                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_co2_alcance1_sede($sede);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Datos["Alcance1"]=$arrdatos;

                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_co2_alcance2_sede($sede);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Datos["Alcance2"]=$arrdatos;

                $Gases=array();
                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_N2O_sede($sede);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Gases["Oxido_Nitroso"]=$arrdatos;

                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_CO2_sede($sede);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Gases["Dioxido_carbono"]=$arrdatos;

                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_CH4_sede($sede);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Gases["Metano"]=$arrdatos;
                
                $Datos["Otros"]=$Gases;
                $bandera++;
            }
            else if($periodo=="m" && isset($_POST['mes']) && !is_null($_POST['mes']) && $_POST['mes']!="S" )
            {
                $Año=$_POST['mes'];
                $Datos["Año"]=$Año;
                $Datos["tipo"]="mensual";
                $arrdatos=array();
                $resp=$consultas->Consultar_grafica_GEI_sede_año($sede,$Año);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Datos["Huella_general"]=$arrdatos;

                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_co2_alcance1_sede_año($sede,$Año);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Datos["Alcance1"]=$arrdatos;

                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_co2_alcance2_sede_año($sede,$Año);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Datos["Alcance2"]=$arrdatos;

                $Gases=array();
                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_N2O_sede_año($sede,$Año);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Gases["Oxido_Nitroso"]=$arrdatos;

                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_CO2_sede_año($sede,$Año);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Gases["Dioxido_carbono"]=$arrdatos;

                $arrdatos= array();
                $resp=$consultas->Consultar_grafica_CH4_sede_año($empresa,$Año);
                while($fila=mysqli_fetch_array($resp))
                {
                    $arrdatos[]=$fila;
                }
                $Gases["Metano"]=$arrdatos;
                $Datos["Otros"]=$Gases;
                $bandera++;
            }
            else 
            {
                $mensaje['success']=false;
                $mensaje['mensaje']="Datos faltantes";
            }

            if($bandera!=0)
            {
                
                $mensaje["datos"]=$Datos;
               
            }            
            
        }

        
    }
    else
    {
        $mensaje['success']=false;
        $mensaje['mensaje']="Datos erroneos";
    }
    echo json_encode($mensaje,JSON_UNESCAPED_UNICODE);
?>

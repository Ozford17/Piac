<?php
    $mensaje= array();
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
            $Datos=array();
            $periodo=$_POST['periodo'];
            if($periodo=="a")
            {
                $Datos["tipo"]="a";
                $Datos["Huella_general"]= $consultas->Consultar_grafica_GEI_empresa_general($empresa);
                $Datos["Huella_empresa_sede"]=$consultas->Consultar_huella_carbono_sedes_empresa_general($empresa);
                $Datos["Alcance1"]=$consultas->Consultar_grafica_co2_alcance1_empresa_general($empresa);
                $Datos["Alcance2"]=$consultas->Consultar_grafica_co2_alcance2_empresa_general($empresa);
                $Gases=array();
                $Gases["Oxido_Nitroso"]=$consultas->Consultar_grafica_N2O_empresa_general($empresa);
                $Gases["Dioxido_carbono"]=$consultas->Consultar_grafica_CO2_empresa_general($empresa);
                $Gases["Metano"]=$consultas->Consultar_grafica_CH4_empresa_general($empresa);
                $Datos["Otros"]=$Gases;
            }
            else if($periodo=="m" && isset($_POST['mes']) && !is_null($_POST['mes']) && $_POST['mes']!="S" )
            {
                $Año=$_POST['mes'];
                $Datos["tipo"]="m";
                $Datos["Huella_general"]= $consultas->Consultar_grafica_GEI_empresa_año($empresa,$Año);
                $Datos["Huella_empresa_sede"]=$consultas->Consultar_huella_carbono_sedes_empresa_año($empresa,$Año);
                $Datos["Alcance1"]=$consultas->Consultar_grafica_co2_alcance1_empresa_año($empresa,$Año);
                $Datos["Alcance2"]=$consultas->Consultar_grafica_co2_alcance2_empresa_año($empresa,$Año);
                $Gases=array();
                $Gases["Oxido_Nitroso"]=$consultas->Consultar_grafica_N2O_empresa_año($empresa,$Año);
                $Gases["Dioxido_carbono"]=$consultas->Consultar_grafica_CO2_empresa_año($empresa,$Año);
                $Gases["Metano"]=$consultas->Consultar_grafica_CH4_empresa_año($empresa,$Año);
                $Datos["Otros"]=$Gases;
            }
            
        }

        
    }
    else
    {
        $mensaje['success']=false;
        $mensaje['mensaje']="Datos erroneos";
    }
    echo json_encode($mensaje);
?>
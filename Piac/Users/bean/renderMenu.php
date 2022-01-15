<?php

class renderMenu{
  
  public function render ($id_usuario, $idsede, $interfaz){
    if($interfaz==2)
    {
      require_once  "../../../src/consultas.php";
    }
    else
    {
      require_once  "../../src/consultas.php";
    }
    
    $utilidades   = new consultas();
    $tipoUsuario  = $utilidades ->TipoUsuario($id_usuario);

    /*==================================================================================================================
      Funcion de encriptado
    ====================================================================================================================*/
    //$key='J';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    //$idsede=base64_encode($idsede);

/*==================================================================================================================
    Bloque de menus
====================================================================================================================*/

    if ($fila=mysqli_fetch_array($tipoUsuario)) {
      
      if ($fila[0]=="2" && $interfaz==1) {
          $Informe='  <a href="DatosPersonales.php"><button><p>Datos Empresariales</p></button></a>';
          $Sedes='<a href="index.php"><button><p>Sedes</p></button></a>';
          $Datos='  <a href="Informeyestaisticas.php"><button><p>Informe y Estadisticas</p></button></a>';
                    return $Informe.$Sedes.$Datos;
      }
      else if ($fila[0]=="3" || ($fila[0]=="2" && $interfaz==2)) 
      {
        $sede='<a href="sede.php?s='.$idsede.'"><button><p>Datos de la Sede</p></button></a>';
		    $residuos='<a href="solido.php?s='.$idsede.'"><button><p>Corriente de residuos</p></button></a>';
    		$huella='<a href="carbono.php?s='.$idsede.'"><button><p>Huella de Carbono</p></button></a>';
		    $hidrica='<a href="hidirico.php?s='.$idsede.'"><button><p>Huella Hidrica</p></button></a>';
		    $informes='<a href="informes.php?s='.$idsede.'"><button><p>Informes</p></button></a>';
        return $sede.$huella.$informes;
      }
      else if ($fila[0]=="3" || ($fila[0]=="2" && $interfaz==3)) 
      {
        $sede='<a href="bean/sede.php?s='.$idsede.'"><button><p>Datos de la Sede</p></button></a>';
		    $residuos='<a href="solido.php?s='.$idsede.'"><button><p>Corriente de residuos</p></button></a>';
    		$huella='<a href="bean/carbono.php?s='.$idsede.'"><button><p>Huella de Carbono</p></button></a>';
		    $hidrica='<a href="hidirico.php?s='.$idsede.'"><button><p>Huella Hidrica</p></button></a>';
		    $informes='<a href="bean/informes.php?s='.$idsede.'"><button><p>Informes</p></button></a>';
        return $sede.$huella.$informes;
      }
    }

    
  }
}
 ?>
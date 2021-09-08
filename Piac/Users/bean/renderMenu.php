<?php

class renderMenu{
  
  public function render ($id_usuario, $idsede){
    require_once "../../src/consultas.php";
    $utilidades   = new consultas();
    $tipoUsuario  = $utilidades ->TipoUsuario($id_usuario);

    /*==================================================================================================================
      Funcion de encriptado
    ====================================================================================================================*/
    //$key='J';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
    $idsede=base64_encode($idsede);

/*==================================================================================================================
    Bloque de menus
====================================================================================================================*/

    if ($fila=mysqli_fetch_array($tipoUsuario)) {
      
      if ($fila[0]=="2") {
          $Informe='  <a href="DatosPersonales.php"><button><p>Datos Empresariales</p></button></a>';
          $Sedes='<a href="home.php"><button><p>Sedes</p></button></a>';
          $Datos='  <a href="Informeyestaisticas.php"><button><p>Informe y Estadisticas</p></button></a>';
                    return $Informe.$Sedes.$Datos;
      }
    }

    
  }
}
 ?>
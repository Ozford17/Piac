
<?php
  /**
   *
   */
  class conexionBD{
    // ESTE ES PARA us.cloudlogin
    /*
    var $host='localhost';
    var $username='ecoblue_piac';
    var $password='Ecoblue900*';
    var $db='ecoblue_piac';
    var $conexion;
    */
    
    var $host='localhost';
    var $username='root';
    var $password='';
    var $db='epiz_25607424_piac';
    var $conexion;
    
    /*
    // hostinger
    var $host='localhost';
    var $username='u331338248_Desarrollomam';
    var $password='Ozford17';
    var $db='u331338248_epiz_25607424_';
    var $conexion;*/
    //Este es para infinity free
    /*
    var $host='sql213.epizy.com';
    var $username='epiz_25607424';
    var $password='3pNK4NGGeC7g';
    var $db='epiz_25607424_piac';
    var $conexion;
    */

    public function consultar($sql){
      try {
        $this->conexion=mysqli_connect($this->host,$this->username,$this->password) or die("No se pudo conectar con el servidor");
        mysqli_select_db($this->conexion,$this->db) or die("No se pudo conectar con la base de datos");
        mysqli_set_charset($this->conexion,'UTF8');
          $resultado=mysqli_query($this->conexion,$sql);
          return($resultado);
      } catch (PDOException $e) {
        cabecera("Error grave",MENU_PRINCIPAL);
        echo " <p>Error: No se puede establecer coneccion con la Base de Datos.</p>\n\n";
        echo  " <p>Error: ".$e->getMessage()."</p>\n";
        die();
        exit();
      }
    }
  }
?>
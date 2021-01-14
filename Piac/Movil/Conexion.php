<?php
  /**
   *
   */
  class conexionBD{
    var $host='localhost';
    var $username='ecoblue_piac';
    var $password='Ecoblue900*';
    var $db='ecoblue_piac';
    var $conexion;

    public function consultar($sql){
      try {
        $this->conexion=mysqli_connect($this->host,$this->username,$this->password);
        mysqli_select_db($this->conexion,$this->db);
          $resultado=mysqli_query($this->conexion,$sql);
          return($resultado);
      } catch (PDOException $e) {
        cabecera("Error grave",MENU_PRINCIPAL);
        print " <p>Error: No se puede establecer coneccion con la Base de Datos.</p>\n\n";
        print " <p>Error: ".$e->getMessage()."</p>\n";
        pie();
        exit();
      }
    }
  }
?>
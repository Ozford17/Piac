<?php
require_once "Conexion.php";
  class consultas extends conexionBD{
    /*==============================================================================================================
      :::::::::::::::::::::::::::::UTILIDADES::::::::::::::::::::
    ===============================================================================================================*/
    /*=============================================================================================================
                Busqueda de usuario  (inicio de session)
    ===============================================================================================================*/
    public function verificarUsuario($email,$password){
      $sql="SELECT * FROM  usuario WHERE correo='".$email."' AND contraseña='".$password."';";
      //echo $sql."<br>";
      $resultado=$this->consultar($sql);
      return $resultado;
    }
    public function verificarUsuario_($email,$password){
      $sql="SELECT * FROM  usuario WHERE correo='".$email."' AND contrasena='".$password."';";
      //echo $sql."<br>";
      $resultado=$this->consultar($sql);
      return $resultado;
    }

    /*=============================================================================================================
      Listar todos los usuario
    ===============================================================================================================*/
    public function BuscarUsuario(){
      $sql="SELECT u.codigo,u.nombre, u.correo, u.tipo_usuario,s.nombre as sede, u.contraseña FROM usuario u, Sede s where u.Sede=s.Codigo order by u.Sede asc";
      $resultado=$this->consultar($sql);
      return $resultado;
    }
    /*=============================================================================================================
     Buscar tipo de usuario
    ===============================================================================================================*/
    public function TipoUsuario($id_usuario){
      $sql="Select tipo_usuario from usuario where Codigo=".$id_usuario.";";
      $resultado=$this->consultar($sql);
      return $resultado;
    }

     /*=============================================================================================================
      buscar un usuario por correo
    ===============================================================================================================*/
    public function BuscarUsuario_correo($correo){
      $sql="SELECT u.codigo,u.nombre, u.correo, u.tipo_usuario,s.nombre as sede, u.contraseña FROM usuario u, Sede s where u.correo='".$correo."' and u.Sede=s.Codigo";
      $resultado=$this->consultar($sql);
      return $resultado;
    }
     /*=============================================================================================================
      Maximo de codigo en usuario
    ===============================================================================================================*/
    public function Maximo_cod_usu(){
      $sql="Select Max(codigo) from usuario;";
      $resultado=$this->consultar($sql);
      return $resultado;
    }
    /*=============================================================================================================
      Insertar usuario
    ===============================================================================================================*/
    public function Insert_usuario($codigo,$nombre,$correo,$contraseña,$tipo,$sede){
      $sql="INSERT into usuario values(".$codigo.",'".$nombre."','".$correo."','".$contraseña."', ".$tipo.", ".$sede.");";
      $resultado=$this->consultar($sql);
      return $resultado;
    }

   /*================================================================================================================
      Listar las Empresas
     ===============================================================================================================*/
     public function BuscarEmpresa(){
      $sql="SELECT * from Empresa";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
      /*================================================================================================================
      Listar las sedes
     ===============================================================================================================*/
     public function Buscarsede(){
      $sql="SELECT * from Sede";
      $resultado=$this->consultar($sql);
      return $resultado;
     }

     /*================================================================================================================
      consultar empresa por codigo
     =============================================================================================================*/
     public function BuscarEmpresa_codigo($codigo){
      $sql="SELECT * from Empresa where codigo=$codigo";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      Recueperar Usuario
     ===============================================================================================================*/
     public function recuperar_usuario($nombre){
      $sql="SELECT * from usuario where correo='".$nombre."';";
      //echo $sql."<br>";
      $resultado=$this->consultar($sql);
      return $resultado;
     }

     /*================================================================================================================
      Listar las sedes por empresa
     ===============================================================================================================*/
     public function BuscarSedeEmpresa($cod){
      $sql="SELECT * from Sede where Empresa=".$cod.";";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     
     
     /*================================================================================================================
      Listar las sedes con empresa
     ===============================================================================================================*/
     public function BuscarSede_empresa(){
      $sql="SELECT s.Codigo,s.Nombre,e.Nombre as empresa from Sede s, Empresa e WHERE e.Codigo=s.Empresa ORDER by (empresa) asc";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      consultar la sede por codigo
     ===============================================================================================================*/
     public function consultar_sede_codigo($codigo){
      $sql="SELECT s.* from Sede s WHERE s.Codigo=".$codigo.";";
      //echo $sql."<br>";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      buscar codigo Empresa por codigo de sede
     ===============================================================================================================*/
     public function BuscarEmpresa_sede($sede){
      $sql="SELECT Empresa from Sede where Codigo=".$sede.";";
      $resultado=$this->consultar($sql);
      return $resultado;
     }

     /*================================================================================================================
      Listar todos los codigos CIIU
     ===============================================================================================================*/
     public function Listar_codigos_ciiu(){
      $sql="SELECT * from CIIU";
      $resultado=$this->consultar($sql);
      return $resultado;
     }


     /*================================================================================================================
      insertar empresa
     ===============================================================================================================*/
     public function agregar_empresa($codigo,$nit,$nombre,$representante,$telefono,$correo,$ciiu){
      $sql="INSERT INTO Empresa value('".$codigo."','".$nit."','".$nombre."','".$representante."','".$telefono."','".$correo."',$ciiu,'null','null');";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      actualizar empresa
     ===============================================================================================================*/
     public function ActualizarEmpresa($cod, $nit, $nombre,$representante, $telefono, $correo,$ciiu){
      $sql="UPDATE Empresa Set Nit='".$nit."',Nombre='".$nombre."',  Telefono='".$telefono."', Representante='".$representante."', Correo='".$correo."', CIIU=$ciiu where Codigo=".$cod.";";
      
      $resultado=$this->consultar($sql);
      return $resultado;
     }

     /*================================================================================================================
      actualizar las sedes por empresa
     ===============================================================================================================*/
     public function ActualizarSedeEmpresa($cod, $nombre, $ciudad,$direccion, $telefono, $representante ){
      $sql="UPDATE Sede Set Nombre='".$nombre."', Ciudad='".$ciudad."', Direccion='".$direccion."', Telefono='".$telefono."', Representante='".$representante."'where Codigo=".$cod.";";
      echo $sql."<br>";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      actualizar las sedes por empresa de servicio
     ===============================================================================================================*/
     public function ActualizarSedeEmpresa_servicio($cod, $servicio, $valor){
      $sql="UPDATE Sede Set ".$servicio."=".$valor." where Codigo=".$cod.";";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      consultar listado de empresas por nombre
     ===============================================================================================================*/
     public function Consultar_empresa_nombre(){
      $sql="SELECT Codigo, nombre ,Nit from Empresa";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      consultar empresa por el nombre
     ===============================================================================================================*/
     public function Consultar_empresa_por_nombre($nombre){
      $sql="SELECT * from Empresa where Nombre='".$nombre."';";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      consultar numero maximo del codigo de empresa
     ===============================================================================================================*/
     public function Consultar_max_empresa(){
      $sql="SELECT MAX(codigo) from Empresa";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      consultar numero maximo del codigo de Sede
     ===============================================================================================================*/
     public function Consultar_max_sede(){
      $sql="SELECT MAX(Codigo) from Sede";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      consultar numero maximo del codigo de proveedor
     ===============================================================================================================*/
     public function Consultar_max_proveedor(){
      $sql="SELECT MAX(codigo) from Proveedores";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
      /*================================================================================================================
      insertar sede
     ===============================================================================================================*/
     public function agregar_sede($codigo,$nombre,$ciudad,$direccion,$telefono,$representante,$correo,$empresa,$coordenadas){
      $sql="INSERT INTO Sede value('".$codigo."','".$nombre."','".$ciudad."','".$direccion."','".$telefono."','".$representante."','".$correo."','".$empresa."','".$coordenadas."', 1, 1);";
      $resultado=$this->consultar($sql);
      return $resultado;
     
     }

     /*================================================================================================================
      insertar proveedores
     ===============================================================================================================*/
     public function agregar_proveedor($codigo,$nit,$nombre,$direccion,$area,$sede){
      $sql="INSERT INTO Proveedores (Codigo,Nit, Nombre,Direccion,Area_residuos,Sede) value('".$codigo."','".$nit."','".$nombre."','".$direccion."','".$area."','".$sede."');";
      //echo $sql;
      $resultado=$this->consultar($sql);
      return $resultado;
     }     
     /*================================================================================================================
      insertar documentacion de proveedores
     ===============================================================================================================*/
     public function agregar_documentacion_proveedor($campo,$archivo, $id){
      $sql="UPDATE Proveedores set  ".$campo."='".$archivo."' where Codigo=".$id;
      //echo $sql;
      $resultado=$this->consultar($sql);
      return $resultado;
     }     
     /*================================================================================================================
      consultar proveedores
     ===============================================================================================================*/
     public function consultar_exi_proveedor($nit,$area){
      $sql="SELECT count(Codigo) FROM Proveedores where Nit=".$nit." and Area_residuos='".$area."'";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      consultar proveedores
     ===============================================================================================================*/
     public function consultar_proveedor(){
      $sql="SELECT * FROM Proveedores;";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      consultar proveedores por sede
     ===============================================================================================================*/
     public function consultar_proveedor_sede($sede){
      $sql="SELECT * FROM Proveedores where Sede=".$sede.";";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      Actualizar datos del usuario
     ===============================================================================================================*/
     public function Actualizar_usuario($correo,$nombre, $contraseña, $tipo){
      $sql="UPDATE usuario set nombre='".$nombre."', contraseña='".$contraseña."', tipo_usuario=".$tipo." where correo='".$correo."'; ";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      Eliminar datos del usuario
     ===============================================================================================================*/
     public function Eliminar_usuario($correo){
      $sql="DELETE from usuario where correo='".$correo."';";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      Eliminar empresa por nombre
     ===============================================================================================================*/
     public function Eliminar_empresa($nombre){
      $sql="DELETE from Empresa where Nombre='".$nombre."';";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      Listar proveedores por sede
     ===============================================================================================================*/
     public function Listar_proveedores($sede){
      $sql="SELECT * FROM `Proveedores` where Sede =".$sede.";";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
     ingresar residuos Solidos
     ===============================================================================================================*/
     public function insertar_solidos($codigo,$residuo,$material,$cantidad,$descripcion,$observacion,$proveedor,$certificado,$kilo,$sede,$fecha){
      $sql="INSERT INTO residuo_solido values ($codigo,'$residuo','$material',$cantidad,'descripcion','$observacion',$proveedor,'$certificado',$kilo,$sede,'$fecha');";
      //echo $sql."<br>";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
     max de resiudos solidos
     ===============================================================================================================*/
     public function max_solidos(){
      $sql="SELECT COUNT(Codigo) FROM residuo_solido;";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      Listar todos subtipos 
     ===============================================================================================================*/
     public function Listado_t_subtipos(){
      $sql="SELECT s.Codigo,s.Nombre,t.Alcance from subtipo_elemento s, tipo_elemento t where s.Tipo=t.Codigo;";

      $resultado=$this->consultar($sql);    
      return $resultado;
     }
     /*================================================================================================================
      Listar todos subtipos 
     ===============================================================================================================*/
     public function Listado_refrigerantes(){
      $sql="SELECT * from refrigerante";
      $resultado=$this->consultar($sql);    
      return $resultado;
     }

     /*================================================================================================================
      Listar el listado de subtipos por alcance
     ===============================================================================================================*/
     public function Listado_subtipos($alcance){
      $sql="SELECT s.Codigo,s.Nombre,t.Alcance from subtipo s, tipo t where s.Tipo=t.Codigo and Alcance=".$alcance.";";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      Listar todos los elementos 
     ===============================================================================================================*/
     public function Listado_t_elementos(){
      $sql="SELECT * FROM elemento;";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      Listar el listado de elementos por tipo
     ===============================================================================================================*/
     public function Listado_elementos($tipo){
      $sql="SELECT * FROM elemento where Subtipo=".$tipo.";";      
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      Listar el listado fuentes
     ===============================================================================================================*/
     public function Listado_fuente(){
      $sql="SELECT * from fuente_emision;";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      COntar max de huella de carbono
     ===============================================================================================================*/
     public function contar_huella(){
      $sql="SELECT Max(Codigo) from huella_carbono;";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      Insertar Huella
     ===============================================================================================================*/
     public function insertar_huella($codigo,$sede,$elemento,$fuente,$cantidad,$fecha,$total){
      $sql="Insert into huella_carbono values($codigo,$sede,$elemento,$fuente,$cantidad,'$fecha',$total)";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      Consultar Huella de carbono por alcance
     ===============================================================================================================*/
     public function consultar_huella($alcance){
      $sql="SELECT h.Codigo,se.Nombre,t.Alcance,s.Nombre as Tipo,e.Nombre as Elemento,h.Fuente,h.Fecha,h.Total_huella,e.Unidad,e.Unidad_emision FROM huella_carbono h,elemento e, subtipo s, tipo t ,Sede se WHERE h.Elemento=e.Codigo and e.Subtipo=s.Codigo and s.Tipo=t.Codigo and h.Sede=se.Codigo and t.Alcance=".$alcance.";";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      listar todos los materiales
     ===============================================================================================================*/
     public function listar_material(){
      $sql="SELECT * FROM Material";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      agregar huella hidrico
     ===============================================================================================================*/
     public function insertar_hidrico($codigo,$fecha,$mes,$azul,$verde,$gris,$sede){
      $sql="INSERT into huella_hidrica values(".$codigo.",'".$fecha."',".$mes.",".$azul.",".$verde.",".$gris.",".$sede.");";
      //echo $sql."<br>";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      COntar max de huella hidrica
     ===============================================================================================================*/
     public function contar_huella_hidrica(){
      $sql="SELECT Max(Codigo) from huella_hidrica;";
      $resultado=$this->consultar($sql);
      return $resultado;
     }
     /*================================================================================================================
      Consulta para hacer la graficas de residuos ingresados
     ===============================================================================================================*/
     public function Grafica_residuo_solidos(){
      $sql="SELECT Tipo_residuo,count(Tipo_residuo) FROM residuo_solido GROUP By Tipo_residuo";
      $resultado=$this->consultar($sql);
      return $resultado;
     }

     /*================================================================================================================
      Consulta para hacer la graficas de huella hidrica por colores
     ===============================================================================================================*/
     public function Grafica_residuo_solidos_2019($color, $empresa){
      $sql="SELECT h.Mes,h.Fecha,h.".$color.", h.Sede FROM `huella_hidrica` h, Empresa e, Sede s where YEAR(Fecha)='2019' and e.Codigo=s.Empresa and s.Codigo=h.Sede and Empresa=".$empresa;
      $resultado=$this->consultar($sql);
      return $resultado;
     }

     

    /*===============================================================================================================
        Listar los residuos solidos
     =================================================================================================================*/
      public function consultar_solidos($sede){
          $sql="SELECT * FROM residuo_solido where Sede=".$sede.";";
          $resultado=$this->consultar($sql);  
          return $resultado;
      }

    /*===============================================================================================================
        Listar huella de carbono
     =================================================================================================================*/
      public function consultar_huella_carbono($sede){
          $sql="SELECT e.Nombre as Elemento, f.Nombre as Fuente, h.Cantidad as Cantidad,e.Unidad as Unidad, h.Total_huella as Total_huella FROM huella_carbono h , elemento e , fuente_emision f WHERE h.Elemento=e.Codigo and h.Fuente=f.codigo and h.sede=".$sede.";";
          $resultado=$this->consultar($sql);  
          return $resultado;
      }
      /*===============================================================================================================
      maximo de fuentes fijas
     =================================================================================================================*/
      public function max_fuentes_fijas(){
          $sql="SELECT max(Codigo) from fuentes_fijas";
          $resultado=$this->consultar($sql);  
          return $resultado;
      }
      /*===============================================================================================================
      ingresar fuentes fijas
     =================================================================================================================*/
      public function Insert_fuentes_fijas($codigo,$sede,$maquina, $cantidad, $elemento,$horas_dia,$dias_semana,$refrigerante,$lubricante,$fecha_funcion, $fecha){
          $sql="Insert into fuentes_fijas values ($codigo, $sede, '$maquina', $cantidad, $elemento,'$horas_dia','$dias_semana',$refrigerante,$lubricante,'$fecha_funcion', '$fecha',0,null)";
         //echo $sql."<br>  ";
          $resultado=$this->consultar($sql);  
          return $resultado;
      }
      /*===============================================================================================================
      ingresar fuentes fijas
     =================================================================================================================*/
      public function consultar_fuente_fija_codigo($codigo){
          $sql="select count(Codigo) from fuentes_fijas where Codigo=$codigo;";

          $resultado=$this->consultar($sql);  
          return $resultado;
        }

      /*===============================================================================================================
      maximo de fuentes moviles
     =================================================================================================================*/
      public function max_fuentes_moviles(){
          $sql="SELECT max(Codigo) from fuentes_moviles";
          $resultado=$this->consultar($sql);  
          return $resultado;
      }
      /*===============================================================================================================
      ingresar fuentes moviles
     =================================================================================================================*/
      public function Insert_fuentes_moviles($codigo,$sede,$vehiculo, $tipo, $placa, $Combustible,$refrigerante, $fecha){
          $sql="Insert into fuentes_moviles values ($codigo, $sede, '$vehiculo','$tipo', '$placa', $Combustible, $refrigerante, '$fecha', 0 ,null)";
          $resultado=$this->consultar($sql);  
          return $resultado;
      }
      /*===============================================================================================================
        Ingresar extintores de vehiculos
      =================================================================================================================*/
      public function Insert_fuentes_moviles_extintor($codigo,$extintor,$peso,$fecha){
          $sql="Insert into extintor_vehiculo values ($codigo, $extintor,$peso, '$fecha')";
          //echo $sql."<br>";
          $resultado=$this->consultar($sql);  
          return $resultado;
      }
      /*===============================================================================================================
        Ingresar extintores de vehiculos electricos
      =================================================================================================================*/
      public function Insert_fuentes_moviles_extintor_elec($codigo,$extintor,$peso,$fecha){
          $sql="Insert into extintor_vehiculo_elec values ($codigo, $extintor,$peso, '$fecha')";
          //echo $sql."<br>";
          $resultado=$this->consultar($sql);  
          return $resultado;
      }
      /*===============================================================================================================
      consultar fuente moviles por codigo
     =================================================================================================================*/
      public function consultar_fuente_moviles_codigo($codigo){
          $sql1="select count(Codigo) from fuentes_moviles where Codigo=".$codigo.";";
          $resultado=$this->consultar($sql1);  
          return $resultado;
        }
      /*===============================================================================================================
          Contar fuente moviles por Placa
      =================================================================================================================*/
      public function consultar_fuente_moviles_placa($placa){
          $sql1="select count(Codigo) from fuentes_moviles where Placa='".$placa."';";
          $resultado=$this->consultar($sql1);  
          return $resultado;
        }
      /*===============================================================================================================
          consultar fuente moviles por codigo
      =================================================================================================================*/
      public function consultar_fuente_moviles_placa_c($codigo){
          $sql1="select * from fuentes_moviles where codigo='".$codigo."';";
          $resultado=$this->consultar($sql1);  
          return $resultado;
        }
        
        /*===============================================================================================================
      consultar fuente moviles por Placa
     =================================================================================================================*/
      public function consultar_fuente_moviles_hibrido_placa($placa){
          $sql1="select count(Codigo) from fuentes_moviles where Placa='".$placa."' and Tipo=1;";
          $resultado=$this->consultar($sql1);  
          return $resultado;
        }
      /*===============================================================================================================
      maximo de fuentes fijas electricas
     =================================================================================================================*/
      public function max_fuentes_fijas_electricas(){
          $sql="SELECT max(Codigo) from Equipo_electronico";
          $resultado=$this->consultar($sql);  
          return $resultado;
      }
      /*===============================================================================================================
      ingresar fuentes moviles
     =================================================================================================================*/
      public function Insert_fuentes_fijas_electricas($codigo,$sede,$nombre, $cantidad, $horas,$dias,$refrigerante, $lubricante ){
          $sql="Insert into Equipo_electronico values ($codigo, $sede, '$nombre',$cantidad, $horas, $dias, $refrigerante,$lubricante, 0 ,null)";
          $resultado=$this->consultar($sql);  
          return $resultado;
      }
      /*===============================================================================================================
      ingresar fuentes fijas
     =================================================================================================================*/
      public function consultar_fuente_fija_electrico_codigo($codigo){
          $sql="select count(Codigo) from Equipo_electronico where Codigo=$codigo;";
          $resultado=$this->consultar($sql);  
          return $resultado;
        }
        /*===============================================================================================================
      buscar fuente fija electrica por codigo
     =================================================================================================================*/
      public function consultar_fuente_fija_electrico_codigo_s($codigo){
          $sql="select * from Equipo_electronico where Codigo=$codigo;";
          $resultado=$this->consultar($sql);  
          return $resultado;
        }
         /*===============================================================================================================
      maximo de fuentes moviles electricas
     =================================================================================================================*/
      public function max_fuentes_moviles_electricas(){
          $sql="SELECT max(Codigo) from Vehiculo_electrico";
          $resultado=$this->consultar($sql);  
          return $resultado;
      }
      /*===============================================================================================================
      ingresar fuentes moviles
     =================================================================================================================*/
      public function Insert_fuentes_moviles_electricas($codigo,$sede,$Placa, $Potencia, $horas_carga, $dias, $refrigerante){
          $sql="Insert into Vehiculo_electrico values ($codigo, $sede, '$Placa',$Potencia, $horas_carga, $dias,$refrigerante,0,null)";
          $resultado=$this->consultar($sql);  
          return $resultado;
      }
      /*===============================================================================================================
          consultar fuente movil electrico por codigo
     =================================================================================================================*/
      public function consultar_fuente_movil_electrico_codigo($codigo){
          $sql="select count(Codigo) from Vehiculo_electrico where Codigo=$codigo;";
          $resultado=$this->consultar($sql);  
          return $resultado;
        }
         /*===============================================================================================================
          consultar fuente movil electrico por Placa
     =================================================================================================================*/
      public function consultar_fuente_movil_electrico_placa($placa){
          $sql="select * from Vehiculo_electrico where Placa='$placa';";
          $resultado=$this->consultar($sql);  
          return $resultado;
        }

        /*===============================================================================================================
      maximo de fuentes moviles electricas
     =================================================================================================================*/
      public function max_fuentes_iluminarias(){
          $sql="SELECT max(Codigo) from Luminarias";
          $resultado=$this->consultar($sql);  
          return $resultado;
      }
      /*===============================================================================================================
      ingresar fuentes moviles
     =================================================================================================================*/
      public function Insert_fuentes_iluminarias($codigo,$sede,$Tipo, $cantidad, $potencia, $horas_uso,$dias){
          $sql="Insert into Luminarias values ($codigo, $sede, '$Tipo',$cantidad, $potencia, $horas_uso,$dias,0,null)";
          $resultado=$this->consultar($sql);  
          return $resultado;
      }
      /*===============================================================================================================
      ingresar fuentes fijas
     =================================================================================================================*/
      public function consultar_fuente_iluminarias($codigo){
          $sql="select count(Codigo) from Luminarias where Codigo=$codigo;";
          $resultado=$this->consultar($sql);  
          return $resultado;
        }

      /*===============================================================================================================
       Listar fuentes fijas por sede
     =================================================================================================================*/
      public function consultar_fuente_fijas_sede($sede){
          $sql="select f.Codigo, f.Sede, f.Fuente, f.Cantidad,e.Nombre,f.fecha_i_funcion,f.Fecha, r.nombre from fuentes_fijas f, elemento e, refrigerante r where f.Elemento=e.Codigo and f.Sede=".$sede." and estado=0 and f.refrigerante=r.codigo;";
            //echo $sql."<br>";
          $resultado=$this->consultar($sql);  
          return $resultado;
        }
        /*===============================================================================================================
       Listar fuentes fijas por codigo
     =================================================================================================================*/
      public function consultar_fuente_fijas_codigo($codigo){
          $sql="select f.Codigo, f.Sede, f.Fuente, f.Cantidad,e.Nombre,f.Fecha, f.Estado, f.Observacion  from fuentes_fijas f, elemento e where f.Elemento=e.Codigo and f.Codigo=$codigo and estado=0;";
            
          $resultado=$this->consultar($sql);  
          return $resultado;
        }

        /*===============================================================================================================
       Listar fuentes fijas electricas por sede
     =================================================================================================================*/
      public function consultar_fuente_fijas_electricas_sede($sede){
          $sql="select ee.Codigo,ee.Sede,ee.Nombre,ee.Cantidad_equipos,ee.Horas,ee.Dias,r.nombre,ee.estado,ee.observacion from Equipo_electronico ee, refrigerante r where Sede=".$sede." and ee.Refrigerante=r.codigo and estado=0";
          //echo $sql."<br> ";
          $resultado=$this->consultar($sql);  
          return $resultado;
        }

        /*===============================================================================================================
       Listar fuentes moviles  por sede
     =================================================================================================================*/
      public function consultar_fuente_movil_sede($sede){
          $sql="SELECT f.Codigo,f.Sede,f.Vehiculo,f.Tipo,f.Placa,e.Nombre,f.Fecha, r.nombre FROM fuentes_moviles f, elemento e, refrigerante r where f.Combustible=e.Codigo and Sede=$sede and estado=0 and r.codigo=f.Refrigerante;";

          $resultado=$this->consultar($sql);  
          return $resultado;
        }
      /*===============================================================================================================
          Listar fuentes fijas electricas por sede
      =================================================================================================================*/
      public function consultar_fuente_movil_electricas_sede($sede){
          $sql="select v.Codigo, v.Sede, v.Placa,v.Potencia,v.Horas_carga,v.dias_uso,r.nombre from Vehiculo_electrico v, refrigerante r where Sede=$sede and estado=0 and v.Refrigerante=r.codigo";
          $resultado=$this->consultar($sql);  
          return $resultado;
        }
      /*===============================================================================================================
          Consultar fuente moviles por placa
      =================================================================================================================*/
      public function consultar_fuente_movil_electricas_placa($placa){
          $sql1="select * from Vehiculo_electrico where Placa='".$placa."';";
          $resultado=$this->consultar($sql1);  
          return $resultado;
        }

      /*===============================================================================================================
           Listar fuentes iluminarias por sede
      =================================================================================================================*/
      public function consultar_fuente_luminaria_sede($sede){
          $sql="select * from Luminarias  where Sede=$sede;";

          $resultado=$this->consultar($sql);  
          return $resultado;
        }

        /*===============================================================================================================
       actualizar estado maquinaria en fuentes fijas
     =================================================================================================================*/
      public function update_estado_fuente_fijas($codigo,$cantidad,$estado,$observacion){
          $sql="UPDATE fuentes_fijas set Cantidad=$cantidad, Estado=$estado, Observacion='$observacion' where codigo=$codigo;";
                
          $resultado=$this->consultar($sql);  
          return $resultado;
        }
        /*===============================================================================================================
       actualizar estado maquinaria en fuentes fijas electricas
     =================================================================================================================*/
      public function update_estado_fuente_fijas_electricas($codigo,$cantidad,$estado,$observacion){
          $sql="UPDATE Equipo_electronico set Cantidad_equipos=$cantidad, estado=$estado, observacion='$observacion' where codigo=$codigo;";   
          $resultado=$this->consultar($sql);  
          return $resultado;
        }
      /*===============================================================================================================
          actualizar estado maquinaria en fuentes moviles
      =================================================================================================================*/
      public function update_estado_fuente_moviles($codigo,$estado,$observacion){
          $sql="UPDATE fuentes_moviles set  estado=$estado, observacion='$observacion' where codigo=$codigo;";   
          $resultado=$this->consultar($sql);  
          return $resultado;
        }
        /*===============================================================================================================
          actualizar estado maquinaria en fuentes moviles electricas
      =================================================================================================================*/
      public function update_estado_fuente_moviles_electricos($codigo,$estado,$observacion){
          $sql="UPDATE Vehiculo_electrico set  estado=$estado, observacion='$observacion' where codigo=$codigo;";   
          $resultado=$this->consultar($sql);  
          return $resultado;
        }

        /*===============================================================================================================
       insertar extintores
      =================================================================================================================*/
      public function insert_extintor($codigo,$sede,$cantidad,$Peso,$fecha){
          $sql="INSERT into extintor_sede values($codigo, $sede,$cantidad,$Peso,'$fecha')";
          //echo $sql."<br>";
          $resultado=$this->consultar($sql);  
          return $resultado;
        }
        /*===============================================================================================================
       insertar extintores
      =================================================================================================================*/
      public function consultar_extintor($codigo,$sede,$peso){
          $sql="SELECT * from extintor_sede where codigo=$codigo and sede=$sede and Peso=$peso";
          //echo $sql."<br>";
          $resultado=$this->consultar($sql);
          return $resultado;
        }
        /*===============================================================================================================
       Actualizar extintores 
      =================================================================================================================*/
      public function actualizar_extintor($codigo,$sede,$cantidad,$peso,$fecha){
          $sql="UPDATE extintor_sede set Cantidad=$cantidad , Fecha='$fecha' where codigo=$codigo and sede=$sede and Peso=$peso";
          //echo $sql."<br>";
          $resultado=$this->consultar($sql);
          return $resultado;
        }
        /*===============================================================================================================
       consulta para la huella de carbono
      =================================================================================================================*/
      public function fuentes_fijas_consulta($sede){
          $sql="select f.Fuente, f.Cantidad,f.Elemento,e.Nombre, count(e.Nombre),e.Unidad from fuentes_fijas f, elemento e where f.Elemento=e.Codigo and f.Sede=$sede and estado=0 GROUP by e.Nombre DESC";
          $resultado=$this->consultar($sql);
          return $resultado;
        }
        /*===============================================================================================================
       consulta de las fuentes fijas por codigo de elemento
      =================================================================================================================*/
      public function fuentes_fijas_consulta_elemento($codigo_ele,$sede){
          $sql="select f.Fuente, f.Cantidad,f.Elemento,e.Nombre,e.Codigo from fuentes_fijas f, elemento e where f.Elemento=e.Codigo and f.elemento=$codigo_ele and estado=0 and f.Sede=$sede";
          $resultado=$this->consultar($sql);
          return $resultado;
        }
        /*===============================================================================================================
       consulta de las automoviles registrados por sede
      =================================================================================================================*/
      public function fuentes_automoviles_sede($sede){
          $sql="SELECT f.Vehiculo,f.Placa, f.Tipo, c.Nombre,c.Unidad, f.Codigo FROM fuentes_moviles f, elemento c where sede =$sede and f.Combustible=c.Codigo";
          $resultado=$this->consultar($sql);
          return $resultado;
        }

      /*===============================================================================================================
       consulta de extintores registrados en las sedes
      =================================================================================================================*/
      public function fuentes_extintores_sede($sede){
          $sql="SELECT e.codigo,e.Nombre,es.cantidad, e.ruta,e.Buscar,es.peso, es.Fecha FROM extintor_sede es, extintores e where es.codigo=e.codigo and es.sede=$sede GROUP by e.Nombre";
          //echo $sql."<br>";
          $resultado=$this->consultar($sql);
          return $resultado;
        }
        /*===============================================================================================================
       consulta de todos extintores registrados por sede
      =================================================================================================================*/
      public function fuentes__total_extintores_sede($sede){
          $sql="SELECT se.codigo,e.Nombre,e.ruta, e.Buscar, se.sede, sum(se.cantidad) from 
          ( SELECT es.codigo, es.sede, es.cantidad from extintor_sede es where sede=$sede 
                              UNION 
            SELECT ev.extintor, v.sede, COUNT(ev.extintor) from extintor_vehiculo ev, fuentes_moviles v WHERE v.Sede=$sede 
                                UNION 
            SELECT ev.extintor, v.sede, COUNT(ev.extintor) from extintor_vehiculo_elec ev, fuentes_moviles v WHERE v.Sede=$sede ) 

            as se , extintores e where e.codigo=se.codigo GROUP by codigo";
          //echo $sql."<br>";
          $resultado=$this->consultar($sql);
          return $resultado;
        }
        /*===============================================================================================================
       consulta de refrigerantes de las fuentes fijas
      =================================================================================================================*/
      public function listado_refigerante_fuentes_fijas(){
          $sql="SELECT r.nombre, r.unidades, count(f.Codigo)FROM fuentes_fijas f, refrigerante r where f.refrigerante=r.codigo GROUP by r.nombre";
          $resultado=$this->consultar($sql);
          return $resultado;
        }
        /*===============================================================================================================
       consulta de refrigerantes de las fuentes fijas
      =================================================================================================================*/
      public function listado_refigerante_fuentes_fijas_sede($sede){
          $sql="SELECT r.codigo, r.nombre, r.unidades, count(f.Codigo)FROM fuentes_fijas f, refrigerante r where f.refrigerante=r.codigo and f.sede=$sede GROUP by r.nombre";

          $resultado=$this->consultar($sql);
          return $resultado;
        }
        /*===============================================================================================================
       consulta de refrigerantes de las fuentes fijas
      =================================================================================================================*/
      public function listado_refigerante_fuentes_fijas_electricas_sede($sede){
          $sql="SELECT r.codigo, r.nombre, r.unidades, count(f.Codigo)FROM Equipo_electronico f, refrigerante r where f.refrigerante=r.codigo and f.sede=$sede GROUP by r.nombre";
          
          $resultado=$this->consultar($sql);
          return $resultado;
        }
      /*===============================================================================================================
       consulta de refrigerantes de las fuentes mobiles
      =================================================================================================================*/
      public function listado_refigerante_fuentes_mobiles_sede($sede){
          $sql="SELECT r.codigo, r.nombre, r.unidades, count(f.Codigo)FROM fuentes_moviles  f, refrigerante r where f.Refrigerante=r.codigo and f.sede=$sede GROUP by r.nombre";
            
          $resultado=$this->consultar($sql);
          return $resultado;
        }
        /*===============================================================================================================
       consulta de refrigerantes de las fuentes mobiles electricas
      =================================================================================================================*/
      public function listado_refigerante_fuentes_mobiles_electricas_sede($sede){
          $sql="SELECT r.codigo, r.nombre, r.unidades, count(f.Codigo)FROM Vehiculo_electrico  f, refrigerante r where f.Refrigerante=r.codigo and f.sede=$sede GROUP by r.nombre";
          $resultado=$this->consultar($sql);
          return $resultado;
        }
      /*===============================================================================================================
       consulta de refrigerantes de las fuentes fijas por nombre 
       =================================================================================================================*/
      public function listado_refigerante_fuentes_fijas_nombre($nombre, $sede){
          $sql="SELECT f.fuente FROM fuentes_fijas f, refrigerante r where f.refrigerante=r.codigo and r.nombre='$nombre' and f.Sede=$sede";
          $resultado=$this->consultar($sql);
          return $resultado;
        }
      /*===============================================================================================================
       consulta de refrigerantes de las fuentes fijas por nombre 
       =================================================================================================================*/
       public function listado_refigerante_fuentes_fijas_electricas_nombre($nombre){
          $sql="SELECT f.Nombre FROM Equipo_electronico f, refrigerante r where f.refrigerante=r.codigo and r.nombre='$nombre'";

          $resultado=$this->consultar($sql);
          return $resultado;
        }
      /*===============================================================================================================
       consulta de refrigerantes de las fuentes mobiles por nombre 
      =================================================================================================================*/
      public function listado_refigerante_fuentes_mobiles_nombre($nombre){
          $sql="SELECT f.Placa FROM fuentes_mobiles f, refrigerante r where f.Refrigerante=r.codigo and r.nombre='$nombre'";

          $resultado=$this->consultar($sql);
          return $resultado;
        }
        /*===============================================================================================================
       consulta de refrigerantes de las fuentes mobiles electricas por nombre 
      =================================================================================================================*/
      public function listado_refigerante_fuentes_mobiles_electricas_nombre($nombre){
          $sql="SELECT f.Placa FROM Vehiculo_electrico f, refrigerante r where f.Refrigerante=r.codigo and r.nombre='$nombre'";

          $resultado=$this->consultar($sql);
          return $resultado;
        }

      /*=============================================================================================================
      Maximo de codigo en huella de carbono fuentes fijas combustible
      ===============================================================================================================*/
      public function Maximo_cod_huella_carbono_fuentes_fijas_combustible(){
        $sql="Select Max(codigo) from huella_carbono_fuentes_fijas_combustible;";
        $resultado=$this->consultar($sql);
        return $resultado;
      }
      /*=============================================================================================================
      Maximo de codigo en huella de carbono fuentes fijas combustible
      ===============================================================================================================*/
      public function insertar_huella_carbono_fuentes_fijas_combustible($codigo,$ele,$valor_compustible_fuente_fija,$total_co2,$total_ch4,$total_n2o,$fecha,$fecha1,$sede){
        $sql="Insert into huella_carbono_fuentes_fijas_combustible values($codigo,$ele,$valor_compustible_fuente_fija,$total_co2 ,$total_ch4,$total_n2o,'$fecha','$fecha1',$sede) ;";
        echo $sql."<br>";
        $resultado=$this->consultar($sql);
        return $resultado;
      }
      /*=============================================================================================================
      Maximo de codigo en huella de carbono fuentes fijas combustible
      ===============================================================================================================*/
      public function insertar_huella_carbono_extintores($codigo, $extintor,$Cantidad,$Total,$Fecha_re,$Fecha_subida){
        $sql="INSERT INTO huella_carbono_extintores values ($codigo, $extintor,$Cantidad,$Total,'$Fecha_re','$Fecha_subida' );";
        $resultado=$this->consultar($sql);
        return $resultado;
      }

      /*=============================================================================================================
      Maximo de codigo en huella de carbono fuentes fijas combustible
      ===============================================================================================================*/
      public function buscar_extintor_codigo_sede($sede,$extintor){
        $sql="SELECT es.codigo, es.sede, e.Nombre,e.Co2,e.Unidad_reporte,e.Buscar from extintor_sede es, extintores e where es.codigo=e.codigo and es.sede=$sede and e.Buscar='$extintor' ORDER by sede asc";
        $resultado=$this->consultar($sql);
        return $resultado;
      }

        /*===============================================================================================================
            Consultar maximo de huella de extintores
       =================================================================================================================*/
      public function Maximo_cod_huella_carbono_extintores(){
          $sql1="select MAX(Codigo)  from huella_carbono_extintores;";
          $resultado=$this->consultar($sql1);  
          return $resultado;
        }




      /*===============================================================================================================
      consultar fuente moviles por codigo
       =================================================================================================================*/
      public function consultar_fuente_moviles_cod($codigo){
          $sql1="select fm.Codigo,fm.Placa,e.Codigo,e.Unidad, e.F_e_CO2,e.F_e_CH4,e.F_e_N2O  from fuentes_moviles fm, elemento e  where fm.Combustible=e.Codigo and fm.Codigo=".$codigo.";";
          $resultado=$this->consultar($sql1);  
          return $resultado;
        }

      /*===============================================================================================================
      consultar fuente moviles por codigo
       =================================================================================================================*/
      public function Maximo_cod_huella_carbono_fuentes_moviles(){
          $sql1="select MAX(Codigo)  from huella_carbono_fuentes_moviles;";
          $resultado=$this->consultar($sql1);  
          return $resultado;
        }

        /*=============================================================================================================
      Insertar huella de carbono fuentes fijas combustible
      ===============================================================================================================*/
      public function insertar_huella_carbono_fuentes_moviles($codigo,$ele,$valor_compustible_fuente_fija,$total_calculo_CO2,$total_calculo_CH4,$total_calculo_N2O,$fecha,$fecha1){
        $sql="Insert into huella_carbono_fuentes_moviles values($codigo,'$ele',$valor_compustible_fuente_fija,$total_calculo_CO2,$total_calculo_CH4,$total_calculo_N2O,'$fecha','$fecha1') ;";
        $resultado=$this->consultar($sql);
        return $resultado;
      }

      /*===============================================================================================================
         maximo de datos en refrigerantes
       =================================================================================================================*/
      public function Maximo_cod_huella_carbono_refrigerante(){
          $sql1="select MAX(Codigo)  from huella_carbono_fuentes_fijas_refrigerante;";
          $resultado=$this->consultar($sql1);  
          return $resultado;
        }

        /*=============================================================================================================
      insertar  huella de carbono fuentes fijas combustible
      ===============================================================================================================*/
      public function insertar_huella_carbono_fuentes_fijas_refrigerante($codigo,$ele,$valor_compustible_fuente_fija,$total_calculo,$fecha,$fecha1,$sede){
        $sql="Insert into huella_carbono_fuentes_fijas_refrigerante values($codigo,$ele,$valor_compustible_fuente_fija,$total_calculo,'$fecha','$fecha1',$sede) ;";
        $resultado=$this->consultar($sql);
        return $resultado;
      }

      /*=============================================================================================================
        Maximo de codigo para insercion de huella de energia 
      ===============================================================================================================*/
      public function max_huella_energia(){
        $sql="SELECT MAX(Codigo) from huella_carbono_energia";
        $resultado=$this->consultar($sql);
        return $resultado;
      }
      /*=============================================================================================================
         insercion de huella de energia 
      ===============================================================================================================*/
      public function insertar_huella_energia($codigo,$sede,$factor_emision,$cantidad_energia,$cantidad,$fecha,$fech){
        $sql="INSERT into huella_carbono_energia values($codigo,$sede,$factor_emision,$cantidad_energia,$cantidad,'$fecha','$fech');";
        $resultado=$this->consultar($sql);
        return $resultado;
      }
      /*=============================================================================================================
         maximo codigo de huella 
      ===============================================================================================================*/
      public function max_huella_lubricante(){
        $sql="SELECT max(codigo) from huella_carbono_lubricantes";
        $resultado=$this->consultar($sql);
        //echo $sql."<br> ";
        return $resultado;
      }
      /*=============================================================================================================
         listar todos los lubricantes
      ===============================================================================================================*/
      public function listar_tipo_lubricante($codigo){
        $sql="SELECT * from tipo_lubricante where codigo=$codigo";
        $resultado=$this->consultar($sql);
        return $resultado;
      }
      /*=============================================================================================================
         insercion de huella de lubricantes
      ===============================================================================================================*/
      public function insertar_huella_lubricante($codigo,$sede,$tipo_lubricante,$cantidad,$total,$fecha,$fech){
        $sql="INSERT into huella_carbono_lubricantes values($codigo,$sede,$tipo_lubricante,$cantidad,$total,'$fecha','$fech');";
        $resultado=$this->consultar($sql);
        return $resultado;
      }

      /*=============================================================================================================
         insercion de huella de lubricantes
      ===============================================================================================================*/
      public function total_co2_emitido(){
        $sql="SELECT sum(ft.Total) as total FROM ( 
          SELECT fr.Codigo, MONTH(fr.Fecha_registro) as mes ,fr.Total from huella_carbono_fuentes_fijas_refrigerante fr 
          UNION SELECT fc.Codigo,MONTH(fc.Fecha_registro) as mes ,fc.Total_co2 from huella_carbono_fuentes_fijas_combustible fc
          UNION SELECT fm.Codigo,MONTH(fm.Fecha_registro) as mes ,fm.Total_CO2 from huella_carbono_fuentes_moviles fm , fuentes_moviles m 
          union Select fe.Codigo,MONTH(fe.Fecha_registro) as mes, fe.Total from huella_carbono_extintores fe, extintor_sede es
          UNION SELECT l.codigo,month(l.fecha_registro) as mes , l.total_emision from huella_carbono_lubricantes l 
      ) as ft";
        $resultado=$this->consultar($sql);
        return $resultado;
      }

      
      /*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
      GRAFICACION POR SEDE 
      //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

      /*=============================================================================================================
         Listar años de insersion de los datos al sistema
      ===============================================================================================================*/
      public function Listar_ano_informe(){
        $sql="SELECT DISTINCT YEAR(Fecha_subida) FROM `huella_carbono_fuentes_fijas_combustible` GROUP by Fecha_subida";
        $resultado=$this->consultar($sql);
        return $resultado;
      }

      /*=============================================================================================================
         Consultas para hacer las graficas por sede de total de CO2 emitido
      ===============================================================================================================*/
      public function consultar_grafica_co2_alcance1($sede,$ano){
        $sql="SELECT ft.mes ,sum(ft.Total) FROM ( 
                  SELECT fr.Codigo, MONTH(fr.Fecha_registro) as mes ,fr.Total from huella_carbono_fuentes_fijas_refrigerante fr where YEAR(fr.Fecha_registro)=$ano and fr.Sede=$sede 
                  UNION SELECT fc.Codigo,MONTH(fc.Fecha_registro) as mes ,fc.Total_co2 from huella_carbono_fuentes_fijas_combustible fc where YEAR(fc.Fecha_registro)=$ano and fc.Sede=$sede 
                  UNION SELECT fm.Codigo,MONTH(fm.Fecha_registro) as mes ,fm.Total_CO2 from huella_carbono_fuentes_moviles fm , fuentes_moviles m where YEAR(fm.Fecha_registro)=$ano  and    fm.Placa=m.Codigo and m.Sede=$sede
                  union Select fe.Codigo,MONTH(fe.Fecha_registro) as mes, fe.Total from huella_carbono_extintores fe, extintor_sede es where YEAR(fe.Fecha_registro)=$ano AND es.codigo=fe.Extintor and es.sede=$sede 
                  UNION SELECT l.codigo,month(l.fecha_registro) as mes , l.total_emision from huella_carbono_lubricantes l where Year(l.fecha_registro)=$ano and l.sede=$sede
              ) as ft GROUP by ft.mes ORDER by ft.mes asc";
        //echo $sql."<br> ";
        $resultado=$this->consultar($sql);
        return $resultado;
      }
      /*=============================================================================================================
         Consultas para hacer las graficas por sede de total de los otros gases
      ===============================================================================================================*/
      public function consultar_grafica_co2_tipos($sede,$ano){
        $sql="SELECT ff.mes, sum(ff.ch4), sum(ff.N2O) from (
              SELECT month(hc.Fecha_registro) as mes,sum(hc.Total_CH4) as ch4,sum(hc.Total_NO2) as N2O  FROM huella_carbono_fuentes_fijas_combustible hc where hc.Sede=$sede and year(hc.Fecha_registro)=$ano GROUP BY mes

              UNION
              SELECT month(hm.Fecha_registro) as mes,sum(hm.Total_CH4) as ch4,sum(hm.Total_N2O) as N2O  FROM huella_carbono_fuentes_moviles hm, fuentes_moviles fm where hm.Placa=fm.Codigo and  fm.Sede=$sede and year(hm.Fecha_registro)=$ano GROUP BY mes
                ) as ff GROUP By ff.mes asc";
        //echo $sql."<br> ";
        $resultado=$this->consultar($sql);
        return $resultado;
      }
      /*=============================================================================================================
         Consultas para hacer las graficas por sede
      ===============================================================================================================*/
      public function consultar_grafica_co2_alcance2($sede,$ano){
        $sql="SELECT MONTH(he.Fecha_registro) as meses, he.Total_CO2 FROM huella_carbono_energia he where sede=$sede and Year(he.Fecha_registro)=$ano GROUP by meses ORDER by meses ASC";
        //echo $sql."<br> ";
        $resultado=$this->consultar($sql);
        return $resultado;
      }

       /*=============================================================================================================
         Consultas para hacer las graficas de los automoviles por sede (tipo de combustible)
      ===============================================================================================================*/
      public function consultar_grafica_co2_automovil_combustible($sede){
        $sql="SELECT e.codigo, e.Nombre from fuentes_moviles fm , elemento e where fm.Combustible=e.Codigo and fm.Sede=$sede GROUP by e.Codigo";
        //echo $sql."<br> ";
        $resultado=$this->consultar($sql);
        return $resultado;
      }


      /*=============================================================================================================
         Consultas para hacer las graficas de los automoviles por sede
      ===============================================================================================================*/
      public function consultar_grafica_co2_automovil($sede,$ano){
        $sql="SELECT fm.Placa ,fm.Combustible,sum( hm.Total_CO2),month(hm.Fecha_registro) as mes, e.Nombre, Year(hm.Fecha_registro) as ano 
        from huella_carbono_fuentes_moviles hm , fuentes_moviles fm, elemento e 
        where hm.Placa=fm.Codigo and fm.Combustible=e.Codigo and Year(hm.Fecha_registro)=$ano and fm.Sede=$sede
         GROUP by Placa, ano";
        //echo $sql."<br> ";
        $resultado=$this->consultar($sql);
        return $resultado;
      }




     
  }
  ?>

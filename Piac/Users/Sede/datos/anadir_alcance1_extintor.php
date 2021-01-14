<?php 
if (isset($_POST['tipo_extintor']) && isset($_POST['Cantidad']) && isset($_POST['Peso']) && isset($_POST['sede'])) {
    $tipo_extintor=$_POST['tipo_extintor'];
    $cantidad=$_POST['Cantidad'];
    $Peso=$_POST['Peso'];
    $sede=base64_decode( $_POST['sede']);
    $fecha=date('Y')."-".date('m')."-".date('d');

    if ($tipo_extintor=="seleccione") {
      echo '<div style="color:white; 
          text-align:center;
          width:82%; 
          margin-left:5%; 
          background:#ff9b9b; 
          font-size:1.5vw; 
          padding:1vw;"> ¡Error! no se escogio un tipo de extintor</div>';
    }
    else if ($cantidad=="0") {
        echo '<div style="color:white; 
          text-align:center;
          width:82%; 
          margin-left:5%; 
          background:#ff9b9b; 
          font-size:1.5vw; 
          padding:1vw;"> ¡Error! cantidad de extintores no valida</div>';
    }
    else if ($Peso=="0") {
      echo '<div style="color:white; 
          text-align:center;
          width:82%; 
          margin-left:5%; 
          background:#ff9b9b; 
          font-size:1.5vw; 
          padding:1vw;"> ¡Error! Peso no valido</div>';
    }
    else
    {
        Require_once'../../../src/consultas.php';
        $consultas= new consultas();

        $re=$consultas->consultar_extintor($tipo_extintor,$sede,$Peso);
        if ($fil=mysqli_fetch_array($re)) {
          $existe=true;
          
        }
        else
        {
          
          $existe=false;
        }
        $actualizar=false;
        if ($existe) {
          echo "<script>
          var h=confirm('Ya hay un registro de exintores con este peso de este tipo, desea sumarlas?');
          if(h){
            var extintor=".$tipo_extintor.";
            var sede=".$sede.";
            var Peso=".$Peso.";
            var Cantidad=".$cantidad."
            $.ajax({
              data:{extintor:extintor,sede:sede,peso:Peso,cantidad:Cantidad},
              dataType:'html',
              type:'Post',
              url:'../datos/actualizar extintor.php',
              success:function(data){
                  console.log(data);
                  $('#informaciones_extintor').html(data);
                  $('#tabla_fuente_extintor').load('../datos/Mostrar6.php',{s:'".$_POST['sede']."'});
              }
              });
          }
          </script>";
          
        }
        else{
          $consultas->insert_extintor($tipo_extintor,$sede,$cantidad,$Peso,$fecha);
          $re=$consultas->consultar_extintor($tipo_extintor,$sede,$Peso);
        if ($fil=mysqli_fetch_array($re)) {
          echo '<div style="color:white; 
            text-align:center;
            width:82%; 
            margin-left:5%; 
            background:#B6CF41; 
            font-size:1.5vw; 
            padding:1vw;">Se agrego al sistema</div>';
        }
        else
        {
          echo '<div style="color:white; 
          text-align:center;
          width:82%; 
          margin-left:5%; 
          background:#ff9b9b; 
          font-size:1.5vw; 
          padding:1vw;"> ¡Error! ocurrio algun error</div>';
        }
        }

        

        
    }

  }



 ?>
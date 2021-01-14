<?php
    SESSION_START();
    if(is_null($_SESSION["nombre"])) {
        header("Location:./index.php");
        //echo "<script>alert('No existe esta sesssion')".$_SESSION["nombre"]."</script>";
    }
    else{
        require '../../src/consultas.php';
        $consultas= new consultas();

        $resp=$consultas->BuscarEmpresa();
        $empresas=mysqli_num_rows($resp); 

        $resp=$consultas->BuscarUsuario();
        $usuarios=mysqli_num_rows($resp); 
        
        
        $resp=$consultas->total_co2_emitido();
        if($fila=mysqli_fetch_assoc($resp))
        {
            $Co=$fila["total"];
        }
        $Co=number_format($Co/1000, 2,'.','');


    }
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../images/Logo.png" />
    <title>Soporte</title>
    <link rel="stylesheet" href="../../css/admin1.css">
    <link rel="stylesheet" href="../../Users/Admin/Cositas/Menu.css">
    <script type="text/javascript" src="../../src/js/jquery-3.4.1.min.js"></script>
    <script src="../../Users/Admin/Cositas/ajax/menu.js"></script>
    <style>
        .plastic{
            width:25%;
            height:10vw;
            display:inline-block;
            margin-left:5%;
            border-radius:15px;
            position:relative;
        }
        .plastic .titulo{
            color:white;
            position:absolute;
            font-size:1.5vw;
            margin-left:10%;
            margin-top:1.5vw;
        }
        .plastic .numero{
            color:white;
            position:absolute;
            font-size:3vw;
            right:10%;
            bottom: 1.3vw;
            margin-top:30%;
        }
        

    </style>
    
    <script>
    </script>
</head>
<body>
    <div class="lado">
        <div class="perfil">
            <img src="../../images/Logo.png" alt="Logo">
        </div>
        <div class="men">
            <?php  require("../../Users/Admin/Cositas/Menu.php")?>
        </div>
    </div>
    <div class="centro">
        <div class="barra">
            <span><?=$_SESSION["nombre"]?></span>
            <div class="cerrar">Cerrar Sesión</div>
        </div>
        <div class="princ">
            <div class="plastic" style="background:#8297d6;"><span class="titulo">Empresas</span><span class="numero"><?=$empresas?></span></div>
            <div class="plastic" style="background:#82cdff;"><span class="titulo">Usuarios</span><span class="numero"><?=$usuarios?></span></div>
            <div class="plastic" style="background:#9cc95a;"><span class="titulo">Co2 Ton-Co2</span><span class="numero"><?=$Co?></span></div>
        </div>
    </div>
    
    
</body>
</html>
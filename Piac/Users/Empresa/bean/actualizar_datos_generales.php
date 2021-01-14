<?php 
	require_once'../../../src/consultas.php';
	$consultas= new consultas();
	session_start();
	
    $resp=$consultas->BuscarEmpresa_codigo($_SESSION['empresa']);
    if($fila=mysqli_fetch_array($resp))
    {
    	if (isset($_POST['N_empresa']) && $_POST['N_empresa']!="") {
    		$nombre=$_POST['N_empresa'];
    	}
    	else 
    	{
    		$nombre=$fila[2];
    	}
    	if (isset($_POST['nit']) && $_POST['nit']!="") {
    		$nit=$_POST['nit'];
    	}
    	else 
    	{
    		$nit=$fila[1];
    	}
    	if (isset($_POST['ciiu']) && $_POST['ciiu']!="") {
    		$ciiu=$_POST['ciiu'];
    	}
    	else 
    	{
    		$ciiu=$fila[6];
    	}
    	if (isset($_POST['correo']) && $_POST['correo']!="") {
    		$correo=$_POST['correo'];
    	}
    	else
    	{
    		$correo=$fila[5];
    	}
    	if (isset($_POST['telefono']) && $_POST['telefono']!="") {
    		$telefono=$_POST['telefono'];
    	}
    	else 
    	{
    		$telefono=$fila[4];
    	}
    	if (isset($_POST['N_representante']) && $_POST['N_representante']!="") {
    		$representante=$_POST['N_representante'];
    	}
    	else
    	{
    		$representante=$fila[3];
    	}

    }
    $cod=$_SESSION['empresa'];
    $consultas->ActualizarEmpresa($cod, $nit, $nombre,$representante, $telefono, $correo,$ciiu);
     echo '<div style="color:white; 
            text-align:center;
            width:82%; 
            margin-left:5%; 
            background:#B6CF41; 
            font-size:1.5vw; 
            padding:1vw;">Se actualizo sede </div>';

 ?>
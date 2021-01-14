<?php
session_start();
$s=$_GET['s'];


if ($_SESSION['sede']==0) {
	header('Location:../../index.php');
	exit();
}


?>
<!DOCTYPE>
<html>
<head>

	<title>Piac sede</title>
	<link rel="shortcut icon" href="../../images/Logo.png" />
	<link rel="stylesheet" type="text/css" href="../../css/sede.css">
	<link rel="stylesheet" type="text/css" href="../../css/arriba.css">
	<style>
		input[type="text"],input[type="number"],input[type="date"]{
			border-radius: 25px;
			text-align: center;
		}
	</style>
</head>
<body>
<div class="arriba"><img src="../../images/Logo.png"><p style="position:absolute;margin-top:1.0vw;margin-left: 30%;">Plataforma de indicadores ambientales</p><a href="https://piac.ecoblue.co/index.php?c=1/" > Cerrar sesion</a></p></div>
<div id="menu">
	<a href="bean/sede.php?s=<?php echo $s?>"><button><p>Datos de la Sede</p></button></a>
	<a href="bean/solido.php?s=<?php echo $s?>"><button><p>Corriente de residuos</p></button></a>
	<a href="bean/carbono.php?s=<?php echo $s?>"><button><p>Huella de Carbono</p></button></a>
	<a href="bean/hidirico.php?s=<?php echo $s?>"><button><p>Huella Hidrica</p></button></a>
	<a href="bean/informes.php?s=<?php echo $s?>"><button><p>Informes</p></button></a>




</div>
<div id="centro">
	<img src="../../images/colibri.jpg">
</div>
<script src="../../lib/js/jquery-min.js"></script>
<script src="../../js/funcionajax.js"></script>
<script src="../../lib/js/bootstrap4/jquery-3.1.1.min.js"></script>
<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</body>
</html>

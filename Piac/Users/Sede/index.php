<?php
require_once '../bean/renderMenu.php';
$render= new renderMenu();
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
	<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="../../js/head.js" ></script>
</head>
<body>
<div class="arriba">
	<img src="../../images/Logo.png">
	<p style="position:absolute;margin-top:1.0vw;margin-left: 30%;">Plataforma de indicadores ambientales</p>
	<p class="cerrar">Cerrar sesion</p>
</div>

<div id="menu">
<?=$render->render($_SESSION['tipo'],$s,3);?>
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
